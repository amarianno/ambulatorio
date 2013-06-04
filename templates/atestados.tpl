{include file="header.tpl" title="Controle de Atestados -SUPGP/GPSPO"}
{include file="menu_top.tpl"}

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
                           type="text" value="{$txtDtRecebimento}"
                           tabindex="1" required style="width: 120px;"/>
                </td>
                <td>
                    <label for="txtMatricula">
                        Matrícula <span class="req">*</span>
                    </label>
                    <input id="txtMatricula" name="txtMatricula"
                           type="text" value="{$txtMatricula}" maxlength="8"
                           tabindex="2" width="20" required style="width: 120px;"
                            onblur="preencheGridAtestados()"/>
                </td>
                <td>
                    <label for="txtQtdeDiasAfastado">
                        Qtde Dias Afastado
                        <span class="req">*</span>
                    </label>
                    <input id="txtQtdeDiasAfastado" name="txtQtdeDiasAfastado"
                           type="text" value="{$txtQtdeDiasAfastado}" maxlength="2"
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
                           type="text" value="{$txtDtIniAfastamento}"
                           tabindex="4" width="20" required style="width: 120px;"
                           onblur="calculaDataFinalDeAfastamento()" />
                </td>
                <td>
                    <label for="txtDtFimAfastamento">
                        Data Final do Afastamento
                    </label>
                    <input id="txtDtFimAfastamento" name="txtDtFimAfastamento"
                           type="text" value="{$txtDtFimAfastamento}" readonly="true"
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
                           type="text" value="{$txtMatricula}" maxlength="5"
                           tabindex="10" width="30" style="width: 120px;"
                            onblur="validaCID()"/>
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
    </form>