<?php /* Smarty version Smarty-3.1.13, created on 2014-01-28 16:46:40
         compiled from "templates/periodico_atraso.tpl" */ ?>
<?php /*%%SmartyHeaderCode:132885350452e7fb10341c82-26044140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '627a68556a981274e5495f7772db641c0354af45' => 
    array (
      0 => 'templates/periodico_atraso.tpl',
      1 => 1390934588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132885350452e7fb10341c82-26044140',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52e7fb103b8f57_92855407',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e7fb103b8f57_92855407')) {function content_52e7fb103b8f57_92855407($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados - SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="#" onsubmit="consultaEmpregadosAtrasados(); return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td>
                <label for="selEmpresa">
                    Empresa
                </label>
                <select id="selEmpresa" name="selEmpresa" tabindex="1">
                    <option value="1" selected="selected">
                        SOCORRO
                    </option>
                    <option value="2">
                        LUZ
                    </option>
                    <option value="3">
                        EXTERNO
                    </option>
                </select>
            </td>
            <td>
                <input type="button" tabindex="2" class="button black" value="Consultar" onclick="consultaEmpregadosAtrasados();"/>
            </td>
        </tr>
    </table>
</form>
<span id="conteudoGrid"></span><?php }} ?>