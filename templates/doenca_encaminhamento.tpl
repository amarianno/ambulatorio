{include file="header.tpl" title="Controle de Atestados - SUPGP/GPSPO"}
{include file="menu_top.tpl"}

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
                           type="text" value="{$txtMatricula}" maxlength="8"
                           tabindex="1" width="20" required style="width: 120px;"
                           onblur="recuperarPeriodicoAno()"/>
                </td>
                <td>
                    Doença <br>
                    <select id="selDoenca" name="selDoenca" tabindex="2" style="width: 300px;">
                        <option value=""></option>
                        {$doencas_options}
                    </select>
                </td>
                <td>
                    Encaminhamento <br>
                    <select id="selEncaminhamento" name="selEncaminhamento" tabindex="3" style="width: 140px;">
                        <option value=""></option>
                        {$encaminhamento_options}
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
                        {$doencas_options}
                    </select>
                </td>
                <td>
                    Encaminhamento <br>
                    <select id="selEncaminhamento2" name="selEncaminhamento2" tabindex="5" style="width: 140px;">
                        <option value=""></option>
                        {$encaminhamento_options}
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
                        {$doencas_options}
                    </select>
                </td>
                <td>
                    Encaminhamento <br>
                    <select id="selEncaminhamento3" name="selEncaminhamento3" tabindex="7" style="width: 140px;">
                        <option value=""></option>
                        {$encaminhamento_options}
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
                        {$doencas_options}
                    </select>
                </td>
                <td>
                    Encaminhamento <br>
                    <select id="selEncaminhamento4" name="selEncaminhamento4" tabindex="9" style="width: 140px;">
                        <option value=""></option>
                        {$encaminhamento_options}
                    </select>
                </td>
            </tr>
        </table>
    </fieldset>
    <table>
        <tr>
            <td style="text-align: left" colspan="2">
                <input type="button" tabindex="4" class="button black" value="Gravar Registro" onclick="cadastrarDoencaEncaminhamento()"/>
                <input type="button" tabindex="5" class="button black" value="Limpar Campos" onclick="limparCamposDoencaEncaminhamento()"/>
            </td>
        </tr>
    </table>
</form>