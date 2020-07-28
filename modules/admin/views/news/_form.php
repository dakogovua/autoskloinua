<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;

use yii\bootstrap4\Modal;
use kartik\form\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Bbbnews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bbbnews-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seotitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seokeywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seodescription')->textInput(['maxlength' => true]) ?>



    <?php


    // Usage with model (with no default initial value)
    echo '<label class="control-label">Event Time</label>';
    echo DateTimePicker::widget([
        'model' => $model,
        'attribute' => 'date',
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
