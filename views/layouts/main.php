<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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
        'brandLabel' => 'Теплый свет',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'О нас', 'url' => ['/site/about']],
            ['label' => 'Каталог', 'url' => ['/catalog']],
            ['label' => 'Технологии', 'url' => ['/site/hightech']],
            ['label' => 'Экономия', 'url' => ['/site/profit']],
            ['label' => 'Вакансии', 'url' => ['/site/jobs']],
            ['label' => 'Советы', 'url' => ['/site/advice']],
            ['label' => 'Контаткы', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Войти', 'url' => ['/site/login']]
            ) : (
            ['label' => 'В сети: ( ' . Yii::$app->user->identity->username . ' )', 'url' => ['/site/logout', ['method' => 'POST']],
                'items' => [
                    ['label' => 'Панель администартора', 'url' => ['/admin']],
                    ('<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Выйти',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>')
                ]
            ]
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container text-info">
        <!--        <h4 class="pull-left">&copy; Теплый свет --><? //= date('Y') ?><!--</h4>-->
        <div class="row">
            <div class="col-md-6 col-sm-6"><span class="glyphicon glyphicon-map-marker"></span> г. Москва, ул. Мастеркова, д.4
            </div>
            <div class="col-md-6 col-sm-6 text-right"><span class="glyphicon glyphicon-phone-alt"></span> +7 495 981-06-15</div>
        </div>
    </div>
    </div>
</footer>
<!--Document Scroll arrow-->
<a id="go-to-top" href="#" class="btn btn-primary btn-lg go-to-top" role="button" title="Вверх">
    <span class="glyphicon glyphicon-chevron-up"></span>
</a>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
