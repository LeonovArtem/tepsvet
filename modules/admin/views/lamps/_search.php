<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\LampsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lamps-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'article') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'shape') ?>

    <?= $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'power') ?>

    <?php // echo $form->field($model, 'luminous') ?>

    <?php // echo $form->field($model, 'cap') ?>

    <?php // echo $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'width') ?>

    <?php // echo $form->field($model, 'lifetime') ?>

    <?php // echo $form->field($model, 'sortorder') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
