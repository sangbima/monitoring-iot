<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ApexchartsAsset extends AssetBundle
{
    public $sourcePath = '@app/../themes';

    public $css = [];
    public $js = [
        'unify/assets/vendor/apex/apexcharts.min.js',
        'unify/assets/vendor/apex/custom/dash1/visitors.js',
        'unify/assets/vendor/apex/custom/dash1/sales.js',
        'unify/assets/vendor/apex/custom/dash1/sparkline.js',
        'unify/assets/vendor/apex/custom/dash1/tasks.js',
        'unify/assets/vendor/apex/custom/dash1/income.js',
    ];
}
