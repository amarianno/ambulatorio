<?php /* Smarty version 2.6.18, created on 2013-04-20 04:58:16
         compiled from login.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => "Buscartas - login")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu_top_2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="searchform">
    <form id="contactForm" action="login.php" method="post">
        <div class="center">
            <?php echo $this->_tpl_vars['mensagem']; ?>

            <br>
            E-mail: <input type="text" name="edtlogin" size="40">
            <br>
            Senha: <input type="password" name="edtsenha" size="40">
            <br>
            <span onclick="$('#btnlogin').val('login');$('#helper').val('login');$('#contactForm').submit();"
               class="button black size">Login</span>
            <br>
            <span id="acess_acount">Não consegue acessar a sua conta?</span>


            <div id="dialogNovaSenha" title="Nova Senha" style="display: none">
                <form id="addForm">
                    <label for="novoEmail">Digite o seu e-mail:</label>
                    <br>
                    <input type="text" id="novoEmail" placeholder="Email">
                    <br>
                    <br>
                    <span class="button black" onclick="enviarNovaSenha();">ENVIAR</span>

                    <div id="resultado"></div>
                </form>
            </div>

            <input type="hidden" value="" id="helper" name="helper">


            <br>
            <br>
            <a href="/auth/facebook">
                <img src="include/img/facebook-button.png" class="grayscale" title="Logar com o Facebook"/>
            </a>
            <a href="/auth/google">
                <img src="include/img/google-button.png" class="grayscale" title="Logar com o Google+"/>
            </a>
        </div>

        <input type="hidden" id="btnlogin" name="btnlogin" value="Login">
    </form>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
    <script>
        $(function () {
            $("#dialogNovaSenha").dialog({
                autoOpen: false,
                maxHeight: 640,
                width: 480,
                closeOnEscape: true
            })

            $("#acess_acount").click(function () {
                $("#dialogNovaSenha").dialog("open");
            })
        });

    </script>
'; ?>
