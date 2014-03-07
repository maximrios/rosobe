<?php
	$vcMsjSrv = (!empty($vcMsjSrv))? $vcMsjSrv: '';
	if(empty($inSelected)){
		$aKeysSels = array_keys($rsOrganismos);
		$inSelected = $aKeysSels[0];
	}
?>
  <div id="login-leyenda">
     <p class="texto-descripciones1">Para completar el acceso al sistema, debe seleccionar un organismo/dependencia de la lista desplegable.</p>
  </div>
  <form id="login-access" method="post" enctype="application/x-www-form-urlencoded" action="<?= current_url(); ?>">
   <div class="login-access-wide">
      <label for="selOrganismo" class="login-label">Seleccione una dependencia:</label>
	  <?= form_dropdown('selOrganismo', $rsOrganismos, $inSelected,'id="selOrganismo" class="login-select" style="width:100%;"') ?>
    </div>
    <div class="login-access-wide-rt">
		<input type="submit" name="submit" value="Ingresar" class="login-button" />
		<a id="cancel" name="cancel" class="login-cancel" href="<?= $vcRedirSrc; ?>" />Cancelar</a>
    </div>
    <input type="hidden" id="vcSrcForm" name="vcSrcForm" value="login-access" />
  </form>
  <div class="clearfloat">&nbsp;</div>
  <div id="srv-resp"></div>
  <?= $vcMsjSrv; ?>