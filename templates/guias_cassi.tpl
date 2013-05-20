{include file="header.tpl" title="Controle de Atestados - SUPGP/GPSPO"}
{include file="menu_top.tpl"}

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
                           type="text" value="{$txtMatricula}" maxlength="8"
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
                        CID <span class="req">*</span>
                    </label>
                    <input id="txtCID" name="txtCID" required
                           type="text" value="{$txtMatricula}" maxlength="5"
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
                    Código
                </td>
                <td>
                    Descrição
                </td>
            </tr>
            <tr>
                <td>
                    <input id="txtCod1" name="txtCod1"
                           type="text" value="" maxlength="10"
                           tabindex="6" width="20" required style="width: 120px;" />
                </td>
                <td>
                    <input id="txtDesc1" name="txtDesc1"
                           type="text" value="" maxlength="40" readonly="true"
                           tabindex="7" style="width: 400px;" required  />
                </td>
            </tr>
            <tr>
                <td>
                    <input id="txtCod2" name="txtCod2"
                           type="text" value="" maxlength="10"
                           tabindex="8" width="20" style="width: 120px;" />
                </td>
                <td>
                    <input id="txtDesc2" name="txtDesc2"
                           type="text" value="" maxlength="40" readonly="true"
                           tabindex="9" style="width: 400px;"  />
                </td>
            </tr>
            <tr>
                <td>
                    <input id="txtCod3" name="txtCod3"
                           type="text" value="" maxlength="10"
                           tabindex="10" width="20" required style="width: 120px;" />
                </td>
                <td>
                    <input id="txtDesc3" name="txtDesc3"
                           type="text" value="" maxlength="40" readonly="true"
                           tabindex="11" style="width: 400px;"   />
                </td>
            </tr>
            <tr>
                <td>
                    <input id="txtCod4" name="txtCod4"
                           type="text" value="" maxlength="10"
                           tabindex="2" width="20" style="width: 120px;" />
                </td>
                <td>
                    <input id="txtDesc4" name="txtDesc4"
                           type="text" value="" maxlength="40" readonly="true"
                           tabindex="12" style="width: 400px;"  />
                </td>
            </tr>
            <tr>
                <td>
                    <input id="txtCod5" name="txtCod5"
                           type="text" value="" maxlength="10"
                           tabindex="13" width="20" style="width: 120px;" />
                </td>
                <td>
                    <input id="txtDesc5" name="txtDesc5"
                           type="text" value="" maxlength="40" readonly="true"
                           tabindex="14" style="width: 400px;"  />
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
</form>