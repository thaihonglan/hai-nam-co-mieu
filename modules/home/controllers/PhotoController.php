<?php

namespace app\modules\home\controllers;

class PhotoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
