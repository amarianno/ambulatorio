<?php /* Smarty version 2.6.18, created on 2013-02-25 18:35:49
         compiled from addcarta.tpl */ ?>
<div align="center">

    <form name="frmpesquisar" id="frmpesquisar" action="adicionarCartaSet.php" method="post"
          onsubmit="adicionarCarta(); return false;">
        <input name="nomeCartaEN" id="nomeCartaEN" type="text" placeholder="Nome da carta" size="50" value="">
        <input type="hidden" id="idset" name="idset" value="<?php echo $this->_tpl_vars['setid']; ?>
">
        <input type="hidden" id="addw" name="addw" value="<?php echo $this->_tpl_vars['addw']; ?>
">
        <input type="hidden" id="idCarta" name="idCarta" value="">
        <input name="btnAdicionar" type="submit" id="btnAdicionar" value="Adicionar">
    </form>

    <div id="divResultados"/>

</div>