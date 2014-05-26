<div class="col-lg-9 container">
	<div class="col-lg-12 breadcrumb">
		<label><?=$breadcrumb?></label>
		<h5>Productos ::</h5>
	</div>
</div>
<div class="col-lg-9 container content">
	<div class="col-lg-3">
		<h3 class="titulo-section">Categorias</h3>
		<hr class="titulo-section">
		<ul class="nav nav-panel">
            <li>
            	<label label-default="" class="tree-toggle nav-header">Aberturas</label>
            	<ul class="nav tree">
	            	<li><a href="#">Puertas</a></li>
                	<li><a href="#">Ventanas</a></li>
				</ul>
            </li>
            <li>
            	<label label-default="" class="tree-toggle nav-header">Muebles en placa</label>
                <ul class="nav tree">
                	<li><a href="#">Cocinas</a></li>
                    <li><a href="#">Comedores</a></li>
                    <li><a href="#">Dormitorios</a></li>
                    <li><a href="#">Placards</a></li>
				</ul>
			</li>
            <li>
				<label label-default="" class="tree-toggle nav-header">Rústicos</label>
                <ul class="nav tree">
                	<li><a href="#">Puertas</a></li>
					<li><a href="#">Ventanas</a></li>
					<li><a href="#">Cocinas</a></li>
					<li><a href="#">Comedores</a></li>
					<li><a href="#">Dormitorios</a></li>
                </ul>
            </li>
		</ul>
	</div>
	<div class="col-lg-9">
		<h3 class="titulo-section">Productos destacados</h3>
		<hr class="titulo-section">
		<div class="row">
		<ul class="productos">
			<?php
			$i = 1;
			for($i=1;$i<=3;$i++) { ?>
			<li class="col-xs-12 col-sm-6 col-md-4 col-lg-4">	
				<figure>
					<a href="producto/<?=$productos[$i]['idProducto']?>/<?=$productos[$i]['uriProducto']?>"><img src="<?=$productos[$i]['thumbProductoImagen']?>" alt="<?=$productos[$i]['nombreProducto']?>"></a>
					<figcaption>
						<label><a href="producto/<?=$productos[$i]['idProducto']?>/<?=$productos[$i]['uriProducto']?>"><?=$productos[$i]['nombreProducto']?></a></label>
					</figcaption>
				</figure>
			</li>
			<?php } ?>
			
		</ul>
		</div>
		<h3 class="titulo-section"><?=($categoria!='')? '':'Todos los productos'?></h3>
		<hr class="titulo-section">
		<div class="row">
			<ul class="productos">
				<?php foreach ($productos as $producto) { ?>
				<li class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<figure>
						<a href="producto/<?=$producto['idProducto']?>/<?=$producto['uriProducto']?>"><img src="<?=$producto['thumbProductoImagen']?>" alt="<?=$producto['nombreProducto']?>"></a>
						<figcaption>
							<label><a href="producto/<?=$producto['idProducto']?>/<?=$producto['uriProducto']?>"><?=$producto['nombreProducto']?></a></label>
						</figcaption>
					</figure>
				</li>
				<?php } ?>	
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
</script>