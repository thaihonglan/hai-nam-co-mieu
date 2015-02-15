<?php

namespace app\modules\home\controllers;
use app\models\News;
use app\models\Category;
use yii\data\Pagination;

class NewsController extends \yii\web\Controller
{
    public function actionIndex()
    {   
        $catelist = Category::find()->all();
        
        $pagelimit = 10;
        
        $max_id_news = News::find()->select('max(id)')->scalar();
        
        $query = News::find()->where(['disable' => 0]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize($pagelimit);
        $models = $query->offset($pages->offset)
        ->orderBy(['id' => SORT_DESC])
        ->limit($pages->limit)
        ->all();
        
        return $this->render('index',[
            'catelist' => $catelist,
            'max_id_news' => $max_id_news,
            'models' => $models,
            'pages' => $pages,
            ]
        );
    }

    
    public function actionList($cid)
    {   
        $catelist = Category::find()->all();
        
        $pagelimit = 10;
        
        $max_id_news = News::find()->select('max(id)')->scalar();
        
        $query = News::find()->where(['disable' => 0, 'category_id' => $cid]);
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $pages->setPageSize($pagelimit);
        $models = $query->offset($pages->offset)
        ->orderBy(['id' => SORT_DESC])
        ->limit($pages->limit)
        ->all();
        
        return $this->render('list',[
            'catelist' => $catelist,
            'cid' => $cid,
            'max_id_news' => $max_id_news,
            'models' => $models,
            'pages' => $pages,
        ]);
    }
    
    
    public function actionDetail($pid)
    {
        $newsdetail = News::find()->where(['id' => $pid])->one();
        
        $similar = News::find()->where(['category_id' => $newsdetail->category_id])->orderBy(['id' => SORT_DESC])->limit(5)->all();
        
        $catelist = Category::find()->all();
        
        return $this->render('detail',[
            'newsdetail' => $newsdetail,
            'pid' => $pid,
            'similar' => $similar,
            'catelist' => $catelist,
        ]);
    }
    
}
