<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Packages $model */

$this->title = 'Update Packages: ' . $model->package_name;
$this->params['breadcrumbs'][] = ['label' => 'Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->package_name, 'url' => ['view', 'id' => $model->uuid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="packages-update">
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