<?php
/**
 * @author Maximiliano Ezequiel Rios
 * @version 1.0.0
 * @copyright 2014
 * @package Diario El Tribuno
 */
$vcGridView = (!empty($vcGridView))? $vcGridView: '';
$vcNombreList = (!empty($vcNombreList))? $vcNombreList: 'Agentes';
$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
?>
	<?= $vcMsjSrv; ?>
	<div class="accionesd">
		<style>
			.accionesd form {
				margin: 0;
			}
			.accionesd a, .accionesd input, .accionesd form {
				display: inline-block!important;
				vertical-align: top!important;
			}
		</style>
		<a href="administrator/productos/formulario" id="btn-nuevo" class="btn btn-primary btn-accion"><i class="icon-ok icon-white"></i>&nbsp;&nbsp;Agregar Nuevo</a>
		<a href="administrator/productos/reporte" id="btn-imprimir" target="_blank" class="btn"><i class="icon-print"></i>&nbsp;&nbsp;Imprimir Listado</a>
		<form id="frmBuscador" name="frmBuscador" action="administrator/productos/listado" method="post" target="contenido-abm">
			<input type="text" id="txtvcBuscar" name="vcBuscar" value="<?=$txtvcBuscar?>" placeholder="Ingrese un Criterio de Búsqueda" <?=classRegValidation('vcBuscar', 'custom[onlySearch]')?> autofocus/>
				<?php if($txtvcBuscar): ?>
            		<a href="administrator/productos/listado" target="contenido-abm" class="btn-accion limpiar btn-reset limpiarBusqueda" title="Limpiar Búsqueda">&nbsp;</a>
            	<?php endif; ?>				
            <input type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary" value="buscar"/>
		</form>
	</div>
	<?= $vcGridView; ?>
<script>
	//$('.mesa').on('click', mostrarM);
</script>