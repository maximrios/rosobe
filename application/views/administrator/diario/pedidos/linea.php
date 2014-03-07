<?php
	$vcFormName = antibotHacerLlave();
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
	$vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
<div class="forms">
	<?= $vcMsjSrv; ?>
	<form id="<?= $vcFormName; ?>" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
		<li>
			<label for="idProducto">Producto | Cantidad | Subtotal del pedido</label>
			<span for="idProducto">Seleccione el producto para el pedido e ingrese la cantidad del pedido.</span>
			<?php echo form_dropdown('idProducto', $productos, $Reg['idProducto'], 'id="idProducto" required');?>
			<input type="hidden" id="precioProductoCanillita" name="precioProductoCanillita" value="<?php echo $Reg['precioProductoCanillita'] ?>" class="input-mini" placeholder="Precio U." readonly>
		</li>
		<li>
			<label>Cantidad de productos | Precio del pedido</label>
			<span>Cantidad de productos y subtotal del pedido</span>
			<input type="text" id="cantidadLinea" name="cantidadLinea" value="<?php echo $Reg['cantidadLinea']?>" class="input-mini" readonly />
			<input type="text" id="precioLinea" name="precioLinea" value="<?php echo $Reg['precioLinea']?>" class="input-mini" readonly />
		</li>
		<li>
			<label>Cantidad de productos | Precio del pedido</label>
			<span>Cantidad de productos y subtotal del pedido</span>
			<input type="text" id="cantidadLineaD" name="cantidadLineaD" value="<?php echo $Reg['cantidadLineaD'];?>" class="input-mini" autofocus/>
			<input type="text" id="precioLineaD" name="precioLineaD" value="<?php echo $Reg['precioLineaD'];?>" class="input-mini" readonly/>
			<input type="text" id="pagoLineaD" name="pagoLineaD" value="<?php echo $Reg['pagoLineaD']?>" class="input-mini"/>
		</li>
		<li>
			<label>Saldo</label>
			<span>Saldo de la linea de pedido</span>
			<input type="text" id="saldoLinea" name="saldoLinea" value="<?php echo $Reg['saldoLinea'];?>" class="input-mini"/>
		</li>
		<input type="submit" class="btn btn-primary btn-guardar" value="Guardar"/>
		<input type="hidden" id="idLinea" name="idLinea" value="<?php echo $Reg['idLinea'];?>">
		<input type="hidden" id="idCliente" name="idCliente" value="<?php echo $Reg['idCliente'];?>">
		<input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
	</form>
</div>
<script>
	$('.btn-guardar').on('click', function(event) {
		event.preventDefault();
		var form = $(this.form);
		options = {};
		options.vars = form.serialize();
		options.url = form.attr('action');
		form.fancyAjax('send', options);
	});
	$('#cantidadLineaD').on('change', function() {
		$('#precioLineaD').val($('#precioProductoCanillita').val() * $(this).val());
		$('#saldoLinea').val(parseFloat($('#saldoLinea').val()) - parseFloat($('#precioLineaD').val()));
		$('#pagoLineaD').focus();
	});
	$('#pagoLineaD').on('change', function() {
		$('#saldoLinea').val(parseFloat($('#precioLinea').val()) - (parseFloat($('#precioLineaD').val()) + parseFloat($(this).val())));
	});
</script>