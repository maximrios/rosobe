<?php
    $vcFormName = antibotHacerLlave();
    $vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
    $vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
<div class="col-lg-9 container">
	<div class="col-lg-12 breadcrumb">
		<label><?=$breadcrumb?></label>
		<!--<h5>Contacto ::</h5>-->
	</div>
</div>
<div class="col-lg-9 container content">
	<div class="col-lg-6">
		<h3 class="titulo-section">Contactanos</h3>
		<hr class="titulo-section">
		<?=$mensaje?>
		<div style="border:1px solid #f3f3f3;padding: 0.3em;">
			<form id="<?=$vcFormName;?>" name="<?=$vcFormName;?>" action="<?=$vcFrmAction;?>" method="post" accept-charset="utf-8" role="form" style="padding:1em;background:#f2f2f2;">
				<div class="form-group">
					<label for="nombresContacto">Nombres</label>
					<input id="nombresContacto" type="text" name="nombresContacto" tabindex="1" title="Ingrese el nombre completo" placeholder="Nombre completo" class="form-control" value="<?=$Reg['nombresContacto']?>" required>
				</div>
				<div class="form-group">
					<label for="telefonoContacto">Telefono</label>
					<input id="telefonoContacto" type="tel" name="telefonoContacto" tabindex="2" placeholder="03874290011. Solo números" class="form-control" value="<?=$Reg['telefonoContacto']?>" required>
				</div>
				<div class="form-group">
					<label for="emailContacto">Correo Electronico</label>
					<input id="emailContacto" type="email" name="emailContacto" tabindex="3" placeholder="ejemplo@servidor.com" class="form-control" value="<?=$Reg['emailContacto']?>" required>
				</div>
				<div class="form-group">
					<label for="mensajeContacto">Mensaje</label>
					<textarea id="mensajeContacto" name="mensajeContacto" rows="9" tabindex="4" placeholder="Mensaje" class="form-control" required><?=$Reg['mensajeContacto']?></textarea>
					<span class="form-importante">* Todos los campos son obligatorios.</span>
				</div>
				<div class="form-group clearfix">
					<button name="btnenviar" type="submit" class="btn btn-primary pull-right">ENVIAR</button>
				</div>
				<input type="hidden" id="vcForm" name="vcForm" value="<?=$vcFormName;?>" />
			</form>
		</div>
	</div>
	<div class="col-lg-6">
		<h3 class="titulo-section">Datos de contacto</h3>
		<hr class="titulo-section">
		<ul class="col-lg-12">
			<li>Av. Ex Comb. de Malvinas 6201</li>
			<li>(0387) 4010107 - 4290826</li>
			<li><a href="mailto:info@industriasrosobe.com.ar" title="Industrias y Servicios Ro.So.Be.">info@industriasrosobe.com.ar</a></li>
			<li>Salta - Argentina</li>
		</ul>
		<!--<ul class="col-lg-6">Oficina en Cordoba
			<li>Direccion</li>
			<li>Telefono</li>
			<li>Correo electronico</li>
		</ul>-->
		<h3 class="titulo-section">Como llegar</h3>
		<hr class="titulo-section">
		<?php 
			echo $map['js'];
			echo $map['html'];
		?>
	<div>
</div>