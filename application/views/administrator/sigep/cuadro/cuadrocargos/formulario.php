<?php
	$vcFormName = antibotHacerLlave();
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
	$vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
<div class="forms">
	<?= $vcMsjSrv; ?>
<form id="<?= $vcFormName; ?>" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
	<li>
		<label>Cuadro</label>
		<span>Instrumento Legal</span>
		<input type="text" id="instrumentoCuadro" name="instrumentoCuadro" tabindex="1" placeholder="Instrumento Legal" value="<?php echo $Reg['instrumentoCuadro']?>" readonly>
	</li>
	<li>
		<label>Orden</label>
		<span>Numero de Orden</span>
		<input type="text" id="ordenCuadroCargo" name="ordenCuadroCargo" tabindex="1" placeholder="Número de orden" value="<?php echo $Reg['ordenCuadroCargo']?>">
	</li>
	<li>
		<label>Area</label>
		<span>Ingrese el nombre de la Gerencia o Area operativa</span>
		<input type="text" id="nombreEstructura" name="nombreEstructura" tabindex="1" placeholder="Nombre de Area" value="<?php echo $Reg['nombreEstructura']?>">
	</li>
	<li>
		<label>Cargo</label>
		<span>Ingrese el nombre del cargo</span>
		<input type="text" id="denominacionCargo" name="denominacionCargo" tabindex="1" placeholder="Denominación del Cargo" value="<?php echo $Reg['denominacionCargo']?>">
	</li>
	<li>
		<label>Datos del cargo</label>
		<span>Datos de la estructura de cargo</span>
		<?php echo form_dropdown('idEscalafon', $escalafones, $Reg['idEscalafon']);?>
		<?php echo form_dropdown('idAgrupamiento', $agrupamientos, $Reg['idAgrupamiento']);?>
		<?php echo form_dropdown('idFuncion', $funciones, $Reg['idFuncion']);?>
	</li>
	<div class="buttons">
		<!--<button class="btn btn-primary">Guardar</button>-->
		<input type="submit" class="button guardar btn-accion<?= (empty($Reg['idCargo'])?' btn-reset':''); ?>" value="Guardar"/>
	</div>
	<input type="hidden" id="idCuadroCargo" name="idCuadroCargo" value="<?php echo $Reg['idCuadroCargo']?>">
	<input type="hidden" id="idCuadro" name="idCuadro" value="<?php echo $Reg['idCuadro']?>">
	<input type="hidden" id="idEstructura" name="idEstructura" value="<?php echo $Reg['idEstructura']?>">
	<input type="hidden" id="idCargo" name="idCargo" value="<?php echo $Reg['idCargo']?>">
	<input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
</form>
</div>
<script>
	$("#nombreEstructura").autocomplete({
		source: "cuadro/cuadrocargos/obtenerAutocomplete",
		select: function(event, ui){
			$('#idEstructura').val(ui.item.id);
		}
	});
	$("#denominacionCargo").autocomplete({
		source: "cuadro/cuadrocargos/obtenerAutocompleteCargos",
		select: function(event, ui){
			$('#idCargo').val(ui.item.id);
		}
	});
</script>
