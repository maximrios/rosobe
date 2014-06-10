<div class="col-lg-9 container">
	<div class="col-lg-12 breadcrumb">
		<label><?=$breadcrumb?></label>
		<!--<h5>Galeria de Trabajos ::</h5>-->
	</div>
</div>
<div class="col-lg-9 container content">
	<div class="col-lg-12 galeria">
		<h3 class="titulo-section">Galeria de Trabajos</h3>
		<hr class="titulo-section">
		<p>Queremos compartir nuestra galeria de trabajos con vos, podes consultar por cualquier trabajo que encuentres, si tenes algun proyecto en mente acercate a compartir con nosotros para llevarlo adelante.</p>
		<ul class="galeria-thumbs">
			<?php foreach ($galeria as $imagen) { ?>
				<li><a class="galeria-fancybox" href="<?=$imagen['pathGaleria']?>" title="<?=$imagen['descripcionGaleria']?>"><img src="<?=$imagen['thumbGaleria']?>"></a></li>
			<?php } ?>
		</ul>
	</div>
</div>
<script>
	$('a.galeria-fancybox').fancybox();
</script>