<?php

/* @var $this yii\web\View */
//$csrfTokenName = Yii::$app->request->csrfTokenName;
//echo $csrfTokenName;
/*
echo Yii :: $app->getRequest()->csrfParam;
echo "<hr>";
echo  Yii :: $app->getRequest()->getCsrfToken();
echo "<hr>";*/

$this->title = 'On_line Insurance';
// $this->registerJsFile('../vue/test/dist/build.js',  ['position' => yii\web\View::POS_END]);


?>

<pre>
    <?php print_r($polismodel);?>

</pre>

<?php $others = $polismodel->other; ?>

<pre>
    <?php print_r($others);?>

</pre>
