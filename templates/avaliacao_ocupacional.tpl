{include file="header.tpl" title="Controle de Atestados - SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<form action="#" onsubmit="cadastrarDoencaEncaminhamento();return false;">
    <input type="hidden" name="hidCodigo" id="hidCodigo">
    <fieldset>
        <legend>
            <b>
                Empregado
            </b>
        </legend>
        <table style="width: 100%; margin: 0 auto;" border="0">
            <tr>
                <td colspan="3">
                    Funcionário(a): <span id="nomeEmpregado"></span>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <label for="txtMatricula">
                        Matrícula <span class="req">*</span>
                    </label>
                    <input id="txtMatricula" name="txtMatricula"
                           type="text" value="{$txtMatricula}" maxlength="8"
                           tabindex="1" width="20" required style="width: 120px;"
                           onblur="recuperarAvaliacaoOcupacional()"/>
                </td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>
            <b>
                Avaliação Ocupacional
            </b>
        </legend>
        <table style="width: 100%; margin: 0 auto;" border="0">
            <tr>
                <td> <br> </td>
            </tr>
            <tr>
                <td>
                    <input id="ativ_desenvolvida" name="ativ_desenvolvida" type="checkbox" value="" tabindex="2">
                    Atividade Desenvolvida
                </td>
                <td>
                    <input id="volume_trabalho" name="volume_trabalho" type="checkbox" value="" tabindex="3">
                    Volume de Trabalho
                </td>
                <td>
                    <input id="relacao_chefia" name="relacao_chefia" type="checkbox" value="" tabindex="4">
                    Relação com a chefia
                </td>
                <td>
                    <input id="relacao_colegas" name="relacao_colegas" type="checkbox" value="" tabindex="5">
                    Relação com os Colegas
                </td>
            </tr>
            <tr>
                <td>
                    <input id="dores" name="dores" type="checkbox" value="" tabindex="6">
                    Dores Musculares / Atroses
                </td>
                <td>
                    <input id="fadiga_visual" name="fadiga_visual" type="checkbox" value="" tabindex="7">
                    Fadiga Visual
                </td>
                <td>
                    <input id="tensao_emocional" name="tensao_emocional" type="checkbox" value="" tabindex="8">
                    Tensão Emocional
                </td>
                <td>
                    <input id="outros" name="outros" type="checkbox" value="" tabindex="9">
                    Outros
                </td>
            </tr>
        </table>
    </fieldset>
    <table>
        <tr>
            <td style="text-align: left" colspan="2">
                <input type="button" tabindex="4" class="button black" value="Gravar Registro" onclick="cadastrarAvaliacaoOcupacional()"/>
                <input type="button" tabindex="5" class="button black" value="Limpar Campos" onclick="limparCamposAvaliacaoOcupacional()"/>
            </td>
        </tr>
    </table>
</form>