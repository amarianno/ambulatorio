<?php /* Smarty version Smarty-3.1.13, created on 2013-04-25 14:09:52
         compiled from "templates/resultado_busca_url.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100177278351798d90cd9377-49145285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bde1a7ed91b6f79522b4e2322410629907007682' => 
    array (
      0 => 'templates/resultado_busca_url.tpl',
      1 => 1366137803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100177278351798d90cd9377-49145285',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title_card_name' => 0,
    'cartasSimilares' => 0,
    'caminho_imagem_carta_full' => 0,
    'caminho_imagem_carta' => 0,
    'botoes_adicionar' => 0,
    'resultado_titulo' => 0,
    'resultado_sub_titulo' => 0,
    'resultado_busca' => 0,
    'decks_top_8' => 0,
    'dialog_detalhes' => 0,
    'dialog_deck' => 0,
    'dialog_wishlist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51798d90df1a54_08099142',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51798d90df1a54_08099142')) {function content_51798d90df1a54_08099142($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>$_smarty_tpl->tpl_vars['title_card_name']->value), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top_2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if (isset($_smarty_tpl->tpl_vars['cartasSimilares']->value)){?>
    <div id="divResultado">
        <?php echo $_smarty_tpl->tpl_vars['cartasSimilares']->value;?>

    </div>
<?php }else{ ?>
    <div id="dadosCarta" class='one-fourth'>
        <a href='<?php echo $_smarty_tpl->tpl_vars['caminho_imagem_carta_full']->value;?>
' class="highslide" onclick="return hs.expand(this)">
            <img src='<?php echo $_smarty_tpl->tpl_vars['caminho_imagem_carta']->value;?>
' width='170px' height='235px' style='display: block; margin: 0 auto;'/>
        </a>
        <ul id='add' class='add-menu'>
            <li>
                <span id='btnRuling' class='button black menu_button small' onclick="showDetails();">Detalhes</span>
            </li>
            <?php echo $_smarty_tpl->tpl_vars['botoes_adicionar']->value;?>

        </ul>
    </div>
    <div id='resultadosBusca' class='three-fourth last'>
        <h6 class='line-divider'><?php echo $_smarty_tpl->tpl_vars['resultado_titulo']->value;?>
</h6>
        <span class='subtitulo'>
            <?php echo $_smarty_tpl->tpl_vars['resultado_sub_titulo']->value;?>

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
            <?php echo $_smarty_tpl->tpl_vars['resultado_busca']->value;?>

            </tbody>
        </table>
    </div>
<?php }?>






<div id='decks_top'>
    <?php echo $_smarty_tpl->tpl_vars['decks_top_8']->value;?>

</div>

<div id='dialogDetalhes' title='Regras' style="display: none">
    <?php echo $_smarty_tpl->tpl_vars['dialog_detalhes']->value;?>

</div>

<div id='dialogAddDeckd' title='Adicionar à um Deck' style="display: none">
    <?php echo $_smarty_tpl->tpl_vars['dialog_deck']->value;?>

</div>

<div id='dialogAddDeckw' title='Adicionar à uma WishList' style="display: none">
    <?php echo $_smarty_tpl->tpl_vars['dialog_wishlist']->value;?>

</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>