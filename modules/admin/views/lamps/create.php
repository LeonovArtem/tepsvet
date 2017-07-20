<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Lamps */

$this->title = 'Добавление товара';
$this->params['breadcrumbs'][] = ['label' => 'Lamps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lamps-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
