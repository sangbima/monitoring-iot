<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use kartik\widgets\SwitchInput;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var common\models\Packages $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="packages-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'row g-3']
    ]); ?>
    <div class="col-md-4 mb-3">
        <?= $form->field($model, 'package_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4 mb-3">
        <?= $form->field($model, 'sensor_count')->widget(MaskedInput::class, [
            'clientOptions' => [
                'alias' => 'decimal',
                'autoGroup' => true
            ]
        ]) ?>
    </div>
    <div class="col-md-4 mb-3">
        <?= $form->field($model, 'price')->widget(MaskedInput::class, [
            'clientOptions' => [
                'alias' => 'decimal',
                'autoGroup' => true
            ]
        ]) ?>
    </div>
    <div class="mb-3">
        <?= $form->field($model, 'highlight')->widget(SwitchInput::class, [
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