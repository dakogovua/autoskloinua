<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bbbmenu */

$this->title = 'Update Bbbmenu: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Bbbmenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bbbmenu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'gallery' => $gallery,


    ]) ?>



</div>
