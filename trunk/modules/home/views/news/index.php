<?php
/* @var $this yii\web\View */
use app\models\Category;
use app\models\News;
use yii\data\Pagination;
use yii\widgets\LinkPager;
?>
<link href="/css/home_style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="home-default-index">
	<div id="templatemo_content">

		<!-- LEFT COL -->
		<div id="templatemo_left">
            <?php foreach ($models as $newsdetail): ?>
			<a href="<?php echo 'home/news/detail?pid='.$newsdetail->id ?>">
				<h2><?php echo $newsdetail->title; ?></h2>
			</a>
			<p><?php
                $path = '/../images/avatar/';
                list ($width, $height) = getimagesize(Yii::$app->basePath . '/web/images/avatar/' . $newsdetail->avatar);
                if (($width / $height) > 1.34)
                    echo '<img src=' . $path . $newsdetail->avatar . ' width="240">';
                else
                    echo '<img src=' . $path . $newsdetail->avatar . ' height="180">';
                echo $newsdetail->description;
                ?>
			</p>
			<p style="text-align: right">
				<a href="<?php echo 'home/news/detail?pid='.$newsdetail->id ?>"><em>Chi
						tiết</em></a>
			</p>
            <?php endforeach; ?>
            <p></p>
            <?php echo LinkPager::widget([
                'pagination' => $pages,
                ]);
            ?>
		</div>










	</div>
</div>