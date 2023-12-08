<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class OverlayScrollbarsAsset extends AssetBundle
{
    public $sourcePath = '@app/../themes';

    public $css = [
        'unify/assets/vendor/overlay-scroll/OverlayScrollbars.min.css'
    ];
    public $js = [
        'unify/assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js',
    ];
}
