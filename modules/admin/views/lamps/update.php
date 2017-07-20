<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Lamps */

$this->title = 'Обновление товара: ' . $model->article;
$this->params['breadcrumbs'][] = ['label' => 'Lamps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->article, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lamps-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
