<?php

/** @var \yii\web\View $this */
/** @var string $content */

// use backend\assets\AppAsset;
use frontend\assets\FrontendAsset;
use frontend\assets\PluginAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

FrontendAsset::register($this);
PluginAsset::register($this);
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

<body>
    <?php $this->beginBody() ?>
    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <?php require(__DIR__ . '/partials/_header.php'); ?>

        <!-- Main container start -->
        <div class="main-container">
            <?php require(__DIR__ . '/partials/_sidebar.php'); ?>

            <!-- App container starts -->
            <div class="app-container">
                <?= $content ?>
                <?php require(__DIR__ . '/partials/_footer.php'); ?>
            </div>
            <!-- App container ends -->

        </div>
        <!-- Main container end -->

    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
