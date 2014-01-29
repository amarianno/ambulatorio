{include file="header.tpl" title="Controle de Atestados - SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form action="#" onsubmit="consultaEmpregadosAtrasados(); return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td>
                <label for="selEmpresa">
                    Empresa
                </label>
                <select id="selEmpresa" name="selEmpresa" tabindex="1">
                    <option value="1" selected="selected">
                        SOCORRO
                    </option>
                    <option value="2">
                        LUZ
                    </option>
                    <option value="3">
                        EXTERNO
                    </option>
                </select>
            </td>
            <td>
                <input type="button" tabindex="2" class="button black" value="Consultar" onclick="consultaEmpregadosAtrasados();"/>
            </td>
        </tr>
    </table>
</form>
<span id="conteudoGrid"></span>