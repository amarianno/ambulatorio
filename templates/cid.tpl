{include file="header.tpl" title="Controle de Atestados -SUPGP/GPSPO"}
{include file="menu_top.tpl"}

{if $tela == 'cad'}
    <form id="cadCidForm" autocomplete="off" method="POST" action="../cid.php" onsubmit="addCid();return false;">
        <table style="width: 70%; margin: 0 auto;" border="0">
            <tr>
                <td>
                    <label for="txtCID">
                        Nome<span class="req">*</span>
                    </label>
                    <input id="txtCID" name="txtCID"
                           type="text" value="" maxlength="250"
                           tabindex="1" required style="width: 320px;"
                            onblur="existeCID()"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="txtDescricao">
                        Descrição
                    </label>
                    <input id="txtDescricao" name="txtDescricao"
                           type="text" value="" maxlength="60"
                           tabindex="2" style="width: 320px;" />
                </td>
            </tr>
            <tr>
                <td style="text-align: left" colspan="2">
                    <input type="submit" tabindex="5" class="button black" value="Gravar Registro"/>
                    <input type="button" tabindex="6" class="button black" value="Limpar Campos" onclick="limparCamposCid()"/>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="cadastraOuAlterar" id="cadastraOuAlterar" value="cad" />
                </td>
                <td></td>
                <td></td>
            </tr>

        </table>
    </form>
{else}
{/if}