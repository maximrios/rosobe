<?php
/**
 * @author Farfan, Silvia Elizabet
 * @version 1.0.0
 * @copyright 2011-12
 * @package base
 */
$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
$vcNombreFrm = (!empty($vcNombreFrm))? $vcNombreFrm: 'Localidades';
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
                <label for="inIdPais">País:</label>
                <div><?=$ddc['inIdPais']?></div>
            </div>
            <div class="fila">
                <label for="inIdProvincia">Provincia:</label>
                <div><?=$ddc['inIdProvincia']?></div>
            </div>
            <div class="fila">
                <label for="inIdDepartamento">Departamento:</label>
                <div><?=$ddc['inIdDepartamento']?></div>
            </div>
            <!--
            <div class="fila">
                <label for="inIdLocalidad">Localidad:</label>
                <div><!?=$ddc['inIdLocalidad']?></div>
            </div>
            //-->
            <div class="clearfloat"></div>
		    <div class="fila">
		        <label for="vcLocNombre">Nombre de localidad</label>
		       	<input type="text" name="vcLocNombre" id="vcLocNombre" value="<?= $Reg['vcLocNombre']; ?>"<?=classRegValidation('vcLocNombre')?> style="width: 250px;"/>
		    </div>  
             <div class="fila">
		        <label for="vcLocCodPostal">Código Postal</label>
		       	<input type="text" name="vcLocCodPostal" id="vcLocCodPostal" value="<?= $Reg['vcLocCodPostal']; ?>"<?=classRegValidation('vcLocCodPostal')?> style="width: 250px;"/>
		    </div>         
	        <div class="clearfloat">&nbsp;</div>
		</fieldset>
		<br/>
		<div class="buttons">
			<input type="submit" class="button guardar btn-accion<?= (empty($Reg['inIdLocalidades'])?' btn-reset':''); ?> " value="Guardar"/>
	    	<a href="sistema/localidades/listado" id="btn-cancelar" class="button cancelar btn-accion">Cancelar</a>
	    </div>
	    <div class="clearfloat">&nbsp;</div>
	    <input type="hidden" id="inIdLocalidad" name="inIdLocalidad" value="<?= $Reg['inIdLocalidad']; ?>" />
	    <input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
	</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#<?= $vcFormName; ?> input:first').focus();
		});
	</script>
<!-- frm-Localidad.php -->