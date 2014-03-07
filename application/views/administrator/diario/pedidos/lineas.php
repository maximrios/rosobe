<?php
# Para garantizar que los archivos CSS se descarguen en paralelo,
# incluya siempre los recursos CSS externos antes que los recursos JavaScript externos
  //print incluirjscss_stylecss();
  //print incluirjscss_linkjs();
?>
<?php
	$vcFormName = antibotHacerLlave();
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
	$vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
<div class="forms">
	<?= $vcMsjSrv; 
	?>
	<form id="<?= $vcFormName; ?>" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
		<li class="auto">
			<label for="fechaPedido">Fecha de Pedido</label>
			<span for="fechaPedido">Seleccione la fecha del pedido</span>
			<input type="text" id="fechaPedido" name="fechaPedido" value="<?php echo $Reg['fechaPedido']?>" class="input-small" required>

		</li>
		<li>
			<label for="nombreCliente">Cliente</label>
			<span for="nombreCliente">Seleccione el cliente para el pedido.</span>
			<?php echo form_dropdown('idCliente', $clientes, 1, 'id="idCliente" required');?>
			<input type="text" id="saldoCliente" name="saldoCliente" value="<?php echo $cliente['saldoCliente']?>">
		</li>
		<li>
			<label for="idProducto">Producto | Precio Unitario | Cantidad de productos | Subtotal del pedido</label>
			<span for="idProducto">Seleccione el producto para el pedido e ingrese la cantidad del pedido.</span>
			<?php echo form_dropdown('idProducto', $productos, '', 'id="idProducto" required');?>
			<input type="text" id="precioProductoCanillita" name="precioProductoCanillita" value="" class="input-mini" placeholder="Precio U." readonly>
			<input type="text" id="cantidadLinea" name="cantidadLinea" class="input-mini" placeholder="Cantidad" required>
			<input type="text" id="precioLinea" name="precioLinea" class="input-mini" placeholder="Subtotal" readonly>
		</li>
		<input type="submit" class="btn btn-primary btn-guardar" value="Guardar"/>
		<input type="hidden" id="idPedido" name="idPedido" value="<?php echo $Reg['idPedido']?>" required>
		<input type="hidden" id="idLinea" name="idLinea" value="">
		<input type="hidden" id="ordenPedidoCliente" name="ordenPedidoCliente" value="<?php echo $cliente['ordenPedidoCliente']?>" required>
	</form>
	<div id="contenido-abm" class="container-gridview"><?= $vcGridView; ?></div>

</div>	
	

<script>
	$('#idProducto').on('change', function() {
		$.ajax({
			url: 'administrator/productos/obtener',
			type: 'POST',
			data: 'idProducto='+$(this).val(),
			dataType: 'json',
			success: function(data){
				$('#precioProductoCanillita').val(data['precioProductoCanillita']);
				$('#cantidadLinea').val('');
				$('#precioLinea').val('');
				$('#cantidadLinea').focus();
			}
		})
	});
	$('#cantidadLinea').on('change', function() {
		$('#precioLinea').val($('#precioProductoCanillita').val() * $(this).val());
	});
	$('#fechaPedido').datepicker({
		format: 'dd/mm/yyyy',
		autoclose: true,
		language: 'es',
	}).on('changeDate', function (ev) {
    	$(this).datepicker('hide');
	});
	$('.btn-accion').on('click', function(event) {
		event.preventDefault();
		options = {};
		options.vars = 'idLinea='+$(this).attr('id');
		options.url = $(this).attr('href');
		options.type = 'post';
		$(this).fancyAjax('send', options);
	});
	$('.btn-guardar').on('click', function(event) {
		event.preventDefault();
		var form = $(this.form);
		options = {};
		options.vars = form.serialize();
		options.url = form.attr('action');
		form.fancyAjax('send', options);
	});
</script>