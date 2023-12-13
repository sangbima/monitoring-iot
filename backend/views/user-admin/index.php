<?php

use backend\models\UserAdmin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\models\search\UserAdminSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'List Of Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-admin-index">
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
                        <?= Html::a('Create User Admin', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                    <?php Pjax::begin(); ?>
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'email:email',
                            'fullname',
                            'status',
                            [
                                'class' => ActionColumn::class,
                                'urlCreator' => function ($action, UserAdmin $model, $key, $index, $column) {
                                                        return Url::toRoute([$action, 'id' => $model->id]);
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