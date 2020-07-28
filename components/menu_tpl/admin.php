
<?php
use yii\helpers\Html;
// use yii\helpers\Url;

//print_r($category);
?>
<li>

    <?= Html::a($category['menu_name'].' edit',['/admin/menu/update', 'id' => $category['id']]);?>
</li>
