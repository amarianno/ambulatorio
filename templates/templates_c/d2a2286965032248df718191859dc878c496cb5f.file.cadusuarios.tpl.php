<?php /* Smarty version Smarty-3.1.13, created on 2013-04-23 07:33:11
         compiled from "templates/cadusuarios.tpl" */ ?>
<?php /*%%SmartyHeaderCode:496557535513e3db3849200-36299858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd2a2286965032248df718191859dc878c496cb5f' => 
    array (
      0 => 'templates/cadusuarios.tpl',
      1 => 1366723977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '496557535513e3db3849200-36299858',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_513e3db3a0c518_14908763',
  'variables' => 
  array (
    'mensagemUsuario' => 0,
    'txtPrimeiroNome' => 0,
    'txtUltimoNome' => 0,
    'txtEmail' => 0,
    'alt' => 0,
    'txtCPF' => 0,
    'txtDCI' => 0,
    'comoChegou' => 0,
    'chkReceberEmails' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_513e3db3a0c518_14908763')) {function content_513e3db3a0c518_14908763($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Buscartas - minha conta"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top_2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="centerDiv">
    <form id="cadUsuarioForm" autocomplete="off" method="post" action="../cadusuarios.php" onsubmit="return false;">
        <div class="center">

            <h2><?php echo $_smarty_tpl->tpl_vars['mensagemUsuario']->value;?>
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
                               value="<?php echo $_smarty_tpl->tpl_vars['txtPrimeiroNome']->value;?>
" tabindex="1" required style="width: 120px;"/>

                    </td>
                    <td>
                        <label for="txtUltimoNome">
                            Último nome <span class="req">*</span>
                        </label>
                        <input id="txtUltimoNome" name="txtUltimoNome" type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtUltimoNome']->value;?>
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
                               value="<?php echo $_smarty_tpl->tpl_vars['txtEmail']->value;?>
" maxlength="150" tabindex="3"
                               required style="width: 279px;"
                                <?php if (isset($_smarty_tpl->tpl_vars['alt']->value)){?>
                                    readonly="true"
                                <?php }?>
                                />
                    </td>
                </tr>
                <!-- CPF DO USUARIO -->
                <tr>
                    <td colspan="2">
                        <label for="txtCPF">CPF</label>
                        <input id="txtCPF" name="txtCPF" type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtCPF']->value;?>
" maxlength="11"
                               tabindex="4" size="30" style="width: 279px;"/>
                        <br>
                    </td>
                </tr>
                <!-- DCI DO USUARIO -->
                <tr>
                    <td colspan="2">
                        <label for="txtDCI">DCI</label>
                        <input id="txtDCI" name="txtDCI" type="text" value="<?php echo $_smarty_tpl->tpl_vars['txtDCI']->value;?>
" maxlength="10"
                               tabindex="5" size="30" style="width: 279px;"/>
                        <br>
                    </td>
                </tr>
                <!-- SENHA -->
                <?php if (!isset($_smarty_tpl->tpl_vars['alt']->value)){?>
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
                <?php }?>
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
                        <?php if (isset($_smarty_tpl->tpl_vars['alt']->value)){?>
                            <input type="submit" class="button black" value="Alterar Minha Conta"/>
                        <?php }else{ ?>
                            <input type="submit" class="button black" value="Criar Conta"/>
                        <?php }?>
                        <input name="cad" type="hidden" id="cad" value="1">
                    </td>
                </tr>
            </table>

            <?php if (!isset($_smarty_tpl->tpl_vars['alt']->value)){?>
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
            <?php }?>

        </div>
    </form>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script>
    setaSelect('<?php echo $_smarty_tpl->tpl_vars['comoChegou']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['chkReceberEmails']->value;?>
');
</script><?php }} ?>