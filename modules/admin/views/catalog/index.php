<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CatalogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Каталог в формате PDF';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-index">
    <!--    --><? //=$this->render('_search', ['model' => $searchModel]); ?>
    <p><?= Html::a('Добавить ' . '<span class="fa fa-plus"> </span>', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'status',
            'img:image',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return $data->status ? '<span class="text-success"><strong>Активен</strong></span>' : '<span class="text-danger"><strong>Не активен</strong></span>';
                },
                'format' => 'html'
            ],
            'name:ntext',

            'file_puth_pdf:ntext',
            'file_size',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
