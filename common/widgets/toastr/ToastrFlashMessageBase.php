<?php

namespace common\widgets\toastr;

use common\widgets\toastr\assets\ToastrAsset;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

class ToastrFlashMessageBase extends Widget
{
    const TYPE_SUCCESS = 'success';
    const TYPE_ERROR = 'error';
    const TYPE_WARNING = 'warning';
    const TYPE_INFO = 'info';

    const POSITION_TOP_RIGHT = 'toast-top-right';
    const POSITION_TOP_LEFT = 'toast-top-left';
    const POSITION_TOP_CENTER = 'toast-top-center';
    const POSITION_TOP_FULL_WIDTH = 'toast-top-full-width';

    const POSITION_BOTTOM_RIGHT = 'toast-bottom-right';
    const POSITION_BOTTOM_LEFT = 'toast-bottom-left';
    const POSITION_BOTTOM_CENTER = 'toast-bottom-center';
    const POSITION_BOTTOM_FULL_WIDTH = 'toast-bottom-full-width';

    /**
     * Summary of title
     * @var string $title
     */
    public $title;
    /**
     * Summary of message
     * @var string $message
     */
    public $message;
    /**
     * Summary of messageDefault
     * @var string $messageDefault
     */
    public $messageDefault = 'Hello, This is default message';
    public $type;
    /**
     * Summary of types
     * @var array $types
     */
    public $types = ['success', 'error', 'warning', 'info'];
    /**
     * Summary of typeDefault
     * @var string $typeDefault
     */
    public $typeDefault = self::TYPE_SUCCESS;
    /**
     * Summary of options
     * @var array $options
     */
    public $options = [];

    public function init()
    {
        $this->view->registerAssetBundle(ToastrAsset::class);

        $this->title = is_string($this->title) ? Html::encode($this->title) : null;

        $this->message = is_string($this->message) ? Html::encode($this->message) : Html::encode($this->messageDefault);

        $this->options = is_array($this->options) ? Json::encode($this->options) : Json::encode([]);
    }
}