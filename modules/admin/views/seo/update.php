<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Seo */

$this->title = 'Обновить данные Seo: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Seo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="seo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
