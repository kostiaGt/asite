<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'homeUrl' => '/',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [

        'assetManager' => [
            'baseUrl' => '/assets',
           
        ],
        'language' => 'ru-RU',
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'ru',
                    'fileMap' => [
                    //'main' => 'main.php',
                    ],
                ],
            ],
        ], 
        'request' => [
            'baseUrl' => '',
            'class' => 'common\components\LangRequest'
        ],
        'urlManager' => [

            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class' => 'common\components\LangUrlManager',
            'rules' => [
                '/' => 'site/index',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
                '/category/id/<id:\d+>' => '/category/detail',
                '/product/id/<id:\d+>' => '/product/detail',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
