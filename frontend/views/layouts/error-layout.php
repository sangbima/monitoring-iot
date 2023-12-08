<?php

/** @var yii\web\View $this */
/** @var string $content */

// use backend\assets\AppAsset;
use backend\assets\LoginAuthAsset;
use yii\helpers\Html;

LoginAuthAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title>
        <?= Html::encode($this->title) ?>
    </title>
    <?php $this->head() ?>
</head>

<body class="error-screen bg-primary">
    <?php $this->beginBody() ?>
    <!-- Container start -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="d-flex align-items-center justify-content-center vh-100">
                    <div class="text-center text-white">
                        <?= $content ?>
                        <?= Html::a('Go back', ['/'], ['class' => 'btn btn-warning px-5 shadow-lg py-3 fs-5']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container end -->
    <?php $this->endBody() ?>
</body>
</body>

</html>
<?php $this->endPage();
