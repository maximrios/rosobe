<?php
	$vcFormName = antibotHacerLlave();
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
	$vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
<div class="forms">
	<?= $vcMsjSrv; ?>
	<form id="<?= $vcFormName; ?>" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
		<li>
			<label>Numero de Instrumento Legal</label>
			<span>Ingrese el numero de instrumento legal.</span>
			<input type="text" id="numeroInstrumentoLegal" name="numeroInstrumentoLegal" tabindex="1" placeholder="" value="<?php echo $Reg['numeroInstrumentoLegal']?>">
		</li>
		<li>
			<label>Fecha del Instrumento Legal</label>
			<span>Seleccione la fecha de aprobacion del instrumento legal.</span>
			<input type="text" id="fechaInstrumentoLegal" name="fechaInstrumentoLegal" tabindex="1" placeholder="dd/mm/yyyy" value="<?php echo $Reg['fechaInstrumentoLegal']?>">
		</li>
		<li>
			<label>Tipo de Instrumento</label>
			<span>Seleccione el tipo de instrumento legal.</span>
			<?php echo form_dropdown('idTipoInstrumentoLegal', $tipos);?>
		</li>
		<li class="medio">
			<label>Tema</label>
			<span>Seleccione el tema del instrumento legal.</span>
			<?php echo form_dropdown('idTema', $temas);?>
		</li>
		<li>
			<label>Asunto</label>
			<span>Ingrese el asunto del Instrumento Legal.</span>
			<textarea id="asuntoInstrumentoLegal" name="asuntoInstrumentoLegal"></textarea>
		</li>
		<li>
			<label>Seleccione el archivo</label>
			<input type="file" name="userfile"  />
		</li>
		<div class="buttons">
			<input type="submit" id="probar" class="btn btn-primary guardar btn-accion<?= (empty($Reg['idInstrumentoLegal'])?' btn-reset':''); ?>" value="Guardar"/>
			<a href="administrator/noticias" id="btn-cancelar" class="button cancelar btn-accion">Cancelar</a>
		</div>
		<input type="hidden" id="idInstrumentoLegal" name="idInstrumentoLegal" value="<?php echo $Reg['idInstrumentoLegal']?>">
		<input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
	</form>
</div>
<script>
	$('fechaInstrumentoLegal').datepicker({
		format: 'dd/mm/yyyy'
	});
</script>