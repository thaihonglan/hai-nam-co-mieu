<?php
/* @var $this yii\web\View */

use app\models\Category;
use app\models\Notice;
use yii\data\Pagination;
use yii\widgets\LinkPager;
?>
<link href="/css/home_style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="home-default-index">
	<div id="templatemo_content">

		<!-- LEFT COL -->
		<div id="templatemo_left">
            <?php foreach ($models as $noticedetail): ?>
			<a href="<?php echo 'home/notice/detail?pid='.$noticedetail->id ?>">
				<h2><?php echo $noticedetail->title; ?></h2>
			</a>
			<p><?php
//                 $path = '/../images/avatar/';
//                 list ($width, $height) = getimagesize(Yii::$app->basePath . '/web/images/avatar/' . $noticedetail->avatar);
//                 if (($width / $height) > 1.34)
//                     echo '<img src=' . $path . $noticedetail->avatar . ' width="240">';
//                 else
//                     echo '<img src=' . $path . $noticedetail->avatar . ' height="180">';
                echo $noticedetail->content;
                ?>
			</p>
			<p style="text-align: right">
				<a href="<?php echo 'home/notice/detail?pid='.$noticedetail->id ?>"><em>Chi
						tiết</em></a>
			</p>
            <?php endforeach; ?>
            <p></p>
            <?php echo LinkPager::widget([
                'pagination' => $pages,
                ]);
            ?>
		</div>

        <div id="templatemo_right">

            <h1>Thông báo mới nhất</h1>
			<?php foreach ($noticelist as $list): ?>
			<p><a href="<?php echo '/home/notice/detail?pid='.$list->id ?>"><?php echo $list->title; ?></a></p>
			<?php endforeach; ?>

        </div>
	</div>
</div>


    
    
    
    