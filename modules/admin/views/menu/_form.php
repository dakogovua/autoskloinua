<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\models\Bbbmenu */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    //debug($gallery)
?>

<div class="bbbmenu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>


    <?php
  /*  echo $form->field($model, 'body')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]); */
    ?>


    <?php


        echo $form->field($model, 'body')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
                'preset' => 'full',
                'inline' => false,
            ]),
        ]);

    ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'menu_name')->textInput(['maxlength' => true]) ?>
    <?= Html::a('Удалить файло', ['delfiles', 'id' => $gallery->id], ['class' => 'btn btn-success']) ?>
<?php
        echo $form->field($gallery, 'text')->textarea(['rows' => 1]) ;
        echo  $form->field($gallery, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ;
?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
