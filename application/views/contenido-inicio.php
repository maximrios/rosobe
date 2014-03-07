<!--<div class="main-content">
    <div id="tabsFAQ">
        <div id="fragment-1" class="box-normal-100">
            <section>
                <span class="ico-subtitulo mensajes-30">&nbsp;</span>
                <h2 class="fontface-arimo-subtitulo">Novedades</h2>
                <div class="clearfloat"></div>
                <div id="div-novedades-add"></div>
                <div class="clearfloat"></div>
            </section>
            <section>
                <span class="ico-subtitulo mensajes-30">&nbsp;</span>
                <h2 class="fontface-arimo-subtitulo">Preguntas Frecuenteasdasdass</h2>
                <div class="clearfloat"></div>
                <div id="div-faq-add"></div>
            </section>
        </div>
    </div>
    <div class="sidebar">
        <section class="box-normal-100">
            <span class="ico-subtitulo mensajes-30">&nbsp;</span>
            <h2 class="fontface-arimo-subtitulo">Sociales</h2>
            <div class="clearfloat"></div>
            <div id="div-novedades-add"></div>
            <div class="clearfloat"></div>
        </section>
    </div>
</div>-->
<?php
    //echo $this->session->userdata('ubicacion');

/*
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('.toolbar-icons a').on('click', function( event ) {
                    event.preventDefault();
                });
    $('.opciones').on('click', mostrar);
    function mostrar() {
        $(this).toolbar({content: '#user-options-small', position: 'top', hideOnClick: true});
    }
    //$('.opciones').toolbar({content: '#user-options-small', position: 'top', hideOnClick: true});
});
</script>
<div id="user-options-small" class="toolbar-icons" style="display: none;">
            <a href=""><i class="icon-align-left"></i></a>
            <a href=""><i class="icon-align-center"></i></a>
            <a href=""><i class="icon-align-right"></i></a>
        </div>
<?php foreach ($noticias as $noticia) { ?>
    <article class="noticia tercio">
        <h4><?php echo $noticia['nombreTipoNoticia'];?></h4>
        <h5><?php echo $noticia['tituloNoticia'];?></h5>
        <!--<a class="opciones" href="#"><i class="icon-cog"></i></a>-->
        <span><?php echo 'Publicado '.GetDateFromISO($noticia['inicioNoticia']).' por '.$noticia['nombrePersona']?></span>
        <p><?php echo html_entity_decode(recortar_texto($noticia['descripcionNoticia']));?></p>
        <a href="administrator/noticias/ver/<?=$noticia['idNoticia'];?>" class="btn btn-primary"><i class="icon-plus icon-white"></i>&nbsp;&nbsp;Ver más...</a>
    </article>
<?php } ?>



<script lang="javascript" type="text/javascript">
    $('#user-toolbar').toolbar({
        content: '#user-toolbar-options',
        position: 'right',
        hideOnClick: true,
    });
    /*$(document).ready(function() {
        $('#div-novedades-add').viaAjax({url: 'inicio/vermas/0'});
        $('#div-faq-add').viaAjax({url: 'autenticacion/faq/verPorLecturas'});
        $('#lecturas').click(function(){
            $('#div-faq-mas').viaAjax({url: 'autenticacion/faq/verPorLecturas'});
        });
        $('#temas').click(function(){
            $('#div-faq-mas').viaAjax({url: 'autenticacion/faq/verPorTemas'});
        });
    });
</script>*/
?>