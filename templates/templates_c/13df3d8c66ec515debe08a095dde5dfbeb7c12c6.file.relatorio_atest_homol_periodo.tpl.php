<?php /* Smarty version Smarty-3.1.13, created on 2013-05-13 17:35:24
         compiled from "templates/relatorio_atest_homol_periodo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1500291812518d1bf2581bd5-03091464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13df3d8c66ec515debe08a095dde5dfbeb7c12c6' => 
    array (
      0 => 'templates/relatorio_atest_homol_periodo.tpl',
      1 => 1368477244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1500291812518d1bf2581bd5-03091464',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_518d1bf263d3f4_79811212',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_518d1bf263d3f4_79811212')) {function content_518d1bf263d3f4_79811212($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados - SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="#" onsubmit="consultaAtestadosHomologadosPorPeriodo(); return false;">
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
                <input type="button" tabindex="3" class="button black" value="Consultar" onclick="consultaAtestadosHomologadosPorPeriodo();"/>
                <input type="button" tabindex="3" class="button black" value="Gerar PDF para Impressão" onclick="consultaAtestadosHomologadosPorPeriodoPDF()"/>
            </td>
        </tr>
    </table>
</form>
<span id="conteudoGrid"></span><?php }} ?>