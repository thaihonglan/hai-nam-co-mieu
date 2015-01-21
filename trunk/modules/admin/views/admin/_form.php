<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<link type="text/css" href="/css/jquery-ui.css" rel="Stylesheet" />

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 32, 'cols' => 50]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 64, 'cols' => 50]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 32, 'cols' => 50]) ?>

    <?= $form->field($model, 'birthday')->widget(DatePicker::className(),['dateFormat' => 'php:Y-m-d']) ?>
    
    <?= $form->field($model, 'phone')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 255, 'rows' => 2]) ?>

    <?= $form->field($model, 'disable')->checkbox(array('checked'=>false,'value'=>0)) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
