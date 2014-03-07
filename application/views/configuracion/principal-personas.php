<?php
/**
 * @author Duran Francisco Javier
 * @version 1.0.0
 * @copyright 2011-12
 * @package base
 */
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: ''; 
?>
	<div class="full-content">
		<div class="box-normal-100">
	  		<span class="ico-titulo ayuda-40">&nbsp;</span>
	  		<h2 class="fontface-arimo-titulo">Administraci&oacute;n de Personas</h2>
	  		<p>En esta secci&oacute;n podr&aacute; administrar las personas registradas en el sistema.</p>
		</div> 
		<section class="box-normal-100">
	  		<?= $vcMsjSrv; ?>
	  		<div id="contenido-abm" class="container-gridview"></div>
		</section>
	</div>
	<div class="clearfloat">&nbsp;</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#contenido-abm').gridviewHandler({'url': 'configuracion/personas/listado'});
		});
	</script>
<!-- principal-personas.php -->