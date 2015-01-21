<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Category;
use app\models\Album;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => 255]) ?>

    <div class="form-group field-news-title">
        <label class="control-label" for="news-title">Danh mục</label>
        <p>
    <?= Html::activeDropDownList($model, 'category_id',ArrayHelper::map(Category::find()->all(), 'id', 'name')) ?>
        </p>
        <div class="help-block"></div>
    </div>
    
    <div class="form-group field-news-title">
        <label class="control-label" for="news-title">Album</label>
        <p>
    <?= Html::activeDropDownList($model, 'album_id',ArrayHelper::map(Album::find()->all(), 'id', 'name')) ?>
        </p>
        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'disable')->checkbox(array('checked'=>false,'value'=>0)) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
