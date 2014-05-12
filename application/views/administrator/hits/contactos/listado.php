<?php
/**
 * @author Maximiliano Ezequiel Rios
 * @version 1.0.0
 * @copyright 2014
 * @package Sabandijas Rodados
 */
$vcGridView = (!empty($vcGridView))? $vcGridView: '';
$vcNombreList = (!empty($vcNombreList))? $vcNombreList: 'Contactos';
$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
?>
	<?= $vcMsjSrv; ?>
	<?= $vcGridView; ?>