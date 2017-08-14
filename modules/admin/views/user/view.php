<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">


    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'img_profil',
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::img($data->img_profil, [
                        'style' => 'max-width:150px;',
//                        'class' => 'img-circle',
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

//            'id',
//            'password',
//            'auth_key',
        ],
    ]) ?>

</div>
