<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class MomentAsset extends AssetBundle
{
    public $sourcePath = '@app/../themes';

    public $css = [];
    public $js = [
        'unify/assets/js/moment.min.js',
        'unify/assets/js/todays-date.js',
    ];
}
