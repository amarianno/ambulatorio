<?php /* Smarty version Smarty-3.1.13, created on 2013-04-22 13:22:15
         compiled from "templates/resultado_busca.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9494287625147720a5b04a5-68524728%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b2fcfdc09e2fe4579a1ee0397fa5d62d59588c7' => 
    array (
      0 => 'templates/resultado_busca.tpl',
      1 => 1366120013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9494287625147720a5b04a5-68524728',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5147720a655848_14262743',
  'variables' => 
  array (
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
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5147720a655848_14262743')) {function content_5147720a655848_14262743($_smarty_tpl) {?><div id="dadosCarta" class='one-fourth' style='display: none;'>
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

<div id='resultadosBusca' class='three-fourth last' style='display: none;'>
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






<div id='decks_top'>
    <?php echo $_smarty_tpl->tpl_vars['decks_top_8']->value;?>

</div>

<div id='dialogDetalhes' title='Detalhes' style='display: none;'>
    <?php echo $_smarty_tpl->tpl_vars['dialog_detalhes']->value;?>

</div>

<div id='dialogAddDeckd' title='Adicionar à um Deck' style='display: none'>
    <?php echo $_smarty_tpl->tpl_vars['dialog_deck']->value;?>

</div>

<div id='dialogAddDeckw' title='Adicionar à uma WishList' style='display: none'>
    <?php echo $_smarty_tpl->tpl_vars['dialog_wishlist']->value;?>

</div><?php }} ?>