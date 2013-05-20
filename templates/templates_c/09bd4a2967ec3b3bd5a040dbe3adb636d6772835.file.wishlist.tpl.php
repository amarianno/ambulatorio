<?php /* Smarty version Smarty-3.1.13, created on 2013-04-25 10:19:35
         compiled from "templates/wishlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16277978425140b14d726151-08774583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09bd4a2967ec3b3bd5a040dbe3adb636d6772835' => 
    array (
      0 => 'templates/wishlist.tpl',
      1 => 1366906763,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16277978425140b14d726151-08774583',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5140b14d88c476_30512839',
  'variables' => 
  array (
    'meusDecks' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5140b14d88c476_30512839')) {function content_5140b14d88c476_30512839($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Buscartas - Minhas Wishlists"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top_2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="center">

    <input type="hidden" id="deckOrWish" name="deckOrWish" value="w">
    <div id="exibicaoDeDecks" class="one-fourth">
        <h2>Wishlists</h2>
        <span id="novoDeck" class="button black small">NOVO</span>

        <div id="listaDeDecks">
            <?php echo $_smarty_tpl->tpl_vars['meusDecks']->value;?>

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

                <a href='javascript:void(0);' onclick="addCardDeck($('#idDeckTela').val(), $('#idCarta').val(), 'w'); return false"
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

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>