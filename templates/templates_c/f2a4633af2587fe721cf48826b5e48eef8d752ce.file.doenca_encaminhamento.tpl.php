<?php /* Smarty version Smarty-3.1.13, created on 2014-02-26 09:16:11
         compiled from "templates/doenca_encaminhamento.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203580945652f3e89abbed54-71659272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2a4633af2587fe721cf48826b5e48eef8d752ce' => 
    array (
      0 => 'templates/doenca_encaminhamento.tpl',
      1 => 1393239469,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203580945652f3e89abbed54-71659272',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52f3e89ac0ba49_13461661',
  'variables' => 
  array (
    'txtMatricula' => 0,
    'doencas_options' => 0,
    'encaminhamento_options' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52f3e89ac0ba49_13461661')) {function content_52f3e89ac0ba49_13461661($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados - SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<form action="#" onsubmit="cadastrarDoencaEncaminhamento();return false;">
    <input type="hidden" name="hidCodigo" id="hidCodigo">
    <fieldset>
        <legend>
            <b>
                Doenças/Encaminhamentos
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
                           onblur="recuperarPeriodicoAno()"/>
                </td>
                <td>
                    Doença <br>
                    <select id="selDoenca" name="selDoenca" tabindex="2" style="width: 300px;">
                        <option value=""></option>
                        <?php echo $_smarty_tpl->tpl_vars['doencas_options']->value;?>

                    </select>
                </td>
                <td>
                    Encaminhamento <br>
                    <select id="selEncaminhamento" name="selEncaminhamento" tabindex="3" style="width: 140px;">
                        <option value=""></option>
                        <?php echo $_smarty_tpl->tpl_vars['encaminhamento_options']->value;?>

                    </select>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    Doença <br>
                    <select id="selDoenca2" name="selDoenca2" tabindex="4" style="width: 300px;">
                        <option value=""></option>
                        <?php echo $_smarty_tpl->tpl_vars['doencas_options']->value;?>

                    </select>
                </td>
                <td>
                    Encaminhamento <br>
                    <select id="selEncaminhamento2" name="selEncaminhamento2" tabindex="5" style="width: 140px;">
                        <option value=""></option>
                        <?php echo $_smarty_tpl->tpl_vars['encaminhamento_options']->value;?>

                    </select>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    Doença <br>
                    <select id="selDoenca3" name="selDoenca3" tabindex="6" style="width: 300px;">
                        <option value=""></option>
                        <?php echo $_smarty_tpl->tpl_vars['doencas_options']->value;?>

                    </select>
                </td>
                <td>
                    Encaminhamento <br>
                    <select id="selEncaminhamento3" name="selEncaminhamento3" tabindex="7" style="width: 140px;">
                        <option value=""></option>
                        <?php echo $_smarty_tpl->tpl_vars['encaminhamento_options']->value;?>

                    </select>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    Doença <br>
                    <select id="selDoenca4" name="selDoenca4" tabindex="8" style="width: 300px;">
                        <option value=""></option>
                        <?php echo $_smarty_tpl->tpl_vars['doencas_options']->value;?>

                    </select>
                </td>
                <td>
                    Encaminhamento <br>
                    <select id="selEncaminhamento4" name="selEncaminhamento4" tabindex="9" style="width: 140px;">
                        <option value=""></option>
                        <?php echo $_smarty_tpl->tpl_vars['encaminhamento_options']->value;?>

                    </select>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>
            <b>
                Observações Gerais
            </b>
        </legend>
        <textarea rows="4" cols="100" id="obs" name="obs" tabindex="10"></textarea>
    </fieldset>
    <table>
        <tr>
            <td style="text-align: left" colspan="2">
                <input type="button" tabindex="4" class="button black" value="Gravar Registro" onclick="cadastrarDoencaEncaminhamento()"/>
                <input type="button" tabindex="5" class="button black" value="Limpar Campos" onclick="limparCamposDoencaEncaminhamento()"/>
            </td>
        </tr>
    </table>
</form><?php }} ?>