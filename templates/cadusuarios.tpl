{include file="header.tpl" title="Controle de Atestados -SUPGP/GPSPO"}
{include file="menu_top.tpl"}

<div class="centerDiv">
    <form id="cadUsuarioForm" autocomplete="off" method="post" action="../cadusuarios.php" onsubmit="return false;">
        <div class="center">

            <h2>{$mensagemUsuario}</h2>

            <span id="mensagemCadastro"></span>

            <table style="width: auto; margin: 0 auto;">
                <!-- NOME DO USUARIO -->
                <tr>
                    <td>
                        <label for="txtPrimeiroNome">
                            Primeiro nome <span class="req">*</span>
                        </label>
                        <input id="txtPrimeiroNome" name="txtPrimeiroNome" type="text"
                               value="{$txtPrimeiroNome}" tabindex="1" required style="width: 120px;"/>

                    </td>
                    <td>
                        <label for="txtUltimoNome">
                            Último nome <span class="req">*</span>
                        </label>
                        <input id="txtUltimoNome" name="txtUltimoNome" type="text" value="{$txtUltimoNome}"
                               tabindex="2" width="20" required style="width: 120px;"/>
                    </td>
                </tr>
                <!-- EMAIL DO USUARIO -->
                <tr>
                    <td colspan="2">
                        <label for="txtEmail">E-mail <span class="req">*</span></label>
                        <input id="txtEmail" name="txtEmail"
                               type="email" spellcheck="false"
                               value="{$txtEmail}" maxlength="150" tabindex="3"
                               required style="width: 279px;"
                                {if isset($alt)}
                                    readonly="true"
                                {/if}
                                />
                    </td>
                </tr>
                <!-- CPF DO USUARIO -->
                <tr>
                    <td colspan="2">
                        <label for="txtCPF">CPF</label>
                        <input id="txtCPF" name="txtCPF" type="text" value="{$txtCPF}" maxlength="11"
                               tabindex="4" size="30" style="width: 279px;"/>
                        <br>
                    </td>
                </tr>
                <!-- DCI DO USUARIO -->
                <tr>
                    <td colspan="2">
                        <label for="txtDCI">DCI</label>
                        <input id="txtDCI" name="txtDCI" type="text" value="{$txtDCI}" maxlength="10"
                               tabindex="5" size="30" style="width: 279px;"/>
                        <br>
                    </td>
                </tr>
                <!-- SENHA -->
                {if !isset($alt)}
                    <tr>
                        <td>
                            <label for="txtSenha">
                                Senha <span class="req">*</span>
                                <img width="16px" height="16px"
                                     src="../include/img/icon/info-icon.png"
                                     title="Mínimo de 6 caracteres" class="form"/>
                            </label>
                            <input id="txtSenha" name="txtSenha" type="password" maxlength="20"
                                   tabindex="6" required size="30" style="width: 120px;"/>
                        </td>
                        <td>
                            <label for="txtConfirmaSenha">
                                Repetir a senha <span class="req">*</span>
                            </label>
                            <input id="txtConfirmaSenha" name="txtConfirmaSenha" type="password"
                                   maxlength="20" tabindex="7" required size="30" style="width: 120px;"/>
                        </td>
                    </tr>
                {/if}
                <!-- COMO NOS CONHECEU -->

                <tr>
                    <td style="text-align: center;" colspan="2">
                        Como chegou até nós?<br>
                        <select id="selComoChegouAteNos" name="selComoChegouAteNos" tabindex="8"
                                style="width: 312px;">
                            <option value="99" selected="selected">
                                ---
                            </option>
                            <option value="1">
                                Google
                            </option>
                            <option value="2">
                                Amigos
                            </option>
                            <option value="3">
                                Jornais e/ou Revistas
                            </option>
                            <option value="4">
                                UP Online
                            </option>
                            <option value="5">
                                Lets Collect
                            </option>
                            <option value="6">
                                Magic Domain
                            </option>
                        </select>
                    </td>
                </tr>
                <!-- RECEBER EMAILS -->
                <tr>
                    <td style="text-align: center" colspan="2">
                        <input id="chkReceberEmails" name="chkReceberEmails" type="checkbox" value="1"
                               tabindex="9">
                        <b>Deseja receber nossos emails?</b>
                    </td>
                </tr>
                <!-- SALVAR -->
                <tr>
                    <td style="text-align: center" colspan="2">
                        {if isset($alt)}
                            <input type="submit" class="button black" value="Alterar Minha Conta"/>
                        {else}
                            <input type="submit" class="button black" value="Criar Conta"/>
                        {/if}
                        <input name="cad" type="hidden" id="cad" value="1">
                    </td>
                </tr>
            </table>

            {if !isset($alt)}
                <table style="width: auto; margin: 0 auto;">
                    <tr>
                        <td>
                            <label class="desc">Você tem também a opção de efetuar login:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="/auth/facebook">
                                <img src="include/img/facebook-button.png" class="grayscale"
                                     title="Logar com o Facebook"/>
                            </a>
                        </td>
                        <td>
                            <a href="/auth/google">
                                <img src="include/img/google-button.png" class="grayscale" title="Logar com o Google+"/>
                            </a>
                        </td>
                    </tr>
                </table>
            {/if}

        </div>
    </form>

</div>
{include file="footer.tpl"}
<script>
    setaSelect('{$comoChegou}', '{$chkReceberEmails}');
</script>