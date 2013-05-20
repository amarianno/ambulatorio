{include file="header.tpl" title="Controle de Atestados -SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form onsubmit="consultaPorMatricula();return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td>
                Funcionário(a): <span id="nomeEmpregado"></span>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <label for="txtMatricula">
                    Matrícula
                </label>
                <input id="txtMatricula" name="txtMatricula"
                       type="text" value="" maxlength="8"
                       tabindex="2" width="20" required style="width: 120px;"/>
                <input type="button" tabindex="3" class="button black" value="Consultar" onclick="consultaPorMatricula();"/>
            </td>
        </tr>
    </table>
</form>
<span id="conteudoGrid"></span>