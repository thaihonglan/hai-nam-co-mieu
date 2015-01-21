<?php 
use app\models\News;
use app\models\Category;

if ($newsdetail->pageview == NULL) $count = 1;
else $count = $newsdetail->pageview + 1;

$model = new News;
$model = News::find()->where(['id' => $newsdetail->id])->one();
$model->pageview = $count;
$model->save();

?>
<link href="/css/home_style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<div class="home-default-index">

	<div id="templatemo_content">

	<!-- LEFT COL -->
		<div id="detail_left">

			<h1><?php echo $newsdetail->title; ?></h1>

			<p>
			<?php $path = '/../images/avatar/';
			     list($width, $height) = getimagesize(Yii::$app->basePath . '/web/images/avatar/' . $newsdetail->avatar);
			     if (($width / $height) > 1.34)
	                   echo '<img src=' . $path . $newsdetail->avatar . ' width="480">';
			     else echo '<img src=' . $path . $newsdetail->avatar . ' width="480">';
			 ?>
			</p>
			<p>&nbsp;</p>
			<p><?php echo $newsdetail->content; ?></p>

			<h2>Ý kiến bạn đọc</h2>
			<p>
				Đang làm, chưa xong.
			</p>

			<h2>Những bài cùng danh mục :</h2>
			<?php foreach ($similar as $similars): ?>
			<p> <a href="<?php echo 'home/news/detail?pid='.$similars->id ?>"><em>
			         <?php echo $similars->title; ?></em></a>  <em>(<?php echo $similars->create_date ?>)</em></p>
			<?php endforeach; ?>
			
		</div>

		<!-- RIGHT COL -->
		<div id="detail_right">

			<h1>Danh mục</h1>
			<?php foreach ($catelist as $list): ?>
			<p><b><?php echo $list->name; ?></b></p>
			<?php endforeach; ?>
			
		</div>
	</div>

</div>