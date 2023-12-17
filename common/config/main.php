<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'formatter' => [
            'datetimeFormat' => 'dd-MM-YYYY HH:mm:ss',
            'dateFormat' => 'dd-MM-YYYY',
            'decimalSeparator' => ',',
            'thousandSeparator' => '.',
            'currencyCode' => 'IDR',
            'locale' => 'id-ID',
            'defaultTimeZone' => 'Asia/Jakarta'
        ],
        'cache' => [
            'class' => \yii\caching\FileCache::class,
        ],
    ],
];
