<?php /* Smarty version Smarty-3.1.13, created on 2013-04-25 07:43:15
         compiled from "templates/deck_pronto_pesquisa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1623303039513f20ae4afa89-41501619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71143cb1039e7d49d6089a76747b39f5f4285c3e' => 
    array (
      0 => 'templates/deck_pronto_pesquisa.tpl',
      1 => 1366722985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1623303039513f20ae4afa89-41501619',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_513f20ae588bc9_91426518',
  'variables' => 
  array (
    'deckDetalharHtml' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_513f20ae588bc9_91426518')) {function content_513f20ae588bc9_91426518($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Buscartas - Visualizar Deck"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top_2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="centerDiv">

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
        <?php echo $_smarty_tpl->tpl_vars['deckDetalharHtml']->value;?>

    </div>

</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>