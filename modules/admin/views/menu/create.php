<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bbbmenu */

$this->title = 'Create Bbbmenu';
$this->params['breadcrumbs'][] = ['label' => 'Bbbmenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="bbbmenu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'gallery' => $gallery,
    ]) ?>

</div>
