<?php /* Smarty version Smarty-3.1.13, created on 2013-03-13 11:03:17
         compiled from "templates/addcartawishlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8545929305140b1558f9897-99721864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3a774f6a73702b27c8b017e11dfa75ddd2c4ea8' => 
    array (
      0 => 'templates/addcartawishlist.tpl',
      1 => 1362619570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8545929305140b1558f9897-99721864',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'setid' => 0,
    'addw' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5140b15593c403_64230659',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5140b15593c403_64230659')) {function content_5140b15593c403_64230659($_smarty_tpl) {?><div class="container">

    <form name="frmpesquisar" id="frmpesquisar" action="adicionarCartaSet.php" method="post"
          onsubmit="adicionarCartaWishlist(); return false;">
        <div id="addUma">
            <input name="nomeCartaEN" id="nomeCartaEN" type="text" placeholder="Nome da carta" size="50" value="">
            <input type="hidden" id="idset" name="idset" value="<?php echo $_smarty_tpl->tpl_vars['setid']->value;?>
">
            <input type="hidden" id="addw" name="addw" value="<?php echo $_smarty_tpl->tpl_vars['addw']->value;?>
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

</div><?php }} ?>