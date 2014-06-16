<?php
    $vcFormName = antibotHacerLlave();
    $vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
    $vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
<div class="row">
<div class="forms">
    <?= $vcMsjSrv; ?>
    <form id="proba" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
        <div class="form-group col-lg-12">
            <label for="nombreGaleria">Titulo de la Imagen</label>
            <input type="text" id="nombreGaleria" name="nombreGaleria" tabindex="1" class="form-control" placeholder="Titulo de la Imagen." value="<?php echo $Reg['nombreGaleria']?>" autofocus>
        </div>
        <div class="form-group col-lg-12">
            <label for="descripcionGaleria">Descripcion de la Imagen</label>
            <input type="text" id="descripcionGaleria" name="descripcionGaleria" tabindex="2" class="form-control" placeholder="Descripcion de la Imagen." value="<?php echo $Reg['descripcionGaleria']?>">
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">Imagenes asociadas</div>
                <div class="panel-body">
                <?php if ($Reg['pathGaleria'] != '') { ?>
                    <figure style="margin:0.3em 0.5em;padding:0;display:inline-block;" id="imagen<?=$Reg['idGaleria']?>">
                        <img class="img-thumbnail" width="125" src="<?=$Reg['thumbGaleria']?>">
                    </figure>
                <?php } 
                else { ?>
                    <p><label class="panel-empty">No hay imagenes asociadas...</label></p>
                <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($Reg['pathGaleria'] == '') { ?>
        <div class="form-group col-lg-12">
            <label for="descripcionProducto">Imagenes</label>
            <input type="file" name="userfile[]" id="imagenes" multiple/>
            <progress id="progressBar" value="0" max="100" style="width:300px;"></progress> 
            <output id="filesInfo"></output>
        </div>
        <script>
            document.getElementById('imagenes').addEventListener('change', fileSelect, false);
        </script>
        <?php } ?>
        <div class="col-lg-12">
            <input type="submit" id="uploadFilesBt" class="btn btn-primary btn-accion pull-right" value="Guardar" name="btnvo"/>
        </div>
        <input type="hidden" id="idGaleria" name="idGaleria" value="<?php echo $Reg['idGaleria']?>">
        <input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
    </form>
</div>
