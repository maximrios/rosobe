<?php
/**
 * @author Duran Francisco Javier
 * @version 1.0.0
 * @copyright 2011-12
 * @package base
 */
$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
$vcNombreFrm = (!empty($vcNombreFrm))? $vcNombreFrm: 'Provincias';
$vcAccion = (!empty($vcAccion))? $vcAccion: 'Agregar';
$vcFormName = antibotHacerLlave();
$vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
	<span class="ico-subtitulo herramientas-30">&nbsp;</span>
	<h2 class="fontface-arimo-subtitulo"><?= ($vcAccion. '&nbsp;'. $vcNombreFrm); ?></h2>
	<div class="forms">
	<?= $vcMsjSrv; ?> 
	<form id="<?= $vcFormName; ?>" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
		<fieldset>
			<div class="fila">
		        <label for="inIdPais">Paises</label>
		        <?php
		        	$paises = array(''=>'Seleccione...') + $paises;
		        	echo form_dropdown('inIdPais',$paises,$Reg['inIdPais'],' id="inIdPais"'.classRegValidation("inIdPais"));
				?>		       	
		    </div>
		    <div class="clearfloat">&nbsp;</div>
		    <div class="fila">
		        <label for="vcProNombre">Nombre de la provincia</label>
		       	<input type="text" name="vcProNombre" id="vcProNombre" value="<?= $Reg['vcProNombre']; ?>"<?=classRegValidation('vcProNombre')?> style="width: 250px;"/>
		    </div>         
	        <div class="clearfloat">&nbsp;</div>
		</fieldset>
		<br/>
		<div class="buttons">
			<input type="submit" class="button guardar btn-accion<?= (empty($Reg['inIdProvincia'])?' btn-reset':''); ?>" value="Guardar"/>
	    	<a href="sistema/provincias/listado" id="btn-cancelar" class="button cancelar btn-accion">Cancelar</a>
	    </div>
	    <div class="clearfloat">&nbsp;</div>
	    <input type="hidden" id="inIdProvincia" name="inIdProvincia" value="<?= $Reg['inIdProvincia']; ?>" />
	    <input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
	</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#<?= $vcFormName; ?> input:first').focus();
		});
	</script>
<!-- frm-provincias.php -->