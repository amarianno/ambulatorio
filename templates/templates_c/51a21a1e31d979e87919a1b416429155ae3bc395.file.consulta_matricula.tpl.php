<?php /* Smarty version Smarty-3.1.13, created on 2013-05-08 14:11:35
         compiled from "templates/consulta_matricula.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3849154955182ac12c28716-64454495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51a21a1e31d979e87919a1b416429155ae3bc395' => 
    array (
      0 => 'templates/consulta_matricula.tpl',
      1 => 1368033093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3849154955182ac12c28716-64454495',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5182ac12cbc624_97087638',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5182ac12cbc624_97087638')) {function content_5182ac12cbc624_97087638($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados -SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form onsubmit="consultaPorMatricula();return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td>
                Funcionário(a): <span id="nomeEmpregado"></span>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <label for="txtMatricula">
                    Matrícula
                </label>
                <input id="txtMatricula" name="txtMatricula"
                       type="text" value="" maxlength="8"
                       tabindex="2" width="20" required style="width: 120px;"/>
                <input type="button" tabindex="3" class="button black" value="Consultar" onclick="consultaPorMatricula();"/>
            </td>
        </tr>
    </table>
</form>
<span id="conteudoGrid"></span><?php }} ?>