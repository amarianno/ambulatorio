<?php /* Smarty version Smarty-3.1.13, created on 2013-11-06 14:52:30
         compiled from "templates/consulta_inss.tpl" */ ?>
<?php /*%%SmartyHeaderCode:650483173527a73ce8dd840-16787449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8612415e0dbb7dbdbad11213a6bc74d1c814b596' => 
    array (
      0 => 'templates/consulta_inss.tpl',
      1 => 1383756530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '650483173527a73ce8dd840-16787449',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_527a73ce92ce17_97763252',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_527a73ce92ce17_97763252')) {function content_527a73ce92ce17_97763252($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados - SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="#" onsubmit="consultaAtestadosLicencaINSS(); return false;">
    <table style="width: 100%; margin: 0 auto;" border="0">
        <tr>
            <td colspan="3">
                <label for="dataInicial" style="display: inline">
                    Data Inicial
                </label>
                <input id="dataInicial" name="dataInicial"
                       type="text" value="" maxlength="8"
                       tabindex="1" width="20" required style="width: 120px;"/>
                <label for="dataFinal" style="display: inline">
                    Data Final
                </label>
                <input id="dataFinal" name="dataFinal"
                       type="text" value="" maxlength="8"
                       tabindex="1" width="20" required style="width: 120px;"/>
                <input type="button" tabindex="3" class="button black" value="Consultar" onclick="consultaAtestadosLicencaINSS();"/>
            </td>
        </tr>
    </table>
</form>
<span id="conteudoGrid"></span><?php }} ?>