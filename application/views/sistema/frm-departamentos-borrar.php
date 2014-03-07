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
	<div class="forms readonly">
	<?= $vcMsjSrv; ?>
	<form id="<?= $vcFormName; ?>" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
		<fieldset>
		    <div class="fila">
		        <label for="vcPaisNombre">Nombre del Pais</label>
		       	<input type="text" name="vcPaisNombre" id="vcPaisNombre" value="<?= $Reg['vcPaisNombre']; ?>" style="width: 250px;"/>
		    </div> 
		    <div class="fila">
		        <label for="vcProNombre">Nombre de la Provincia</label>
		       	<input type="text" name="vcProNombre" id="vcProNombre" value="<?= $Reg['vcProNombre']; ?>" style="width: 250px;"/>
		    </div>       
		    <div class="fila">
		        <label for="vcPaisNombre">Nombre del Departamento</label>
		       	<input type="text" name="vcDepNombre" id="vcDepNombre" value="<?= $Reg['vcDepNombre']; ?>" style="width: 250px;"/>
		    </div>
	        <div class="clearfloat">&nbsp;</div>
		</fieldset> 
		<br/>
		<div class="buttons">
			<input type="submit" class="button guardar btn-accion" value="Eliminar" name="Eliminar"/>
	    	<a href="sistema/departamentos/listado" id="btn-cancelar" class="button cancelar btn-accion">Cancelar</a>
	    </div>
	    <div class="clearfloat">&nbsp;</div>
	    <input type="hidden" id="inIdDepartamento" name="inIdDepartamento" value="<?= $Reg['inIdDepartamento']; ?>" />
	    <input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
	</form>
	</div>
<!-- EOF frm-departamento-borrar.php -->