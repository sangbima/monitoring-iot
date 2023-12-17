<?php

use backend\models\UserAdmin;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use kartik\select2\Select2;
use kartik\widgets\SwitchInput;

/** @var yii\web\View $this */
/** @var backend\models\UserAdmin $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-admin-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="mb-3">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="mb-3">
        <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="mb-3">
        <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>
    </div>
    <div class="mb-3">
        <?= $form->field($model, 'status')->widget(Select2::class, [
            'data' => UserAdmin::getListStatusUser(),
            'options' => ['placeholder' => 'Status ...'],
            'hideSearch' => true,
        ]) ?>
    </div>
    <div class="mb-3">
        <?= $form->field($model, 'is_change_password')->widget(SwitchInput::class, [
            'pluginOptions' => [
                'size' => 'small',
                'onText' => 'Yes',
                'offText' => 'No',
            ]
        ]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>