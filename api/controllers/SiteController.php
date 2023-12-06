<?php

namespace api\controllers;

use yii\rest\Controller;

/**
 * Site controller
 */
class SiteController extends Controller {

    public function actionIndex() {
        return [
            "data" => "Data Site API"
        ];
    }
}
