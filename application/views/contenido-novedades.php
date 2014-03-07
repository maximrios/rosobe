<div class="main-content">
    <section class="box-normal-100">
        <article class="noticias-home">
            <div style="padding: 0px 48px;">
                <p class="texto-descripciones"><?=GetDateFromISO($itemNovedad['tsFechaInicio'])?><br />&nbsp;</p>
            </div>
            <span class="ico-subtitulo mensajes-40">&nbsp;</span>
            <h3><?=$itemNovedad['vcNovTitulo']?></h3>
            <div style="padding: 0px 48px;">
                <p class="texto-descripciones" style="font-style: italic;"><?=nl2br($itemNovedad['vcNovResumen'])?><br />&nbsp;</p>
            </div>
            <p class="texto-descripciones"><?=nl2br($itemNovedad['vcNovDescripcion'])?></p>
        </article>
        <div class="clearfloat"></div>
    </section>
    <div class="clearfloat">&nbsp;</div>
</div>
<div class="sidebar">
    <section class="box-normal-100">
        <span class="ico-subtitulo mensajes-30">&nbsp;</span>
        <h2 class="fontface-arimo-subtitulo">Novedades</h2>
        <div class="clearfloat"></div>
        <div id="div-novedades-add"></div>
        <div class="clearfloat"></div>
    </section>
    <div class="clearfloat">&nbsp;</div>
</div>
<script language="JavaScript">
$(document).ready(function() {
    $('#div-novedades-add').viaAjax({url: 'inicio/vermas/0'});
});
</script>