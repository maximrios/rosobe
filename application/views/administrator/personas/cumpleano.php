<?php
	$vcFormName = antibotHacerLlave();
?>
<style>
#cumpleano {
	width: 800px;
}
#data_cumpleano, #mensajes_cumpleano {
	display: inline-block;
	vertical-align: top;
}
#data_cumpleano {
	width: 30%;
	margin-right: 1em;
}
#mensajes_cumpleano {
	width: 65%;
}
#mensajes_cumpleano h4 {
	font-size: 1.2em;
	margin: 0;
	color: #888;
}
#mensajes_cumpleano ul li {
	list-style: none;
	margin: 0.6em;
	line-height: 1.2em;
	border-bottom: 1px solid #999;
	padding-left: 0!important;
}
#mensajes_cumpleano textarea {
	display: block;
	resize: none;
	width: 100%;
}
.datos_cumpleano {
	font-family: Arial;
	font-size: 0.9em;
	width: 100%;
	padding-left: 0!important;
}
.datos_cumpleano li {
	text-align: left;
	display: block;
	list-style: none;
	width: 100%;
	margin: 0.5em 0;
}
@media screen and (max-width:800px) {
	#data_cumpleano, #mensajes_cumpleano {  
    	display: block;
    	width: 90%;
    }  
}
</style>
<section id="cumpleano">
	<article id="data_cumpleano">
		<figure>
			<img src="assets/images/personas/<?php echo $cumpleanero['dniPersona']?>-200-250.jpg">
			<figcaption>
				<ul class="datos_cumpleano">
					<li><?php echo $cumpleanero['nombreCompletoPersona']?></li>
					<li><?php echo $cumpleanero['denominacionCargo']?></li>
					<li><?php echo $cumpleanero['nombreArea']?></li>
					<li>Email : <?php echo $cumpleanero['emailPersona']?></li>
					<li>Interno : <?php echo $cumpleanero['internoAgente']?></li>
				</ul>
			</figcaption>
		</figure>
	</article>
	<article id="mensajes_cumpleano">
		<h4>Ultimos mensajes recibidos</h4>
		<!--<ul>
			<li></li>
		</ul>-->
		<form action="<?php echo base_url('administrator/mensajes/guardar');?>" method="post" id="<?php echo $vcFormName;?>" name="<?php echo $vcFormName;?>" class="form_ajax">
			<textarea id="textoMensaje" name="textoMensaje"></textarea>
			<button id="enviarMensaje" class="btn btn-primary"><i class="icon-inbox icon-white"></i>&nbsp;&nbsp;Enviar Mensaje</button>
			<input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
			<input type="hidden" id="idMensaje" name="idMensaje" value="0">
			<input type="hidden" id="asuntoMensaje" name="asuntoMensaje" value="Saludo de cumpleaños">
			<input type="hidden" id="idTipoMensaje" name="idTipoMensaje" value="3">
			<input type="hidden" id="deMensaje" name="deMensaje" value="<?php echo $this->lib_autenticacion->idPersona()?>">
			<input type="hidden" id="destinatarioMensaje" name="destinatarioMensaje" value="<?php echo $cumpleanero['idPersona']?>">
		</form>
	</article>
</section>
<script>
	$('#enviarMensaje').on('click', enviarMensaje);
	function enviarMensaje(){
		$form = $('.form_ajax');
		$.ajax({
			url: $form.attr('action'),
			type: $form.attr('method'),
			data: $form.serialize(),
			success: function() {
				alert('Se actualizaron los datos correctamente');
			}
		})
		return false;
	}
</script>
