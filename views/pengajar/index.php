<?php

use yii\helpers\Html;
use yii\grid\GridView;
//tambahan
use app\models\Kategori;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PengajarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengajar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Input Pengajar', ['create'], ['class' => 'btn btn-success']) ?>

        <?= Html::a('Export PDF', ['export-pdf-pengajar'], ['class' => 'btn btn-warning']) ?>

         <?= Html::a('Export to Excel', ['export-excel-pengajar'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nip',
            'nama',
            //1. 'idkategori',
            //2. 'relasiKriteria.nama',
            //3. filting
            [
                'attribute'=>'idkategori',
                'value'=>'relasiKategori.nama',
                'filter'=>ArrayHelper::map(Kategori::find()->asArray()->all(),'id','nama'),
            ],
            'gender',
            //'tmp_lahir',
            //'tgl_lahir',
            //'alamat:ntext',
            //'hp',
            //'email:email',
            //'tgl_bergabung',
            //'pendidikan_terakhir',
            //'tahun_lulus',
            //'instansi_pendidikan',
            //'foto',
            //'cv',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
