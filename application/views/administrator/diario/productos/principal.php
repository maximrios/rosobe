<?php
/**
 * @author Maximiliano Ezequiel Rios
 * @version 1.0.0
 * @copyright 2014
 * @package Diario El Tribuno
 */
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: ''; 
?>
	<div class="full-content">
		<div class="box-normal-100">
	  		<h2 class="fontface-arimo-titulo">Administración de Productos</h2>
	  		<p>En esta secci&oacute;n podr&aacute; administrar los productos registrados en el sistema.</p>
		</div> 
		<section class="box-normal-100">
	  		<?= $vcMsjSrv; ?>
	  		<div id="contenido-abm" class="container-gridview"></div>
		</section>
		<button id="mitade">Apreta</button>
	</div>
	<div class="clearfloat">&nbsp;</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#contenido-abm').gridviewHandler({'url': 'administrator/productos/listado'});
		});
	</script>
<!-- principal-personas.php -->