<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;
use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="text-center">
        <?= Html::img($model->img_profil, [
            'style' => 'max-width:150px;',
            'class' => 'img-circle',
        ]); ?>
    </div>
    <?= $form->field($model, 'img_profil')->widget(InputFile::className(), [
        'language' => 'ru',
        'controller' => 'elfinder',
        'filter' => 'image',
        'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options' => ['class' => 'form-control'],
        'buttonName' => 'Выбрать',
        'buttonOptions' => ['class' => 'btn btn-success'],
        'path' => 'user/' . Yii::$app->user->identity->id,
        'multiple' => false
    ]); ?>


    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <!--    --><? //= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
    <?php if (Yii::$app->user->identity->role == 1): ?>
        <?= $form->field($model, 'role')->dropDownList(ArrayHelper::map(\app\models\UserRole::find()->all(), 'id', 'name')); ?>
    <?php endif; ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
