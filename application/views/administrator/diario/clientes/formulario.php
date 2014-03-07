<?php
	$vcFormName = antibotHacerLlave();
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
	$vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
<div class="forms">
	<?= $vcMsjSrv; ?>
	<form id="<?= $vcFormName; ?>" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
		<li>
			<label>Apellido</label>
			<span>Ingrese el/los apellido/s del cliente</span>
			<input type="text" id="apellidoPersona" name="apellidoPersona" autofocus tabindex="1" placeholder="Apellido/s completo/s" value="<?php echo $Reg['apellidoPersona']?>" required />
		</li>
		<li>
			<label>Nombre</label>
			<span>Ingrese el/los nombre/s del cliente</span>
			<input type="text" id="nombrePersona" name="nombrePersona" autofocus tabindex="1" placeholder="Nombre/s completo/s" value="<?php echo $Reg['nombrePersona']?>" required />
		</li>
		<li>
			<label>Domicilio</label>
			<span>Ingrese el domicilio completo del cliente.</span>
			<input type="text" id="domicilioPersona" name="domicilioPersona" tabindex="2" placeholder="Descripcion del producto" value="<?php echo $Reg['domicilioPersona']?> "/>
		</li>
		<li class="content-50">
			<label>Telefono</label>
			<span>Ingrese el telefono fijo del cliente.</span>
			<input class="input-small" type="text" id="telefonoPersona" name="telefonoPersona" tabindex="3" placeholder="Solo números." value="<?php echo $Reg['telefonoPersona']?>" required>
		</li>
		<li class="content-50">
			<label>Celular</label>
			<span>Ingrese el telefono celular del cliente.</span>
			<input class="input-small" type="text" id="celularPersona" name="celularPersona" tabindex="4" placeholder="Solo números." value="<?php echo $Reg['celularPersona'];?>" required>
		</li>
		<input type="submit" class="btn-accione" value="Guardar" name="btno"/>
		<input type="hidden" id="idCliente" name="idCliente" value="<?php echo $Reg['idCliente']?>">
		<input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
	</form>
</div>
<script>
	$('.btn-accione').on('click', function(event) {
		event.preventDefault();
		var form = $(this.form);
		options = {};
		options.vars = form.serialize();
		options.url = form.attr('action');
		form.fancyAjax('send', options);
	});
</script>