<?php
/**
 * @author Maximiliano Ezequiel Rios
 * @version 1.0.0
 * @copyright 2014
 * @package Sabandijas Rodados
 */
$vcGridView = (!empty($vcGridView))? $vcGridView: '';
$vcNombreList = (!empty($vcNombreList))? $vcNombreList: 'Agentes';
$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
?>
	<?= $vcMsjSrv; ?>
	<a href="administrator/productos/formulario" id="btn-nuevo" class="btn btn-primary btn-accion"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Agregar Nuevo</a>
	<?= $vcGridView; ?>