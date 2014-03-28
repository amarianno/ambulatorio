<html>
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
                <input name="j_password" id="j_password" type="password" class="form-login" title="Password" value="" size="30" maxlength="10" />
            </div>
            <br />
            {if isset($senha_invalida)}
                <span style="color: red; text-align: center">
                    <strong>
                        Usuário ou senha inválidos
                    </strong>
                </span>
            {/if}
            <br />
            <img src="include/img/login-btn.png" width="103" height="42" style="margin-left: 90px;" onclick="document.forms[0].submit()" />
        </div>
    </div>
</form>
</body>
</html>