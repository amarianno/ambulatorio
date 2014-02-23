<?php /* Smarty version Smarty-3.1.13, created on 2014-02-23 14:29:49
         compiled from "templates/proc_medico_periodo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1336985937530a300d8c0727-10335696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2c305fbae25652c6ff0ac0a788b1cf1f9da360b' => 
    array (
      0 => 'templates/proc_medico_periodo.tpl',
      1 => 1393176059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1336985937530a300d8c0727-10335696',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_530a300d93e9d1_24247951',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_530a300d93e9d1_24247951')) {function content_530a300d93e9d1_24247951($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados - SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="#" onsubmit="consultaCIDPorMes(); return false;">

    <fieldset>
        <table style="width: 70%; margin: 0 auto;" border="0">
            <tr>
                <legend>
                    <b>
                        Período Procedimentos médicos / Enfermagem
                    </b>
                </legend>
                <td>
                    <label for="dtRelatorioIni">
                        De
                    </label>
                    <input id="dtRelatorioIni" name="dtRelatorioIni"
                           type="text" value="" maxlength="10"
                           tabindex="1" width="20" required style="width: 120px;"/>
                </td>
                <td>

                    <label for="dtRelatorioFIM">
                        Até
                    </label>
                    <input id="dtRelatorioFIM" name="dtRelatorioFIM"
                           type="text" value="" maxlength="10"
                           tabindex="2" width="20" required style="width: 120px;"/>
                </td>
            </tr>
        </table>
    </fieldset>

    <input type="button" tabindex="4" class="button black" value="Consultar" onclick="consultarProcedimentoEnfermagem();"/>
    <input type="button" tabindex="5" class="button black" value="Gerar PDF para Impressão" onclick="consultarProcedimentoEnfermagemPDF()"/>
</form>
<span id="conteudoGrid"></span>




<?php }} ?>