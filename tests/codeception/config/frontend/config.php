<?php
/**
 * Application configuration for all frontend test types
 */
return [

    'controllerNamespace' => 'frontend\controllers',
    'components' => [

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
            ]
        ],
        
    ],
    
];