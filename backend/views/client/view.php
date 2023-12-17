<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\UserAdmin $model */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'User Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-admin-view">
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
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
                            'id',
                            'email:email',
                            'fullname',
                            'status',
                            'role',
                            'is_change_password',
                            'created_at',
                            'updated_at'
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>