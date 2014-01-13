{include file="header.tpl" title="Controle de Atestados - SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form action="#" onsubmit="consultaPeriodicoPendentesPorMes(); return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td colspan="3">
                <label for="selMes">
                    Mês
                </label>
                <select id="selMes" name="selMes" tabindex="1">
                    <option value="1" selected="selected">
                        JANEIRO
                    </option>
                    <option value="2">
                        FEVEREIRO
                    </option>
                    <option value="3">
                        MARÇO
                    </option>
                    <option value="4">
                        ABRIL
                    </option>
                    <option value="5">
                        MAIO
                    </option>
                    <option value="6">
                        JUNHO
                    </option>
                    <option value="7">
                        JULHO
                    </option>
                    <option value="8">
                        AGOSTO
                    </option>
                    <option value="9">
                        SETEMBRO
                    </option>
                    <option value="10">
                        OUTUBRO
                    </option>
                    <option value="11">
                        NOVEMBRO
                    </option>
                    <option value="12">
                        DEZEMBRO
                    </option>
                </select>
            </td>
            <td>
                <label for="txtMatricula">
                    Matrícula
                </label>
                <input id="txtMatricula" name="txtMatricula"
                       type="text" maxlength="8"
                       tabindex="2" width="20 style="width: 120px;" />
            </td>
            <td>
                <label for="selEmpresa">
                    Empresa
                </label>
                <select id="selEmpresa" name="selEmpresa" tabindex="3">
                    <option value="1" selected="selected">
                        SOCORRO
                    </option>
                    <option value="2">
                        LUZ
                    </option>
                </select>
            </td>
            <td>
                <input type="button" tabindex="4" class="button black" value="Consultar" onclick="consultaPeriodicoPendentesPorMes();"/>
            </td>
        </tr>
    </table>
</form>
<span id="conteudoGrid"></span>