<center><h3>Gallery</h3></center>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
     <center><img src="<?= Yii::$app->request->baseUrl; ?>/images/21.jpg" height="20%" width="60%"></center>
      <div class="carousel-caption">
        ini gambar renang
      </div>
    </div>
    <div class="item">
      <center><img src="<?= Yii::$app->request->baseUrl; ?>/images/22.jpg" height="20%" width="60%"></center>
      <div class="carousel-caption">
        ini gambar sungai
      </div>
    </div>
  <div class="item">
      <center><img src="<?= Yii::$app->request->baseUrl; ?>/images/25.jpg" height="30%" width="60%"></center>
      <div class="carousel-caption">
        ini gambar karang
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>