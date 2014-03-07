<?php
	$formNombre = antibotHacerLlave();
	$formAccion = (!empty($formAccion))? $formAccion: '';
?>
<form id="maxi" name="maxi" action="<?php echo $formAccion;?>" method="post" target="contenido-abm">
	<li>
		<label for="vistoResolucion">VISTO</label>
		<textarea id="vistoResolucion" name="vistoResolucion" class="resolucion"></textarea>
	</li>
	<li>
		<label>CONSIDERANDO</label>
		<textarea id="considerandoResolucion" name="considerandoResolucion" class="resolucion"></textarea>
	</li>
	
	CUERPO
	<hr>
	<li id="articulo_1">
		<label>Articulo N° 1</label>
		<textarea id="textarea_articulo_1" name="articulosResolucion[]" class="resolucion"></textarea>
		<a href="#" class="agregar_articulo"><i class="icon-ok"></i></a>
	</li>
	<button></button>
	<button class="btn btn-primary">Guardar</button>
	<input type="hidden" id="vcForm" name="vcForm">
</form>
<script>
	$('.agregar_articulo').on('click', agregarArticulo);
</script>
<?php //echo display_ckeditor($ckeditor_texto1); ?>