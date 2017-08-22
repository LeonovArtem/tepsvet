<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seo-index">

    <p>
        <?= Html::a('Добавить ' . '<span class="fa fa-plus"> </span>', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'site_action',
            'title',
            'keywords',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
