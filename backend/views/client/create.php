<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\UserAdmin $model */

$this->title = 'Create User Admin';
$this->params['breadcrumbs'][] = ['label' => 'User Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-admin-create">
    <div class="row gx-3">
        <div class="col-xl-7 col-12">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">
                        <?= Html::encode($this->title) ?>
                    </h5>
                </div>
                <div class="card-body" style="position: relative;">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>