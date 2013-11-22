{include file="header.tpl" title="Controle de Atestados - SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form action="#" onsubmit="consultaCIDPorMes(); return false;">

    <fieldset>
        <table style="width: 70%; margin: 0 auto;" border="0">
            <tr>
                <legend>
                       <b>
                           Período
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

    <fieldset>
        <table style="width: 70%; margin: 0 auto;" border="0">
            <tr>
                <legend>
                    <b>
                        Especilidades/Patologias
                    </b>
                </legend>
                <td>
                    <label for="txtPatologia">
                        Patologia
                    </label>
                    <input id="txtPatologia" name="txtPatologia"
                           type="text" value="" maxlength="250"
                           tabindex="3" style="width: 320px;"/>
                </td>
                <td>
                    Especilidade <br>
                    <select id="selEspecialidade" name="selEspecialidade" tabindex="4" style="width: 250px;">
                        <option value="1" selected="selected">
                            ---
                        </option>
                        <option value="2">
                            ATESTADO SEM CID
                        </option>
                        <option value="3">
                            DOENÇAS DA PELE E TEC.CELULAR SUB-CUTANEO
                        </option>
                        <option value="4">
                            DOENÇAS DO AP.GENITO URINÁRIO / REPRODUTOR
                        </option>
                        <option value="5">
                            DOENÇAS DO AP.RESPIRATÓRIO E VAS
                        </option>
                        <option value="6">
                            DOENÇAS DO APARELHO CIRCULATÓRIO
                        </option>
                        <option value="7">
                            DOENÇAS DO APARELHO DIGESTIVO
                        </option>
                        <option value="8">
                            DOENCAS DO SANGUE E SIST, HEMATOPOIETICO
                        </option>
                        <option value="9">
                            DOENÇAS DO SIST. NERVOSO
                        </option>
                        <option value="10">
                            DOENÇAS DO SIST.ENDÓCRINO
                        </option>
                        <option value="11">
                            DOENÇAS DO SIST.OSTEOMUSCULAR E TEC. CONJ.
                        </option>
                        <option value="12">
                            DOENÇAS DOS ORGÃOS DOS SENTIDOS
                        </option>
                        <option value="13">
                            DOENÇAS INFECCIOSAS
                        </option>
                        <option value="14">
                            NEOPLASIAS
                        </option>
                        <option value="15">
                            TRANSTORNOS PSIQUICOS
                        </option>
                        <option value="16">
                            OUTROS
                        </option>
                    </select>
                </td>
            </tr>
        </table>
    </fieldset>
    <input type="button" tabindex="4" class="button black" value="Consultar" onclick="consultaCIDPorMes();"/>
</form>
<span id="conteudoGrid"></span>




