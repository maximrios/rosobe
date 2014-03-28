<div class="content">
    <div id="slider" class="nivoSlider">
        <?php foreach ($slider as $imagen) { ?>
            <a href="<?=$imagen['linkSlider']?>" target="<?=$imagen['targetSlider']?>"><img src="<?=$imagen['pathSlider']?>" alt="<?=$imagen['tituloSlider']?>"/></a>
        <?php } ?>
    </div>
</div>
<section class="content">
    <div class="row" style="margin:0;">
        <div class="col-lg-12" style="background:blue;padding:0;font-size: 1.4em;text-align:center;min-height:90px;">
            <div class="col-lg-9" style="background:#E36F35;vertical-align:middle;">
                Muebles al por mayor en serie para mayoristas. La mejor calidad en el menor tiempo y costo.
            </div>
            <div class="col-lg-3" style="background:#393737;color:#FFF;">
                Nuevo
            </div>
        </div>
        <div class="col-lg-4"><span class="icono-atencion">Design</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</div>
        <div class="col-lg-4"><span class="icono-atencion">Time</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</div>
        <div class="col-lg-4"><span class="icono-atencion">Gear</span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</div>
    </div>
    <hr>
    <div class="row" style="margin:0;margin-top:1em;">
        <h4>Productos destacados</h4>
        <?php
        $i = 1;
        for($i=1;$i<=4;$i++) { ?>
        <div class="col-lg-3">
            <img src="assets/images/productos/imagen<?=$i?>_thumb.jpg" style="margin:0!important;padding:0!important;border:none!important;">
        </div>
        <?php } ?>

    </div>
    <hr>
    <div class="row" style="margin:2em 0!important;">
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
</section>
<script type="text/javascript">
//$(window).load(function() {
    $('#slider').nivoSlider({
        directionNav: false,             // Next & Prev navigation
        controlNav: false,
        effect: 'fade',               // 1,2,3... navigation
    });
//});
</script>