<?php
/**
 * @author Rios Maximiliano Ezequiel
 * @version 1.0.0
 * @copyright 2013
 * @package base
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
		<a href="administrator/pedidos/lineas" id="btn-nuevo" class="btn btn-primary btn-accion"><i class="icon-ok icon-white"></i>&nbsp;&nbsp;Agregar Nuevo</a>
		<a href="administrator/reportes/especial" id="btn-imprimir" target="_blank" class="btn"><i class="icon-print"></i>&nbsp;&nbsp;Imprimir Listado</a>
		<form id="frmBuscador" name="frmBuscador" action="administrator/pedidos/listado" method="post" target="contenido-abm">
			<?php echo form_dropdown('idCliente', $clientes);?>
			<input type="text" id="fechaDesde" name="fechaDesde" placeholder="dd/mm/yyyy" class="input-medium fecha" value="<?php echo $desde;?>"/>
			<input type="text" id="fechaHasta" name="fechaHasta" placeholder="dd/mm/yyyy" class="input-medium fecha" value="<?php echo $hasta;?>"/>
			<input type="text" id="txtvcBuscar" name="vcBuscar" value="<?=$txtvcBuscar?>" placeholder="Ingrese un Criterio de Búsqueda"/>
				<?php if($txtvcBuscar || $desde || $hasta): ?>
            		<a href="administrator/pedidos/listado" target="contenido-abm" class="btn-buscar limpiar btn-reset limpiarBusqueda" title="Limpiar Búsqueda">&nbsp;</a>
            	<?php endif; ?>				
            <input type="submit" id="btnEnviar" name="btnEnviar" class="btn-buscar btn btn-primary" value="buscar"/>
		</form>
	</div>
	
	<?= $vcGridView; ?>
<script>
	$('#fechaDesde').datepicker({
		format: 'dd/mm/yyyy',
		autoclose: true,
		language: 'es',
	}).on('changeDate', function (ev) {
    	$(this).datepicker('hide');
    	$('#fechaHasta').val($(this).val());
	});
	$('#fechaHasta').datepicker({
		format: 'dd/mm/yyyy',
		autoclose: true,
		language: 'es',
	}).on('changeDate', function (ev) {
		if ($('#fechaDesde').val() == '') {
			$('#fechaDesde').val($(this).val());
		}
    	if ($(this).val() < $('#fechaDesde').val()){
    		alert('La fecha final no puede ser menor que la fecha de inicio');
    		$(this).val($('#fechaDesde').val());
    	}
    	$(this).datepicker('hide');
	});
</script>