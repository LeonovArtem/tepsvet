<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="catalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 1]) ?>


    <?= $form->field($model, 'img')->widget(InputFile::className(), [
        'language' => 'ru',
        'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
        'filter' => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
        'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options' => ['class' => 'form-control'],
        'buttonName' => 'Выбрать',
        'buttonOptions' => ['class' => 'btn btn-success'],
        'path' => 'catalog_img',
        'multiple' => false       // возможность выбора нескольких файлов
    ]); ?>

    <!--    --><? //= $form->field($model, 'file_size')->textInput() ?>


    <?= $form->field($model, 'file_puth_pdf')->widget(InputFile::className(), [
        'language' => 'ru',
        'controller' => 'elfinder',
//        'filter' => 'pdf',
        'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options' => ['class' => 'form-control'],
        'buttonName' => 'Выбрать',
        'buttonOptions' => ['class' => 'btn btn-danger'],
        'path' => 'catalog_pdf',
        'multiple' => false
    ]); ?>

    <?= $form->field($model, 'status')->checkbox(['0', '1',]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
