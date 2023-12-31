<?php

/** @var \yii\web\View $this */
/** @var string $content */

// use backend\assets\AppAsset;
use backend\assets\BackendAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use common\widgets\toastr\ToastrFlashMessage;
use common\widgets\toastr\ToastrFlashMessageSession;

BackendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title>
        <?= Yii::$app->name . ' | ' . Html::encode($this->title) ?>
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
                    <?=
                        Breadcrumbs::widget(
                            [
                                'encodeLabels' => false,
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                'homeLink' => [
                                    'label' => '<i class="bi bi-house lh-1"></i> Home',
                                    'url' => Url::to('/'),
                                    'class' => 'text-decoration-none'
                                ]
                            ]
                        ) ?>
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
                    <?= ToastrFlashMessageSession::widget([
                        'options' => [
                            'closeButton' => true,
                            'progressBar' => true,
                            'positionClass' => ToastrFlashMessage::POSITION_TOP_FULL_WIDTH
                        ]
                    ]) ?>
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
