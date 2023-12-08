<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception*/

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">
    <h1 class="error-title mb-3" style="font-size: 8vw;">
        <?= Html::encode($this->title) ?>
    </h1>
    <h3 class="mb-5 fw-lighter lh-2">
        <?= nl2br(Html::encode($message)) ?>
    </h3>
    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error. Thank you.
    </p>
</div>