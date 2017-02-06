
<div class="row container" style="margin-top:45px; margin-bottom:20px;">
	<div class=" col-xs-6 col-sm-6 col-md-6">
    	<a href="{$_layoutParams.root}prenda/mujer" onmouseover="transparenciaImagen(1,0.5)" onmouseout="transparenciaImagen(1,1)">
        	<img src="{$_layoutParams.img}mujer.jpg" class="img-responsive img-circle" id="1"
            									     style="width:350px; margin-left: auto; margin-right: auto;"
                                                     alt="Trajes de baño para Mujer"
                                                     title="Trajes de baño para Mujer" />
        </a>
        <p style=" margin-top:15px; text-align:center; font-size:18px;">
        	MUJER
        </p>
    </div>

	<div class="col-xs-6 col-sm-6 col-md-6" >
    	<a href="{$_layoutParams.root}prenda/hombre" onmouseover="transparenciaImagen(2,0.5)" onmouseout="transparenciaImagen(2,1)">
        	<img src="{$_layoutParams.img}hombre.jpg" class="img-responsive img-circle" id="2"
            										  style="width:350px; margin-left: auto; margin-right: auto;" 
                                                      alt="Trajes de baño para Hombre"
                                                      title="Trajes de baño para Hombre" />
                                       
        </a>
        <p style=" margin-top:15px; text-align:center; font-size:18px;">
        	HOMBRE
        </p>
    </div>
</div>

    
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-bottom:60px; ">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="{$_layoutParams.root}public/img/slider/foto1.jpg" alt="Chania" style="width:1920px; max-height:500px;" class="img-responsive">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>

    <div class="item">
      <img src="{$_layoutParams.root}public/img/slider/foto2.jpg" alt="Chania" style="width:1920px; max-height:500px;" class="img-responsive">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>

    <div class="item">
      <img src="{$_layoutParams.root}public/img/slider/foto3.jpg" alt="Flower" style="width:1920px; max-height:500px;" class="img-responsive">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>
    
    <div class="item">
      <img src="{$_layoutParams.root}public/img/slider/foto4.jpg" alt="Flower" style="width:1920px; max-height:500px;" class="img-responsive">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>
    
    <div class="item">
      <img src="{$_layoutParams.root}public/img/slider/foto5.jpg" alt="Flower" style="width:1920px; max-height:500px;" class="img-responsive">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>

