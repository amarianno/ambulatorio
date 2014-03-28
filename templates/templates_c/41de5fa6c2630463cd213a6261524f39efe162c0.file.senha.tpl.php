<?php /* Smarty version Smarty-3.1.13, created on 2014-03-27 22:42:37
         compiled from "templates/senha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:347195334ce31c4d096-01996453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41de5fa6c2630463cd213a6261524f39efe162c0' => 
    array (
      0 => 'templates/senha.tpl',
      1 => 1395970944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '347195334ce31c4d096-01996453',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5334ce32674904_04199633',
  'variables' => 
  array (
    'txtCpf' => 0,
    'txtSenha' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5334ce32674904_04199633')) {function content_5334ce32674904_04199633($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados -SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form id="cadProcedimentoForm"
      autocomplete="off"
      method="POST"
      action="./senha.php">

    <input type="hidden" id="operacao" name="operacao" value="cadastrar">

    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td>
                <label for="txtCpf">
                    CPF<span class="req">*</span>
                </label>
                <input id="txtCpf" name="txtCpf"
                       type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtCpf']->value;?>
" maxlength="14"
                       tabindex="1" required style="width: 320px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="txtSenha">
                    Senha<span class="req">*</span>
                </label>
                <input id="txtSenha" name="txtSenha"
                       type="password" value="<?php echo $_smarty_tpl->tpl_vars['txtSenha']->value;?>
" maxlength="60"
                       tabindex="2" style="width: 320px;" />
            </td>
        </tr>
        <tr>
            <td style="text-align: left" colspan="2">
                <input type="submit" tabindex="3" class="button black" value="Gravar Registro"/>
            </td>
        </tr>
    </table>
</form>
<div id="dialog" style="display: none;">
     <?php echo $_smarty_tpl->tpl_vars['message']->value;?>

</div>
<?php if (isset($_smarty_tpl->tpl_vars['message']->value)){?>
    <script>
        $("#dialog").dialog();
    </script>
<?php }?><?php }} ?>