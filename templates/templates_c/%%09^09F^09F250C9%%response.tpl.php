<?php /* Smarty version 2.6.18, created on 2013-03-11 11:14:20
         compiled from response.tpl */ ?>
<div class="container">

    <form action="cardSearch.php" method="post" onsubmit="setarCampos(); return false;" onload="document.getElementById['nomeCartaEN'].focus();">

        <img id="logo_buscartas_peq" src="../include/ver_o_que_usa/img/logo_buscartas_m.png" style="float:left; margin-right:-346px;display: block;">
        <div id="infocards" style="float:left; margin-top:127px">

            <?php echo $this->_tpl_vars['udbvsdbudbusdv']; ?>


        </div>



        <input type="text" name="nomeCartaEN" id="nomeCartaEN" placeholder="Nome da carta" size="40">
        <input type="submit" value="Buscar" class="button orange glossy">
        <br>
        <a href="#" id="sitesParserLink">Configurar</a>
        <input type="checkbox" name="estoque" id="estoque" value="estoque" <?php echo $this->_tpl_vars['estoque']; ?>
>Com estoque?
        <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.buscartas.com.br%2F&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=583309088365300"
                scrolling="no" frameborder="0" style="border:none;
                            overflow:hidden; width:85px; height:21px;" allowTransparency="true">

        </iframe>
        <!--+1 BUTTON -->
        <div class="g-plusone" data-size="medium"></div>
        <input type="hidden" name="nomeCartaPT" id="nomeCartaPT">
        <input type="hidden" name="idCarta" id="idCarta">
        <input type="hidden" name="edition_code" id="edition_code">
        <input type="hidden" name="cartaNum" id="cartaNum">

        <br>

        <div id="sitesParserBox">
            <?php echo $this->_tpl_vars['parsers']; ?>

        </div>
    </form>

    <div id="divResultado" style="margin-left: 200px"/>

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