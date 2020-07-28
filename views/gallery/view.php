<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Bbbgallery */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bbbgalleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bbbgallery-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

        <?php $gallery = $model->getImages();
      //  debug($gallery);
        ?>

    <div class="row">
        <div class="well col-lg-12">
            <div class="row" id="lightgallery">
                <?php foreach ($gallery as $img): ?>
                    <div class="col-lg-4">
                        <?= Html::a(Html::img('@web/images/store/'.$img->filePath ), ['@web/images/store/'.$img->filePath],['class' => 'thumbnail']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>




    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text:ntext',
        ],
    ]) ?>

</div>
