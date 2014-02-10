{include file="header.tpl" title="Controle de Atestados - SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form action="#" onsubmit="consultaConsolidacaoEMP(); return false;">
    <fieldset>
        <table style="width: 70%; margin: 0 auto;" border="0">
            <tr>
                <legend>
                    <b>
                        Consolidação das EMP por ano
                    </b>
                </legend>
                <td>
                    <label for="ano">
                        Ano
                    </label>
                    <input id="ano" name="ano"
                           type="text" value="" maxlength="4"
                           tabindex="1" width="4" required />
                    <input type="button" tabindex="4" class="button black" value="Consultar" onclick="consultaConsolidacaoEMP()"/>
                </td>
            </tr>
        </table>
    </fieldset>
</form>
<span id="conteudoGrid"></span>