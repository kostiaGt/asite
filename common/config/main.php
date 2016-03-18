<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'sys' => [
            'class' => common\components\Sys::className()
        ],
        'language' => 'ru-RU',
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'UAN',
        ],
        
        'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                'viewPath' => '@common/mail',
                'transport' => [
                    'class' => 'Swift_MailTransport',
                ],
                'useFileTransport' => false,
            ],

    ],
    'params'=>[
        'admin e-mail'=>'kostiaGt@ukr.net',
        'webmaster e-mail'=>'kostiaGt@ukr.net',
    ]
];
