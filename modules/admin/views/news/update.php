<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bbbnews */

$this->title = 'Update Bbbnews: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Bbbnews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bbbnews-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
