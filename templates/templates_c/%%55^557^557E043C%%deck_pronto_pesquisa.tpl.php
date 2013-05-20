<?php /* Smarty version 2.6.18, created on 2013-04-20 04:34:09
         compiled from deck_pronto_pesquisa.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => "Buscartas - Visualizar Deck")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu_top_2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="searchform">

    <h6 class="line-divider">
        Busque decks que contenham a carta desejada
        <br/>
        <span style='font-size: 14px'>Também é possível limitar um valor máximo para o deck</span>
    </h6>

    <form id="contactForm" action="deckProntoSearch.php" method="post"
          onsubmit="buscarDeck(); return false;">
        <div class="center">
            <input name="nomeCartaEN" id="nomeCartaEN" type="text" placeholder="Nome da carta" size="50">
            <input name="valorMaximo" id="valorMaximo" type="text" placeholder="R$ máx." size="6">
            <input type="hidden" id="idCarta" name="idCarta">
            <span id="btnBuscar" onclick="$(this).parents('form').submit();" class="button black">
                Buscar
            </span>
        </div>
    </form>

    </br>

    <div id="divResultados"/>

    <div>
        <?php echo $this->_tpl_vars['deckDetalharHtml']; ?>

    </div>

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>