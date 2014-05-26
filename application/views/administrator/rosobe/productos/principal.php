<?php
/**
 * @author Maximiliano Ezequiel Rios
 * @version 1.0.0
 * @copyright 2014
 * @package Sabandijas Rodados
 */
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: ''; 
?>
	
	<div class="panel panel-default">
  		<div class="panel-heading">Administración de Productos<a data-toggle="collapse" href="#panel"><span class="glyphicon glyphicon-minus pull-right"></span></a></div>
  		<div id="panel" class="panel-body panel-collapse">
  			<?= $vcMsjSrv; ?>
	  		<div id="contenido-abm" class="container-gridview"></div>
  		</div>
  	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#contenido-abm').gridviewHandler({'url': 'administrator/productos/listado'});
		});
	</script>
<!-- principal-personas.php -->