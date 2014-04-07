<?php
$vcHeaderLoginView = (!empty($vcHeaderLoginView))?$vcHeaderLoginView:'';
$vcBaseUrlAssets = (!empty($vcBaseUrlAssets))?$vcBaseUrlAssets: config_item('ext_base_url_assets');
$vcBaseUrlPlantillaElegida = (!empty($vcBaseUrlPlantillaElegida))?$vcBaseUrlPlantillaElegida: config_item('ext_base_url_plantilla_elegida');
$vcMenu = (!empty($vcMenu))? $vcMenu: '';
$vcMainContent = (!empty($vcMainContent))? $vcMainContent: '';
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="es"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="es"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="es"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="es">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <base href="<?= base_url(); ?>" />
    <title><?= $PanelInfo['titulo'].' - '.$PanelInfo['cliente']; ?></title>
    <meta name="description" content="<?= $PanelInfo['titulo'];?>">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="./assets/images/favicon.png" type="image/x-icon">
    <!--[if lt IE 9]>
    <script type="text/javascript">
        var e = ("abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video").explode(',');
        for (var i=0; i<e.length; i++) {
            document.createElement(e[i]);
        }
    </script>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script type="text/javascript" src="<?=$vcBaseUrlAssets;?>libraries/ie-textshadow/jquery.textshadow.js"></script>
    <![endif]-->
    <!--[if lt IE 7 ]>
    <script src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
    <![endif]-->
<?php
# Para garantizar que los archivos CSS se descarguen en paralelo,
# incluya siempre los recursos CSS externos antes que los recursos JavaScript externos
    print incluirjscss_stylecss('_admin');
    print incluirjscss_linkjs('_admin');
?>
<!-- Scripts for any page -->

<!-- End Scripts for any page -->
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
                <a class="navbar-brand" href="#"><?= $PanelInfo['titulo'];?></a>
                
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
    <style type="text/css">
    nav {

    }
    .row{
    margin-left:0px;
    margin-right:0px;
}

#wrapper {
    padding-left: 70px;
    transition: all .4s ease 0s;
    height: 100%
}

#sidebar-wrapper {
    margin-left: -185px;
    left: 70px;
    width: 180px;
    background: #222;
    position: fixed;
    height: 100%;
    z-index: 10000;
    transition: all .4s ease 0s;
}

.sidebar-nav {
    display: block;
    float: left;
    width: 160px;
    list-style: none;
    margin: 0;
    padding: 0;
}
#page-content-wrapper {
    padding-left: 0;
    margin-left: 0;
    width: 100%;
    height: auto;
}
#wrapper.active {
    padding-left: 190px;
}
#wrapper.active #sidebar-wrapper {
    left: 185px;
}

#page-content-wrapper {
  width: 100%;
}

#sidebar_menu li a, .sidebar-nav li a {
    color: #999;
    display: block;
    outline: none;
    float: left;
    text-decoration: none;
    width: 180px;
    background: #252525;
    border-top: 1px solid #373737;
    border-bottom: 1px solid #1A1A1A;
    -webkit-transition: background .5s;
    -moz-transition: background .5s;
    -o-transition: background .5s;
    -ms-transition: background .5s;
    transition: background .5s;
}
.sidebar_name {
    padding-top: 25px;
    color: #fff;
    opacity: .7;
}

.sidebar-nav li {
  line-height: 40px;
  text-indent: 20px;
}

.sidebar-nav li a {
  color: #999999;
  display: block;
  text-decoration: none;
}

.sidebar-nav li a:hover {
  color: #fff;
  background: rgba(255,255,255,0.2);
  text-decoration: none;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
  text-decoration: none;
}

.sidebar-nav > .sidebar-brand {
  height: 65px;
  line-height: 60px;
  font-size: 18px;
}

.sidebar-nav > .sidebar-brand a {
  color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
  color: #fff;
  background: none;
}

#main_icon
{
    float:right;
   padding-right: 65px;
   padding-top:20px;
}
.sub_icon
{
    float:right;
   padding-right: 65px;
   padding-top:10px;
}
.content-header {
  height: 65px;
  line-height: 65px;
}

.content-header h1 {
  margin: 0;
  margin-left: 20px;
  line-height: 65px;
  display: inline-block;
}

@media (max-width:767px) {
    #wrapper {
    padding-left: 70px;
    transition: all .4s ease 0s;
}
#sidebar-wrapper {
    left: 70px;
}
#wrapper.active {
    padding-left: 150px;
}
#wrapper.active #sidebar-wrapper {
    left: 150px;
    width: 160px;
    transition: all .4s ease 0s;
}
}

</style>
    <div id="wrapper" class="active">
        <div id="sidebar-wrapper" class="sidebar-holder">
            <ul id="sidebar_menu" class="sidebar-nav">
                <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
            </ul>
            <ul class="sidebar-nav" id="sidebar">     
                <li><a href="administrator/dashboard">Dashboard<span class="sub_icon glyphicon glyphicon-home"></span></a></li>
                <li><a href="administrator/categorias">Categorias<span class="sub_icon glyphicon glyphicon-tags"></span></a></li>
                <li><a href="administrator/productos">Productos<span class="sub_icon glyphicon glyphicon-bookmark"></span></a></li>
                <li><a href="administrator/galerias">Galeria<span class="sub_icon glyphicon glyphicon-picture"></span></a></li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="page-content inset">
                <div class="row">
                    <div class="col-md-12" style="padding-top:5px;">
                        <ol class="breadcrumb" style="background:none;margin:0px;">
                            <li><a href="#">Administración</a></li>
                            <li><a href="#">Productos</a></li>
                        </ol>
                        <?= $vcMainContent; ?>          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
    </script>
</body>
</html>