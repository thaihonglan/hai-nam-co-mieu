<?php

namespace app\modules\home;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\home\controllers';
    
    public $layout = 'home';
    
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
