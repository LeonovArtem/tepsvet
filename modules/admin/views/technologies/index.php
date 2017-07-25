<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Технологии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technologies-index">

    <p>
        <?= Html::a('Добавить ' . '<span class="fa fa-plus"> </span>', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'options' => ['style' => 'height: 100px;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'url:ntext',
            'head:ntext',
//            [
//                'attribute' => 'content',
//                'value' => 'content',
//                'format' => 'html',
//            ],
            'sort',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
