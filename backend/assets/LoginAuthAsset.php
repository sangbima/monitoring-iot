<?php
namespace backend\assets;

use yii\web\AssetBundle;

class LoginAuthAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/assets';
    public $css = [];

    public $js = [];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'common\assets\UnifyAsset'
    ];
}