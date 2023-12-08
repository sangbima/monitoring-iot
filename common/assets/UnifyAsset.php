<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class UnifyAsset extends AssetBundle
{
    public $sourcePath = '@app/../themes';

    public $css = [
        'unify/assets/fonts/bootstrap/bootstrap-icons.css',
        'unify/assets/css/main.min.css',
    ];
    public $js = [
        'unify/assets/js/custom.js',
    ];
}
