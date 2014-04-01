{include file="header.tpl" title="Controle de Atestados - SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form action="#" onsubmit="cadastraProcedimentoEnfermagem();return false;">
    <input type="hidden" id="usuario" name="usuario" value="{$usuario}">
    <fieldset>
        <legend>
            <b>
                Procedimentos de Enfermagem
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
                           type="text" value="{$diaRelatorio}" maxlength="5" onblur="gridProcedimentoEnfermagem()"
                           tabindex="1" width="30" style="width: 120px;"/>
                </td>
                <td>
                    <label for="txtMatricula">
                        Matrícula <span class="req">*</span>
                    </label>
                    <input id="txtMatricula" name="txtMatricula"
                           type="text" value="{$txtMatricula}" maxlength="8"
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
                        <option value="9">
                            CAT - ACIDENTE DE TRABALHO
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
                        <option value="3">
                            PA
                        </option>
                        <option value="4">
                            PESO
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
