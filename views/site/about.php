  <?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Company Profile
        </a>
      </h4>
    </div>
     <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <img src="<?= Yii::$app->request->baseUrl; ?>/images/samsul.jpg"  width="20%" height="40%">
        <p>nama__: samsul arifin</p>
        <p>Asal___: dari kalimantan barat</p> 
        <p>Tujuan_: pergi ke depok untuk menuntut ilmu
          dan untuk membuang kebodohan</p> 
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Mutto hidup
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
       <marquee direction="left" scrollamount="5" align="center" behavior="alternate">  ***(Berguna Bagi Manusia lainnya Terutama pada keluarga ku Tercinta)***</marquee>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Pesan 
        </a>
      </h4>
    </div>
  </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <p/>*banggalah jika kamu pernah gagal 
        <p/>*karana dengan kamu gagal kamu kamu bisa menemukan kesalahan 
        <p/>*yang perlu kamu perbaiki 
        <p/>*dan dengan memperbaiki kamu akan menuju ka jalan kesuksesan
        <p/>*percayalah usaha tidak pernah menghianati hasil :):):):)
    </div>
  </div>
</div>