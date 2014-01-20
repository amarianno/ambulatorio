<?php /* Smarty version Smarty-3.1.13, created on 2014-01-16 16:48:23
         compiled from "templates/planejamento_periodicos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52540185352d4f742913431-89111560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9607cfcc74821daa2d384e112ea07d9634cfa2de' => 
    array (
      0 => 'templates/planejamento_periodicos.tpl',
      1 => 1389897806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52540185352d4f742913431-89111560',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52d4f7429552a5_22272825',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d4f7429552a5_22272825')) {function content_52d4f7429552a5_22272825($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados - SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="#" onsubmit="return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td colspan="3">
                <label for="selMes">
                    Mês
                </label>
                <select id="selMes" name="selMes" tabindex="1">
                    <option value="" selected="selected">
                        ---
                    </option>
                    <option value="1">
                        JANEIRO
                    </option>
                    <option value="2">
                        FEVEREIRO
                    </option>
                    <option value="3">
                        MARÇO
                    </option>
                    <option value="4">
                        ABRIL
                    </option>
                    <option value="5">
                        MAIO
                    </option>
                    <option value="6">
                        JUNHO
                    </option>
                    <option value="7">
                        JULHO
                    </option>
                    <option value="8">
                        AGOSTO
                    </option>
                    <option value="9">
                        SETEMBRO
                    </option>
                    <option value="10">
                        OUTUBRO
                    </option>
                    <option value="11">
                        NOVEMBRO
                    </option>
                    <option value="12">
                        DEZEMBRO
                    </option>
                </select>
            </td>
            <td>
                <label for="txtMatricula">
                    Matrícula
                </label>
                <input id="txtMatricula" name="txtMatricula"
                       type="text" maxlength="8"
                       tabindex="2" width="20 style="width: 120px;" />
            </td>
            <td>
                <label for="selEmpresa">
                    Empresa
                </label>
                <select id="selEmpresa" name="selEmpresa" tabindex="3">
                    <option value="1" selected="selected">
                        SOCORRO
                    </option>
                    <option value="2">
                        LUZ
                    </option>
                </select>
            </td>
            <td>
                <input type="button" tabindex="4" class="button black" value="Consultar" onclick="consultaEmpregadosPlanejamentoPorMes();"/>
            </td>
        </tr>
    </table>
    <span id="conteudoGrid"></span>
</form>
<?php }} ?>