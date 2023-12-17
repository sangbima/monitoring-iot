<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\forms\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>
<div class="site-login">
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <div class="border rounded-2 p-4 mt-5">
        <div class="login-form">
            <a href="index.html" class="mb-4 d-flex">
                <img src="/backend/images/logo.svg" class="img-fluid login-logo" alt="IOT Monitoring Admin Dashboard" />
            </a>
            <h5 class="fw-light mb-5">Sign in to access dashboard.</h5>
            <div class="mb-3">
                <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Enter your email']) ?>
            </div>
            <div class="mb-3">
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Enter your password']) ?>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="d-grid py-3 mt-4">
                <?= Html::submitButton('Login', ['class' => 'btn btn-lg btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>