<?php

use app\widgets\Alert;
use app\assets\AutoskloAsset;
use yii\widgets\Breadcrumbs;

use app\components\MenuWidget;

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;

AutoskloAsset::register($this);
?>
<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <?php $this->head() ?>
        <title>Admin Zone | <?= Html::encode($this->title) ?></title>


    </head>

    <body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <div class="py-5">
            <div class="container">


                <div class="row">

                    <!-- <div class="col-md-8" id="logo"><img class="img-fluid d-block rounded-circle" src="http://autosklo.in.ua/1/autosklo.png" id="logo_img"></div> -->
                    <div class="col-md-8" id="logo">
                        <?= Html::img('@web/images/autosklo.png',['class' => 'img-fluid d-block rounded-circle shadowfilter', 'id' => 'logo_img']) ?>
                    </div>
                    <div class="col-md-4" id="phone">
                       <!-- <img class="img-fluid d-block" src="http://autosklo.in.ua/slogan.png" id="phone_img">-->
                        <?= Html::img('@web/images/slogan.png',['id' => 'phone_img', 'class' => 'img-fluid d-block shadowfilter']) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-5">
            <div class="container">


                <div class="row">



                    <div class="col-md-2 d-flex" id="menu">

                        <div>

                                    <?= MenuWidget::widget(['tpl' => 'admin'])?>

                        </div>
                        <div>
                            <?= Html::beginForm(['/site/logout'], 'post') ?>
                            <?= Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                            )
                            ?>
                            <?= Html::endForm() ?>
                         <!--   <a href = "<?= Url::to(['/site/logout']) ?>">Выйти <?= Yii::$app->user->identity['username'] ?></a> -->
                        </div>

                        <!-- <div>
                            <form action="<?= Url::to(['autosklo/search']) ?>">
                                <input type="search" placeholder="Search" name="q" >
                            </form>
                        </div> -->

                    </div>


                    <?php
                    // $brd = $this->params['breadcrumbs'][0];

                    //debug($brd);
                    // if($brd): ?>
                        <div class="col-md-10">
                            <div>
                                <?php

                                // if ($this->context->actionParams['alias'] != 'index'){
                                    echo Breadcrumbs::widget([
                                        'homeLink' => ['label' => 'Головна', 'url' => '/'],
                                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                    ]);
                                // }
                                ?>
                                <?= Alert::widget() ?>
                            </div>

                            <div class="rounded shadow-sm" id="content" >

                                <?= $content ?>
                            </div>
                        </div>
                    <?php // endif;?>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5" id="footer_div">
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="footer">
                    <p class="pull-left">&copy; Autosklo 2009 - <?= date('Y') ?></p>

                    <p class="pull-right"><?= 'KK Админка' ?></p>
                </div>
            </div>
        </div>
    </div>

    <!--
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    -->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>