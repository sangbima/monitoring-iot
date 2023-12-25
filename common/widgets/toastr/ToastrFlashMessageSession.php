<?php

namespace common\widgets\toastr;

use yii\helpers\Html;
use yii\helpers\Json;

class ToastrFlashMessageSession extends ToastrFlashMessageBase
{
    private $session;

    public function run()
    {
        $this->session = \Yii::$app->session;

        $flashes = $this->session->getAllFlashes();

        foreach ($flashes as $type => $data) {
            $data = (array) $data;

            foreach ($data as $i => $message) {
                ToastrFlashMessage::widget([
                    'type' => Html::encode($type),
                    'title' => ucfirst(Html::encode($type)),
                    'message' => Html::encode($message),
                    'options' => Json::decode((string) $this->options)
                ]);
            }

            $this->session->removeFlash($type);
        }
    }
}