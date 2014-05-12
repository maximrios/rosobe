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
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias disponibles</div>
                <div class="panel-body">
                    <ul id="categorias" class="categorias">
                    <?php foreach ($categorias as $categoria) { ?>
                        <li class="col-lg-3"><input type="checkbox" id="categoria_<?=$categoria['idCategoria']?>" name="categoriaPadre[]" class="" value="<?=$categoria['idCategoria']?>" <?=($this->categorias->obtenerCategoriasRelacion($categoria['idCategoria'], $Reg['idCategoria']))? 'checked':'';?>>&nbsp;<?=$categoria['nombreCategoria']?>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    	<?php if ($Reg['pathCategoria']) { ?>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Imagen asociada</div>
                <div class="panel-body">
                    <figure style="margin:0.3em 0.5em;padding:0;display:inline-block;" id="imagen<?=$Reg['pathCategoria']?>">
                        <img class="img-thumbnail" width="125" src="<?=$Reg['pathCategoria']?>">
                    </figure>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="form-group col-lg-12">
            <label for="descripcionProducto">Imagen Representativa</label>
            <input type="file" name="userfile[]" id="imagenes"/>
            <progress id="progressBar" value="0" max="100" style="width:300px;"></progress> 
            <output id="filesInfo"></output>
        </div>
        <!--</div>-->
		<input id="btnnuevo" type="submit" class="btn btn-primary btn-accion" value="Guardar"/>
		<input type="hidden" id="idCategoria" name="idCategoria" value="<?php echo $Reg['idCategoria'];?>">
		<input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
    </form>
<script>
    $('#uploadFilesBt').on('click', function() {
        var contenido = CKEDITOR.instances['descripcionNoticia'].getData();
        $('#descripcionNoticia').val(contenido);    
    });
    document.getElementById('imagenes').addEventListener('change', fileSelect, false);
</script>