<?php
/* @var $this yii\web\View */
?>

<?php 
use app\models\Notice;
use app\models\Category;

if ($noticedetail->pageview == NULL) $count = 1;
else $count = $noticedetail->pageview + 1;

$model = new Notice;
$model = Notice::find()->where(['id' => $noticedetail->id])->one();
$model->pageview = $count;
$model->save();

?>
<link href="/css/home_style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<div class="home-default-index">

	<div id="templatemo_content">

	<!-- LEFT COL -->
		<div id="detail_left">

			<h1><?php echo $noticedetail->title; ?></h1>

			<p>&nbsp;</p>
			<p><?php echo $noticedetail->content; ?></p>

			
		</div>

		<!-- RIGHT COL -->
		<div id="detail_right">

			<h1>Mới nhất</h1>
			<?php foreach ($noticelist as $list): ?>
			<p><a href="<?php echo '/home/notice/detail?pid='.$list->id ?>"><?php echo $list->title; ?></a></p>
			<?php endforeach; ?>
			
		</div>
	</div>

</div>