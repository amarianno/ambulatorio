<?php /* Smarty version Smarty-3.1.13, created on 2013-05-13 17:34:37
         compiled from "templates/relatorio_dia_atestados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1039415078518b753d0298a1-77357779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acbb52388c15e092f4713f1127d36fd4798e34bb' => 
    array (
      0 => 'templates/relatorio_dia_atestados.tpl',
      1 => 1368477185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1039415078518b753d0298a1-77357779',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_518b753d06a108_60841135',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518b753d06a108_60841135')) {function content_518b753d06a108_60841135($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados - SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="#" onsubmit="consultaAtestadoPorDia(); return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td colspan="3">
                <label for="diaRelatorio">
                    Dia/Mês/Ano
                </label>
                <input id="diaRelatorio" name="diaRelatorio"
                       type="text" value="" maxlength="8"
                       tabindex="1" width="20" required style="width: 120px;"/>
                <input type="button" tabindex="3" class="button black" value="Consultar" onclick="consultaAtestadoPorDia();"/>
                <input type="button" tabindex="3" class="button black" value="Gerar PDF para Impressão" onclick="consultaAtestadoPorDiaPDF()"/>
            </td>
        </tr>
    </table>
</form>
<span id="conteudoGrid"></span><?php }} ?>