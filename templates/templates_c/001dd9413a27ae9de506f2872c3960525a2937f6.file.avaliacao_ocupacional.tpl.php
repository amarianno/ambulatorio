<?php /* Smarty version Smarty-3.1.13, created on 2014-02-07 14:21:37
         compiled from "templates/avaliacao_ocupacional.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176113818952f3fa37a4d953-14622249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '001dd9413a27ae9de506f2872c3960525a2937f6' => 
    array (
      0 => 'templates/avaliacao_ocupacional.tpl',
      1 => 1391790090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176113818952f3fa37a4d953-14622249',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52f3fa37a94416_92714977',
  'variables' => 
  array (
    'txtMatricula' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f3fa37a94416_92714977')) {function content_52f3fa37a94416_92714977($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados - SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="#" onsubmit="cadastrarDoencaEncaminhamento();return false;">
    <input type="hidden" name="hidCodigo" id="hidCodigo">
    <fieldset>
        <legend>
            <b>
                Empregado
            </b>
        </legend>
        <table style="width: 100%; margin: 0 auto;" border="0">
            <tr>
                <td colspan="3">
                    Funcionário(a): <span id="nomeEmpregado"></span>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <label for="txtMatricula">
                        Matrícula <span class="req">*</span>
                    </label>
                    <input id="txtMatricula" name="txtMatricula"
                           type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtMatricula']->value;?>
" maxlength="8"
                           tabindex="1" width="20" required style="width: 120px;"
                           onblur="recuperarAvaliacaoOcupacional()"/>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>
            <b>
                Avaliação Ocupacional
            </b>
        </legend>
        <table style="width: 100%; margin: 0 auto;" border="0">
            <tr>
                <td> <br> </td>
            </tr>
            <tr>
                <td>
                    <input id="ativ_desenvolvida" name="ativ_desenvolvida" type="checkbox" value="" tabindex="2">
                    Atividade Desenvolvida
                </td>
                <td>
                    <input id="volume_trabalho" name="volume_trabalho" type="checkbox" value="" tabindex="3">
                    Volume de Trabalho
                </td>
                <td>
                    <input id="relacao_chefia" name="relacao_chefia" type="checkbox" value="" tabindex="4">
                    Relação com a chefia
                </td>
                <td>
                    <input id="relacao_colegas" name="relacao_colegas" type="checkbox" value="" tabindex="5">
                    Relação com os Colegas
                </td>
            </tr>
            <tr>
                <td>
                    <input id="dores" name="dores" type="checkbox" value="" tabindex="6">
                    Dores Musculares / Atroses
                </td>
                <td>
                    <input id="fadiga_visual" name="fadiga_visual" type="checkbox" value="" tabindex="7">
                    Fadiga Visual
                </td>
                <td>
                    <input id="tensao_emocional" name="tensao_emocional" type="checkbox" value="" tabindex="8">
                    Tensão Emocional
                </td>
                <td>
                    <input id="outros" name="outros" type="checkbox" value="" tabindex="9">
                    Outros
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>
            <b>
                História Patológica Pregressa
            </b>
        </legend>
        <table style="width: 100%; margin: 0 auto;" border="0">
            <tr>
                <td> <br> </td>
            </tr>
            <tr>
                <td>
                    <input id="infecto_contag" name="infecto_contag" type="checkbox" value="" tabindex="10">
                    Doenças Infecto-Contagiosas
                </td>
                <td>
                    <input id="endocrinas" name="endocrinas" type="checkbox" value="" tabindex="11">
                    Doenças Endócrinas
                </td>
                <td>
                    <input id="sangue_hemat" name="sangue_hemat" type="checkbox" value="" tabindex="12">
                    Doenças do Sangue / Hematopoéticas
                </td>
                <td>
                    <input id="pele" name="pele" type="checkbox" value="" tabindex="13">
                    Doenças da Pele / Celular Subcutâneo
                </td>
            </tr>
            <tr>
                <td>
                    <input id="respiratorio" name="respiratorio" type="checkbox" value="" tabindex="14">
                    Doenças do Aparelho Respiratório
                </td>
                <td>
                    <input id="circulatorio" name="circulatorio" type="checkbox" value="" tabindex="15">
                    Doenças do Aparelho Circulatório
                </td>
                <td>
                    <input id="digestivo" name="digestivo" type="checkbox" value="" tabindex="16">
                    Doenças do Aparelho Digestivo
                </td>
                <td>
                    <input id="genito_urinario" name="genito_urinario" type="checkbox" value="" tabindex="17">
                    Doenças do Aparelho Gênito-Urinário
                </td>
            </tr>
            <tr>
                <td>
                    <input id="musculo" name="musculo" type="checkbox" value="" tabindex="18">
                    Doenças Músculo-esqueléticas
                </td>
                <td>
                    <input id="sist_nervoso" name="sist_nervoso" type="checkbox" value="" tabindex="19">
                    Doenças do Sistema Nervoso
                </td>
                <td>
                    <input id="emocionais" name="emocionais" type="checkbox" value="" tabindex="20">
                    Doenças Emocionais
                </td>
                <td>
                    <input id="outras" name="outras" type="checkbox" value="" tabindex="21">
                    Outras
                </td>
            </tr>
            <tr>
                <td>
                    <input id="afast_doenca" name="afast_doenca" type="checkbox" value="" tabindex="22">
                    Afastamento por Doença
                </td>
                <td>
                    <input id="deficiencia" name="deficiencia" type="checkbox" value="" tabindex="23">
                    Portador de Deficiência
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>
            <b>
                Fatores de Risco
            </b>
        </legend>
        <table style="width: 100%; margin: 0 auto;" border="0">
            <tr>
                <td> <br> </td>
            </tr>
            <tr>
                <td>
                    Tabaco
                    <select id="tabaco" name="tabaco" tabindex="24" style="width: 170px;">
                        <option value="1" selected="selected">
                            Não
                        </option>
                        <option value="2">
                            Até 10 por dia
                        </option>
                        <option value="3">
                            De 11 a 20 por dia
                        </option>
                        <option value="4">
                            Mais de 20 por dia
                        </option>
                    </select>
                </td>
                <td>
                    Consumo de Álcool
                    <select id="alcool" name="alcool" tabindex="24" style="width: 200px;">
                        <option value="1" selected="selected">
                            Não
                        </option>
                        <option value="2">
                            Até 1x por semana
                        </option>
                        <option value="3">
                            De 1 a 2x por semana
                        </option>
                        <option value="4">
                            Mais de 2x por semana
                        </option>
                    </select>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    <input id="ativ_fisica" name="ativ_fisica" type="checkbox" value="" tabindex="25">
                    Atividade Física (Pelo menos 3x na semana)
                </td>
                <td>
                    <input id="drogas" name="drogas" type="checkbox" value="" tabindex="26">
                    Uso de outras drogas (exceto álcool)
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    <input id="hipert_arterial" name="hipert_arterial" type="checkbox" value="" tabindex="27">
                    Hipertensão Arterial
                </td>
                <td>
                    PA:
                    <input id="pa" name="pa" type="text" value="" tabindex="28" size="10"> mm HG
                </td>
                <td>

                    FC
                    <input id="fc" name="fc" type="text" value="" tabindex="29" size="10">
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    Peso
                    <input id="peso" name="peso" type="text" value="" tabindex="30" size="10" onblur="calculaImc()">
                </td>
                <td>
                    Altura
                    <input id="altura" name="altura" type="text" value="" tabindex="31" size="10" onblur="calculaImc()">
                </td>
                <td>
                    IMC
                    <input id="imc" name="imc" type="text" value="" tabindex="32" size="10">
                </td>
                <td>
                    Peso
                    <select id="peso_ideal" name="peso_ideal" tabindex="33" style="width: 200px;">
                        <option value="1">
                            Muito abaixo do peso
                        </option>
                        <option value="2">
                            Abaixo do peso
                        </option>
                        <option value="3">
                            Peso normal
                        </option>
                        <option value="4">
                            Sobrepeso
                        </option>
                        <option value="5">
                            Obesidade I
                        </option>
                        <option value="6">
                            Obesidade II (severa)
                        </option>
                        <option value="7">
                            Obesidade III (mórbida)
                        </option>
                    </select>
                </td>
            </tr>
        </table>
    </fieldset>

    <table>
        <tr>
            <td style="text-align: left" colspan="2">
                <input type="button" tabindex="4" class="button black" value="Gravar Registro" onclick="cadastrarAvaliacaoOcupacional()"/>
                <input type="button" tabindex="5" class="button black" value="Limpar Campos" onclick="limparCamposAvaliacaoOcupacional()"/>
            </td>
        </tr>
    </table>
</form><?php }} ?>