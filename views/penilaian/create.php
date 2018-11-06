<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\penilaian */

$this->title = 'Create Penilaian';
$this->params['breadcrumbs'][] = ['label' => 'Penilaian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
