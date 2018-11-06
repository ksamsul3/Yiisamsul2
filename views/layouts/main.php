<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assetsOld\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?>Kompetensi Pemetaan</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Competency Pemetaan',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
           //'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false, //non aktifkan label
        'items' => [
            ['label' => '<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home', 'url' => ['/site/index']],
            
            ['label' => '<span class="glyphicon glyphicon-book" aria-hidden="true"></span>  About', 'url' => ['/site/about']],

            ['label' => '<span class="glyphicon glyphicon-education" aria-hidden="true"></span>  Pengajar', 
                'items' =>[
                    ['label' => 'Kategori', 'url' => ['/kategori']],
                    ['label' => 'Pengajar', 'url' => ['/pengajar']],

                ],
            ],
            //------------menu penilaian------------
            ['label' => '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Penilaian', 
                'items' =>[
                    ['label' => 'Kriteria', 'url' => ['/kriteria']],
                    ['label' => 'kriteria Point', 'url' => ['/kriteria-point']],
                    ['label' => 'Penilaian', 'url' => ['/penilaian']],
                    ['label' => 'Detail Penilaian', 'url' => ['/Detail-Penilaian']],


                ],
            ],

            //------------menu laporan--------------
            ['label' => '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  Laporaan', 
                'items' =>[
                    ['label' => 'Pengajar', 'url' => ['']],
                    ['label' => 'Kriteria', 'url' => ['']],
                    ['label' => 'Point kriteria ', 'url' => ['']],
                    ['label' => 'Penilaian', 'url' => ['']],

                ],
            ],


            ['label' => '<span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Gallery', 'url' => ['/site/gallery']],
            ['label' => '<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>  Contact', 'url' => ['/site/contact']],
            /*
            Yii::$app->user->isGuest ? (
                ['label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
            */
            //--------------------menu login, logout & register dari modul user---------------------------
            Yii::$app->user->isGuest ?
                ['label' => '<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  login', 'url' => ['/user/security/login']] :
                ['label' => Yii::$app->user->identity->username ,
               
                
                    'items' =>[
                            ['label' => 'Kelola user', 'url' => ['/user/admin/index']],
                            ['label' => 'Logout', 'url' => ['/user/security/logout'],
                             'linkOptions' => ['data-method' => 'post'],
                             ],
                        

                    ],

                ],
                ['label' => '<span class="glyphicon glyphicon-registration-mark" aria-hidden="true"></span>  Register', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest]
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class=" alert alert-danger">
    <div class="container">
        <p class="pull-left">&copy; NF KOMPUTER <?= date('Y') ?></p>

        <p class="pull-right"> Develop  By : Samsul Arifin  | samsularifin44000@gmail.com() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
