<?php /* Smarty version Smarty-3.1.13, created on 2013-05-08 14:09:26
         compiled from "templates/atestados.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141140939351800ae2133004-64070952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9601848405e2bf8a5356c47571c481efe490c4e' => 
    array (
      0 => 'templates/atestados.tpl',
      1 => 1368032914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141140939351800ae2133004-64070952',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51800ae220c769_44161855',
  'variables' => 
  array (
    'txtDtRecebimento' => 0,
    'txtMatricula' => 0,
    'txtQtdeDiasAfastado' => 0,
    'txtDtIniAfastamento' => 0,
    'txtDtFimAfastamento' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51800ae220c769_44161855')) {function content_51800ae220c769_44161855($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Controle de Atestados -SUPGP/GPSPO"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <form id="cadAtestadoForm" autocomplete="off" method="POST" action="../atestadosCAD.php" onsubmit="addAtestado();return false;">
        <table style="width: auto; margin: 0 auto;" border="0">
            <tr>
                <td colspan="3  ">
                    Funcionário(a): <span id="nomeEmpregado"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="txtDtRecebimento">
                        Data de Recebimento
                        <span class="req">*</span>
                    </label>
                    <input id="txtDtRecebimento" name="txtDtRecebimento"
                           type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtDtRecebimento']->value;?>
"
                           tabindex="1" required style="width: 120px;"/>
                </td>
                <td>
                    <label for="txtMatricula">
                        Matrícula <span class="req">*</span>
                    </label>
                    <input id="txtMatricula" name="txtMatricula"
                           type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtMatricula']->value;?>
" maxlength="8"
                           tabindex="2" width="20" required style="width: 120px;"
                            onblur="preencheGridAtestados()"/>
                </td>
                <td>
                    <label for="txtQtdeDiasAfastado">
                        Qtde Dias Afastado
                        <span class="req">*</span>
                    </label>
                    <input id="txtQtdeDiasAfastado" name="txtQtdeDiasAfastado"
                           type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtQtdeDiasAfastado']->value;?>
" maxlength="2"
                           tabindex="3" required style="width: 120px;"
                           onblur="calculaDataFinalDeAfastamento()" />
                </td>
            </tr>


            <tr>
                <td>
                    <label for="txtDtIniAfastamento">
                        Data Inicial do Afastamento <span class="req">*</span>
                    </label>
                    <input id="txtDtIniAfastamento" name="txtDtIniAfastamento"
                           type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtDtIniAfastamento']->value;?>
"
                           tabindex="4" width="20" required style="width: 120px;"
                           onblur="calculaDataFinalDeAfastamento()" />
                </td>
                <td>
                    <label for="txtDtFimAfastamento">
                        Data Final do Afastamento
                    </label>
                    <input id="txtDtFimAfastamento" name="txtDtFimAfastamento"
                           type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtDtFimAfastamento']->value;?>
" readonly="true"
                           width="20" style="width: 120px;"/>
                </td>
                <td>
                    <label for="chkAcompanhamentoFamiliar">
                        Acompanhamento Familiar
                    </label>
                    <input id="chkAcompanhamentoFamiliar" name="chkAcompanhamentoFamiliar" type="checkbox" value="1" tabindex="6">
                </td>
            </tr>

            <tr>
                <td>
                    Grau de Parentesco <br>
                    <select id="selgrauParentesco" name="selgrauParentesco" tabindex="7" style="width: 120px;" onchange="syncAcompanhamentoFamiliar()">
                        <option value="0" selected="selected">
                            ---
                        </option>
                        <option value="1">
                            PAI
                        </option>
                        <option value="2">
                            MÃE
                        </option>
                        <option value="3">
                            FILHO (A)
                        </option>
                        <option value="4">
                            CÔNJUGE
                        </option>
                    </select>
                </td>
                <td>
                    <label for="chkConcedidosInternos">
                        Concedidos (Internos)
                    </label>
                    <input id="chkConcedidosInternos" name="chkConcedidosInternos" type="checkbox" value="1" tabindex="8">
                </td>
                <td>
                    <label for="chkHomologados">
                        Homologados (Concedidos Externos)
                    </label>
                    <input id="chkHomologados" name="chkHomologados" type="checkbox" value="1" tabindex="9">
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
                           tabindex="10" width="30" style="width: 120px;"/>
                </td>
                <td>
                    <label for="chklicencaMaternidade">
                        Licença Maternidade
                    </label>
                    <input id="chklicencaMaternidade" name="chklicencaMaternidade" type="checkbox" value="1" tabindex="11">
                </td>
                <td>
                    <label for="chkHomologadoMedico">
                        Homologado pelo Médico
                    </label>
                    <input id="chkHomologadoMedico" name="chkHomologadoMedico" type="checkbox" value="1"  tabindex="12">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="codigo" id="codigo" value="" />
                </td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td style="text-align: left" colspan="2">
                    <input type="submit" tabindex="13" class="button black" value="Gravar Registro"/>
                    <input type="button" tabindex="14" class="button black" value="Limpar Campos" onclick="limparCamposAtestado()"/>
                    <a href="empregadoCAD.php?op=listar">
                        <input type="button" tabindex="6" class="button black" value="Procurar Empregado" />
                    </a>
                    <div id="mensagemCadastro"></div>
                </td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>

        </table>

        <span id="conteudoGrid"></span>
    </form><?php }} ?>