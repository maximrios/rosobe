      <div class="main-content">
        <section class="box-normal-100" id="buscador-barcode">
          <div id="divBuscadorBarra" class="bar tit-buscador-selected"><h2 class="fontface-arimo-subtitulo">Buscador por C&oacute;digo de Barra</h2></div>
          <div id="frm-buscador-barcode" class="toggle">
          <form id="form-busqueda-barcode">
            <label for="barcode">C&oacute;digo de Barra</label>
            <input name="barcode" id="barcode" type="number" tabindex="1" autofocus placeholder="Haga uso del Scanner" required class="input-adorno" />
            <input type="submit" name="submit" value="Buscar" tabindex="2" class="button-adorno" />
          </form>
          </div>
        </section>
       <!--  <section class="box-normal-50-lt"> -->
       	 <section class="box-normal-100" id="buscador-normal">
       	 	
          <div id="divBuscadorNormal" class="bar tit-buscador"><h2 class="fontface-arimo-subtitulo">Buscador Normal</h2></div>
          <div id="frm-buscador-normal" class="toggle">
          <fieldset class="buscador-hor-inner">
          <form id="form-busqueda-normal" >
				<div class="field">
					<label for="tipo" class="form-generico-label">Tipo (*)</label>
              		<select name="tipo"  class="select" autofocus>
		                <option value="Expediente">Expediente</option>
		                <option value="Expediente Preexistente">Expediente Preexistente</option>
		                <option value="Nota">Nota</option>
		                <option value="Memorandun">Memorandun</option>
		            </select>
		        </div>		
		        
		        <div class="field">
		              <label for="iud" class="form-generico-label">IUD (*)</label>
					  <input id="iud" class="input-adorno" type="number" placeholder="IUD" tabindex="1" name="iud">
	            </div>
		        <div class="field">
		              <label for="numero" class="form-generico-label">N&uacute;mero (*)</label>
					  <input id="numero" class="input-adorno" type="number" required="" placeholder="Numero de actuación" tabindex="1" name="numero">
	            </div>
		        <div class="field">
		              <label for="periodo" class="form-generico-label">Periodo</label>
					  <input id="periodo" class="input-adorno" type="number" placeholder="Año (4 digitos)" tabindex="1" name="periodo">
	            </div>
	            <div class="field">
		              <label for="corresponde" class="form-generico-label">Corresponde</label>
					  <input id="corresponde" class="input-adorno" type="number" placeholder="Corresponde" tabindex="1" name="corresponde">

	            </div>
	                          		
              	<div class="field">
		              <label for="corresponde" class="form-generico-label">&nbsp;</label>
					  <input type="submit" name="submit" value="Buscar" tabindex="2" class="button-adorno" />
	            </div>
            <div class="clearfloat">&nbsp;</div>
          </form>
          </fieldset>
          </div>
          
        </section>
        <!-- <section class="box-normal-50-rt"> -->
        <section class="box-normal-100" id="buscador-avanzado">
	          <div id="divBuscadorAvanzado" class="bar tit-buscador"><h2 class="fontface-arimo-subtitulo">Buscador Avanzado</h2></div>
	          <div id="frm-buscador-avanzado" class="toggle">
	          <fieldset class="buscador-hor-inner">
	          <form id="form-busqueda-normal" >
	              <div class="field">
		              <label for="tema" class="form-generico-label">Tema</label>
		              <select name="tema" id="tema" size="1" class="select" autofocus>
		                <option value="Tema 1">Tema 1</option>
		                <option value="Tema 2">Tema 2</option>
		                <option value="Tema 3">Tema 3</option>
		                <option value="Tema 4">Tema 4</option>
		              </select>
	              </div>
	              <div class="field">
		              <label for="iud" class="form-generico-label">Iniciador</label>
					  <input name="iniciador" id="iniciador" type="number" tabindex="1" placeholder="Iniciador" class="input-adorno" />
	              </div>
	              <div class="field">
		              <label for="caratula" class="form-generico-label">Car&aacute;tula</label>
					  <input name="caratula" id="caratula" type="number" tabindex="1" placeholder="texto de la caratula" required  class="input-adorno" />
	              </div>
	              <div class="field">
		              <label for="observaciones" class="form-generico-label">Observaciones</label>
					  <input name="observaciones" id="observaciones" type="number" tabindex="1" placeholder="texto" class="input-adorno" />
	              </div>	  
	              <div class="field">
		              <label for="fechadesde" class="form-generico-label">Fecha desde</label>
					  <input name="fechadesde" id="fechadesde" type="number" tabindex="1" 
					  		placeholder="DD/MM/AAAA" 
					  		class="input-adorno" 
					  		value="<?= GetDateFromFrenchToISO('11/08/2011');?>" />
	              </div>
	              <div class="field">
		              <label for="fechahasta" class="form-generico-label">Fecha hasta</label>
					  <input name="fechahasta" id="fechahasta" type="number" tabindex="1" 
					  		placeholder="DD/MM/AAAA" 
					  		class="input-adorno"
					  		value="<?= GetDateFromISO('2011-08-10');?>" />
	              </div>
	                            
	              <div class="field">
		              <label for="Buscar" class="form-generico-label">&nbsp;</label>
	              	  <input type="submit" name="submit" value="Buscar" tabindex="2" class="button-adorno" />
	              </div>

	         </form>
	         </fieldset>
	        </div> 
        </section>        
        <div class="clearfloat">&nbsp;</div>
        <section class="box-normal-100">
          <h2 class="fontface-arimo-subtitulo">Novedades</h2>
          <article class="noticias-home">
            <h3><a href="#" title="#">Accesos Directos</a></h3>
            <p class="texto-descripciones">parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo</p>
          </article>
          <article class="noticias-home">
            <h3><a href="#" title="#">Accesos Directos</a></h3>
            <p class="texto-descripciones">parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo</p>
          </article>
          <article class="noticias-home">
            <h3><a href="#" title="#">Accesos Directos</a></h3>
            <p class="texto-descripciones">parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo parrafo</p>
          </article>
        </section>
        <div class="clearfloat">&nbsp;</div>
      </div>
      <div class="sidebar">
        <section class="box-normal-100">
          <h3 class="fontface-arimo-titulo">Accesos Directos</h3>
          <a href="#" title="Agregar una Nueva Actuaci&oacute;n" class="btn-imagen btn-imagen-nueva-actuacion">Nueva Actuaci&oacute;n</a>
          <a href="#" title="Ver Actuaciones de esta dependencia" class="btn-imagen btn-imagen-actuacion-dependencia">Actuaciones de esta dependencia</a>
        </section>
        <section class="box-normal-50-lt">
          <h3 class="fontface-arimo-titulo">Bandeja de Entrada</h3>
          <ul class="lista-items">
            <li>Al Usuario: <span class="texto-col-celeste negrita">Nombre de Usuario</span></li>
            <li>A la Mesa: <span class="texto-col-celeste negrita">Nombre de Mesa</span></li>
          </ul>
        </section>
        <section class="box-normal-50-rt">
          <h3 class="fontface-arimo-titulo">Pendientes de Recepcion</h3>
          <ul class="lista-items">
            <li>No Enviados: <span class="texto-col-celeste negrita">123</span></li>
            <li>Enviados: <span class="texto-col-celeste negrita">1234</span></li>
            <li>Mis Enviados: <span class="texto-col-celeste negrita">12345</span></li>
            <li>No Implementa sistema: <span class="texto-col-celeste negrita">123456</span></li>
          </ul>
        </section>
        <div class="clearfloat">&nbsp;</div>
        <section class="box-normal-100">
          <h3 class="fontface-arimo-titulo">Favoritos</h3>
          <a href="#" title="Ver sus actuaciones favoritos" class="btn-normal-azul flt-rt">Ver</a>
          <p class="texto-descripciones1">Haga click aqu&iacute; para ver sus actuaciones definidas como favoritas.</p>
          <div class="clearfloat">&nbsp;</div>
          <div class="divide-100">&nbsp;</div>
          <table cellpadding="2" border="1" id="table-favoritos">
            <thead>
              <tr>
                <th>Id</th>
                <th>Tipo</th>
                <th>Actuaci&oacute;n</th>
                <th>Pase</th>
                <th>Agdo</th>
                <th>Cpde</th>
              </tr>
            </thead>
            <tr>
              <td colspan="6" class="table-favoritos-subtitulos espaciado-celdas">Mis Favoritos</td>
            </tr>
            <tr>
              <td class="espaciado-celdas">123</td>
              <td class="espaciado-celdas">Expediente</td>
              <td class="espaciado-celdas"><a href="#" title="Ver Caratula de la Actuaci&oacute;n">11-121323/2011-3</a></td>
              <td class="foco-sin-novedades">&nbsp;</td>
              <td class="foco-hay-movimientos">&nbsp;</td>
              <td class="foco-sin-novedades">&nbsp;</td>
            </tr>
            <tr>
              <td class="espaciado-celdas">124</td>
              <td class="espaciado-celdas">Nota</td>
              <td class="espaciado-celdas"><a href="#" title="Ocultar Caratula de la Actuaci&oacute;n">11-563/2011-0</a></td>
              <td class="foco-hay-movimientos">&nbsp;</td>
              <td class="foco-hay-movimientos">&nbsp;</td>
              <td class="foco-hay-movimientos">&nbsp;</td>
            </tr>
            <tr>
              <td class="espaciado-celdas" colspan="6">shjfksd sjf sdjf klsdj fksdj fksdj kjsdklfj sdkj fsdkj fsdlj fklsdjfklsdj fsdj sfljsdkl fj ksjfsdj ljfskdl</td>
            </tr>
            <tr>
              <td colspan="6" class="table-favoritos-subtitulos espaciado-celdas">Carpeta customizada</td>
            </tr>
            <tr>
              <td class="espaciado-celdas">124</td>
              <td class="espaciado-celdas">Nota</td>
              <td class="espaciado-celdas"><a href="#" title="Ver Caratula de la Actuaci&oacute;n">11-563/2011-0</a></td>
              <td class="foco-hay-movimientos">&nbsp;</td>
              <td class="foco-hay-movimientos">&nbsp;</td>
              <td class="foco-sin-novedades">&nbsp;</td>
            </tr>
          </table>
        </section>
        <section class="box-normal-100 box-semaforo">
          <h3 class="fontface-arimo-titulo">Sem&aacute;foros</h3>
          <a href="#" title="Ver vencimientos de actuaciones" class="btn-normal-azul flt-rt">Ver</a>
          <p class="texto-descripciones1">Vea aqu&iacute; el estado de los vencimientos de sus actuaciones.</p>
          <div class="clearfloat">&nbsp;</div>
          <div class="divide-100">&nbsp;</div>
          <table cellpadding="2" border="1" class="table-semaforo">
            <thead>
              <tr>
                <th>Estado</th>
                <th>Actuaciones</th>
                <th>Cantidad</th>
                <th>Ver</th>
              </tr>
            </thead>
            <tr>
              <td class="foco-act-vencidas">&nbsp;</td>
              <td class="espaciado-celdas">Actuaciones Vencidas</td>
              <td class="espaciado-celdas centrado">1</td>
              <td class="espaciado-celdas"><a href="#" title="#">m&aacute;s</a></td>
            </tr>
            <tr>
              <td class="foco-act-a-vencerse">&nbsp;</td>
              <td class="espaciado-celdas">Actuaciones Proximas a Vencerse</td>
              <td class="espaciado-celdas centrado">12</td>
              <td class="espaciado-celdas"><a href="#" title="#">m&aacute;s</a></td>
            </tr>
            <tr>
              <td class="foco-act-no-vencidas">&nbsp;</td>
              <td class="espaciado-celdas">Actuaciones No Vencidas</td>
              <td class="espaciado-celdas centrado">2</td>
              <td class="espaciado-celdas"><a href="#" title="#">m&aacute;s</a></td>
            </tr>
          </table>
          <div class="clearfloat20">&nbsp;</div>
          <p class="texto-descripciones">Quiere ver el sem&aacute;foro a otra fecha ?</p>
          <form id="form-semaforo">
            <label for="fecha" class="form-generico-label">Fecha</label>
            <input name="fecha" id="fecha" type="date" tabindex="1" placeholder="DD/MM/AAAA" class="input-adorno" />
            <input type="submit" name="submit" value="Buscar" tabindex="2" class="button-adorno" />
          </form>
          <div class="clearfloat">&nbsp;</div>
          <div class="divide-100">&nbsp;</div>
          <table cellpadding="2" border="1" class="table-semaforo">
            <thead>
              <tr>
                <th>Estado</th>
                <th>Actuaciones</th>
                <th>Cantidad</th>
                <th>Ver</th>
              </tr>
            </thead>
            <tr>
              <td class="foco-act-vencidas">&nbsp;</td>
              <td class="espaciado-celdas">Actuaciones Vencidas</td>
              <td class="espaciado-celdas centrado">4</td>
              <td class="espaciado-celdas"><a href="#" title="#">m&aacute;s</a></td>
            </tr>
            <tr>
              <td class="foco-act-a-vencerse">&nbsp;</td>
              <td class="espaciado-celdas">Actuaciones Proximas a Vencerse</td>
              <td class="espaciado-celdas centrado">16</td>
              <td class="espaciado-celdas"><a href="#" title="#">m&aacute;s</a></td>
            </tr>
            <tr>
              <td class="foco-act-no-vencidas">&nbsp;</td>
              <td class="espaciado-celdas">Actuaciones No Vencidas</td>
              <td class="espaciado-celdas centrado">5</td>
              <td class="espaciado-celdas"><a href="#" title="#">m&aacute;s</a></td>
            </tr>
          </table>
        </section>
        <div class="clearfloat">&nbsp;</div>
      </div>
<script language="JavaScript">
$(document).ready(function() {
	$('#frm-buscador-avanzado').hide();
	$('#frm-buscador-normal').hide();
	$('.bar').click(function(){
		var source = $(this).attr('id');
		var sourceParent = $('#'+source).parent().attr('id');
		var css = $(this).attr('class');
		if( css =='bar tit-buscador') {
			 $('#'+source).removeClass('bar tit-buscador');
	 		 $('#'+source).addClass('bar tit-buscador-selected');
		} else {
			 $('#'+source).removeClass('bar tit-buscador-selected');
			 $('#'+source).addClass('bar tit-buscador');
		}
		$.each($('.main-content').find('.toggle'), function() {
			if($(this).attr("id") != $('#'+sourceParent+' .toggle').attr('id')) {
				var divTitulo =  $(this).parent().attr('id');
				var idTitulo = $('#'+divTitulo+' .tit-buscador-selected').attr('id');
				$('#'+idTitulo).removeClass('bar tit-buscador-selected');
		 		$('#'+idTitulo).addClass('bar tit-buscador');				
				$(this).hide(500);
			} 	
		});		
		$('#'+sourceParent+' .toggle').toggle(500);
	});
});
</script>
