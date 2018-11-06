<?php

use yii\helpers\Html;
use yii\grid\GridView;

//tambahan
use app\models\Kriteria;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KriteriapointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kriteria Point';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kriteriapoint-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Input Kriteria Point', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //1. 'idkriteria',
            //2. 'relasiKriteria.nama',
            //3. filtering
            [
                'attribute'=>'idkriteria',
                'value'=>'relasiKriteria.nama',
                'filter'=>ArrayHelper::map(Kriteria::find()->all(),'id','nama'),
            ],
            'deskripsi:ntext',
            'point',
            'tahun',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
