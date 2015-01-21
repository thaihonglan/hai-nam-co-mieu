<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Category;
use dosamigos\fileupload\FileUploadUI;
use dosamigos\fileupload\FileUpload;
use dosamigos\fileinput\FileInput;


/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>
<link rel="stylesheet" type="text/css" href="/js/fancybox/source/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/js/fancybox/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<a href="/js/tinymce/plugins/filemanager/dialog.php?type=1&editor=mce_0&lang=eng&fldr=" class="btn iframe-btn" type="button">Open Filemanager</a>
<script type="text/javascript">
tinymce.init({
	mode : "textareas",
		plugins: [
				"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
				"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
				"table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker",
				"textpattern filemanager",
//				"openmanager"
		],
		image_advtab: true,
		subfolder:"",
		toolbar1: "newdocument fullpage | fontselect | fontsizeselect | styleselect | formatselect | cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code",
		toolbar2: "forecolor | backcolor | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | table | hr removeformat | subscript superscript | charmap emoticons | ltr rtl | visualchars visualblocks nonbreaking template pagebreak restoredraft | insertdatetime preview",
		menubar: false,
		relative_urls:false,
		toolbar_items_size: 'small',
//		file_browser_callback: "openmanager",
//		open_manager_upload_path: 'images/',
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

<script>
function OnMessage(e){
	  var event = e.originalEvent;
	   // Make sure the sender of the event is trusted
	   if(event.data.sender === 'responsivefilemanager'){
	      if(event.data.field_id){
	      	var fieldID=event.data.field_id;
	      	var url=event.data.url;
		$('#'+fieldID).val(url).trigger('change');
		$.fancybox.close();

		// Delete handler of the message from ResponsiveFilemanager
		$(window).off('message', OnMessage);
	      }
	   }
	}

	// Handler for a message from ResponsiveFilemanager
	$(‘.opener-class).on('click',function(){
	  $(window).on('message', OnMessage);
	});
</script>


<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<!-- <?= $form->field($model, 'user_id')->textInput(['maxlength' => 11]) ?> -->

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
    
    <div class="form-group field-news-title">
		<label class="control-label" for="news-title">Danh mục</label>
		<p>
    <?= Html::activeDropDownList($model, 'category_id', ArrayHelper::map(Category::find()->all(), 'id', 'name')) ?>
        </p>
		<div class="help-block"></div>
	</div>

	<?php if ($model->isNewRecord != '1'){
	    $path = '/../images/avatar/';
	    echo '<img src=' . $path . $model->avatar . ' width="240">';
	    echo '<p><strong>'.$model->avatar.'</strong></p>';
	   }
	?>
	
<p></p>

	<?= $form->field($model, 'avatar')->fileInput() ?>
	
	<?= $form->field($model, 'description')->textInput(['maxlength' => 1024, 'rows' => 5]) ?>
	    
    <?= $form->field($model, 'content')->textarea(['rows' => 18]) ?>

    <?= $form->field($model,'disable')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
