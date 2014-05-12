<?php
/**
 * @author Maximiliano Ezequiel Rios
 * @version 1.0.0
 * @copyright 2014
 * @package Sabandijas Rodados
 */
$vcGridView = (!empty($vcGridView))? $vcGridView: '';
$vcNombreList = (!empty($vcNombreList))? $vcNombreList: '';
$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
?>
	<?= $vcMsjSrv; ?>
	<a href="administrator/personas/formulario" id="btn-nuevo" class="btn btn-primary btn-accion"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Agregar Nuevo</a>
	<a href="administrator/personas/export" id="btn-nuevo" class="btn btn-success"><span class="glyphicon glyphicon-save"></span>&nbsp;&nbsp;Exportar Excel</a>
	<?= $vcGridView; ?>