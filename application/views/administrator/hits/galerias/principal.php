<?php
/**
 * @author Maximiliano Ezequiel Rios
 * @version 1.0.0
 * @copyright 2014
 * @package Diario El Tribuno
 */
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: ''; 
?>
	<div class="panel panel-default">
  		<div class="panel-heading">Administración de Imagenes | Galeria de Trabajos<a data-toggle="collapse" href="#prueba"><span class="glyphicon glyphicon-minus pull-right"></span></a></div>
  		<div id="prueba" class="panel-body panel-collapse">
  			<?= $vcMsjSrv; ?>
	  		<div id="contenido-abm" class="container-gridview"></div>
  		</div>
  	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#contenido-abm').gridviewHandler({'url': 'administrator/galerias/listado'});
		});
	</script>
<!-- principal-personas.php -->