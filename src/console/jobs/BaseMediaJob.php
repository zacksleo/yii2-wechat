<?php

namespace zacksleo\yii2\wechat\console\jobs;

use yii;
use yii\base\BaseObject;
use yii\queue\RetryableJobInterface;
use GuzzleHttp\Client;
use Intervention\Image\ImageManagerStatic;
use Intervention\Image\Exception\NotReadableException;
use GuzzleHttp\Exception\ConnectException;

abstract class BaseMediaJob extends BaseObject implements RetryableJobInterface
{
    public $theme = 'iflying';

    protected function render($category, $params)
    {
        $base = Yii::getAlias('@vendor/zacksleo/yii2-wechat/src/webclips');
        $path = $base . '/' . $this->theme .  '/' . $category . '.php';
        return Yii::$app->view->renderFile($path, $params);
    }

    /**
     * 获取远程图片
     *
     * @param [string] $apiKey
     * @param [string] $q
     * @return boolean|string
     */
    protected function getRemoteImage($apiKey, $q)
    {
        $path = $this->getThumbsPath() . $q . '.jpg';
        if (file_exists($path)) {
            return $path;
        }
        $client = new Client([
            'base_uri' => 'https://pixabay.com/api',
            'timeout'  => 15.0,
        ]);
        $response = $client->request('GET', '', [
            'query' => [
                'key' => $apiKey,
                'lang' => 'zh',
                'image_type' => 'photo',
                'orientation' => 'horizontal',
                'min_width' => 900,
                'min_height' => 500,
                'safesearch' => 'true',
                'q' => $q,
                'order' => 'popular'
            ]
        ]);
        $code = $response->getStatusCode();
        if ($code !== 200) {
            return false;
        }
        $contents = (string)$response->getBody();
        $res = json_decode($contents, true);
        if ($res['total'] == 0) {
            return false;
        }
        $url = $res['hits'][0]['largeImageURL'];
        ImageManagerStatic::make($url)->resize(900, 500)->save($path);
        return $path;
    }

    /**
     * 获取缩略图路径
     *
     * @return void
     */
    public function getThumbsPath()
    {
        $path = Yii::getAlias('@frontend/web/uploads/thumbs/');
        if (!file_exists($path)) {
            mkdir($path);
        }
        return $path;
    }

    public function getSavePath()
    {
        $path = Yii::getAlias('@frontend/web/uploads/');
        $path = $path . date('Ymd') . '/';
        if (!file_exists($path)) {
            mkdir($path);
        }
        return $path;
    }

    public function getTtr()
    {
        return 15 * 60;
    }

    public function canRetry($attempt, $error)
    {
        return ($attempt < 3) && ($error instanceof ConnectException || $error instanceof NotReadableException);
    }
}
