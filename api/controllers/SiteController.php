<?php

namespace api\controllers;

use yii\rest\Controller;
use yii\web\Response;
use yii\helpers\ArrayHelper;

/**
 * Site controller
 */
class SiteController extends Controller
{
    // public function behaviors()
    // {
    //     $behaviors = parent::behaviors();
    //     $behaviors['contentNegotiator']['formats'] = [
    //         'application/json' => \yii\web\Response::FORMAT_JSON,
    //     ];
    //     return $behaviors;
    // }

    public function actionIndex()
    {
        return [
            "data" => "Data Site API"
        ];
    }
}
