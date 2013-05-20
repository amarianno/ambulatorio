<?php /* Smarty version Smarty-3.1.13, created on 2013-04-22 13:22:54
         compiled from "templates/deck.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20868399051758e0e7271f5-85057145%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03f314da218873231bb12bc1eb7e5cf820ae7a8b' => 
    array (
      0 => 'templates/deck.tpl',
      1 => 1365452208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20868399051758e0e7271f5-85057145',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'meusDecks' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51758e0e7f7341_78994285',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51758e0e7f7341_78994285')) {function content_51758e0e7f7341_78994285($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Buscartas - meus decks"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top_2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="center">

    <input type="hidden" id="deckOrWish" name="deckOrWish" value="d">
    <div id="exibicaoDeDecks" class="one-fourth">
        <h2>Decks</h2>
        <span id="novoDeck" class="button black small">NOVO</span>
        <span id="importarDeck" class='button black small'>IMPORTAR</span>

        <div id="listaDeDecks">
            <?php echo $_smarty_tpl->tpl_vars['meusDecks']->value;?>

        </div>
    </div>

    <div id="textoDeck" class="three-fourth last">
        <h6>Escolha um de seus decks para editar ou crie um novo.</h6>
    </div>

    <div id="exibeDeck" class="three-fourth last" style="display: none;">
        <div id="nomeDeck"></div>

        <div id='divAdicionarCartaIndividual' style='display: none;'>
            <form id='adicionarCartaDeckForm'>
                <input type='text' placeholder='Digite o nome da carta...' id='nomeCartaEN'>
                <input type='text' placeholder='#' id='qtdeAdd' value="1" maxlength="2"  class='numerico'>
                <input type='checkbox' id='sideAdd' value='s'> Sideboard

                <a href='javascript:void(0);' onclick="addCardDeck($('#idDeckTela').val(), $('#idCarta').val(), $('#sideAdd:checked').length ? 's' : 'd'); return false"
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

    <!-- DIALOG EXPORT DECK -->
    <div id="dialogExportDeck" title="Exportar deck" style="display: none">
        <form id="exportForm" action="exportar.php" target="_blank" method="post">
            <label for="typeExport">Escolha o tipo de exportação:</label>
            <select name="typeExport" id="typeExport">
                <option value="txt" selected="selected">para impressão</option>
                <option value="forge">formato do Forge</option>
            </select>
            <br>
            <input type="hidden" name="idDeckExport" id="idDeckExport" value="537">
            <br>
            <br>
            <span class="button black" onclick="$('#exportForm').submit(); $('#dialogExportDeck').dialog('close'); return false;">EXPORTAR</span>
        </form>
    </div>
    <!-- DIALOG ADD DECK -->
    <div id="dialogAddNovoDeck" title="Criar novo deck" style="display: none">
        <form id="addForm">
            <label for="deckNome">Nome: </label>
            <input type="text" id="deckNome" placeholder="digite o nome para o novo deck">
            <br>
            <br>
            <span class="button black" onclick="addNovoDeck();">CRIAR</span>
        </form>
    </div>
    <!-- DIALOG IMPORT DECK -->
    <div id="dialogImportDeck" title="Criar novo deck" style="display: none">
        <form id="importForm">
            <label for="siteImport">Escolha o site:</label>
            <select id="siteImport">
                <option value="deckbox" selected="selected">Deckbox</option>
                <option value="mtgdeckbuilder">MTG Deck Builder</option>
            </select>
            <br>
            <label for="deckID">ID: </label>
            <input type="text" id="deckID" placeholder="digite o id do deck" class="numerico">
            <br>
            <br>
            <span class="button black" onclick="importDeck();">IMPORTAR</span>
        </form>
    </div>
    <!-- DIALOG EDIT DECK -->
    <div id="dialogEdtDeck" title="Renomear deck" style="display: none">
        <form id="edtForm">
            <label for="deckNome">Nome:</label>
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