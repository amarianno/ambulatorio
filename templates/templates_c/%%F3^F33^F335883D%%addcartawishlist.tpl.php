<?php /* Smarty version 2.6.18, created on 2013-03-06 18:26:47
         compiled from addcartawishlist.tpl */ ?>
<div class="container">

    <form name="frmpesquisar" id="frmpesquisar" action="adicionarCartaSet.php" method="post"
          onsubmit="adicionarCartaWishlist(); return false;">
        <div id="addUma">
            <input name="nomeCartaEN" id="nomeCartaEN" type="text" placeholder="Nome da carta" size="50" value="">
            <input type="hidden" id="idset" name="idset" value="<?php echo $this->_tpl_vars['setid']; ?>
">
            <input type="hidden" id="addw" name="addw" value="<?php echo $this->_tpl_vars['addw']; ?>
">
            <input type="hidden" id="idCarta" name="idCarta" value="">
            <input type="hidden" id="tipoOperacao" name="tipoOperacao" value="1">
            <input name="btnAdicionar" type="submit" id="btnAdicionar" value="Adicionar">
        </div>

        <div id="addVarias">
            <textarea class="textareacarta" name="varias" id="varias" rows="5" cols="70"
                      placeholder="2   Vraska the Unseen"></textarea>
                    </div>

        <div id="importar">
        </div>


    </form>

    <div id="divResultados"/>

</div>