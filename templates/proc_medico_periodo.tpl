{include file="header.tpl" title="Controle de Atestados - SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form action="#" onsubmit="consultaCIDPorMes(); return false;">

    <fieldset>
        <table style="width: 70%; margin: 0 auto;" border="0">
            <tr>
                <legend>
                    <b>
                        Período Procedimentos médicos / Enfermagem
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

    <input type="button" tabindex="4" class="button black" value="Consultar" onclick="consultarProcedimentoEnfermagem();"/>
    <input type="button" tabindex="5" class="button black" value="Gerar PDF para Impressão" onclick="consultarProcedimentoEnfermagemPDF()"/>
</form>
<span id="conteudoGrid"></span>




