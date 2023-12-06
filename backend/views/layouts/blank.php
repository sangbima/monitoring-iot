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

<body class="bg-white">
    <?php $this->beginBody() ?>
    <!-- Container start -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-sm-6 col-12">
                <?= $content ?>
            </div>
        </div>
    </div>
    <!-- Container end -->
    <?php $this->endBody() ?>
</body>
</body>

</html>
<?php $this->endPage();
