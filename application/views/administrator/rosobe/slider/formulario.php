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
            <label for="tituloSlider">Titulo del Slider</label>
            <input type="text" id="tituloSlider" name="tituloSlider" tabindex="1" class="form-control" placeholder="Titulo del Slider." value="<?php echo $Reg['tituloSlider']?>" autofocus>
        </div>
        <div class="form-group col-lg-6">
            <label for="linkSlider">Link del Slider</label>
            <input type="text" id="linkSlider" name="linkSlider" tabindex="1" class="form-control" placeholder="Link del Slider." value="<?php echo $Reg['linkSlider']?>">
        </div>
        <div class="form-group col-lg-3">
            <label for="vigenciaDesde">Vigencia Desde</label>
            <input type="text" id="vigenciaDesde" name="vigenciaDesde" tabindex="1" class="form-control" placeholder="dd/mm/yyyy." value="<?php echo $Reg['vigenciaDesde']?>">
        </div>
        <div class="form-group col-lg-3">
            <label for="vigenciaHasta">Vigencia Hasta</label>
            <input type="text" id="vigenciaHasta" name="vigenciaHasta" tabindex="1" class="form-control" placeholder="dd/mm/yyyy." value="<?php echo $Reg['vigenciaHasta']?>">
        </div>
        <div class="form-group col-lg-12">
            <label for="">Imagen</label>
            <input type="file" name="userfile" id="userfile"/>
            <progress id="progressBar" value="0" max="100" style="width:300px;"></progress> 
            <output id="filesInfo"></output>
        </div>
        <input type="submit" id="uploadFilesBt" class="btn btn-primary btn-accion" value="Guardar" name="btnvo"/>
        <input type="hidden" id="idSlider" name="idSlider" value="<?php echo $Reg['idSlider']?>">
        <input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
    </form>
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