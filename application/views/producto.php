<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="col-lg-9 container">
    <div class="col-lg-12 breadcrumb">
        <label><?=$breadcrumb?></label>
        <h5>Productos ::</h5>
    </div>
</div>
<div class="col-lg-9 container content">
    <div class="col-lg-12">
        <h3 class="titulo-section"><?=$producto['nombreProducto']?></h3>
        <hr class="titulo-section">
    </div>
    <div class="col-lg-6 detalle">
        <div class="slider-wrapper detalle-imagen">
            <div id="sliderw" class="slider nivoSlider">
            <?php foreach ($imagenes as $imagen) { ?>
                <a href="<?=$imagen['detailProductoImagen']?>" id="" class="">
                    <img src="<?=$imagen['detailProductoImagen']?>" data-thumb="<?=$imagen['thumbdetailProductoImagen']?>">
                </a>
            <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <h5><?=$producto['nombreProducto']?></h5>
        <p class="detalle-descripcion"><?=html_entity_decode($producto['descripcionProducto'])?></p>
        <div class="col-lg-12">
            <a href="contacto" class="btn btn-primary pull-right">Consultar</a>
        </div>
        
        <h5>Comparte este producto en :</h5>
        
        <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="box_count" data-action="like" data-show-faces="true" data-share="false"></div>
        <h5>Formas de Pago</h5>
    </div>
</div>
<script type="text/javascript">
$('.slider').nivoSlider({
    effect: 'fade',
    controlNav: true,
    controlNavThumbs: true,
    prevText: '<span class="glyphicon glyphicon-chevron-left"></span>',
    nextText: '<span class="glyphicon glyphicon-chevron-right"></span>',
});
</script>