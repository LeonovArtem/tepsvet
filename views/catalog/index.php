<?php

use yii\widgets\LinkPager;
use app\components\LeftMenuWidget;
use yii\helpers\Html;

?>
<div class="row">
    <div class="col-lg-2 col-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Лампы</h4>
            </div>
            <?= LeftMenuWidget::widget(['sections' => $leftMenu]); ?>
        </div>
    </div>
    <div class="col-lg-10 col-md-10 table-catalog">
        <table class="table table-bordered table-hover table-condensed">
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
                        <?php if (file_exists($_SERVER['DOCUMENT_ROOT']."/web/img/catalog/{$lamp['article']}.png")): ?>
                            <?= Html::img("@web/img/catalog/{$lamp['article']}.png", ['class' => 'img-thumbnail']) ?>
                        <?php else: ?>
                            <?= Html::img('@web/img/absent-img.jpg', ['class' => 'img-thumbnail']) ?>
                        <?php endif; ?>
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