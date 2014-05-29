<?php
    $vcHeaderLoginView = (!empty($vcHeaderLoginView))?$vcHeaderLoginView:'';
    $vcBaseUrlAssets = (!empty($vcBaseUrlAssets))?$vcBaseUrlAssets: config_item('ext_base_url_assets');
    $vcBaseUrlPlantillaElegida = (!empty($vcBaseUrlPlantillaElegida))?$vcBaseUrlPlantillaElegida: config_item('ext_base_url_plantilla_elegida');
    //$vcMenu = (!empty($vcMenu))? $vcMenu: '';
    $vcMainContent = (!empty($vcMainContent))? $vcMainContent: '';
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class                                       ="no-js ie6 oldie" lang="es"> <![endif]-->
<!--[if IE 7]>    <html class                                       ="no-js ie7 oldie" lang="es"> <![endif]-->
<!--[if IE 8]>    <html class                                       ="no-js ie8 oldie" lang="es"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="es">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <base href="<?= base_url(); ?>" />
        <title><?=$SiteInfo['title']; ?></title>
        <meta name="description" content="<?= $SiteInfo['descriptions'];?>">
        <meta name="author" content="<?= $SiteInfo['author'];?>">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="shortcut icon" href="./assets/images/favicon.png" type="image/x-icon">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <?php
            # Para garantizar que los archivos CSS se descarguen en paralelo,
            # incluya siempre los recursos CSS externos antes que los recursos JavaScript externos
            print incluirjscss_stylecss();
            print incluirjscss_linkjs();
        ?>
        <!-- Scripts for any page -->
        <?= $vcIncludesGlobales; ?>
        <!-- End Scripts for any page -->
    </head>
    <body>
        <header>
            <div id="header" class="col-lg-8 container">
                <h1 id="logo" class="col-lg-6">
                    <a href="http://www.industriasrosobe.com.ar" alt="<?=config_item('ext_base_nombre_sitio');?>" title="<?=config_item('ext_base_nombre_sitio');?>">Industrias RoSoBe</a>
                </h1>
                <ul class="sociales pull-right">
                    <li><a href="#" class="redes_sociales facebook"></a></li>
                    <li><a href="#" class="redes_sociales twitter"></a></li>
                    <li><a href="#" class="redes_sociales flickr"></a></li>
                </ul>
            </div>
        </header>
        <div class="nav-bar">
            <nav class="nav pull-right col-lg-9 container" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Menú</span>
                            <span class="icon-bar">-</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul id="nav-primary" class="nav navbar-nav wrap-nav nav-primary">
                            <?php
                            echo $vcMenu;
                            ?>
                        </ul>
                        <form action="productos" method="post" class="navbar-form navbar-right pull-right" role="search">
                            <div class="form-group">
                                <input type="text" id="busqueda" name="busqueda" class="form-control" placeholder="Buscar producto...">
                            </div>
                            <button type="submit" class="btn btn-default">Buscar</button>
                        </form>
                    </div>
                </div>

            </nav>
            
        </div>
        <div class="fondo"></div>
        <section id="wrap-content" class="col-lg-12 container">
            <?=$vcMainContent?>
        </section>
        <section class="col-lg-12 footer">
            <footer class="col-lg-8 container">
                <div class="col-lg-4">
                    <h5>OFICINA EN SALTA</h5>
                    <ul>
                        <li><span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;&nbsp;(0387) 4010107 - 4290826</li>
                        <li><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;&nbsp;<a href="mailto:info@industriasrosobe.com.ar" title="Industrias y Servicios Ro.So.Be.">info@industriasrosobe.com.ar</a></li>
                        <li><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;&nbsp;Av. Ex Comb. de Malvinas 6201</li>
                        <li><span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;&nbsp;Salta - Argentina</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5>OFICINA EN CORDOBA</h5>
                    <ul>
                        <li><span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;&nbsp;(0387) 4010107 - 4290826</li>
                        <li><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;&nbsp;<a href="mailto:info@industriasrosobe.com.ar" title="Industrias y Servicios Ro.So.Be.">info@industriasrosobe.com.ar</a></li>
                        <li><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;&nbsp;Av. Ex Comb. de Malvinas 6201</li>
                        <li><span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;&nbsp;Salta - Argentina</li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5>REDES SOCIALES</h5>
                    <ul class="sociales">
                        <li><a href="#" class="redes_sociales facebook"></a></li>
                        <li><a href="#" class="redes_sociales twitter"></a></li>
                        <li><a href="#" class="redes_sociales flickr"></a></li>
                    </ul>
                </div>
                <div class="col-lg-1" style="text-align:center;">
                    <img src="assets/themes/base/img/fiscal.png" alt="" width="75">
                </div>
            </footer>
        </section>
        <div class="col-lg-12 copyright">
            Industrias y Servicios Ro.So.Be. - Todos los derechos reservados &copy; 2014
        </div>
    <script type="text/javascript">
        $('#nav-primary').lavalamp({
            easing: 'easeOutBack'
        });
    </script>
    </body>
</html>