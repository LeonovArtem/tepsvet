<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Advice */

$this->title = 'Добавить элемент';
$this->params['breadcrumbs'][] = ['label' => 'Советы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advice-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
