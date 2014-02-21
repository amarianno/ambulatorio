<?php /* Smarty version Smarty-3.1.13, created on 2014-02-19 22:52:06
         compiled from "templates/cid_por_matricula.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18138708451880403f22686-77443407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f51468ad5706f3d3c834a55df52f9c713ebc27a' => 
    array (
      0 => 'templates/cid_por_matricula.tpl',
      1 => 1390691019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18138708451880403f22686-77443407',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5188040402beb8_85292337',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5188040402beb8_85292337')) {function content_5188040402beb8_85292337($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados -SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form onsubmit="consultaCIDPorMatricula();return false;">
<table style="width: 100%; margin: 0 auto;" border="0">
    <tr>
        <td colspan="2">
            Funcionário(a): <span id="nomeEmpregado"></span>
        </td>
    </tr>
    <tr>
        <td >
            <label for="txtMatricula">
                Matrícula
            </label>
            <input id="txtMatricula" name="txtMatricula"
                   type="text" value="" maxlength="8"
                   tabindex="1" width="20" required style="width: 80%;"
                    onblur="completaCopyPaste();"/>
        </td>
        <td>
            <label for="txtCID">
                CID
            </label>
            <input id="txtCID" name="txtCID" required
                   type="text" value="" maxlength="30"
                   tabindex="2" width="20" style="width: 120px;"/>
            <input type="button" tabindex="3" class="button black" value="Consultar" onclick="consultaCIDPorMatricula();"/>
        </td>
    </tr>
</table>
</form>
<span id="conteudoGrid"></span><?php }} ?>