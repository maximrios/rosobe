<?php
/**
 * @author Maximiliano Ezequiel Rios
 * @version 1.0.0
 * @copyright 2014
 * @package Industrias y Servicios Ro.So.Be.
 */
$vcGridView = (!empty($vcGridView))? $vcGridView: '';
$vcNombreList = (!empty($vcNombreList))? $vcNombreList: 'Agentes';
$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
?>
	<?= $vcMsjSrv; ?>
	<div class="form-inline">
		<a href="administrator/galerias/formulario" id="btn-nuevo" class="btn btn-primary btn-accion"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Agregar Nueva Imagen</a>
	</div>
	<?= $vcGridView; ?>