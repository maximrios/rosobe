<?php
	$vcFormName = antibotHacerLlave();
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
	$vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
    ($imagenes)? $mitad='col-lg-6':$mitad='';
?>
<div class="row">
<div class="forms <?=$mitad?>">
	<?= $vcMsjSrv; ?>
	<form id="proba" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
		<div class="form-group col-lg-12">
    		<label for="nombreProducto">Nombre del Producto</label>
			<input type="text" id="nombreProducto" name="nombreProducto" tabindex="1" class="form-control" placeholder="Nombre del Producto." value="<?php echo $Reg['nombreProducto']?>" autofocus>
    	</div>
    	<div class="form-group col-lg-12">
    		<label for="descripcionProducto">Descripcion del Producto</label>
			<input type="text" id="descripcionProducto" name="descripcionProducto" tabindex="1" class="form-control" placeholder="Nombre del Producto." value="<?php echo $Reg['descripcionProducto']?>" autofocus>
    	</div>
        <div class="form-group col-lg-12">
            <label for="descripcionProducto">Categorias</label>
            <select id="prueba" name="prueba" multiple>
                <option value="0">Prueba 1</option>
                <option value="1">Prueba 2</option>
            </select>
        </div>
    	<div class="form-group col-lg-12">
    		<label for="descripcionProducto">Imagenes</label>
    		<input type="file" name="userfile[]" id="userfile" multiple/>
      		<progress id="progressBar" value="0" max="100" style="width:300px;"></progress> 
      		<output id="filesInfo"></output>
    	</div>
		<input type="submit" id="uploadFilesBt" class="btn btn-primary btn-accion" value="Guardar" name="btnvo"/>
		<input type="hidden" id="idProducto" name="idProducto" value="<?php echo $Reg['idProducto']?>">
		<input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
	</form>
</div>
    <?php if ($imagenes) { ?>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">Imagenes asociadas al producto</div>
                <div class="panel-body">
        <?php foreach ($imagenes as $imagen) { ?>
                <img class="img-thumbnail" src="<?=$imagen['pathProductoImagen']?>">
    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

</div>
<div class="row">
    <div class="col-lg-6">
<div class="panel panel-default">
    <div class="panel-heading">
        titulo
    </div>
    <div class="panel-body">
        aca 
    </div>
</div>
</div>
<div class="col-lg-6">
<div class="panel panel-default">
    <div class="panel-heading">
        titulo
    </div>
    <div class="panel-body">
        aca 
    </div>
</div>
</div>
</div>
<script>
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