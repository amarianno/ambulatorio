{include file="header.tpl" title="Controle de Atestados - SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form action="#" onsubmit="consultaAtestadosLicencaINSS(); return false;">
    <table style="width: 100%; margin: 0 auto;" border="0">
        <tr>
            <td colspan="3">
                <label for="dataInicial" style="display: inline">
                    Data Inicial
                </label>
                <input id="dataInicial" name="dataInicial"
                       type="text" value="" maxlength="8"
                       tabindex="1" width="20" required style="width: 120px;"/>
                <label for="dataFinal" style="display: inline">
                    Data Final
                </label>
                <input id="dataFinal" name="dataFinal"
                       type="text" value="" maxlength="8"
                       tabindex="1" width="20" required style="width: 120px;"/>
                <input type="button" tabindex="3" class="button black" value="Consultar" onclick="consultaAtestadosLicencaINSS();"/>
            </td>
        </tr>
    </table>
</form>
<span id="conteudoGrid"></span>