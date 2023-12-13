<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\UserAdmin $model */

$this->title = 'Update User Admin: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-admin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
