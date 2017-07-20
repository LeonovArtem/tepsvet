<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Lamps */

$this->title = $model->article;
$this->params['breadcrumbs'][] = ['label' => 'Lamps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lamps-view">
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
            'id',
            'article',
            'name',
            'power',
            'luminous',
            'cap',
            'length',
            'width',
            'lifetime:raw',
            'price',
            'shape',
            'description:html',
            'sortorder',
        ],
    ]) ?>

</div>
