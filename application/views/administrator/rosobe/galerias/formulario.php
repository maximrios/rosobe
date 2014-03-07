<?php
	$vcFormName = antibotHacerLlave();
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
	$vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
	<?= $vcMsjSrv; ?>
	<form id="multiform" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm" enctype="multipart/form-data">
		<div class="col-lg-7">
			<div class="form-group col-lg-12">
    			<label for="nombreGaleria">Titulo de imagen</label>
				<input type="text" id="nombreGaleria" name="nombreGaleria" tabindex="1" class="form-control" placeholder="Titulo de la imagen. Visible en la web." value="<?php echo $Reg['nombreGaleria']?>" autofocus>
    		</div>
    		<div class="form-group col-lg-12">
    			<label for="descripcionGaleria">Descripción</label>
				<input type="text" id="descripcionGaleria" name="descripcionGaleria" tabindex="2" class="form-control" placeholder="Descripción de la galeria. Visisble en la web." value="<?php echo $Reg['descripcionGaleria']?>">
    		</div>
    		<div class="form-group col-lg-12">
    			<label for="descripcionGaleria">Estado</label>
    		    <div class="onoffswitch">
    				<input type="checkbox" name="estadoGaleria" class="onoffswitch-checkbox" id="myonoffswitch" <?=($Reg['estadoGaleria'] == 'Publicado')? 'checked':'';?>>
    				<label class="onoffswitch-label" for="myonoffswitch">
    					<div class="onoffswitch-inner"></div>
    					<div class="onoffswitch-switch"></div>
    				</label>
    			</div> 
			</div>
    		<div class="form-group col-lg-12">
    			<div class="fileinput fileinput-new" data-provides="fileinput">
  					
  					<div>
	    				<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" id="pathGaleria" name="pathGaleria"></span>
    					<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  					</div>
				</div>

	    		<!--<label for="pathGaleria">Archivo</label>
    			<input type="file" id="pathGaleria" name="pathGaleria" value="">
    			<p class="help-block">Seleccione un archivo.</p>-->
    		</div>
    		<div class="buttons">
			<!--<input type="submit" class="btn-primary btn-accion<?= (empty($Reg['idGaleria'])?' btn-reset':''); ?>" value="Guardar"/>-->
            <input type="submit" value="Guardar"/>
		</div>
		</div>
		<div class="col-lg-5">
			<?php
			if($Reg['pathGaleria']) { ?>
				<img src="<?php echo $Reg['pathGaleria']?>" class="img-thumbnail">
			<?php }
			else { ?>
				<div id="fileinput-preview" class="fileinput-preview thumbnail" data-trigger="fileinput" style=""></div>
			<?php }
			?>
			
		</div>
		
		<!--<button type="submit" class="btn btn-primary" tabindex="13"><span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;Guardar</button>-->
		<input type="hidden" id="idGaleria" name="idGaleria" value="<?php echo $Reg['idGaleria'];?>">
		<input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
    </form>

<script>
    /*$("#multiform").submit(function(e)
{
 
    var formObj = $(this);
    var formURL = formObj.attr("action");
    var formData = new FormData(this);
    $.ajax({
        url: formURL,
    type: 'POST',
        data:  formData,
    mimeType:"multipart/form-data",
    contentType: false,
        cache: false,
        processData:false,

    success: function(data, textStatus, jqXHR)
    {
 		//alert(data);
    },
     error: function(jqXHR, textStatus, errorThrown)
     {
     }         
    });
    e.preventDefault(); //Prevent Default action.
});
$("#multiform").submit();*/
</script>