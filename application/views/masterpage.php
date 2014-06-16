<?php
$vcHeaderLoginView = (!empty($vcHeaderLoginView))?$vcHeaderLoginView:'';
$vcBaseUrlAssets = (!empty($vcBaseUrlAssets))?$vcBaseUrlAssets: config_item('ext_base_url_assets');
$vcBaseUrlPlantillaElegida = (!empty($vcBaseUrlPlantillaElegida))?$vcBaseUrlPlantillaElegida: config_item('ext_base_url_plantilla_elegida');
$vcMenu = (!empty($vcMenu))? $vcMenu: '';
$vcMainContent = (!empty($vcMainContent))? $vcMainContent: '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <base href="<?= base_url(); ?>" />
    <title><?= $PanelInfo['titulo'].' - '.$PanelInfo['cliente']; ?></title>
    <meta name="description" content="<?= $PanelInfo['titulo'];?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="./assets/images/favicon.png" type="image/x-icon">
    <?php
    print incluirjscss_stylecss('_admin');
    print incluirjscss_linkjs('_admin');
    ?>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-vertical">
                    <span class="sr-only">Navegacion</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?= $PanelInfo['titulo'].' - '.$PanelInfo['cliente'];?></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->lib_autenticacion->nombreUsuario();?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://industriasrosobe.com.ar:2084" target="_blank"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Webmail</a></li>
                        <li><a href="<?php echo config_item('ext_base_url');?>" target="_blank"><span class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;Ver mi web</a></li>
                        <li class="divider"></li>
                        <li><a href="aut/logout"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <header>
    </header>
    <div id="wrapper" class="active">
        <div id="sidebar-wrapper" class="sidebar-holder">
            <ul id="sidebar_menu" class="sidebar-nav">
                <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
            </ul>
            <ul class="sidebar-nav" id="sidebar">     
                <li><a href="administrator/categorias">Categorias<span class="sub_icon glyphicon glyphicon-tags"></span></a></li>
                <li><a href="administrator/productos">Productos<span class="sub_icon glyphicon glyphicon-bookmark"></span></a></li>
                <li><a href="administrator/galerias">Galeria<span class="sub_icon glyphicon glyphicon-picture"></span></a></li>
                <li><a href="administrator/contactos">Contactos<span class="sub_icon glyphicon glyphicon-envelope"></span></a></li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="page-content inset">
                <div class="row">
                    <div class="col-md-12" style="padding-top:5px;">
                        <?= $vcMainContent; ?>          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            //$("#wrapper").toggleClass("active");
        });
    </script>
</body>
</html>