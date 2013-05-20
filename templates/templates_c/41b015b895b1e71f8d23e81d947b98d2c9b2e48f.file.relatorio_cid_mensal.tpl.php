<?php /* Smarty version Smarty-3.1.13, created on 2013-05-08 10:57:49
         compiled from "templates/relatorio_cid_mensal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1296496137518826cf717eb2-43368279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41b015b895b1e71f8d23e81d947b98d2c9b2e48f' => 
    array (
      0 => 'templates/relatorio_cid_mensal.tpl',
      1 => 1368018218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1296496137518826cf717eb2-43368279',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_518826cf758147_02238620',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518826cf758147_02238620')) {function content_518826cf758147_02238620($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados - SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="#" onsubmit="consultaCIDPorMes(); return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td colspan="3">
                <label for="dtRelatorio">
                    Mês/Ano
                </label>
                <input id="dtRelatorio" name="dtRelatorio"
                       type="text" value="" maxlength="8"
                       tabindex="1" width="20" required style="width: 120px;"/>
                <input type="button" tabindex="3" class="button black" value="Consultar" onclick="consultaCIDPorMes();"/>
            </td>
        </tr>
    </table>
</form>
<span id="conteudoGrid"></span><?php }} ?>