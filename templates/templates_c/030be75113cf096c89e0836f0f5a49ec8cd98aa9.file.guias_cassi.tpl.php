<?php /* Smarty version Smarty-3.1.13, created on 2013-11-22 11:09:11
         compiled from "templates/guias_cassi.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7808370165194c7dabec415-62496779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '030be75113cf096c89e0836f0f5a49ec8cd98aa9' => 
    array (
      0 => 'templates/guias_cassi.tpl',
      1 => 1385125339,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7808370165194c7dabec415-62496779',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5194c7db3fe0f9_71422767',
  'variables' => 
  array (
    'txtMatricula' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5194c7db3fe0f9_71422767')) {function content_5194c7db3fe0f9_71422767($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados - SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="#" onsubmit="gerarGuia();return false;">
    <fieldset>
        <legend>
            <b>
                Dados do Relatório
            </b>
        </legend>
        <table style="width: 100%; margin: 0 auto;" border="0">
            <tr>
                <td colspan="3">
                    Funcionário(a): <span id="nomeEmpregado"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="txtMatricula">
                        Matrícula <span class="req">*</span>
                    </label>
                    <input id="txtMatricula" name="txtMatricula"
                           type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtMatricula']->value;?>
" maxlength="8"
                           tabindex="1" width="20" required style="width: 120px;"
                            onblur="completaCopyPaste()"/>
                </td>
                <td>
                    UF <br>
                    <select id="selUf" name="selUf" tabindex="2" style="width: 140px;">
                        <option value="SP" selected="selected">
                            SÃO PAULO
                        </option>
                    </select>
                </td>
                <td>
                    Caráter de Solicitação <br>
                    <select id="selCaraterSol" name="selCaraterSol" tabindex="3" style="width: 250px;">
                        <option value="E" selected="selected">
                            ELETIVA
                        </option>
                        <option value="U">
                            URGÊNCIA / EMERGÊNCIA
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="txtCID">
                        CID
                    </label>
                    <input id="txtCID" name="txtCID"
                           type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtMatricula']->value;?>
" maxlength="5"
                           tabindex="4" width="30" style="width: 120px;"/>
                </td>
                <td>
                    <label for="txtIndClicina">
                        Indicação Clínica
                    </label>
                    <input id="txtIndClicina" name="txtIndClicina"
                           type="text" value="" maxlength="30"
                           tabindex="5" width="30" style="width: 120px;"/>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>
            <b>
                Procedimentos e exames solicitados
            </b>
        </legend>
        <table style="width: 100%; margin: 0 auto;" border="0">
            <tr>
                <td>
                    Grupo de Exames:
                </td>
                <td>
                    <select id="selGrupoExames" name="selGrupoExames" tabindex="6" style="width: 120px;" onchange="marcarExames()">
                        <option value="0" selected="selected">
                            ---
                        </option>
                        <option value="1">
                            Grupo 1
                        </option>
                        <option value="2">
                            Grupo 2
                        </option>
                        <option value="3">
                            Grupo 3
                        </option>
                        <option value="4">
                            Grupo 4
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td> <br> </td>
            </tr>
            <tr>
                <td>
                    <input id="chkHemogramaCompleto" name="Hemograma Completo" type="checkbox" value="0.096.03.0186" tabindex="7">
                    Hemograma Completo
                </td>
                <td>
                    <input id="chkGlicoseJejum" name="Glicose Jejum" type="checkbox" value="0.096.03.0046" tabindex="8">
                    Glicose Jejum
                </td>
                <td>
                    <input id="chkRotinaUrina" name="Rotina de Urina" type="checkbox" value="0.096.03.0267" tabindex="9">
                    Rotina de Urina
                </td>
                <td>
                    <input id="chkCreatinina" name="Creatinina" type="checkbox" value="0.096.03.0194" tabindex="10">
                    Creatinina
                </td>
            </tr>
            <tr>
                <td>
                    <input id="chkTrigliceris" name="Triglicerides" type="checkbox" value="0.096.03.0216" tabindex="11">
                    Triglicérides
                </td>
                <td>
                    <input id="chkAcidoUrico" name="Acido Urico" type="checkbox" value="0.096.03.0208" tabindex="12">
                    Ácido Úrico
                </td>
                <td>
                    <input id="chkTsh" name="TSH" type="checkbox" value="0.096.03.0510" tabindex="13">
                    TSH
                </td>
                <td>
                    <input id="chkT4livre" name="T4 Livre" type="checkbox" value="0.096.03.0530" tabindex="14">
                    T4 Livre
                </td>
            </tr>
            <tr>
                <td>
                    <input id="chkColesterolTotal" name="Colesterol Total" type="checkbox" value="0.096.03.0062" tabindex="15">
                    Colesterol Total
                </td>
                <td>
                    <input id="chkColesterolHDL" name="Colesterol – HDL" type="checkbox" value="0.096.03.0038" tabindex="16">
                    Colesterol – HDL
                </td>
                <td>
                    <input id="chkPSA" name="PSA" type="checkbox" value="0.096.03.00054" tabindex="17">
                    PSA
                </td>
                <td>
                    <input id="chkOftalmologista" name="Consulta com o oftalmologista" type="checkbox" value="0.096.03.0160" tabindex="18">
                    Consulta com o oftalmologista
                </td>
            </tr>
            <tr>
                <td>
                    <input id="chkTonometriaBinocular" name="Tonometria - binocular" type="checkbox" value="0.096.03.0240" tabindex="19">
                    Tonometria -binocular
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
        </table>
    </fieldset>
    <table>
        <tr>
            <td style="text-align: left" colspan="2">
                <input type="button" tabindex="13" class="button black" value="Gerar Guia" onclick="gerarGuia()"/>
            </td>
        </tr>
    </table>
</form><?php }} ?>