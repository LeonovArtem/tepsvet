<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use mihaildev\elfinder\InputFile;
use mihaildev\ckeditor\CKEditor;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'img')->widget(InputFile::className(), [
        'language' => 'ru',
        'controller' => 'elfinder',
        'filter' => 'image',
        'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options' => ['class' => 'form-control'],
        'buttonName' => 'Выбрать',
        'buttonOptions' => ['class' => 'btn btn-success'],
        'path' => 'slider',
        'multiple' => false
    ]); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'caption')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);
    ?>
    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
