<?php
/**
 * @author Diego G
 * @version 1.0.0
 * @copyright 2012-12
 * @package base
 */
$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
$vcNombreFrm = (!empty($vcNombreFrm))? $vcNombreFrm: 'Departamentos';
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
            <!--
            <div class="fila">
                <label for="inIdDepartamento">Departamento:</label>
                <div><!?=$ddc['inIdDepartamento']?></div>
            </div>
            <div class="fila">
                <label for="inIdLocalidad">Localidad:</label>
                <div><!?=$ddc['inIdLocalidad']?></div>
            </div>
            //-->
            <div class="clearfloat"></div>
		    <div class="fila">
		        <label for="vcDepNombre">Nombre del departamento</label>
		       	<input type="text" name="vcDepNombre" id="vcDepNombre" value="<?= $Reg['vcDepNombre']; ?>"<?=classRegValidation('vcDepNombre')?> style="width: 250px;"/>
		    </div>         
	        <div class="clearfloat">&nbsp;</div>
		</fieldset>
		<br/>
		<div class="buttons">
			<input type="submit" class="button guardar btn-accion<?= (empty($Reg['inIdDepartamento'])?' btn-reset':''); ?>" value="Guardar"/>
	    	<a href="sistema/departamentos/listado" id="btn-cancelar" class="button cancelar btn-accion">Cancelar</a>
	    </div>
	    <div class="clearfloat">&nbsp;</div>
	    <input type="hidden" id="inIdDepartamento" name="inIdDepartamento" value="<?= $Reg['inIdDepartamento']; ?>" />
	    <input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
	</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#<?= $vcFormName; ?> input:first').focus();
		});
	</script>
<!-- frm-departamento.php -->