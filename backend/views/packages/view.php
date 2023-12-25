<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Packages $model */

$this->title = $model->package_name;
$this->params['breadcrumbs'][] = ['label' => 'Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="packages-view">
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
                        <?= Html::a('Update', ['update', 'id' => $model->uuid], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->uuid], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'uuid',
                            'package_name',
                            'sensor_count',
                            'price:currency',
                            'highlight:booleanLabel',
                            'created_at:datetime',
                            'createdBy.fullname',
                            'updated_at:datetime',
                            'updatedBy.fullname',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>