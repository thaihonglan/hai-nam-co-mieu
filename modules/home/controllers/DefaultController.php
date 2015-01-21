<?php
namespace app\modules\home\controllers;

use yii\web\Controller;
use app\models\News;
use app\models\Notice;
use app\models\Category;
use yii\data\Pagination;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        $pagelimit = 5;
        
        $max_id_news = News::find()->select('max(id)')->scalar();
        
        $max_id_notice = Notice::find()->select('max(id)')->scalar();
        
        $notices = Notice::find()->where('id < :id', [':id' => $max_id_notice])
                        ->orderBy(['id' => SORT_DESC])->limit($pagelimit)->all();
        
        $last_notice = Notice::find()->orderBy(['id' => SORT_DESC])->one();
        
        $query = News::find()->where(['disable' => 0]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize($pagelimit);
        $models = $query->offset($pages->offset)
        ->orderBy(['id' => SORT_DESC])
        ->limit($pages->limit)
        ->all();
        
        return $this->render('index',[
            'models' => $models,
            'max_id_news' => $max_id_news,
            'notices' => $notices,
            '$max_id_notice' => $max_id_notice,
            'last_notice' => $last_notice,
            'pages' => $pages,
        ]);
    }


}