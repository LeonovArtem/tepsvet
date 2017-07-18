<?php
use yii\bootstrap\Carousel;
use yii\helpers\Html;

$this->title = 'Экономия';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row text-center">
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4><span class="glyphicon glyphicon-thumbs-up"></span> Петров решил проблему
                </h4></div>
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-pencil"></span> Рассчитать
                        экономию</h4>
                </a>
            </div>
        </div>
        <div class="thumbnail">
            <?= Html::img('@web/img/catalog/cat_2017_1.png') ?>
            <div class="caption">
                <h3>Каталог Экола 2017</h3>
                <h4>в формате PDF (32Мб)</h4>
                <p>
                    <a href="#" class="btn btn-primary" role="button">Посмотреть</a>
                    <a href="#" class="btn btn-info" role="button">Скачать</a></p>
            </div>
        </div>
        <div class="thumbnail">
            <?= Html::img('@web/img/catalog/cat_2017_2.png') ?>
            <div class="caption">
                <h3>Каталог Экола Светильники GX53 и GX70 встраиваемые и накладные</h3>
                <h4>в формате PDF (24Мб)</h4>
                <p>
                    <a href="#" class="btn btn-info" role="button">Посмотреть</a>
                    <a href="#" class="btn btn-primary" role="button">Скачать</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading"><h4><span class="glyphicon glyphicon-piggy-bank"></span> Экономия</h4></div>
            <div class="list-group">
                <?= Carousel::widget([
                    'items' => [
                        // the item contains only the image
                        Html::img('@web/img/slider/p1.gif'),
                        // equivalent to the above
                        [
                            'content' => Html::img('@web/img/slider/p2.gif'),
                        ],

                        [
                            'content' => Html::img('@web/img/slider/p3.gif'),
                        ],
                        [
                            'content' => Html::img('@web/img/slider/p4.gif'),
                        ],
                        [
                            'content' => Html::img('@web/img/slider/p5.gif'),
                        ],
                        [
                            'content' => Html::img('@web/img/slider/p6.gif'),
                        ],
                    ],
                    'options' => [
                        'style' => 'width:100%', // Задаем ширину контейнера
                        'class' => 'carousel slide',
                        'data-interval' => '20000',
                    ],
                    'controls' => [
                        '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                        '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
                    ]
                ]); ?>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-info text-center">
    <div class="panel-heading">
        <h4><span class="glyphicon glyphicon-gift"></span> Специальные предложения</h4>
    </div>
    <div class="list-group">
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">
                Для корпоративных клиентов действует гибкая система скидок.
                Имеются специальные предложения для светодизайнеров.
            </h4>
        </a>
    </div>
</div>