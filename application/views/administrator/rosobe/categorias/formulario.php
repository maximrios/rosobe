<?php
	$vcFormName = antibotHacerLlave();
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
	$vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
	<?=$vcMsjSrv; ?>
	<form id="<?=$vcFormName;?>" name="<?=$vcFormName;?>" action="<?=$vcFrmAction;?>" method="post" target="contenido-abm" enctype="multipart/form-data">
		<div class="form-group col-lg-12">
    		<label for="nombreGaleria">Nombre Categoria</label>
			<input type="text" id="nombreCategoria" name="nombreCategoria" tabindex="1" class="form-control" placeholder="Nombre de la Categoría." value="<?php echo $Reg['nombreCategoria']?>" autofocus>
    	</div>
		<input id="btnnuevo" type="submit" class="btn btn-primary btn-accion" value="Guardar"/>
		<input type="hidden" id="idCategoria" name="idCategoria" value="<?php echo $Reg['idCategoria'];?>">
		<input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
    </form>
