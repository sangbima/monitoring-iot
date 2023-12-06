<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class UnifyAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'unify/assets/fonts/bootstrap/bootstrap-icons.css',
        'unify/assets/css/main.min.css',
        'unify/assets/vendor/overlay-scroll/OverlayScrollbars.min.css',
        'unify/assets/vendor/toastify/toastify.css',
    ];
    public $js = [
        '/unify/assets/js/moment.min.js',
        '/unify/assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js',
        '/unify/assets/vendor/overlay-scroll/custom-scrollbar.js',
        '/unify/assets/vendor/toastify/toastify.js',
        '/unify/assets/vendor/toastify/custom.js',
        '/unify/assets/vendor/toastify/custom.js',
        '/unify/assets/vendor/apex/apexcharts.min.js',
        '/unify/assets/vendor/apex/custom/dash1/visitors.js',
        '/unify/assets/vendor/apex/custom/dash1/sales.js',
        '/unify/assets/vendor/apex/custom/dash1/sparkline.js',
        '/unify/assets/vendor/apex/custom/dash1/tasks.js',
        '/unify/assets/vendor/apex/custom/dash1/income.js',
        '/unify/assets/js/custom.js',
        '/unify/assets/js/todays-date.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
