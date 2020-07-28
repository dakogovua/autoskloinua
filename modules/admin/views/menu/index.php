<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BbbmenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bbbmenus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bbbmenu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bbbmenu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description',
            'keywords',
            'body:html',
            'alias',
            'position',
            'menu_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
