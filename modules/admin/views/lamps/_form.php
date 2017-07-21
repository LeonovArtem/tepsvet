<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Lamps */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lamps-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'article')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'power')->textInput() ?>

    <?= $form->field($model, 'luminous')->textInput() ?>

    <!--    --><? //= $form->field($model, 'cap')->dropDownList($model->getMenu('cap')) ?>
    <?= $form->field($model, 'cap')->dropDownList(ArrayHelper::map($model::find()->all(), 'id', 'cap')) ?>

    <?= $form->field($model, 'length')->textInput() ?>

    <?= $form->field($model, 'width')->textInput() ?>

    <?= $form->field($model, 'lifetime')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'shape')->dropDownList($model->getMenu('shape')) ?>

    <!--    --><? //= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);
    ?>


    <?= $form->field($model, 'sortorder')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
