<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Catalog */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-view">

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'id',
            [
                'attribute' => 'status',
                'value' => function ($data) {
//                    return $data->status ? '<span class="text-success"><strong>Активен</strong></span>' : '<span class="text-danger"><strong>Не активен</strong></span>';
                    return \yii\helpers\Html::tag(
                        'span',
                        $data->status ? 'Да' : 'Нет',
                        [
                            'class' => 'label label-' . ($data->status ? 'success' : 'danger'),
                        ]
                    );
                },
                'format' => 'html',

            ],
            'name:ntext',
            'img:image',
            'file_size',
            'file_puth_pdf:ntext',
        ],
    ]) ?>

</div>
