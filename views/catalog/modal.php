<?php

use yii\bootstrap\Modal;
use yii\widgets\Pjax;

?>
<?php Pjax::begin([
    'id' => Yii::$app->params['ID_PJAX'],
    'linkSelector' => 'a',
    'clientOptions' => ['method' => 'POST'], //тип запроса
    'enablePushState' => true, //обновлять url
]); ?>
<?php if (isset($cartGoods)): ?>
    <?php Modal::begin([
        'id' => 'calculate-modal',
        'size' => 'modal-lg',
        'header' => '<h2>Результаты расчета</h2>',
        'footer' => '<h3 class="text-left"><span class="text-info">Период окупаемости</span> ламп составит <span class="text-info">' . $cartGoods->payOffPeriod . '</span> дней </h3>',
        'toggleButton' => ['label' => 'Результаты', 'class' => 'btn btn-danger'],
    ]); ?>
    <div class="well">
        <p>Цена 1 КвЧ: <strong><?= $cartGoods->kwhPrice; ?> руб.</strong></p>
        <p>Среднее время работы ламп в течение суток: <strong><?= $cartGoods->hourDay; ?> час.</strong></p>
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
<?php endif; ?>
<?php Pjax::end(); ?>
