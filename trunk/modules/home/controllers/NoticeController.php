<?php

namespace app\modules\home\controllers;
use app\models\Notice;
use app\models\Category;
use yii\data\Pagination;

class NoticeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $catelist = Category::find()->all();
        $noticelist = Notice::find()->orderBy(['id' => SORT_DESC]) ->limit(30)->all();
        
        $pagelimit = 10;
        
        $max_id_news = Notice::find()->select('max(id)')->scalar();
        
        $query = Notice::find()->where(['disable' => 0]);
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
            'noticelist' => $noticelist,
        ]);
    }

    public function actionDetail($pid)
    {
        $noticedetail = Notice::find()->where(['id' => $pid])->one();
        
        $noticelist = Notice::find()->orderBy(['id' => SORT_DESC]) ->limit(30)->all();

        return $this->render('detail',[
            'noticedetail' => $noticedetail,
            'noticelist' => $noticelist,
            'pid' => $pid,
        ]);
    }
    
}
