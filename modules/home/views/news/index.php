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
				<a href="<?php echo '/home/news/detail?pid='.$newsdetail->id ?>"><em>Chi
						tiết</em></a>
			</p>
            <?php endforeach; ?>
            <p></p>
            <?php echo LinkPager::widget([
                'pagination' => $pages,
                ]);
            ?>
		</div>

        <!-- RIGHT COL -->
		<div id="templatemo_right">

			<h1>Danh mục</h1>
			<?php foreach ($catelist as $list): ?>
			<p><a href="<?php echo '/home/news/list?cid='.$list->id ?>"><?php echo $list->name; ?></a></p>
			<?php endforeach; ?>
			
			<p>&nbsp;</p>
			
			<h3>Liên lạc</h3>
			<p>Địa chỉ liên lạc（聯絡地址）:</p>

			<p>
				Hiệu buôn <strong>Bình Nguyên</strong>, số 15 đường Lý Văn Lâm, K4,
				P1, Cà Mau.<br /> 平原商店，金甌第一坊李文林街15號
			</p>
			
		</div>
		
	</div>
</div>