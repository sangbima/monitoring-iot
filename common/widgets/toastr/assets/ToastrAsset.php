<?php

namespace common\widgets\toastr\assets;

use yii\web\AssetBundle;

class ToastrAsset extends AssetBundle
{
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css'
    ];

    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js'
    ];

    public $depends = [
        'yii\web\YiiAsset'
    ];
}