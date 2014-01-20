{include file="header.tpl" title="Controle de Atestados -SUPGP/GPSPO"}
{include file="menu_top.tpl"}

{if $tela == 'cad'}
<form id="cadEmpregadoForm" autocomplete="off" method="POST" action="../empregadoCAD.php" onsubmit="addEmpregado();return false;">
    <table style="width: 70%; margin: 0 auto;" border="0">
        <tr>
            <td>
                <label for="txtMatricula">
                    Matrícula <span class="req">*</span><span id="msg"></span>
                </label>
                <input id="txtMatricula" name="txtMatricula"
                       type="text" value="" maxlength="8"
                       tabindex="1" width="20" required style="width: 120px;"
                       onblur="existeFuncionario()"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="txtNome">
                    Nome<span class="req">*</span>
                </label>
                <input id="txtNome" name="txtNome"
                       type="text" value="{$txtNome}" maxlength="250"
                       tabindex="2" required style="width: 320px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <label for="txtLotacao">
                    Lotação
                </label>
                <input id="txtLotacao" name="txtLotacao"
                       type="text" value="{$txtLotacao}" maxlength="60"
                       tabindex="3" style="width: 320px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label for="txtNumCarteira">
                    Número da Carteira
                </label>
                <input id="txtNumCarteira" name="txtNumCarteira"
                       type="text" value="{$txtNumCarteira}" maxlength="20"
                       tabindex="4" style="width: 320px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label for="txtAdmissao">
                    Admissão
                </label>
                <input id="txtAdmissao" name="txtAdmissao"
                       type="text" value="{$txtAdmissao}" maxlength="60"
                       tabindex="5" style="width: 320px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label for="txtDataNascimento">
                    Data de Nascimento
                </label>
                <input id="txtDataNascimento" name="txtDataNascimento"
                       type="text" value="{$txtDataNascimento}" maxlength="20"
                       tabindex="6" style="width: 320px;" />
            </td>
        </tr>
        <tr>
            <td>
                Empresa <br>
                <select id="selLocalidade" name="selLocalidade" tabindex="7" style="width: 320px;" >
                    <option value="1" selected="selected">
                        SOCORRO
                    </option>
                    <option value="2">
                        LUZ
                    </option>
                    <option value="3">
                        NOVA REDENTORA
                    </option>
                </select>
            </td>
        </tr>

        <tr>
            <td style="text-align: left" colspan="2">
                <input type="submit" tabindex="8" class="button black" value="Gravar Registro"/>
                <input type="button" tabindex="9" class="button black" value="Limpar Campos" onclick="limparCamposEmpregado()"/>
                <a href="empregadoCAD.php?op=listar">
                    <input type="button" tabindex="10" class="button black" value="Procurar Empregado" />
                </a>
                <input type="button" tabindex="11" class="button black" value="Deletar" onclick="querMesmoApagarEmpregado()"/>
            </td>
        </tr>

        <tr>
            <td>
                <input type="hidden" name="cadastraOuAlterar" id="cadastraOuAlterar" value="" />
            </td>
            <td></td>
            <td></td>
        </tr>

    </table>
    <div id="dialog-confirm"></div>
</form>
{else}
    <form id="buscarForm" onsubmit="buscarEmpregado();return false;">
        <table style="width: 70%; margin: 0 auto;" border="0">
            <tr>
                <td>
                    <label for="txtNomePes">
                        Nome<span class="req">*</span>
                    </label>
                    <input id="txtNomePes" name="txtNomePes"
                           type="text" value="" maxlength="250"
                           tabindex="2" required style="width: 320px;"/>
                    <input type="button" tabindex="5" class="button black" value="Buscar" onclick="buscarEmpregado()"/>
            </tr>
        </table>
        <br><br><br>
        <div id="gridEmpregado"></div>
    </form>
{/if}