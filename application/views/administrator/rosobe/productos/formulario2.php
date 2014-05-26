<?php
    $vcFormName = antibotHacerLlave();
    $vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
    $vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
    ($imagenes)? $mitad='col-lg-8':$mitad='';
?>
<div class="row">
<div class="forms col-lg-12">
    <?= $vcMsjSrv; ?>
    <form id="proba" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
        <div class="form-group col-lg-12">
            <label for="nombreProducto">Nombre del Producto</label>
            <input type="text" id="nombreProducto" name="nombreProducto" tabindex="1" class="form-control" placeholder="Nombre del Producto." value="<?php echo $Reg['nombreProducto']?>" autofocus>
        </div>
        <div class="form-group col-lg-6">
            <label for="codigoProducto">Código de Producto</label>
            <input type="text" id="codigoProducto" name="codigoProducto" tabindex="1" class="form-control" placeholder="Código." value="<?php echo $Reg['codigoProducto']?>" autofocus>
        </div>
        <div class="form-group col-lg-6">
            <label for="precioProducto">Precio del Producto</label>
            <input type="text" id="precioProducto" name="precioProducto" tabindex="1" class="form-control" placeholder="00.00" value="<?php echo $Reg['precioProducto']?>" autofocus>
        </div>
        <div class="form-group col-lg-12">
            <label for="descripcionProducto">Descripción del Producto</label>
            <textarea id="descripcionProducto" name="descripcionProducto" tabindex="2" class="form-control" placeholder="Descripción del Producto." rows="3"><?=$Reg['descripcionProducto']?></textarea>
        </div>
        <!--<div class="form-group col-lg-12">
            <label for="nombreProducto">Categorias</label>
            <ul>
                <?php foreach ($categorias as $categoria) { ?>
                    <li class="checkbox col-lg-3" style="display:inline-block;vertical-align:top;">
                        <label>
                            <input type="checkbox" name="categorias[]" value="<?=$categoria['idCategoria']?>" <?=($categoria['checked'])?'checked':''?>> <?=$categoria['nombreCategoria']?>
                        </label>
                    </li>
                <?php }?>
            </ul>
        </div>-->
        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias disponibles</div>
                <div class="panel-body">
                    <ul>
                    <!--<select class="col-lg-12" name="origen[]" id="origen" multiple="multiple" size="8" style="border:none;">-->
                    <?php foreach ($categorias as $categoria) { ?>
                        <option value="<?=$categoria['idCategoria']?>"><?=$categoria['nombreCategoria']?></option>
                        <li><input type="checkbox"></li>
                    <?php } ?>
                    </ul>
                    <!--</select>-->
                </div>
            </div>
        </div>
        <!--<div class="col-lg-2">
            <input type="button" class="pasar izq" value="Pasar »"><input type="button" class="quitar der" value="« Quitar"><br />
            <input type="button" class="pasartodos izq" value="Todos »"><input type="button" class="quitartodos der" value="« Todos">
        </div>
        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias relacionadas</div>
                <div class="panel-body">
                    <select class="col-lg-12" name="destino[]" id="destino" multiple="multiple" size="8">
                    <?php foreach ($categorias as $categoria) { ?>
                        <option value="<?=$categoria['idCategoria']?>"><?=$categoria['nombreCategoria']?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <p class="clear"><input type="submit" class="submit" value="Procesar formulario"></p>-->
        <div class="form-group col-lg-12">
            <label for="descripcionProducto">Imagenes</label>
            <input type="file" name="userfile[]" id="userfile" multiple/>
            <progress id="progressBar" value="0" max="100" style="width:300px;"></progress> 
            <output id="filesInfo"></output>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">Colores disponibles</div>
                <div class="panel-body">
                    <ul class="colores">
                    <?php foreach ($colores as $color) { ?>
                        <li class="col-lg-4"><input type="checkbox" id="colorProducto[]" name="colorProducto[]" value="<?=$color['idColor']?>">&nbsp;<?=$color['nombreColor']?></li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php if ($imagenes) { ?>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">Imagenes asociadas</div>
                <div class="panel-body">
                <?php foreach ($imagenes as $imagen) { ?>
                    <figure style="margin:0.3em 0.5em;padding:0;display:inline-block;" id="imagen<?=$imagen['idProductoImagen']?>">
                        <img class="img-thumbnail" width="125" src="<?=$imagen['pathProductoImagen']?>">
                        <figcaption>
                            <input type="checkbox" name="pedo" value="<?=$imagen['idProductoImagen']?>" <?=($imagen['checkProductoImagen'])? 'checked':'';?>>
                            <a class="pull-right" href="administrator/productos/eliminarImagen/<?=$imagen['idProductoImagen'];?>" rel="idImagen:1"><span class="glyphicon glyphicon-remove"></span></a>
                        </figcaption>
                    </figure>
                <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <input type="submit" id="uploadFilesBt" class="btn btn-primary btn-accion" value="Guardar" name="btnvo"/>
        <input type="hidden" id="idProducto" name="idProducto" value="<?php echo $Reg['idProducto']?>">
        <input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
    </form>
</div>
    

</div>
<script>
    $('figcaption > input').on('click', function() {
        $('figcaption > input[type=checkbox]').prop('checked', '');
        $(this).prop('checked', 'checked');
    });
    $('figcaption > a').on('click', function(event) {
        if (confirm("Esta seguro de eliminar la imagen?")) {
            $.ajax({
                type: 'POST'
                , url: $(this).attr('href')
                , data: $(this).attr('rel')
                , success: function() {
                    alert('probando ando');
                }
            });
        }
        event.preventDefault();
    });
function fileSelect(evt) {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        var files = evt.target.files;
        var result = '';
        var file;
        for (var i = 0; file = files[i]; i++) {
             // if the file is not an image, continue
            if (!file.type.match('image.*')) {
                continue;
            }
 
            reader = new FileReader();
            reader.onload = (function (tFile) {
                return function (evt) {
                    var div = document.createElement('div');
                    div.innerHTML = '<img style="width: 90px;" src="' + evt.target.result + '" />';
                    document.getElementById('filesInfo').appendChild(div);
                };
            }(file));
            reader.readAsDataURL(file);
        }
    } else {
        alert('The File APIs are not fully supported in this browser.');
    }
}
 
document.getElementById('userfile').addEventListener('change', fileSelect, false);
    $('#uploadFilesBtn').on('click', function() {
         var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(ev){
            document.getElementById('filesInfo').innerHTML = 'Done!';
        };
        xhr.open('POST', 'administrator/productos/do_upload', true);
        var files = document.getElementById('userfile').files;
        var data = new FormData();
        for(var i = 0; i < files.length; i++) data.append('file' + i, files[i]);
        xhr.send(data);
    });
</script>