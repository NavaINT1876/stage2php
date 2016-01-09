<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'fullscreen'
            ]
        ]
    ]); ?>
    <div id="datepicker-stg2">
        <?= $form->field($model, 'strDate')->widget(DatePicker::classname(), [
            'options' => [
                'placeholder' => 'Click and choose date ...',
                'value' => $model->isNewRecord ? '' : date('d-M-Y', $model->date)
            ],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'dd-M-yyyy'
            ]
        ]);?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
