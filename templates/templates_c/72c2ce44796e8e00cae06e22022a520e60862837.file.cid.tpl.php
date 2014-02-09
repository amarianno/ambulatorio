<?php /* Smarty version Smarty-3.1.13, created on 2014-02-09 15:27:23
         compiled from "templates/cid.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79601463351881949c1b4f6-98383958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72c2ce44796e8e00cae06e22022a520e60862837' => 
    array (
      0 => 'templates/cid.tpl',
      1 => 1390691019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79601463351881949c1b4f6-98383958',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51881949c72eb8_73779407',
  'variables' => 
  array (
    'tela' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51881949c72eb8_73779407')) {function content_51881949c72eb8_73779407($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados -SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['tela']->value=='cad'){?>
    <form id="cadCidForm" autocomplete="off" method="POST" action="../cid.php" onsubmit="addCid();return false;">
        <table style="width: 70%; margin: 0 auto;" border="0">
            <tr>
                <td>
                    <label for="txtCID">
                        Nome<span class="req">*</span>
                    </label>
                    <input id="txtCID" name="txtCID"
                           type="text" value="" maxlength="250"
                           tabindex="1" required style="width: 320px;"
                            onblur="existeCID()"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="txtDescricao">
                        Descrição
                    </label>
                    <input id="txtDescricao" name="txtDescricao"
                           type="text" value="" maxlength="60"
                           tabindex="2" style="width: 320px;" />
                </td>
            </tr>
            <tr>
                <td style="text-align: left" colspan="2">
                    <input type="submit" tabindex="5" class="button black" value="Gravar Registro"/>
                    <input type="button" tabindex="6" class="button black" value="Limpar Campos" onclick="limparCamposCid()"/>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="cadastraOuAlterar" id="cadastraOuAlterar" value="cad" />
                </td>
                <td></td>
                <td></td>
            </tr>

        </table>
    </form>
<?php }else{ ?>
<?php }?><?php }} ?>