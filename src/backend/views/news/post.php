<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'post-form',
    'action' => ['news/upload','ids'=>$ids],
    'options' => ['class' => 'form-horizontal'],
]) ?>

<div class="form-group">
    <div class="col-md-1">
        <div class="form-control-static">#</div>
    </div>
    <div class="col-md-2">
        <div class="form-control-static">缩略图</div>
    </div>
    <div class="col-md-4">
        <div class="form-control-static">标题</div>
    </div>
    <div class="col-md-2">
        <div class="form-control-static">序号</div>
    </div>
</div>

<?php foreach ($models as $index => $model) : ?>
    <div class="form-group">
        <div class="col-md-1">
            <div class="form-control-static"><?= $index + 1; ?></div>
        </div>
        <div class="col-md-2">
            <img height="55" src="<?= $model->getCossdomThumb(); ?>" />
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" name="NewsPostForm[<?= $index; ?>][title]" value="<?= $model->title; ?>" />
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control" name="NewsPostForm[<?= $index; ?>][number]" value="<?= $index + 1; ?>" />
            <input type="hidden" name="NewsPostForm[<?= $index; ?>][id]" value="<?= $model->id; ?>" />
        </div>
    </div>
<?php endforeach; ?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('上传到公众号素材库', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>