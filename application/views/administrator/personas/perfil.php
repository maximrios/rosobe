<style>
.perfil-usuario {
	padding: 0 1em;
}
.data-cargo {
	width: 250px;
}
.data-cargo, .data-perfil {
	display: inline-block;
	vertical-align: top;
}
.laboral-perfil {
	margin: 0.5em 0;
}
.laboral-perfil li {
	list-style: none;
}
.laboral-estructura-perfil {
	font-size: 0.9em;
	font-weight: bold;
}
.data-cargo .titulo {
	font-size: 0.7em;
	margin-bottom: 0;
}
</style>
<section class="perfil-usuario">
	<article class="data-cargo">
		<img src="assets/images/personas/<?= $persona['dniPersona'];?>-200-250.jpg">
		<?php
		if($cargos) {
			echo '<ul class="laboral-perfil">';
			foreach ($cargos as $cargo) {
				echo '<li class="laboral-estructura-perfil">'.$cargo['nombreEstructura'].'</li>';
				echo '<li class="laboral-cargo-perfil">'.$cargo['denominacionCargo'].'</li>';
			}	
			echo "</ul>";
		}
		else {

		}
		if($designacion) {
			echo '<span class="titulo">Designado en </span>';
			echo '<ul class="laboral-perfil">';
				echo '<li class="laboral-estructura-perfil">'.$designacion['nombreEstructura'].'</li>';
				echo '<li class="laboral-cargo-perfil">'.$designacion['denominacionCargo'].'</li>';
				echo '<li class="laboral-cargo-perfil">Interno '.$designacion['internoAgente'].'</li>';
			echo "</ul>";	
		}
		else {

		}
		?>
	</article>
	<article class="data-perfil">
		<form action="<?php echo $vcFrmAction;?>" method="post" id="form_perfil" name="form_perfil">
		<li>
			<label>Apellido</label>
			<span></span>
			<input type="text" id="apellidoPersona" name="apellidoPersona" value="<?php echo $persona['apellidoPersona']?>" readonly>
		</li>
		<li>
			<label>Nombre</label>
			<span></span>
			<input type="text" id="nombrePersona" name="nombrePersona" value="<?php echo $persona['nombrePersona']?>" readonly>
		</li>
		<li>
			<label>Estado Civil</label>
			<span>Seleccione el estado civil</span>
			<?php echo form_dropdown('idEcivil', $ecivil, $persona['idEcivil']);?>
		</li>
		<li>
			<label>Domicilio</label>
			<span>Ingrese el domicilio completo</span>
			<input type="text" class="large" id="domicilioPersona" name="domicilioPersona" value="<?php echo $persona['domicilioPersona'];?>">
		</li>
		<li>
			<label>Telefono</label>
			<span>Ingrese un numero de telefono fijo</span>
			<input type="text" id="telefonoPersona" name="telefonoPersona" value="<?php echo $persona['telefonoPersona']?>">
		</li>
		<li>
			<label>Celular</label>
			<span>Ingrese su numero de telefono celular</span>
			<input type="text" id="celularPersona" name="celularPersona" value="<?php echo $persona['celularPersona']?>">
		</li>
		<button id="actualizarPerfil" class="btn btn-primary"><i class="icon-refresh icon-white"></i>&nbsp;&nbsp;Actualizar mis datos</button>
		<input type="hidden" id="idPersona" name="idPersona" value="<?php echo $persona['idPersona'];?>">
	</form>
	</article>
</section>
<script>
	$('#actualizarPerfil').on('click', actualizar);
	function actualizar(){
		$form = $('#form_perfil');
		//var datos = $form.serialize();
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