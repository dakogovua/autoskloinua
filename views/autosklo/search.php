<?php

use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: ggg
 * Date: 17.12.2018
 * Time: 20:05
 */
$this->params['breadcrumbs'][] = "Запрос: ".$q;
$this->title = $q;
//$this->keywords = $data->keywords;
//$this->description = $data->description;

?>
<h1>
    <?= $this->title ?>
</h1>

<div class="content">
    <?php if (!empty($search )):?>
    <h3>Результат</h3>
    <ul>
        <?php foreach ($search as $rez):?>

        <li>
            <?= Html::a($rez->title,['autosklo/index', 'alias' => $rez->alias]);?>
        </li>
        <?php endforeach;?>
    </ul>
    <?php else:?>
    <h3>Ничего не нашло</h3>
    <?php endif;?>
</div>

