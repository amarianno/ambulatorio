<?php /* Smarty version 2.6.18, created on 2013-04-21 15:58:04
         compiled from cadusuarios.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => "Buscartas - minha conta")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu_top_2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="searchform">
    <form id="contactForm" autocomplete="off" method="post" action="../cadusuarios.php" onsubmit="return false;">
        <div class="center">

            <h2><?php echo $this->_tpl_vars['mensagemUsuario']; ?>
</h2>

            <span id="mensagemCadastro"></span>

            <table style="width: auto; margin: 0 auto;">
                <!-- NOME DO USUARIO -->
                <tr>
                    <td>
                        <label for="txtPrimeiroNome">
                            Primeiro nome <span class="req">*</span>
                        </label>
                        <input id="txtPrimeiroNome" name="txtPrimeiroNome" type="text"
                               value="<?php echo $this->_tpl_vars['txtPrimeiroNome']; ?>
" tabindex="1" required style="width: 120px;"/>

                    </td>
                    <td>
                        <label for="txtUltimoNome">
                            Último nome <span class="req">*</span>
                        </label>
                        <input id="txtUltimoNome" name="txtUltimoNome" type="text" value="<?php echo $this->_tpl_vars['txtUltimoNome']; ?>
"
                               tabindex="2" width="20" required style="width: 120px;"/>
                    </td>
                </tr>
                <!-- EMAIL DO USUARIO -->
                <tr>
                    <td colspan="2">
                        <label for="txtEmail">E-mail <span class="req">*</span></label>
                        <input id="txtEmail" name="txtEmail"
                               type="email" spellcheck="false"
                               value="<?php echo $this->_tpl_vars['txtEmail']; ?>
" maxlength="150" tabindex="3"
                               required style="width: 279px;"
                                <?php if (isset ( $this->_tpl_vars['alt'] )): ?>
                                    readonly="true"
                                <?php endif; ?>
                                />
                    </td>
                </tr>
                <!-- CPF DO USUARIO -->
                <tr>
                    <td colspan="2">
                        <label for="txtCPF">CPF</label>
                        <input id="txtCPF" name="txtCPF" type="text" value="<?php echo $this->_tpl_vars['txtCPF']; ?>
" maxlength="11"
                               tabindex="4" size="30" style="width: 279px;"/>
                        <br>
                    </td>
                </tr>
                <!-- DCI DO USUARIO -->
                <tr>
                    <td colspan="2">
                        <label for="txtDCI">DCI</label>
                        <input id="txtDCI" name="txtDCI" type="text" value="<?php echo $this->_tpl_vars['txtDCI']; ?>
" maxlength="10"
                               tabindex="5" size="30" style="width: 279px;"/>
                        <br>
                    </td>
                </tr>
                <!-- SENHA -->
                <?php if (! isset ( $this->_tpl_vars['alt'] )): ?>
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
                <?php endif; ?>
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
                        <?php if (isset ( $this->_tpl_vars['alt'] )): ?>
                            <input type="submit" value="Alterar Minha Conta" />
                        <?php else: ?>
                            <input type="submit" value="Criar Conta" />
                        <?php endif; ?>

                      <!--  <span id="btnSalvar" onclick="addUsuario();return false;"
                           class="button black">
                            <?php if (isset ( $this->_tpl_vars['alt'] )): ?>
                                Alterar Minha Conta
                            <?php else: ?>
                                Criar Conta
                            <?php endif; ?>
                        </span>    -->
                        <input name="cad" type="hidden" id="cad" value="1">
                    </td>
                </tr>
            </table>

            <?php if (! isset ( $this->_tpl_vars['alt'] )): ?>
                <table style="width: auto; margin: 0 auto;">
                    <tr>
                        <td>
                            <label class="desc">Você tem também a opção de efetuar login:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.buscartas.com.br/facebook">
                                <img src="include/img/facebook-button.png" class="grayscale" title="Logar com o Facebook"/>
                            </a>
                        </td>
                        <td>
                            <a href="http://www.buscartas.com.br/google">
                                <img src="include/img/google-button.png" class="grayscale" title="Logar com o Google+"/>
                            </a>
                        </td>
                    </tr>
                </table>
            <?php endif; ?>

        </div>
    </form>

</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script>
    setaSelect('<?php echo $this->_tpl_vars['comoChegou']; ?>
', '<?php echo $this->_tpl_vars['chkReceberEmails']; ?>
');
</script>