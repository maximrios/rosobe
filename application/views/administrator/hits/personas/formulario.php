<?php
/**
 * @author Maximiliano Ezequiel Rios
 * @version 1.0.0
 * @copyright 2014
 * @package Sabandijas Rodados
 */
	$vcFormName = antibotHacerLlave();
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
	$vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
<div class="row">
<div class="forms">
    <?= $vcMsjSrv; ?>
	<form id="<?= $vcFormName; ?>" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
    	<?php /*<div class="form-group col-lg-4">
    		<label for="dniPersona">Documento</label>
			<input type="text" id="dniPersona" name="dniPersona" tabindex="1" class="form-control" placeholder="Numero de documento. Sin puntos" value="<?php echo $Reg['dniPersona']?>">
    	</div>
    	
		<div class="form-group col-lg-4">
			<label for="nacimientoPersona">Fecha de Nacimiento</label>
			<input type="text" id="nacimientoPersona" name="nacimientoPersona" tabindex="5" placeholder="Fecha de Nacimiento" value="<?php echo $Reg['nacimientoPersona']?>" class="form-control">
		</div>
		<div class="form-group col-lg-4">
			<label for="idSexo">Sexo</label>
			<?php echo form_dropdown('idSexo', $sexos, $Reg['idSexo'], 'class="form-control" tabindex="7"');?>
		</div>*/?>
		<div class="form-group col-lg-12">
    		<label for="nombrePersona">Nombre y Apellido</label>
			<input type="text" id="nombrePersona" name="nombrePersona" tabindex="2" class="form-control" placeholder="Nombre/s completo/s" value="<?php echo $Reg['nombrePersona']?>">
    	</div>
		<div class="form-group col-lg-12">
			<label>Domicilio</label>
			<input class="form-control" type="text" id="domicilioPersona" name="domicilioPersona" tabindex="9" placeholder="Domicilio completo" value="<?php echo $Reg['domicilioPersona']?>">
		</div>
		<div class="form-group col-lg-6">
			<label>Telefono Fijo</label>
			<input type="text" id="telefonoPersona" name="telefonoPersona" tabindex="10" placeholder="Telefono Fijo" value="<?php echo $Reg['telefonoPersona'];?>" class="form-control">
		</div>
		<div class="form-group col-lg-6">
			<label>Telefono Celular</label>
			<input type="text" id="celularPersona" name="celularPersona" tabindex="11" placeholder="Celular" value="<?php echo $Reg['celularPersona'];?>" class="form-control">
		</div>
		<div class="form-group col-lg-12">
			<label>Correo Electrónico</label>
			<input type="text" id="emailPersona" name="emailPersona" tabindex="12" placeholder="Correo electrónico" value="<?php echo $Reg['emailPersona'];?>" class="form-control">
		</div>
		<div class="form-group col-lg-12">
			<label for="ciudadPersona">Ciudad</label>
			<input type="text" id="ciudadPersona" name="ciudadPersona" tabindex="8" placeholder="Ciudad" value=" <?php echo $Reg['ciudadPersona'];?>" class="form-control">
		</div>
		<input type="submit" class="btn btn-primary btn-accion<?= (empty($Reg['idPersona'])?' btn-reset':''); ?>" value="Guardar"/>
		<!--<button type="submit" class="btn btn-primary" tabindex="13"><span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;Guardar</button>-->
		<input type="hidden" id="idPersona" name="idPersona" value="<?php echo $Reg['idPersona'];?>">
		<input type="hidden" id="idTipoDni" name="idTipoDni" value="1">
		<input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
    </form>
</div>
</div>
<script>
	$('#nacimientoPersona').datepicker({
		format: 'dd/mm/yyyy',
		startView: 2,
		language: "es",
		autoclose: true
	});
</script>