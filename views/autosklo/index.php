<?php

use app\components\FormWidget;
use app\components\NewsWidget;

use yii\helpers\Html;

use yii\bootstrap\Collapse;

$this->params['breadcrumbs'][] = $data->menu_name;
$this->title = $data->title;
//$this->keywords = $data->keywords;
//$this->description = $data->description;

?>
<h1>
    <?= $data->title ?>
</h1>

<div class="content">



    <?= $data->body ?>

    <?php if ($data->alias == 'contacts'): ?>
        <?= FormWidget::widget()?>
    <?php endif; ?>

    <?php if ($data->alias == 'project'): ?>

        <?= NewsWidget::widget()?>

    <?php endif; ?>


    <?php

      $gal = $gallery->getImages();
    ?>

    <div class="row">
        <div class="well">
            <div class="row" id="lightgallery">
                <?php foreach ($gal as $img): ?>
                    <div class="col-lg-4">
                        <?= Html::a(Html::img('@web/images/store/'.$img->filePath ), ['@web/images/store/'.$img->filePath],['class' => 'thumbnail']); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>




</div>

