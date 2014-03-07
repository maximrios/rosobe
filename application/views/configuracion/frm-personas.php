<?php
/**
 * @author Duran Francisco Javier
 * @version 1.0.0
 * @copyright 2011-12
 * @package base
 */ 
iniciar_buffer_permisos();
$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
$vcNombreFrm = (!empty($vcNombreFrm))? $vcNombreFrm: 'Personas';
$vcAccion = (!empty($vcAccion))? $vcAccion: 'Agregar';
$vcFormName = antibotHacerLlave();
$vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction:'configuracion/personas/guardar';
?>
	<span class="ico-subtitulo herramientas-30">&nbsp;</span>
	<h2 class="fontface-arimo-subtitulo"><?= ($vcAccion. '&nbsp;'. $vcNombreFrm); ?></h2>
	<div class="forms">
	<?= $vcMsjSrv; ?>
	<form id="<?= $vcFormName; ?>" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
		<fieldset>
		    <div class="fila">		    	
		        <label for="inIdPerTipoDoc">Tipo de Documento:</label>
		        <?php
		        	$aTipDoc = array(''=>'Seleccione...') + $aTipDoc;
		        	echo form_dropdown('inIdPerTipoDoc',$aTipDoc,$Reg['inIdPerTipoDoc'],' id="inIdPerTipoDoc"'.classRegValidation("inIdPerTipoDoc"));?>		        		       
		    </div>
		    <div class="fila">
		        <label for="inPerDni">N&uacute;mero de Documento: (Número sin puntos)</label>		    
		       	<input type="text" name="inPerDni" id="inPerDni" value="<?= $Reg['inPerDni']; ?>"<?=classRegValidation('inPerDni')?> style="width: 250px;"/>
		    </div>
		    <div class="fila">
		        <label for="vcPerNombre">Apellido y Nombre:</label>
		       	<input type="text" name="vcPerNombre" id="vcPerNombre" value="<?= $Reg['vcPerNombre']; ?>" <?=classRegValidation('vcPerNombre')?> style="width: 250px;"/>
		    </div>
		    <div class="clearfloat">&nbsp;</div>
		    <div class="fila">
		        <label for="biPerCuil">Cuil:</label>
		        <input type="text" name="biPerCuil" id="biPerCuil" value="<?= $Reg['biPerCuil']; ?>" <?=classRegValidation('biPerCuil')?> style="width: 100px;"/>		       
		    </div>
		    <div class="fila">
		        <label for="vcPerEmail">E-mail:</label>
		       	<input type="text" name="vcPerEmail" id="vcPerEmail" value="<?= $Reg['vcPerEmail']; ?>" <?=classRegValidation('vcPerEmail')?> style="width: 245px;"/>
		    </div>
		    <div class="fila">
		        <label for="dtPerFechaNac">Fecha Nacimiento:</label>
		       	<input type="text" name="dtPerFechaNac" id="dtPerFechaNac" value="<?= $Reg['dtPerFechaNac']; ?>" <?=classRegValidation('dtPerFechaNac','custom[date]')?> style="width: 145px;" placeholder="dd/mm/aaaa"/>
		    </div>
		    <div class="clearfloat">&nbsp;</div>
		    <div class="fila">
		        <label for="vcPerBarrio">Barrio:</label>
		       	<input type="text" name="vcPerBarrio" id="vcPerBarrio" value="<?= $Reg['vcPerBarrio']; ?>" <?=classRegValidation('vcPerBarrio')?> style="width: 250px;"/>
		    </div>
		    <div class="fila">
		        <label for="vcPerCalle">Domicilio:</label>
		       	<input type="text" name="vcPerCalle" id="vcPerCalle" value="<?= $Reg['vcPerCalle']; ?>" <?=classRegValidation('vcPerCalle')?> style="width: 250px;"/>
		    </div>
		    <div class="clearfloat">&nbsp;</div>
		    <div class="fila">
		        <label for="vcPerNro">Número:</label>
		       	<input type="text" name="vcPerNro" id="vcPerNro" value="<?= $Reg['vcPerNro']; ?>" <?=classRegValidation('vcPerNro')?> style="width: 100px;"/>
		    </div>
		    <div class="fila">
		        <label for="vcPerPiso">Piso:</label>
		       	<input type="text" name="vcPerPiso" id="vcPerPiso" value="<?= $Reg['vcPerPiso']; ?>" <?=classRegValidation('vcPerPiso')?>  style="width: 100px;"/>
		    </div>
		    
		    <div class="fila">
		        <label for="vcPerDto">Departamento:</label>
		       	<input type="text" name="vcPerDto" id="vcPerDto" value="<?= $Reg['vcPerDto']; ?>" <?=classRegValidation('vcPerDto')?> style="width: 100px;"/>
		    </div>
		    <div class="fila">
		        <label for="vcPerTelefono">Teléfono:</label>
		       	<input type="text" name="vcPerTelefono" id="vcPerTelefono" value="<?= $Reg['vcPerTelefono']; ?>" <?=classRegValidation('vcPerTelefono')?> style="width: 100px;"/>
		    </div>
		    <div class="fila">
		        <label for="vcPerCelular">Celular:</label>
		       	<input type="text" name="vcPerCelular" id="vcPerCelular" value="<?= $Reg['vcPerCelular']; ?>" <?=classRegValidation('vcPerCelular')?> style="width: 100px;"/>
		    </div>
            <div class="clearfloat"></div>
		    <div class="fila">
		        <label for="vcPerSexo">Sexo:</label>
		        <?php
		        	$aSexo = array(''=>'Seleccione...') + $aSexo;
		        	echo form_dropdown('vcPerSexo',$aSexo,$Reg['vcPerSexo'],' id="vcPerSexo"'.classRegValidation('vcPerSexo'));
				?>
		    </div>
		    <div class="fila">
		        <label for="inIdEstadoCivil">Estado Civil:</label>
		        <?php
		        	$aEstCiv = array(''=>'Seleccione...') + $aEstCiv;
		        	echo form_dropdown('inIdEstadoCivil',$aEstCiv,$Reg['inIdEstadoCivil'],' id="inIdEstadoCivil"'.classRegValidation('inIdEstadoCivil'));
				?>		       	
		    </div>
            <div class="clearfloat"></div>
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
            <div class="fila">
                <label for="inIdLocalidad">Localidad:</label>
                <div><?=$ddc['inIdLocalidad']?></div>
            </div>
            <div class="clearfloat"></div>
		</fieldset> 
		<br/>
		<div class="buttons">
			<input type="submit" class="button guardar btn-accion<?= (empty($Reg['inIdPersona'])?' btn-reset':''); ?>" value="Guardar"/>
	    	<a href="configuracion/personas/listado" id="btn-cancelar" class="button cancelar btn-accion">Cancelar</a>
	    </div>
	    <div class="clearfloat">&nbsp;</div>
	    <input type="hidden" id="inIdPersona" name="inIdPersona" value="<?= $Reg['inIdPersona']; ?>" />
	    <input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
	</form>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#<?= $vcFormName; ?> input:first').focus();
		});
	</script>
<?php
filtrar_html_buffer();
// EOF frm-personas.php