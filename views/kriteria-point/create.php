<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KriteriaPoint */

$this->title = 'Create Kriteria Point';
$this->params['breadcrumbs'][] = ['label' => 'Kriteria Point', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kriteria-point-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
