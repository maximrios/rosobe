<?php
	$vcFormName = antibotHacerLlave();
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
	$vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
<div class="forms">
	<?= $vcMsjSrv; ?>
	<form id="proba" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
		<li>
			<label>Nombre del producto</label>
			<span>Ingrese un nombre para identificar producto</span>
			<input type="text" id="nombreProducto" name="nombreProducto" autofocus tabindex="1" placeholder="Nombre del producto" value="<?php echo $Reg['nombreProducto']?>" required />
		</li>
		<li>
			<label>Descripcion del producto</label>
			<span>Ingrese una breve descripcion del producto, puede ayudarlo en el uso del sistema.</span>
			<textarea id="descripcionProducto" name="descripcionProducto" tabindex="2" placeholder="Descripcion del producto"><?php echo $Reg['descripcionProducto']?></textarea>
		</li>
		<li class="content-50">
			<label>Fecha de Recepcion</label>
			<span>Fecha de recepcion del producto.</span>
			<input class="fecha input-small" type="text" id="fechaProductoRecepcion" name="fechaProductoRecepcion" tabindex="3" placeholder="dd-mm-yyyy" value="<?php echo $Reg['fechaProductoRecepcion']?>" required>
		</li>
		<li class="content-50">
			<label>Fecha de Rendicion</label>
			<span>Fecha de rendicion del producto.</span>
			<input class="fecha input-small" type="text" id="fechaProductoRendicion" name="fechaProductoRendicion" tabindex="4" placeholder="dd-mm-yyyy" value="<?php echo $Reg['fechaProductoRendicion'];?>"<?php echo classRegValidation('fechaProductoRendicion');?>  required>
		</li>
		<li>
			<label>Precio del producto (Proveedor)</label>
			<span>Ingrese el precio del producto del proveedor</span>
			<input type="text" id="precioProductoProveedor" name="precioProductoProveedor" tabindex="5" placeholder="0.00" value="<?php echo $Reg['precioProductoProveedor']?>" class="input-mini" required>
		</li>
		<li>
			<label>Precio del producto (Cliente)</label>
			<span>Ingrese el precio del producto para el cliente</span>
			<input type="text" id="precioProductoCanillita" name="precioProductoCanillita" tabindex="6" placeholder="0.00" value="<?php echo $Reg['precioProductoCanillita']?>" class="input-mini" required>
		</li>
		<li>
			<label>Precio del Producto (Venta)</label>
			<span>Ingrese el precio del producto para venta</span>
			<input type="text" id="precioProductoCalle" name="precioProductoCalle" tabindex="7" placeholder="0.00" value="<?php echo $Reg['precioProductoCalle']?>" class="input-mini" required>
		</li>
		<input type="submit" class="btn-accione" value="Guardar" name="btno"/>
		<input type="hidden" id="idProducto" name="idProducto" value="<?php echo $Reg['idProducto']?>">
		<input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
	</form>
</div>
<script>
	$('.fecha').datepicker({
		format: 'dd/mm/yyyy',
	});
	$('.btn-accione').on('click', function(event) {
		event.preventDefault();
		var form = $(this.form);
		options = {};
		options.vars = form.serialize();
		options.url = form.attr('action');
		form.fancyAjax('send', options);
		//alert(form.attr('id'));
		//alert($(this).attr('name'));
		
	});
	//self.fancyAjax('send',options);
</script>