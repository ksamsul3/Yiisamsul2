<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pengajar */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pengajar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengajar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Apakah anda yakin data di hapus?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-md-8">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'nip',
            'nama',
            //'idkategori',
            //nama relasi di midel + nama field di master tabel
            'relasiKategori.nama',
            'gender',
            'tmp_lahir',
            'tgl_lahir',
            'alamat:ntext',
            'hp',
            'email:email',
            'tgl_bergabung',
            'pendidikan_terakhir',
            'tahun_lulus',
            'instansi_pendidikan',
            //'foto',
            //'cv',
        ],
    ]) ?>
        </div>
        <div class="col-md-4">
            <center>
            <?php
            if(!empty($model->foto)){
            ?>
                <img src="<?= Yii::$app->request->baseUrl; ?>/foto/<?= $model->foto; ?>" width="80%"/>
            <?php
            }else{
            ?>
                <img src="<?= Yii::$app->request->baseUrl; ?>/foto/nophoto.jpg" width="80%"/>
            <?php
            }
                if(!empty($model->cv)){
            ?>
            <br/><br/>
                <a href="<?= Yii::$app->request->baseUrl; ?>/cv/<?= $model->cv; ?>" class="btn btn-primary">
            Unduh CV
            </a>
            <?php
            }
            ?>
            </center>
        </div>    
    </div>
</div>