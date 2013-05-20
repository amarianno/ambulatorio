{include file="header.tpl" title="Controle de Atestados - SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form action="#" onsubmit="consultaCIDPorMes(); return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td colspan="3">
                <label for="dtRelatorio">
                    Mês/Ano
                </label>
                <input id="dtRelatorio" name="dtRelatorio"
                       type="text" value="" maxlength="8"
                       tabindex="1" width="20" required style="width: 120px;"/>
                <input type="button" tabindex="3" class="button black" value="Consultar" onclick="consultaCIDPorMes();"/>
            </td>
        </tr>
    </table>
</form>
<span id="conteudoGrid"></span>