<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage()?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<link href="/css/home_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/js/slide/slideshow-transition-builder-controller.min.js"></script>
<!-- <script type="text/javascript" src="/js/slide/jssor.slider.js"></script> -->
<!-- <script type="text/javascript" src="/plugins/jquery-ui/jquery-ui.min.js"></script> -->


<head>
<meta charset="<?= Yii::$app->charset ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags()?>
    <title>Hải Nam Cổ Miếu</title>
    <?php $this->head()?>
</head>
<body>

<?php $this->beginBody()?>
<!--     <div class="wrap"> -->
	<div id="templatemo_header">
        <div style="position: relative; width: 800px; height: 170px;" id="slider1_container">
        <div u="slides" t="FADE" t2="B" d=-50 style="cursor: move; position: absolute; width: 800px; height: 170px;top:0px;left:0px;overflow:hidden;">
            <div><img u="image" src="/images/home/banner_01.jpg" width="800" height="170"></div>
            <div><img u="image" src="/images/home/banner_02.jpg" width="800" height="170"></div>
            <div><img u="image" src="/images/home/banner_03.png" width="800" height="170"></div>
            <div><img u="image" src="/images/home/banner_04.jpg" width="800" height="170"></div>
            <div><img u="image" src="/images/home/banner_05.jpg" width="800" height="170"></div>
            <div><img u="image" src="/images/home/banner_06.jpg" width="800" height="170"></div>
            <div><img u="image" src="/images/home/banner_07.jpg" width="800" height="170"></div>
            <div><img u="image" src="/images/home/banner_08.jpg" width="800" height="170"></div>
            <div><img u="image" src="/images/home/banner_09.jpg" width="800" height="170"></div>
            <div><img u="image" src="/images/home/banner_10.jpg" width="800" height="170"></div>
            <div><img u="image" src="/images/home/banner_11.jpg" width="800" height="170"></div>
            <div><img u="image" src="/images/home/banner_12.jpg" width="800" height="170"></div>
            <div><img u="image" src="/images/home/banner_13.jpg" width="800" height="170"></div>
        </div>
        </div>
    <script>
        slideshow_transition_controller_starter("slider1_container");
        jQuery(document).ready(function ($) {
            var options = { $AutoPlay: true,
          		  $SlideDuration: 2000 
                  };
            var jssor_slider1 = new $JssorSlider$('slider1_container', options);
            
        });
    </script>
<!-- 		<div id="templatemo_header_upper">Hải Nam Cổ Miếu - Cà Mau</div> -->
<!-- 		<div id="templatemo_header_lower"> -->
<!-- 			<p><span>Hội Quán Hải Nam</span><br /> Trang tin hoạt động của Hải Nam Cổ Miếu tại Cà Mau.</p> -->
<!-- 		</div> -->
	</div>
	<div class="templatemo_menu">
		<ul>
			<li><a href="/">Trang chủ</a></li>
			<li><a href="/news">Tin tức</a></li>
			<li><a href="/notice">Thông báo</a></li>
<!-- 			<li><a href="/photo">Hình ảnh</a></li> -->
			<li><a href="#">Hội quán</a></li>
			<li><a href="/site/contact">Liên hệ</a></li>
		</ul>
	</div>
	<div id="templatemo_top">
		<img src="/images/home/templatemo_top.jpg"
			alt="Hải Nam Cổ Miếu Cà Mau" width="800" height="32" />
	</div>
	<div class="container">
		<div id="templatemo_container">
                <?= $content?>
                
                <div id="templatemo_footer"></div>
		</div>
	</div>
	<!-- 	</div> -->

	<footer class="footer">
		<div class="container">
			<p class="pull-left">&copy; Hải Nam Cổ Miếu Cà Mau - <?= date('Y') ?></p>
			<p class="pull-right"><?= Yii::powered() ?></p>
		</div>
	</footer>

<?php $this->endBody()?>


</body>
</html>
<?php $this->endPage()?>
