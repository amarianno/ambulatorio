<?php /* Smarty version Smarty-3.1.13, created on 2014-02-24 19:40:31
         compiled from "templates/proc_medicos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137565612953094e89e29f71-43796088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e319844efd0b95c016f66e7c3c3e13bf518b9682' => 
    array (
      0 => 'templates/proc_medicos.tpl',
      1 => 1393281211,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137565612953094e89e29f71-43796088',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_53094e89e68554_23785700',
  'variables' => 
  array (
    'usuario' => 0,
    'diaRelatorio' => 0,
    'txtMatricula' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53094e89e68554_23785700')) {function content_53094e89e68554_23785700($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados - SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="#" onsubmit="cadastraProcedimentoEnfermagem();return false;">
    <input type="hidden" id="usuario" name="usuario" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
">
    <fieldset>
        <legend>
            <b>
                Procedimentos médicos / Enfermagem
            </b>
        </legend>
        <table style="width: 100%; margin: 0 auto;" border="0">
            <tr>
                <td colspan="4">
                    Funcionário(a): <span id="nomeEmpregado"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="diaRelatorio">
                        Data
                    </label>
                    <input id="diaRelatorio" name="diaRelatorio"
                           type="text" value="<?php echo $_smarty_tpl->tpl_vars['diaRelatorio']->value;?>
" maxlength="5" onblur="gridProcedimentoEnfermagem()"
                           tabindex="1" width="30" style="width: 120px;"/>
                </td>
                <td>
                    <label for="txtMatricula">
                        Matrícula <span class="req">*</span>
                    </label>
                    <input id="txtMatricula" name="txtMatricula"
                           type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtMatricula']->value;?>
" maxlength="8"
                           tabindex="2" width="20" required style="width: 120px;"
                           onblur="completaCopyPaste()"/>
                </td>
                <td>
                    Tipo funcionário <br>
                    <select id="tipo_funcionario"
                            name="tipo_funcionario"
                            tabindex="3"
                            onchange="disableMatricula()"
                            style="width: 160px;">
                        <option value="1">
                            SERPRO
                        </option>
                        <option value="2">
                            TERCEIRIZADO
                        </option>
                        <option value="3">
                            ESTAGIÁRIO
                        </option>
                    </select>
                </td>
                <td>
                    Procedimento <br>
                    <select id="procedimento" name="procedimento" tabindex="4" style="width: 280px;">
                        <option value="1">
                            CONSULTAS MÉDICAS
                        </option>
                        <option value="2">
                            ATENDIMENTOS DE URGÊNCIA
                        </option>
                        <option value="3">
                            PA
                        </option>
                        <option value="4">
                            PESO
                        </option>
                        <option value="5">
                            CURATIVOS
                        </option>
                        <option value="6">
                            MEDICAÇÃO ORAL
                        </option>
                        <option value="7">
                            MEDICAÇÃO PARENTERAL
                        </option>
                        <option value="8">
                            OUTROS
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <textarea rows="5" cols="100" id="obs" name="obs" tabindex="10"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <input type="button" tabindex="4" class="button black" value="Gravar Registro" onclick="cadastraProcedimentoEnfermagem()"/>
                    <input type="button" tabindex="5" class="button black" value="Limpar Campos" onclick="limparProcedimentoEnfermagem()"/>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <div id="conteudoGrid"></div>
                </td>
            </tr>
        </table>
    </fieldset>
</form>
<script>
    gridProcedimentoEnfermagem();
</script>
<?php }} ?>