<?php /* Smarty version Smarty-3.1.13, created on 2013-04-23 07:23:56
         compiled from "templates/altpass.tpl" */ ?>
<?php /*%%SmartyHeaderCode:450355174513f8f0e3d7952-44064102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86c4dde13823d8c1b43cf20557c084c1e4314768' => 
    array (
      0 => 'templates/altpass.tpl',
      1 => 1366723426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '450355174513f8f0e3d7952-44064102',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_513f8f0e4bb332_96346817',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_513f8f0e4bb332_96346817')) {function content_513f8f0e4bb332_96346817($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Buscartas - alterar senha"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top_2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="centerDiv">
    <form id="altPassForm" autocomplete="off" method="post" novalidate action="../altpass.php">

        <div class="center">

            <h2>Alterar senha</h2>

            <?php echo $_smarty_tpl->getSubTemplate ("mensagem_ajax.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


            <table style="width: auto; margin: 0 auto;">
                <!-- SENHA ATUAL -->
                <tr>
                    <td>
                        <label for="txtSenhaAtual">
                            Senha atual <span class="req">*</span>
                        </label>
                        <input id="txtSenhaAtual" name="txtSenhaAtual" type="password"
                               size="20" maxlength="20" tabindex="8" required/>
                    </td>
                </tr>
                <!-- NOVA SENHA -->
                <tr>
                    <td colspan="2">
                        <label for="txtSenha">
                            Nova senha <span class="req">*</span>
                        </label>
                        <input id="txtSenha" name="txtSenha" type="password" size="20"
                               maxlength="20" tabindex="8" required/>
                    </td>
                </tr>
                <!-- NOVA SENHA - REPETIR -->
                <tr>
                    <td colspan="2">
                        <label for="txtConfirmaSenha">
                            Repetir a nova senha <span class="req">*</span>
                        </label>
                        <input id="txtConfirmaSenha" name="txtConfirmaSenha" type="password"
                               size="20" maxlength="20" tabindex="9" required/>
                    </td>
                </tr>

                <!-- SALVAR -->
                <tr>
                    <td style="text-align: center" colspan="2">
                        <span id="btnSalvar" onclick="$(this).parents('form').submit(); return false;"
                           class="button black">
                            Alterar Senha
                        </span>
                        <input name="cad" type="hidden" id="cad" value="1">
                    </td>
                </tr>
            </table>

        </div>
    </form>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>