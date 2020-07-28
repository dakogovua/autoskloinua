<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bbbnews */

$this->title = 'Create Bbbnews';
$this->params['breadcrumbs'][] = ['label' => 'Bbbnews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bbbnews-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
