{include file="header.tpl" title="Controle de Atestados -SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form id="cadProcedimentoForm"
      autocomplete="off"
      method="POST"
      action="./senha.php">

    <input type="hidden" id="operacao" name="operacao" value="cadastrar">

    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td>
                <label for="txtCpf">
                    CPF<span class="req">*</span>
                </label>
                <input id="txtCpf" name="txtCpf"
                       type="text" value="{$txtCpf}" maxlength="14"
                       tabindex="1" required style="width: 320px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="txtSenha">
                    Senha<span class="req">*</span>
                </label>
                <input id="txtSenha" name="txtSenha"
                       type="password" value="{$txtSenha}" maxlength="60"
                       tabindex="2" style="width: 320px;" />
            </td>
        </tr>
        <tr>
            <td style="text-align: left" colspan="2">
                <input type="submit" tabindex="3" class="button black" value="Gravar Registro"/>
            </td>
        </tr>
    </table>
</form>
<div id="dialog" style="display: none;">
     {$message}
</div>
{if isset($message)}
    <script>
        $("#dialog").dialog();
    </script>
{/if}