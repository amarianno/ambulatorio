<?php /* Smarty version Smarty-3.1.13, created on 2013-03-13 11:03:17
         compiled from "templates/exibe_wishlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6501471805140b155803045-35839090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd216cf94b6fbd1838ba0d75b00f9c3b4273b440e' => 
    array (
      0 => 'templates/exibe_wishlist.tpl',
      1 => 1362616547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6501471805140b155803045-35839090',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'titulo' => 0,
    'cartas' => 0,
    'qtdw' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5140b1558ed341_92605839',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5140b1558ed341_92605839')) {function content_5140b1558ed341_92605839($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Wishlist"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("addcartawishlist.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="container">
    <table width="80%" border="0" cellspacing="0" align="center">
        <tr>
            <td width="100%" colspan="5" align="left">
                <span class="texto_titulo"> Wishlist -> <?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</span>
            </td>
        </tr>
        <tr>
            <td width="3%" align="left" colspan="1"  id="qtdw">Qtde</td>
            <td width="25%" align="left" colspan="1"  id="nome">Carta</td>
            <td width="25%" align="left" colspan="1"  id="preco">Edição</td>
        </tr>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['cartas']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
            <tr>
                <td width="3%" colspan="1" align="left">
                    <span class="texto_fonte"><?php echo $_smarty_tpl->tpl_vars['qtdw']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</span>
                </td>
                <td width="25%" colspan="1" align="left">
                    <span class="texto_fonte"><?php echo $_smarty_tpl->tpl_vars['cartas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->getNome();?>
</span>
                </td>
                <td width="25%" colspan="1" align="left">
                    <span class="texto_fonte"><?php echo $_smarty_tpl->tpl_vars['cartas']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->getEdicao();?>
</span>
                </td>
            </tr>
        <?php endfor; endif; ?>
    </table>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>