<?php /* Smarty version 2.6.18, created on 2013-04-16 12:43:36
         compiled from resultado_busca_url.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => $this->_tpl_vars['title_card_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu_top_2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if (isset ( $this->_tpl_vars['cartasSimilares'] )): ?>
    <div id="divResultado">
        <?php echo $this->_tpl_vars['cartasSimilares']; ?>

    </div>
<?php else: ?>
    <div id="dadosCarta" class='one-fourth'>
        <a href='<?php echo $this->_tpl_vars['caminho_imagem_carta_full']; ?>
' class="highslide" onclick="return hs.expand(this)">
            <img src='<?php echo $this->_tpl_vars['caminho_imagem_carta']; ?>
' width='170px' height='235px' style='display: block; margin: 0 auto;'/>
        </a>
        <ul id='add' class='add-menu'>
            <li>
                <span id='btnRuling' class='button black menu_button small' onclick="showDetails();">Detalhes</span>
            </li>
            <?php echo $this->_tpl_vars['botoes_adicionar']; ?>

        </ul>
    </div>
    <div id='resultadosBusca' class='three-fourth last'>
        <h6 class='line-divider'><?php echo $this->_tpl_vars['resultado_titulo']; ?>
</h6>
        <span class='subtitulo'>
            <?php echo $this->_tpl_vars['resultado_sub_titulo']; ?>

            <span class='ordenacao'>
                Ordenado por:
                <select id="selectOrdenacao" class='ordenacao' onclick="ordenar();">
                    <option value="REL">Relevância</option>
                    <option value="QTD">Quantidade</option>
                    <option value="P-ASC">Menor preço</option>
                    <option value="P-DSC">Maior preço</option>
                </select>
            </span>
        </span>
        <table id='resultado_busca'>
            <thead>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th class='invisivel'></th>
            </tr>
            </thead>
            <tbody>
            <?php echo $this->_tpl_vars['resultado_busca']; ?>

            </tbody>
        </table>
    </div>
<?php endif; ?>


<div id='decks_top'>
    <?php echo $this->_tpl_vars['decks_top_8']; ?>

</div>

<div id='dialogDetalhes' title='Regras' style="display: none">
    <?php echo $this->_tpl_vars['dialog_detalhes']; ?>

</div>

<div id='dialogAddDeckd' title='Adicionar à um Deck' style="display: none">
    <?php echo $this->_tpl_vars['dialog_deck']; ?>

</div>

<div id='dialogAddDeckw' title='Adicionar à uma WishList' style="display: none">
    <?php echo $this->_tpl_vars['dialog_wishlist']; ?>

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>