<?php /* Smarty version 2.6.18, created on 2013-04-08 10:25:38
         compiled from wishlist.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => "Buscartas - Minhas Wishlists")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu_top_2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="center">

    <input type="hidden" id="deckOrWish" name="deckOrWish" value="w">
    <div id="exibicaoDeDecks" class="one-fourth">
        <h2>Wishlists</h2>
        <span id="novoDeck" class="button black small">NOVO</span>

        <div id="listaDeDecks">
            <?php echo $this->_tpl_vars['meusDecks']; ?>

        </div>
    </div>

    <div id="textoDeck" class="three-fourth last">
        <h6>Escolha uma das suas wishlists para editar ou crie uma nova.</h6>
    </div>

    <div id="exibeDeck" class="three-fourth last" style="display: none;">
        <div id="nomeDeck"></div>

        <div id='divAdicionarCartaIndividual' style='display: none;'>
            <form id='adicionarCartaDeckForm'>
                <input type='text' placeholder='Digite o nome da carta...' id='nomeCartaEN'>
                <input type='text' placeholder='#' id='qtdeAdd' value="1" maxlength="2"  class='numerico'>

                <a href='javascript:void(0);' onclick="addCardDeck($('#idDeckTela').val(), $('#idCarta').val(), 'd'); return false"
                   class='button black'>Adicionar</a>

                <input type="hidden" name="nomeCartaPT" id="nomeCartaPT">
                <input type="hidden" name="idCarta" id="idCarta">
                <input type="hidden" name="idDeckTela" id="idDeckTela">
                <input type="hidden" name="edition_code" id="edition_code">
                <input type="hidden" name="cartaNum" id="cartaNum">
            </form>
        </div>

        <div id="meuDeckMainESide"></div>
    </div>

    <!-- DIALOG ADD DECK -->
    <div id="dialogAddNovoDeck" title="Criar uma nova wishlist" style="display: none">
        <form id="addForm">
            <label for="deckNome">Nome:</label>
            <br>
            <input type="text" id="deckNome" placeholder="digite o nome para o novo deck">
            <br>
            <br>
            <span class="button black" onclick="addNovoDeck();">CRIAR</span>
        </form>
    </div>
    <!-- DIALOG IMPORT DECK -->
    <div id="dialogImportDeck" title="Criar uma nova wishlist" style="display: none">
        <form id="importForm">
            <label for="siteImport">Escolha o site:</label>
            <select id="siteImport">
                <option value="deckbox" selected="selected">Deckbox</option>
                <option value="mtgdeckbuilder">MTG Deck Builder</option>
            </select>
            <br>
            <label for="deckID">ID:</label>
            <input type="text" id="deckID" placeholder="digite o id do deck" class="numerico">
            <br>
            <br>
            <span class="button black" onclick="importDeck();">IMPORTAR</span>
        </form>
    </div>
    <!-- DIALOG EDIT DECK -->
    <div id="dialogEdtDeck" title="Editar Nome da wishlist" style="display: none">
        <form id="edtForm">
            <label for="deckNome">Nome:</label>
            <br>
            <input type="text" id="edtdeckNome">
            <input type="hidden" id="edtIdDeck">
            <br>
            <br>
            <span class="button black" onclick="editarNomeDeck();">ALTERAR</span>
        </form>
    </div>
    <div id="dialog-confirm"></div>

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>