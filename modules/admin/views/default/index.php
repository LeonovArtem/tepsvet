<?php
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

$this->title = 'Админка';
$this->params['breadcrumbs'][] = $this->title; ?>

<div class="admin-default-index">
    <!--        <h1>--><? //= $this->context->action->uniqueId ?><!--</h1>-->
    <h2>Документация по использованию:</h2>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <a href="">
                <div class="small-box bg-aqua">

                    <div class="inner">
                        <h3>Лампы</h3>
                        <p>Каталог</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-lightbulb-o"></i>
                    </div>
                    <h3></h3>
                    <p class="small-box-footer">Подробнее
                        <i class="fa fa-arrow-circle-right"></i>
                    </p>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-xs-6">
            <a href="">
                <div class="small-box bg-green">

                    <div class="inner">
                        <h3>Каталог</h3>
                        <p>(в формате PDF)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-pdf-o"></i>
                    </div>
                    <h3></h3>
                    <p class="small-box-footer">Подробнее
                        <i class="fa fa-arrow-circle-right"></i>
                    </p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-xs-6">
            <a href="">
                <div class="small-box bg-yellow">

                    <div class="inner">
                        <h3>Слайдер</h3>
                        <p>(на главной странице)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sliders"></i>
                    </div>
                    <h3></h3>
                    <p class="small-box-footer">Подробнее
                        <i class="fa fa-arrow-circle-right"></i>
                    </p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-xs-6">
            <a href="">
                <div class="small-box bg-red">

                    <div class="inner">
                        <h3>Статьи</h3>
                        <p>(советы / технологии)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-newspaper-o"></i>
                    </div>
                    <h3></h3>
                    <p class="small-box-footer">Подробнее
                        <i class="fa fa-arrow-circle-right"></i>
                    </p>
                </div>
            </a>
        </div>

    </div>

</div>
<?php
//Modal::begin([
//    'header' => '<h3><span class="glyphicon glyphicon-trash"></span> Корзина</h3>',
//    'toggleButton' => [
//        'label' => 'Моя корзина',
//        'tag' => 'button',
//        'class' => 'btn btn-success'
//    ],
////    'footer' => 'Низ окна',
//]);
//?>
<!--<h4>Ваша корзина пуста</h4>-->
<?php //Modal::end(); ?>
<!--<h3>Табы:</h3>-->


<? //= Tabs::widget([
//    'navType' => 'nav-tabs nav-justified',
//    'items' => [
//        [
//            'label' => 'Магазин',
////            'content' => 'Вкладка 1',
//            'active' => true // указывает на активность вкладки
//        ],
//        [
//            'label' => 'Выбор плательщика',
//            'content' => 'Вкладка 2'
//        ],
//        [
//            'label' => 'Заголовок вкладки 3',
//            'content' => 'Вкладка 3',
//            'headerOptions' => [
//                'id' => 'someId',
//                'label' => 'one',
//            ]
//
//        ],
//        [
//            'label' => 'Таб с указанием URL',
//            'url' => '/partners/shop',
//        ],
//        [
//            'label' => 'Dropdown',
//            'items' => [
//                [
//                    'label' => '1',
//                    'content' => 'Выпадашка 1'
//                ],
//                [
//                    'label' => '2',
//                    'content' => 'Выпадашка 2'
//                ],
//                [
//                    'label' => '3',
//                    'content' => 'Выпадашка 3'
//                ],
//            ]
//        ]
//    ]
//]);
//?>

<!--<h2>Контент:</h2>-->
<!--<div class="test">-->
<!--    <a id="test" href="/partners/order/"> AJAX_1 </a>-->
<!--    <a href="/partners/test/"> AJAX__2</a>-->
<!--</div>-->
<!---->
<!--<h3><a id="test" href="/partners/test/"> AJAX_без класса </a></h3>-->
<?php //Pjax::begin([
//    'linkSelector' => '.test > a',
//]) ?>
<!---->
<?php //Pjax::end(); ?>
