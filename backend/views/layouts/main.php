<?php

/** @var \yii\web\View $this */
/** @var string $content */

// use backend\assets\AppAsset;
use backend\assets\BackendAsset;
use backend\assets\PluginAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

BackendAsset::register($this);
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
                <div class="app-hero-header d-flex align-items-start">

                    <!-- Breadcrumb start -->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <i class="bi bi-house lh-1"></i>
                            <a href="index.html" class="text-decoration-none">Home</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Analytics</li>
                    </ol>
                    <!-- Breadcrumb end -->

                    <!-- Sales stats start -->
                    <div class="ms-auto d-lg-flex d-none flex-row">
                        <div class="d-flex flex-row gap-2">
                            <button class="btn btn-sm btn-primary">Today</button>
                            <button class="btn btn-sm btn-white">7d</button>
                            <button class="btn btn-sm btn-white">2w</button>
                            <button class="btn btn-sm btn-white">1m</button>
                            <button class="btn btn-sm btn-white">3m</button>
                            <button class="btn btn-sm btn-white">6m</button>
                            <button class="btn btn-sm btn-white">1y</button>
                        </div>
                    </div>
                    <!-- Sales stats end -->

                </div>
                <div class="app-body">
                    <?= $content ?>
                </div>
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
