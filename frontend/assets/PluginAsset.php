<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class PluginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/frontend';

    public $css = [];
    public $js = [
        'vendor/overlay-scroll/custom-scrollbar.js',
        'vendor/toastify/custom.js',
        'vendor/apex/custom/dash1/visitors.js',
        'vendor/apex/custom/dash1/sales.js',
        'vendor/apex/custom/dash1/sparkline.js',
        'vendor/apex/custom/dash1/tasks.js',
        'vendor/apex/custom/dash1/income.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'common\assets\UnifyAsset',
        'common\assets\OverlayScrollbarsAsset',
        'common\assets\ToastifyAsset',
        'common\assets\ApexchartsAsset',
        'common\assets\MomentAsset',
    ];
}