<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слайдер на главной странице';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">
    <p>
        <?= Html::a('Добавить ' . '<span class="fa fa-plus"> </span>', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'img',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::img($data->img, [
                        'style' => 'max-width:500px;'
                    ]);
                },
            ],
            'content:ntext',
            'caption:html',
            'sort',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
