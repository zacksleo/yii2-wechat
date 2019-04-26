<?php

namespace zacksleo\yii2\wechat\backend\controllers;

use Yii;
use zacksleo\yii2\wechat\common\models\WechatNews;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use zacksleo\yii2\wechat\backend\models\NewsPostForm;
use yii\base\Model;
use EasyWeChat\Kernel\Messages\Article;
use EasyWeChat\Factory;

/**
 * NewsController implements the CRUD actions for WechatNews model.
 */
class NewsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all WechatNews models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => WechatNews::find()->orderBy('created_at desc'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single WechatNews model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = false;
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new WechatNews model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new WechatNews();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionPost($ids)
    {
        $idArr = explode(',', $ids);
        $models = NewsPostForm::findAll(['id' => $idArr]);

        if (Yii::$app->request->isGet) {
            return $this->render('post', [
                'ids' => $ids,
                'models' => $models
            ]);
        }
    }

    public function actionPublish($ids)
    {
        $idArr = explode(',', $ids);
        $app = Factory::officialAccount(Yii::$app->params['wechat.officialAccount']);
        if (($res = $this->upload2wechat($ids)) == false) {
            return $this->redirect('index');
        }
        //$res2 = $app->broadcasting->sendNews($res['media_id'], ['o_yLXs8wYUmgbo_dmLP91EUAYYxo', 'o_yLXsx2mCt8Ib38HDpoKkdGAbYY']);
        $res2 = $app->broadcasting->previewNews($res['media_id'], 'o_yLXs8wYUmgbo_dmLP91EUAYYxo');
        if (!empty($res2['errcode'])) {
            Yii::$app->session->setFlash('error', '发送失败：' . $res2['errmsg']);
            WechatNews::updateAll(['status' => WechatNews::STATUS_RELEASE_FAILED], [
                'id' => $idArr
            ]);
            return $this->redirect('index');
        }
        Yii::$app->session->setFlash('success', '发送成功');
        WechatNews::updateAll([
            'status' => WechatNews::STATUS_RELEASE_SUCCESS,
            'released_at' => time(),
        ], [
            'id' => $idArr
        ]);
        return $this->redirect('index');
    }

    public function actionUpload($ids)
    {
        if (($res = $this->upload2wechat($ids)) != false) {
            Yii::$app->session->setFlash('success', '同步成功: ' . $res['media_id']);
        }
        return $this->redirect('index');
    }

    /**
     * Updates an existing WechatNews model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing WechatNews model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the WechatNews model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return WechatNews the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = WechatNews::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function upload2wechat($ids)
    {
        $idArr = explode(',', $ids);
        $models = NewsPostForm::findAll(['id' => $idArr]);

        if (Model::loadMultiple($models, Yii::$app->request->post()) && Model::validateMultiple($models)) {
            for ($i = 0; $i < count($models); $i++) {
                for ($j = $i + 1; $j < count($models); $j++) {
                    if ($models[$i] > $models[j]) {
                        $temp = $models[$i];
                        $models[$i] = $models[$i + 1];
                        $models[$i + 1] = $temp;
                    }
                }
            }
            $articles = [];
            foreach ($models as $model) {
                $articles[] = new Article([
                    'title' => $model->title,
                    'thumb_media_id' => $model->thumb_media_id,
                    'author' => Yii::$app->name,
                    'source_url' => $model->url,
                    'content' => $model->content,
                    'digest' => mb_substr($model->digest, 60),
                    'show_cover' => 1,
                    'show_cover_pic' => 1,
                    'need_open_comment' => 1,
                    'only_fans_can_comment' => 1
                ]);
            }
            $app = Factory::officialAccount(Yii::$app->params['wechat.officialAccount']);
            $res = $app->material->uploadArticle($articles);
            if (isset($res['errcode'])) {
                Yii::$app->session->setFlash('error', '上传失败：' . $res['errmsg']);
                WechatNews::updateAll(['status' => WechatNews::STATUS_UPLOAD_FAILED], [
                    'id' => $idArr
                ]);
                return false;
            }
            return $res;
        }
    }
}
