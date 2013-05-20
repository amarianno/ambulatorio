<?php /* Smarty version 2.6.18, created on 2013-04-13 05:58:36
         compiled from search.tpl */ ?>
<div class="searchform">

    <form id="formBusca" action="cardSearch.php" method="post"
          onsubmit="setarCampos(); return false;">

        <div class="center">

            <img id="logo_buscartas" src="include/img/logo/logo.png"/>
            <br>

            <input type="text" name="nomeCartaEN" id="nomeCartaEN" placeholder="Digite o nome da carta...">

            <span id="g-search-button"></span>
            <br id="br_pesquisa">

            <div class="center" id="botoesBuscar">
                <span onclick="$(this).parents('form').submit();" class="button black"
                   id="btnBuscarCarta">Buscar</span>
                <span class="button black" id="sitesParserLink">Configurar</span>
            </div>

            <input type="hidden" name="nomeCartaPT" id="nomeCartaPT">
            <input type="hidden" name="idCarta" id="idCarta">
            <input type="hidden" name="edition_code" id="edition_code">
            <input type="hidden" name="cartaNum" id="cartaNum">

            <div id="sitesParserBox" style="display: none">
                <?php echo $this->_tpl_vars['parsers']; ?>

            </div>
        </div>

    </form>
</div>

<div id="divResultado">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "resultado_busca.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>


<!--
<script type="text/javascript"><!--
    google_ad_client = "ca-pub-4352233980183823";
    /* buscasrtas */
    google_ad_slot = "1555924570";
    google_ad_width = 728;
    google_ad_height = 90;
    //-->
<!--
</script>
<script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>   -->