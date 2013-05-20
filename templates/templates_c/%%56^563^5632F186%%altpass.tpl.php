<?php /* Smarty version 2.6.18, created on 2013-04-08 07:30:20
         compiled from altpass.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => "Buscartas - alterar senha")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu_top_2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="searchform">
    <form id="contactForm" autocomplete="off" method="post"
          novalidate action="../altpass.php">

        <div class="center">

            <h2>Alterar senha</h2>

            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "mensagem_ajax.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

            <table style="width: auto; margin: 0 auto;">
                <!-- SENHA ATUAL -->
                <tr>
                    <td>
                        <label for="txtSenhaAtual">
                            Senha atual <span class="req">*</span>
                        </label>
                        <input id="txtSenhaAtual" name="txtSenhaAtual" type="password"
                               size="20" maxlength="20" tabindex="8" required/>
                    </td>
                </tr>
                <!-- NOVA SENHA -->
                <tr>
                    <td colspan="2">
                        <label for="txtSenha">
                            Nova senha <span class="req">*</span>
                        </label>
                        <input id="txtSenha" name="txtSenha" type="password" size="20"
                               maxlength="20" tabindex="8" required/>
                    </td>
                </tr>
                <!-- NOVA SENHA - REPETIR -->
                <tr>
                    <td colspan="2">
                        <label for="txtConfirmaSenha">
                            Repetir a nova senha <span class="req">*</span>
                        </label>
                        <input id="txtConfirmaSenha" name="txtConfirmaSenha" type="password"
                               size="20" maxlength="20" tabindex="9" required/>
                    </td>
                </tr>

                <!-- SALVAR -->
                <tr>
                    <td style="text-align: center" colspan="2">
                        <span id="btnSalvar" onclick="$(this).parents('form').submit(); return false;"
                           class="button black">
                            Alterar Senha
                        </span>
                        <input name="cad" type="hidden" id="cad" value="1">
                    </td>
                </tr>
            </table>

        </div>
    </form>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>