<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\SearchRepo;
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'GitHub Browser',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);

    $searchRepo = new SearchRepo();
    $form = ActiveForm::begin([
        'id' => 'search-form',
        'action' => '/search',
        'options' => [
            'class' => 'navbar-form navbar-right',
        ]
    ]);?>
    <div class="input-group">
        <?=$form->field($searchRepo, 'q')
            ->textInput(['placeholder' => "Search",'class' => 'form-control',])->label(false);
        ?>
        <span class="input-group-btn">
            <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-primary', 'name' => 'search-button']); ?>
        </span>
    </div>
    <?php
    ActiveForm::end();

    NavBar::end();
    ?>

    <div class="container" style="min-height: 100%">
        <?= $content ?>
    </div>
</div>
<?php if (false) {?>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; GitHub Browser <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php } ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
