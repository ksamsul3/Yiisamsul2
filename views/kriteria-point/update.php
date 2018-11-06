<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KriteriaPoint */

$this->title = 'Update Kriteria Point: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Kriteria Point', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kriteria-point-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
