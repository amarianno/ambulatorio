{include file="header.tpl" title="Controle de Atestados -SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form onsubmit="consultaCIDPorMatricula();return false;">
<table style="width: 100%; margin: 0 auto;" border="0">
    <tr>
        <td colspan="2">
            Funcionário(a): <span id="nomeEmpregado"></span>
        </td>
    </tr>
    <tr>
        <td >
            <label for="txtMatricula">
                Matrícula
            </label>
            <input id="txtMatricula" name="txtMatricula"
                   type="text" value="" maxlength="8"
                   tabindex="1" width="20" required style="width: 80%;"
                    onblur="completaCopyPaste();"/>
        </td>
        <td>
            <label for="txtCID">
                CID
            </label>
            <input id="txtCID" name="txtCID" required
                   type="text" value="" maxlength="30"
                   tabindex="2" width="20" style="width: 120px;"/>
            <input type="button" tabindex="3" class="button black" value="Consultar" onclick="consultaCIDPorMatricula();"/>
        </td>
    </tr>
</table>
</form>
<span id="conteudoGrid"></span>