<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Advice */

$this->title = $model->head;
$this->params['breadcrumbs'][] = ['label' => 'Советы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advice-view">

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php Modal::begin([
            'header' => false,
            'toggleButton' => [
                'label' => 'Удалить',
                'tag' => 'button',
                'class' => 'btn btn-danger'
            ],
            'size' => 0,
            'footer' => Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'method' => 'post',
                    ]
                ]) . Html::a('Отмена', '', ['class' => 'btn btn-default']),
        ]);
        ?>
    <h3><span class="glyphicon glyphicon-trash"></span> Вы уверены, что хотите удалить этот элемент?</h3>
    <?php Modal::end(); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'sort',
            'url:ntext',
            'head:ntext',
            'content:html',
        ],
    ]) ?>

</div>

