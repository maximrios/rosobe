<?php
/**
 * @author Maximiliano Ezequiel Rios
 * @version 1.0.0
 * @copyright 2014
 * @package Sabandijas Rodados
 */
    $vcFormName = antibotHacerLlave();
    $vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
    $vcFrmAction = (!empty($vcFrmAction))? $vcFrmAction: '';
?>
<div class="row">
    <div class="forms">
        <?= $vcMsjSrv; ?>
        <form id="proba" name="<?= $vcFormName; ?>" action="<?= $vcFrmAction; ?>" method="post" target="contenido-abm">
            <div class="row">
                <div class="form-group col-lg-12">
                    <label for="nombreContacto">Nombre de Contacto</label>
                    <input type="text" id="nombreContacto" name="nombreContacto" tabindex="1" class="form-control" placeholder="Nombre de contacto." value="<?php echo $Reg['nombreContacto']?>" autofocus>
                </div>
                <div class="form-group col-lg-6">
                    <label for="telefonoContacto">Telefono de Contacto</label>
                    <input type="text" id="telefonoContacto" name="telefonoContacto" tabindex="2" class="form-control" placeholder="Telefono de contacto" value="<?php echo $Reg['telefonoContacto']?>">
                </div>
                <div class="form-group col-lg-6">
                    <label for="emailContacto">Email de Contacto</label>
                    <input type="text" id="emailContacto" name="emailContacto" tabindex="3" class="form-control" placeholder="Email de contacto" value="<?php echo $Reg['emailContacto']?>">
                </div>
                <div class="form-group col-lg-12">
                    <label for="mensajeContacto">Mensaje de Contacto</label>
                    <textarea id="mensajeContacto" name="mensajeContacto" tabindex="4" class="form-control" placeholder="Mensaje de contacto." rows="3"><?=$Reg['mensajeContacto']?></textarea>
                </div>
            </div>
            <div class="buttons">
            <a href="administrator/contactos" class="btn btn-primary btn-accion">Volver</a>
            <input type="hidden" id="idContacto" name="idContacto" value="<?php echo $Reg['idContacto']?>">
            <input type="hidden" id="vcForm" name="vcForm" value="<?= $vcFormName; ?>" />
        </div>
        </form>
    </div>
</div>
