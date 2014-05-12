<?php
/**
 * @author Maximiliano Ezequiel Rios
 * @version 1.0.0
 * @copyright 2014
 * @package Sabandijas Rodados
 */
    $vcFormName = antibotHacerLlave();
    $vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
    $vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
    ($imagenes)? $mitad='col-lg-8':$mitad='';
?>
<div class="row">
<div class="forms">
    <?= $vcMsjSrv; ?>
    <form id="proba" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
        <div class="row">
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
        </div>
        <div class="row productos-agregados">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">Categorias disponibles</div>
                <div class="panel-body">
                    <ul id="categorias" class="categorias">
                    <?php foreach ($categorias as $categoria) { ?>
                        <li><input type="checkbox" id="categoria_<?=$categoria['idCategoria']?>" name="categoriaProducto[]" class="" value="<?=$categoria['idCategoria']?>" <?=($this->categorias->obtenerCategoriasProducto($categoria['idCategoria'], $Reg['idProducto']))? 'checked':'';?>>&nbsp;<?=$categoria['nombreCategoria']?>
                        <?php if($subcategorias = $this->categorias->obtenerCategorias($categoria['idCategoria'])) { ?>
                            <ul>
                            <?php foreach ($subcategorias as $subcategoria) { ?>
                                <li><input type="checkbox" id="categoria_<?=$subcategoria['idCategoria']?>" name="categoriaProducto[]" value="<?=$subcategoria['idCategoria']?>" <?=($this->categorias->obtenerCategoriasProducto($subcategoria['idCategoria'], $Reg['idProducto']))? 'checked':'';?>>&nbsp;<?=$subcategoria['nombreCategoria']?></li>
                            <?php } ?>
                            </ul>
                        <?php } ?>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php if ($imagenes) { ?>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Imagenes asociadas</div>
                <div class="panel-body">
                <?php foreach ($imagenes as $imagen) { ?>
                    <figure style="margin:0.3em 0.5em;padding:0;display:inline-block;" id="imagen<?=$imagen['idProductoImagen']?>">
                        <img class="img-thumbnail" width="125" src="<?=$imagen['pathProductoImagen']?>">
                        <figcaption>
                            <a href="administrator/productos/checkImagen/<?=$imagen['idProductoImagen'];?>" class="btn-accion" rel="<?=$imagen['idProductoImagen']?>"><input type="checkbox" name="imagen" value="<?=$imagen['idProductoImagen']?>" <?=($imagen['checkProductoImagen'])? 'checked':'';?>></a>
                            <a class="pull-right eliminar-imagen btn-accion" href="administrator/productos/eliminarImagen/<?=$imagen['idProductoImagen'];?>" rel="<?=$imagen['idProductoImagen']?>"><span class="glyphicon glyphicon-remove"></span></a>
                        </figcaption>
                    </figure>
                <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="form-group col-lg-12">
            <label for="descripcionProducto">Imagenes</label>
            <!--<input type="file" name="userfile[]" id="userfile" multiple/>-->
            <input type="file" name="userfile[]" id="imagenes" multiple/>
            <progress id="progressBar" value="0" max="100" style="width:300px;"></progress> 
            <output id="filesInfo"></output>
        </div>
        
        
        <input type="submit" id="uploadFilesBt" class="btn btn-primary btn-accion" value="Guardar" name="btnvo"/>
        <input type="hidden" id="idProducto" name="idProducto" value="<?php echo $Reg['idProducto']?>">
        <input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
    </form>
</div>
    

</div>
<script>
    $('#categorias > li > input[type=checkbox]').on('click', function() {
        if($(this).is(':checked')) {
            $(this).find('input').each(function() {
                alert($(this).val());
            });
        }
        else {
            $('#categorias > li > input[type=checkbox] > ul > li > input[type=checkbox]').each( function() {           
                this.checked = false;
            });
        }
//       
    })
    $('figcaption > input').on('click', function() {
        $('figcaption > input[type=checkbox]').prop('checked', '');
        $(this).prop('checked', 'checked');
    });
    /*$('figcaption > a').on('click',function(){
                $($(this).attr('id')).viaAjax('send', {type:'POST', url : 'administrator/productos/eliminarImagen/'+$(this).attr('rel')});
    });*/
    //$('.eliminar-imagen').viaAjax({url: 'inicio/vermas'});
    /*$('figcaption > a').on('click', function(event) {
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
    });*/

 
document.getElementById('imagenes').addEventListener('change', fileSelect, false);
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