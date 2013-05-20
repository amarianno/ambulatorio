{include file="header.tpl" title="Controle de Atestados -SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form id="cadProcedimentoForm" autocomplete="off" method="POST" action="../procedimento.php" onsubmit="addProcedimento();return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td>
                <label for="txtCod">
                    Codigo<span class="req">*</span>
                </label>
                <input id="txtCod" name="txtCod"
                       type="text" value="" maxlength="13"
                       tabindex="1" required style="width: 320px;"
                        onblur="existeProcedimento()"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="txtDescricao">
                    Descrição<span class="req">*</span>
                </label>
                <input id="txtDescricao" name="txtDescricao"
                       type="text" value="" maxlength="60"
                       tabindex="2" style="width: 320px;" />
            </td>
        </tr>
        <tr>
            <td style="text-align: left" colspan="2">
                <input type="submit" tabindex="5" class="button black" value="Gravar Registro"/>
                <input type="button" tabindex="6" class="button black" value="Limpar Campos" onclick="limparCamposProcedimento()"/>
            </td>
        </tr>

        <tr>
            <td>
                <input type="hidden" name="hddChave" id="hddChave" value="" />
                <input type="hidden" name="cadastraOuAlterar" id="cadastraOuAlterar" value="cad" />
            </td>
            <td></td>
            <td></td>
        </tr>

    </table>
</form>