<?php

use common\models\Packages;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\search\PackagesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Packages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packages-index">
    <div class="row gx-3">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">
                        <?= Html::encode($this->title) ?>
                    </h5>
                </div>
                <div class="card-body" style="position: relative;">
                    <p>
                        <?= Html::a('Create Packages', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                    <?php Pjax::begin(); ?>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'package_name',
                            'sensor_count',
                            'price:currency',
                            'highlight:booleanLabel',
                            //'created_at',
                            //'created_by',
                            //'updated_at',
                            //'updated_by',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, Packages $model, $key, $index, $column) {
                                                        return Url::toRoute([$action, 'id' => $model->uuid]);
                                                    }
                            ],
                        ],
                    ]); ?>

                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>