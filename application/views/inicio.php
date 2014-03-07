<div id="sombra" class="content" style="margin-bottom: 1em;margin-top:0.5em;">
    <div id="slider" class="nivoSlider" style="box-shadow: rgba(0, 0, 0, 0.7) 0em 0.4em 0.4em;">
        <img src="assets/images/slider/imagen1.jpg" alt="" />
        <img src="assets/images/slider/imagen2.jpg" alt="" />
        <img src="assets/images/slider/imagen3.jpg" alt="" />
        <img src="assets/images/slider/imagen4.jpg" alt="" />
    </div>
    <hr>
</div>
<section class="content">
    <div class="row" style="margin:0;">
        <h4 class="caja-titulo">Atencion: Productos x Mayor !!!</h4>
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
        //controlNav: true,
        effect: 'fade',               // 1,2,3... navigation
    });
//});
</script>