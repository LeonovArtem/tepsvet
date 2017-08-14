<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php if (Yii::$app->user->identity->role == 1): ?>
        <p>
            <?= Html::a('Добавить ' . '<span class="fa fa-plus"> </span>', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <hr>
    <?php endif; ?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'img_profil',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::img($data->img_profil, [
                        'style' => 'max-width:150px;',
                        'class' => 'img-circle',
                    ]);
                },
            ],
            [
                'attribute' => 'role',
                'value' => function ($data) {
                    return \yii\helpers\Html::tag(
                        'h2',
                        $data->status->name,
                        [
                            'class' => 'label label-' . ($data->role == 1 ? 'danger' : 'success'),
                        ]
                    );
                },
                'format' => 'html'
            ],
            'username',
            'login',
//            'password',
//            'auth_key',
//            'role',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}' . (Yii::$app->user->identity->role == 1 ? '{update} {delete}' : ''),
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
