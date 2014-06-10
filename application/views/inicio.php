<div class="col-lg-9 container">
    <div class="col-lg-12 breadcrumb">
        <label><?=$breadcrumb?></label>
        <!--<h5>Inicio ::</h5>-->
    </div>
</div>
<div class="col-lg-9 container">
    <div class="slider-wrapper theme-default">
    <div class="ribbon"></div>
    <div id="slider" class="nivoSlider">
        <?php foreach ($slider as $imagen) { ?>
            <a href="<?=$imagen['linkSlider']?>" target="<?=$imagen['targetSlider']?>"><img src="<?=$imagen['pathSlider']?>" alt="<?=$imagen['tituloSlider']?>"/></a>
        <?php } ?>
    </div>
    </div>
</div>
<div class="col-lg-9 container">
    <div class="row inicio-servicios">
        <div class="col-lg-12">
            <div class="col-lg-4">
                <span class="glyphicon glyphicon-wrench"></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, ullam, ea, minus, iure laboriosam voluptates amet omnis iusto quibusdam consequuntur sit doloribus expedita dolores? A aliquid aperiam quae asperiores molestiae.</p>
            </div>
            <div class="col-lg-4">
                <span class="glyphicon glyphicon-tag"></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, dignissimos iure ipsam sit odio pariatur amet asperiores in beatae rerum sunt aut. Quidem, quam, asperiores at architecto sint nisi laborum.</p>
            </div>
            <div class="col-lg-4">
                <span class="glyphicon glyphicon-cog"></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, ipsa inventore totam atque modi quae quo vitae ullam consequuntur eaque repudiandae nobis saepe labore doloribus sint. Vel tenetur assumenda voluptas!</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <h5>Productos destacados</h5>
            <br>
            <ul class="productos">
                <?php foreach ($productos as $producto) { ?>
                <li class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <figure>
                        <a href="producto/<?=$producto['idProducto']?>/<?=$producto['uriProducto']?>" title="<?=$producto['nombreProducto']?>" alt="<?=$producto['nombreProducto']?>"><img width="170" src="<?=$producto['thumbProductoImagen']?>" alt="<?=$producto['nombreProducto']?>"></a>
                        <figcaption>
                            <label><a href="producto/<?=$producto['idProducto']?>/<?=$producto['uriProducto']?>"><?=$producto['nombreProducto']?></a></label>
                        </figcaption>
                    </figure>
                </li>
                <?php } ?>  
            </ul>
        </div>
    </div>
    <hr>
    <div class="row resumen">
        <div class="col-lg-4">
            <h5>Productos para Mayoristas</h5>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br><br><br>
            <a href="" class="btn btn-warning pull-right" role="button">Ver mas</a>
        </div>
        <div class="col-lg-4 middle">
            <h5>Servicios</h5>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br><br>
            <a href="" class="btn btn-warning pull-right" role="button">Ver mas</a>
        </div>
        <div class="col-lg-4">
            <h5>Formas de Pago</h5>
            <img src="assets/images/formas-pago.png">
        </div>
    </div>
</div>
<script type="text/javascript">
//$(window).load(function() {
    $('#slider').nivoSlider({
        directionNav: true,             // Next & Prev navigation
        controlNav: true,
        effect: 'fade',               // 1,2,3... navigation
    });
//});
</script>