<?php /* Smarty version Smarty-3.1.13, created on 2014-02-21 22:31:54
         compiled from "templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:964755378513f20a2006d81-52733366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81a0270564c79ee7a1c4f40d2a5e8bcfac7e3570' => 
    array (
      0 => 'templates/login.tpl',
      1 => 1393032709,
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
    'senha_invalida' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_513f20a208d923_75420552')) {function content_513f20a208d923_75420552($_smarty_tpl) {?><html>
<head>
    <link href="include/css/login-box.css" rel="stylesheet" type="text/css" />
    <style>
        .errorblock {
            color: #ff0000;
            background-color: #ffEEEE;
            border: 3px solid #ff0000;
            padding: 8px;
            margin: 16px;
        }
    </style>
</head>
<body onload="document.forms[0].j_username.focus();" >

<form action="login.php" method="post" name="formLogin" >
    <div style="padding: 100px 0 0 250px;">
        <div id="login-box">
            <!-- <h2>Login</h2>  -->
            <img src="include/img/icon/serpro.png" width="200" height="90" style="margin-left: 90px;" /> <br />
            <div id="login-box-name" style="margin-top: 20px;">CPF:</div>
            <div id="login-box-field" style="margin-top: 20px;">
                <input name="j_username" id="j_username" class="form-login" title="Username" value="" size="30" maxlength="11" />
            </div>
            <div id="login-box-name">Senha:</div>
            <div id="login-box-field">
                <input name="j_password" id="j_password" type="password" class="form-login" title="Password" value="" size="30" maxlength="8" />
            </div>
            <br />
            <?php if (isset($_smarty_tpl->tpl_vars['senha_invalida']->value)){?>
                <span style="color: red; text-align: center">
                    <strong>
                        Usuário ou senha inválidos
                    </strong>
                </span>
            <?php }?>
            <br />
            <img src="include/img/login-btn.png" width="103" height="42" style="margin-left: 90px;" onclick="document.forms[0].submit()" />
        </div>
    </div>
</form>
</body>
</html><?php }} ?>