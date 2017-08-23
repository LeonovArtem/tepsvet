<?php
use yii\bootstrap\Carousel;
use yii\helpers\Html;
use app\components\ThumbnailCatalogWidget;

?>
<div class="row text-center">
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading"><h4><span class="glyphicon glyphicon-thumbs-up"></span> Петров решил проблему
                </h4></div>
            <div class="list-group">
                <a href="<?=\yii\helpers\Url::to(['catalog/calculate'])?>" class="list-group-item">
                    <h4 class="list-group-item-heading"><span class="glyphicon glyphicon-pencil"></span> Рассчитать
                        экономию</h4>
                </a>
            </div>
        </div>
        <?= ThumbnailCatalogWidget::widget(['template' => 'list', 'dataTable' => $catalog]) ?>
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