<?php /* Smarty version Smarty-3.1.13, created on 2013-04-23 07:21:11
         compiled from "templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:964755378513f20a2006d81-52733366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81a0270564c79ee7a1c4f40d2a5e8bcfac7e3570' => 
    array (
      0 => 'templates/login.tpl',
      1 => 1366722985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '964755378513f20a2006d81-52733366',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_513f20a208d923_75420552',
  'variables' => 
  array (
    'mensagem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_513f20a208d923_75420552')) {function content_513f20a208d923_75420552($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"Buscartas - login"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("menu_top_2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="centerDiv">
    <form id="loginForm" action="login.php" method="post">
        <div class="center">
            <?php echo $_smarty_tpl->tpl_vars['mensagem']->value;?>

            <br>
            E-mail: <input type="text" name="edtlogin" size="40">
            <br>
            Senha: <input type="password" name="edtsenha" size="40">
            <br>
            <span onclick="$(this).parents('form').submit(); return false;" class="button black size">Login</span>
            <br>
            <span id="access_account" style="cursor: pointer;">Não consegue acessar a sua conta?</span>

            <br>
            <br>
            <a href="/auth/facebook">
                <img src="include/img/facebook-button.png" class="grayscale" title="Logar com o Facebook"/>
            </a>
            <a href="/auth/google">
                <img src="include/img/google-button.png" class="grayscale" title="Logar com o Google+"/>
            </a>

            <input type="hidden" id="btnlogin" name="btnlogin" value="login">
        </div>
    </form>
</div>

<div id="dialogNovaSenha" title="Nova Senha" style="display: none">
    <form id="addForm">
        <label for="novoEmail">Digite o seu e-mail: </label> <input type="text" id="novoEmail" placeholder="Email">
        <br>
        <br>
        <span class="button black" onclick="enviarNovaSenha();">ENVIAR</span>

        <div id="resultado"></div>
    </form>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



    <script>
        $(function () {
            $("#dialogNovaSenha").dialog({
                autoOpen: false,
                maxHeight: 640,
                width: 480,
                closeOnEscape: true
            })

            $("#access_account").click(function () {
                $("#dialogNovaSenha").dialog("open");
            })
        });

    </script>

<?php }} ?>