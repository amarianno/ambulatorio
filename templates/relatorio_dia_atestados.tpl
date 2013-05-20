{include file="header.tpl" title="Controle de Atestados - SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form action="#" onsubmit="consultaAtestadoPorDia(); return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td colspan="3">
                <label for="diaRelatorio">
                    Dia/Mês/Ano
                </label>
                <input id="diaRelatorio" name="diaRelatorio"
                       type="text" value="" maxlength="8"
                       tabindex="1" width="20" required style="width: 120px;"/>
                <input type="button" tabindex="3" class="button black" value="Consultar" onclick="consultaAtestadoPorDia();"/>
                <input type="button" tabindex="3" class="button black" value="Gerar PDF para Impressão" onclick="consultaAtestadoPorDiaPDF()"/>
            </td>
        </tr>
    </table>
</form>
<span id="conteudoGrid"></span>