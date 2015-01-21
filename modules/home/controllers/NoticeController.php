<?php

namespace app\modules\home\controllers;

class NoticeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
