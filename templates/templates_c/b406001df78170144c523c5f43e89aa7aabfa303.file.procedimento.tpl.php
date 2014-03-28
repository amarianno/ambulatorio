<?php /* Smarty version Smarty-3.1.13, created on 2014-03-27 22:21:32
         compiled from "templates/procedimento.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18520156865194e5c84577d1-89258448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b406001df78170144c523c5f43e89aa7aabfa303' => 
    array (
      0 => 'templates/procedimento.tpl',
      1 => 1390691019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18520156865194e5c84577d1-89258448',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5194e5c84989d9_73977005',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5194e5c84989d9_73977005')) {function content_5194e5c84989d9_73977005($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados -SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form id="cadProcedimentoForm" autocomplete="off" method="POST" action="../procedimento.php" onsubmit="addProcedimento();return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td>
                <label for="txtCod">
                    Codigo<span class="req">*</span>
                </label>
                <input id="txtCod" name="txtCod"
                       type="text" value="" maxlength="13"
                       tabindex="1" required style="width: 320px;"
                        onblur="existeProcedimento()"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="txtDescricao">
                    Descrição<span class="req">*</span>
                </label>
                <input id="txtDescricao" name="txtDescricao"
                       type="text" value="" maxlength="60"
                       tabindex="2" style="width: 320px;" />
            </td>
        </tr>
        <tr>
            <td style="text-align: left" colspan="2">
                <input type="submit" tabindex="5" class="button black" value="Gravar Registro"/>
                <input type="button" tabindex="6" class="button black" value="Limpar Campos" onclick="limparCamposProcedimento()"/>
            </td>
        </tr>

        <tr>
            <td>
                <input type="hidden" name="hddChave" id="hddChave" value="" />
                <input type="hidden" name="cadastraOuAlterar" id="cadastraOuAlterar" value="cad" />
            </td>
            <td></td>
            <td></td>
        </tr>

    </table>
</form><?php }} ?>