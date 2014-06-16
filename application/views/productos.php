<div class="col-lg-9 container">
	<div class="col-lg-12 breadcrumb">
		<label><?=$breadcrumb?></label>
		<!--<h5>Productos ::</h5>-->
	</div>
</div>
<div class="col-lg-9 container content">
	<div class="col-lg-3">
		<h3 class="titulo-section">Categorias</h3>
		<hr class="titulo-section">
		<ul class="nav nav-panel">
			<?php foreach ($categorias as $categoria) { ?>
				<li>
					<label label-default="" class="tree-toggle nav-header"><?=$categoria['nombreCategoria']?></label>
					<?php $subcategorias = $this->layout->obtenerCategorias($categoria['idCategoria']);
					if($subcategorias) { ?>
						<ul class="nav tree">
						<?php foreach ($subcategorias as $subcategoria) { ?>
							<li><a href="#"><?=$subcategoria['nombreCategoria']?></a></li>		
						<?php } ?>
						</ul>
					<?php } ?>
				</li>
			<?php }	?>
		</ul>
	</div>
	<div class="col-lg-9">
		<h3 class="titulo-section">Productos destacados</h3>
		<hr class="titulo-section">
		<div class="row">
		<ul class="productos">
			<?php
			foreach ($destacados as $destacado) { ?>
			<li class="col-xs-12 col-sm-6 col-md-4 col-lg-4">	
				<figure>
<<<<<<< HEAD
					<?=($destacado['novedadProducto'] == 1)? '<div class="ribbon-wrapper-green"><div class="ribbon-green">x Mayor</div></div>':''?>
=======
					<?=($destacado['ofertaProducto'] == 1)? '<div class="ribbon-wrapper-green"><div class="ribbon-green">x Mayor</div></div>':''?>
>>>>>>> 4213e134f1efad08a6a95ed014ea52d29fad3c24
					<a href="producto/<?=$destacado['idProducto']?>/<?=$destacado['uriProducto']?>"><img src="<?=$destacado['thumbProductoImagen']?>" alt="<?=$destacado['nombreProducto']?>"></a>
					<figcaption>
						<label><a href="producto/<?=$destacado['idProducto']?>/<?=$destacado['uriProducto']?>"><?=$destacado['nombreProducto']?></a></label>
					</figcaption>
				</figure>
			</li>
			<?php }?>
		</ul>
		</div>
		<h3 class="titulo-section">
			<?php if($busqueda != '') { echo 'Resultado para la busqueda:: "'.$busqueda.'"'; }?>
			<?php if($busqueda != '') { echo '<span class="productos-link pull-right"><a href="productos">Ver todos los productos</a></span>'; }?>
			<?php $categoria = '';//if($categoria!='') { echo 'Categoria:: "'.$busqueda.'"'; }?>
			<?=($categoria=='' && $busqueda == '')? 'Todos los productos':''?>
		</h3>

		<hr class="titulo-section">
		<div class="row">
			<?php if($productos){ ?>
			<ul class="productos">
				<?php foreach ($productos as $producto) { ?>
				<li class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<figure>
						<?=($producto['ofertaProducto'] == 1)? '<div class="ribbon-wrapper-green"><div class="ribbon-green">x Mayor</div></div>':''?>
						<a href="producto/<?=$producto['idProducto']?>/<?=$producto['uriProducto']?>"><img src="<?=$producto['thumbProductoImagen']?>" alt="<?=$producto['nombreProducto']?>"></a>
						<figcaption>
							<label><a href="producto/<?=$producto['idProducto']?>/<?=$producto['uriProducto']?>"><?=$producto['nombreProducto']?></a></label>
						</figcaption>
					</figure>
				</li>
				<?php } ?>	
			</ul>
			<?php } else { ?>
				<h4 class="productos-sin-resultados">No hay resultados para la busqueda</h4>
			<?php } ?>
		</div>
	</div>
</div>
<script type="text/javascript">
</script>