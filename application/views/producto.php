<div class="col-lg-9 container">
    <div class="col-lg-12 breadcrumb">
        <label><?=$breadcrumb?></label>
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
        <h5>Formas de Pago</h5>
        <ul>
            <li>Efectivo.-</li>
            <li>Créditos Personales.-</li>
            <li>Tarjetas de Crédito.-</li>
        </ul>
    </div>
    <div class="col-lg-12">
        <h3 class="titulo-section">Otros productos que pueden interesarte</h3>
        <hr class="titulo-section">
        <div class="row">
            <ul class="productos">
                <?php
                foreach ($destacados as $destacado) { ?>
                <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3">   
                    <figure>
                        <?=($destacado['ofertaProducto'] == 1)? '<div class="ribbon-wrapper-green"><div class="ribbon-green">x Mayor</div></div>':''?>
                        <a href="producto/<?=$destacado['idProducto']?>/<?=$destacado['uriProducto']?>"><img src="<?=$destacado['thumbProductoImagen']?>" alt="<?=$destacado['nombreProducto']?>"></a>
                        <figcaption>
                            <label><a href="producto/<?=$destacado['idProducto']?>/<?=$destacado['uriProducto']?>"><?=$destacado['nombreProducto']?></a></label>
                        </figcaption>
                    </figure>
                </li>
                <?php }?>
            </ul>
        </div>
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