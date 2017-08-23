<?php
use yii\bootstrap\Carousel;
use yii\helpers\Html;
use app\components\ThumbnailCatalogWidget;

//$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <?= Carousel::widget([
                    'items' => $slider,
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
        <hr>
        <div class="text-center">
            <h3>Компания Теплый Свет предлагает Вам
                <span class="text-info">светодиодные</span>
                и
                <span class="text-info">энергосберегающие лампы.</span>
            </h3>
        </div>
        <hr>
        <?= ThumbnailCatalogWidget::widget(['template' => 'table', 'dataTable' => $catalog]) ?>

        <div class="row">
            <div class="col-lg-4">

                <p><span class="main-ico glyphicon glyphicon-hand-right"></span>
                    В современных условиях, когда дефицит
                    электроэнергии сочетается с ее неэффективным использованием,
                    особую остроту приобретает проблема энергосбережения. Вряд ли тарифы на газ, электроэнергию и тепло
                    вернутся к показателям 20-летней давности.</p>
                <p>С каждым годом потребность в электроэнергии на бытовые
                    и промышленные нужды постоянно увеличивается, поэтому именно экономия электроэнергии становится
                    важной необходимостью для всех и каждого.</p>

            </div>
            <div class="col-lg-4">

                <p><span class="main-ico glyphicon glyphicon-usd"></span>
                    Расчёты показывают, а практика подтверждает, что каждая единица денежных средств,
                    истраченная на мероприятия, связанные с экономией электроэнергии, даёт такой же эффект,
                    как в два раза большая сумма, израсходованная на увеличение её производства.</p>
                <p> Основной принцип энергосберегающей политики государства: эффективное использование энергетических
                    ресурсов.</p>

                <p>
                    <!--                    --><? //= Html::a('Рассчитать экономию', ['site/catalog', 'calculate' => 'y'], ['class' => 'btn btn-primary']); ?>
                    <?= Html::a('Рассчитать экономию', ['catalog/calculate'], ['class' => 'btn btn-primary btn-block']); ?>
                </p>
            </div>

            <div class="col-lg-4">
                <p><span class="main-ico glyphicon glyphicon-globe"></span> Наша миссия - решение национальной проблемы
                    энергосбережения и энергоэффективности!<br>
                    Мы работаем в России, сохраняем её энергетические ресурсы, а, значит, улучшаем условия человеческой
                    жизни.</p>
                <p>Использование энергоэкономичных источников света - это внедрение энергосберегающих технологий,
                    новый подход к потреблению энергии, вклад в правительственную программу энергосбережения,
                    спасение окружающей среды.</p>

            </div>
        </div>

    </div>
</div>
