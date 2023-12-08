<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ToastifyAsset extends AssetBundle
{
    public $sourcePath = '@app/../themes';

    public $css = [
        'unify/assets/vendor/toastify/toastify.css',
    ];
    public $js = [
        'unify/assets/vendor/toastify/toastify.js'
    ];
}
