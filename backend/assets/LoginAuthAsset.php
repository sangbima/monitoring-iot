<?php
namespace backend\assets;

use yii\web\AssetBundle;

class LoginAuthAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'unify/assets/fonts/bootstrap/bootstrap-icons.css',
        'unify/assets/css/main.min.css',
    ];

    public $js = [];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}