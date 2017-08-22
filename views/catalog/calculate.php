<?php

use yii\widgets\LinkPager;
use app\components\LeftMenuWidget;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

?>
<?php
//$this->registerJsFile(Yii::$app->request->baseUrl . '/js/calculate.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>


<?php Pjax::begin([
    'id' => Yii::$app->params['ID_PJAX'],
    'linkSelector' => 'getCalculateModal',
    'clientOptions' => ['method' => 'POST'], //тип запроса
    'enablePushState' => true, //обновлять url
]); ?>
<?php $form = ActiveForm::begin([
    'id' => 'calculate-form',
//    'action' => 'get-modal',
    'fieldConfig' => [
        'labelOptions' => ['class' => ' control-label'],
    ],
]); ?>
    <div class="row">
        <div class="col-lg-2 col-md-2">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Лампы</h4>
                </div>
                <?= LeftMenuWidget::widget(['sections' => $leftMenu]); ?>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>Расчет</h4>
                </div>
                <div class="list-group">
                    <div class="list-group-item">
                        <?= $form->field($model, 'price')->textInput(['autofocus' => true, 'value' => 1.83]); ?>
                    </div>
                    <div class="list-group-item">
                        <?= $form->field($model, 'time')->textInput(['value' => 4]); ?>
                    </div>
                    <div class="list-group-item">
                        <?= Html::submitButton('Расчитать', ['class' => 'btn btn-info btn-block getCalculateModal', 'name' => 'calculate-button']) ?>
                    </div>
                    <div class="list-group-item">
                        <?php if (isset($cartGoods['goods'])): ?>
                            <?php Modal::begin([
                                'id' => 'calculate-modal',
                                'size' => 'modal-lg',
                                'header' => '<h2>Результаты расчета</h2>',
                                'footer' => '<h3 class="text-left"><span class="text-info">Период окупаемости</span> ламп составит <span class="text-info">' . $cartGoods->payOffPeriod . '</span> дней </h3>',
                                'toggleButton' => ['label' => 'Результаты', 'class' => 'btn btn-danger btn-block getCalculateModal'],
                            ]); ?>
                            <div class="well">
                                <p>Цена 1 КвЧ: <strong><?= $cartGoods->kwhPrice; ?></strong></p>
                                <p>Среднее время работы ламп в течение суток: <strong><?= $cartGoods->hourDay; ?>
                                        час.</strong></p>
                            </div>
                            <table class="table table-bordered table-hover table-condensed table-catalog">
                                <thead>
                                <tr>
                                    <td>№</td>
                                    <td>Наименование</td>
                                    <td>Цена (руб.)</td>
                                    <td>Кол-во</td>
                                    <td>Сумма (руб.)</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php for ($i = 0, $n = count($cartGoods['goods']); $i < $n; $i++): ?>
                                    <?php $good = $cartGoods['goods'][$i]; ?>
                                    <tr>
                                        <td><?= ++$count; ?></td>
                                        <td><?= $good->name; ?></td>
                                        <td><?= $good->price; ?></td>
                                        <td><?= $good->quantity; ?></td>
                                        <td><?= $good->price * $good->quantity; ?></td>
                                    </tr>
                                <?php endfor; ?>
                                </tbody>
                            </table>
                            <div class="text-right">
                                <p>
                                    Итого: <strong><?= $cartGoods->sumQuantity; ?> шт.</strong>
                                </p>
                                <p>
                                    На сумму: <strong><?= $cartGoods->sumCost; ?> руб.</strong>
                                </p>

                            </div>
                            <?php Modal::end(); ?>
                        <?php else: ?>
                            <div class="alert alert-danger">
                                <span>Нужно заполнить поле <strong>Количество!</strong></span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-10 col-md-10">

            <table class="table table-bordered table-hover table-condensed table-catalog">
                <thead>
                <tr>
                    <th rowspan="2">№</th>
                    <th rowspan="2">Наименование</th>
                    <th colspan="2">Световые характеристики</th>
                    <th rowspan="2">Цоколь</th>
                    <th colspan="2">Размеры</th>
                    <th rowspan="2">Срок<br>службы<br>(час)</th>
                    <th rowspan="2">Цена<br>(руб.)</th>
                    <th rowspan="2">Фото</th>
                </tr>
                <tr>
                    <th>мощность (w)</th>
                    <th>световой поток (lm)</th>
                    <th>длина(мм)</th>
                    <th>диаметр (ширина)(мм)</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($lamps as $num => $lamp): ?>
                    <tr>
                        <td><?= ++$num; ?></td>
                        <td><?= $lamp['name']; ?></td>
                        <td><?= $lamp['power']; ?></td>
                        <td><?= $lamp['luminous']; ?></td>
                        <td><?= $lamp['cap']; ?></td>
                        <td><?= $lamp['length']; ?></td>
                        <td><?= $lamp['width']; ?></td>
                        <td><?= $lamp['lifetime']; ?></td>
                        <td><?= $lamp['price']; ?></td>
                        <td rowspan="2" class="catalog-image">
                            <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/web/img/catalog/{$lamp['article']}.png")): ?>
                                <?= Html::img("@web/img/catalog/{$lamp['article']}.png", ['class' => 'img-thumbnail']) ?>
                            <?php else: ?>
                                <?= Html::img('@web/img/absent-img.jpg', ['class' => 'img-thumbnail']) ?>
                            <?php endif; ?>
                            <? $id = $lamp['id']; ?>
                            <span class="text-center">
                            <?= $form->field($model, "countGoods[$id]")->textInput(['autofocus' => true]); ?>
                            </span>
                        </td>
                    </tr>
                    <tr class="default text-center">
                        <td colspan="9" class="well"><?= $lamp['description']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="text-center">
                <?= LinkPager::widget(['pagination' => $pages]); ?>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>
<?php Pjax::end(); ?>