<?php
/**
 * @author Duran Francisco Javier
 * @version 1.0.0
 * @copyright 2011-12
 * @package base
 */ 
$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
$vcNombreFrm = (!empty($vcNombreFrm))? $vcNombreFrm: 'Personas';
$vcAccion = (!empty($vcAccion))? $vcAccion: 'Borrar';
$vcFormName = antibotHacerLlave();
$vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
	<span class="ico-subtitulo herramientas-30">&nbsp;</span>
	<h2 class="fontface-arimo-subtitulo"><?= ($vcAccion. '&nbsp;'. $vcNombreFrm); ?></h2>
	<div class="forms readonly">
	<?= $vcMsjSrv; ?>
	<form id="<?= $vcFormName; ?>" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
		<fieldset>
		    <div class="fila">
		        <label for="vcPerNombre">Apellido y Nombre:</label>
		       	<input type="text" name="vcPerNombre" id="vcPerNombre" value="<?= $Reg['vcPerNombre']; ?>" style="width: 250px;"/>
		    </div>
		    <div class="fila">
		        <label for="vcPerTipoDocDesc">Tipo de Documento:</label>
		       	<input type="text" name="vcPerTipoDocDesc" id="vcPerTipoDocDesc" value="<?= $Reg['vcPerTipoDocDesc']; ?>"/>
		    </div>    	
		   	<div class="fila">
		        <label for="inPerDni">N&uacute;mero de Documento</label>
		       	<input type="text" name="inPerDni" id="inPerDni" value="<?= $Reg['inPerDni']; ?>" style="width: 145px;"/>
		    </div>           
	        <div class="clearfloat">&nbsp;</div>
		</fieldset> 
		<br/>
		<div class="buttons">
			<input type="submit" class="button guardar btn-accion" value="Eliminar" name="Eliminar"/>
	    	<a href="configuracion/personas/listado" id="btn-cancelar" class="button cancelar btn-accion" >Cancelar</a>
	    </div>
	    <div class="clearfloat">&nbsp;</div>
	    <input type="hidden" id="inIdPersona" name="inIdPersona" value="<?= $Reg['inIdPersona']; ?>" />
	    <input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
	</form>
	</div>
<!-- EOF frm-personas-borrar.php -->