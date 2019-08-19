<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$translations = require __DIR__ . '/translations.php';

$config = [
    'id' => 'yii2_template_simple',
    'version' => '1.0.0',
    'basePath' => dirname(__DIR__),
    'homeUrl' => YII_DEBUG ? 'http://yii2-template-simple' : 'http://yii2-template-simple',
    'bootstrap' => ['log'],
    'language' => 'en-US',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => md5('ardGWC2D'),
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => '/login'
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'packdevelop.info@gmail.com',
                'password' => 'hmuyzjvbkwsmizlk',
                'port' => '465',
                'encryption' => 'SSL',
            ],
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
                'action' => \yii\web\UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
            ],
            'rules' => [

                /* DASHBOARD */
                '/admin' => 'admin/settings',
                '/<module:(admin|rbac)>/<controller>' => '<module>/<controller>/index',
                '/<module:(admin|rbac)>/<controller>/<action>' => '<module>/<controller>/<action>',

                /* OUTSIDE */
                '' => '/home/index',
                '/logout' => 'site/logout',
                '/<action:(reg|login)>' => 'site/<action>',
                '/<controller:(contact|site)>/captcha' => '<controller>/captcha',
                '/<controller:(home|about|contact|site)>' => '<controller>/index',
                '/<controller:(page|product)>/<id:\d+>' => '<controller>/view',
                '<controller:(ajax/feedback-ajax)>/<action:(send)>' => '<controller>/<action>',
                '<controller:(ajax/recaptcha-ajax)>/<action:(validate)>' => '<controller>/<action>',

                /* MFU Module */
                '<module:(mfuploader)>/<controller:(managers)>/<action:(filemanager|uploadmanager)>' => '<module>/<controller>/<action>',
                '<module:(mfuploader)>/<controller:(fileinfo)>' => '<module>/<controller>/index',
                '<module:(mfuploader)>/<controller:(fileinfo)>/<action:(index)>' => '<module>/<controller>/<action>',
                '<module:(mfuploader)>/<controller:(upload/local-upload|upload/s3-upload)>/<action:(send|update|delete)>' => '<module>/<controller>/<action>',
                '/<module:(mfuploader)>/<controller:(image-album|audio-album|video-album|application-album|text-album|other-album)>' => '<module>/<controller>/index',
                '/<module:(mfuploader)>/<controller:(image-album|audio-album|video-album|application-album|text-album|other-album)>/<action:(index|view|create|update|delete)>' => '<module>/<controller>/<action>',
            ],
        ],
        'i18n' => [
            'translations' => $translations
        ],
    ],
    'defaultRoute' => '/home/index',
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '*'],
    ];
}

return $config;
