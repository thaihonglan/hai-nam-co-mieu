<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'hainamlan',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'vi-VN',
    
    'aliases' => [
        '@yii/jui' => '@vendor/yiisoft/yii2-jui',
        '@dosamigos/fileupload' => '@vendor/yiisoft/yii2-file-upload-widget',
        '@dosamigos/fileinput' => '@vendor/yiisoft/yii2-file-input-widget',
    ],
    
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module'
        ],
        'home' => [
            'class' => 'app\modules\home\Module'
        ],
    ],
    
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
//             'enableStrictParsing' => true,
            'rules' => [
				'' => 'home/default/index',
                'admincp' => 'admin/news/index',
                '<action:\w+>' => 'home/<action>/index',
                'admin/<action:\w+>' => 'admin/<action>/index',
//                 '<controller:\w+>/<action:\w+>/*' => 'home/<controller>/<action>/*',
            ],
        ],
        
        'i18n' => [
            'translations' => [
                'admin*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/modules/admin/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'admin' => 'main.php',
                        'admin/error' => 'error.php',
                    ],
                ],
                'home*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/modules/home/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'home' => 'main.php',
                        'home/error' => 'error.php',
                    ],
                ],
                'model' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/models/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'model' => 'main.php',
                    ],
                ],
            ],
        ],
        
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'jd2c98đ823jnđ8c2nh2rf9823hrc2n87',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
