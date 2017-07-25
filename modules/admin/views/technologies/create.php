<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Technologies */

$this->title = 'Добавить элемент';
$this->params['breadcrumbs'][] = ['label' => 'Технологии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="technologies-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
