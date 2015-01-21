<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Notice */
/* @var $form yii\widgets\ActiveForm */
?>


<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
	mode : "textareas",
		plugins: [
				"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
		],
		toolbar1: "newdocument fullpage | fontselect | fontsizeselect | styleselect | formatselect | cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code",
		toolbar2: "forecolor | backcolor | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | table | hr removeformat | subscript superscript | charmap emoticons | ltr rtl | visualchars visualblocks nonbreaking template pagebreak restoredraft | insertdatetime preview",
		menubar: false,
		toolbar_items_size: 'small',
		style_formats: [
				{title: 'Bold text', inline: 'b'},
				{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
				{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
				{title: 'Example 1', inline: 'span', classes: 'example1'},
				{title: 'Example 2', inline: 'span', classes: 'example2'},
				{title: 'Table styles'},
				{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		],
		templates: [
				{title: 'Test template 1', content: 'Test 1'},
				{title: 'Test template 2', content: 'Test 2'}
		]
});
</script>

<div class="notice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'disable')->checkbox(array('checked'=>false,'value'=>0)) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
