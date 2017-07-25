<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Technologies */

$this->title = 'Обновить элемент: ' . $model->head;
$this->params['breadcrumbs'][] = ['label' => 'Технологии', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->head, 'url' => ['view', 'id' => $model->head]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="technologies-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
