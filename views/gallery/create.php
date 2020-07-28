<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bbbgallery */

$this->title = 'Create Bbbgallery';
$this->params['breadcrumbs'][] = ['label' => 'Bbbgalleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bbbgallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
