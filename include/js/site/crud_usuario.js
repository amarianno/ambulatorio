function enviarNovaSenha() {
    if ($('#novoEmail').val() == '') {
        return false;
    }

    var campos = 'novoEmail=' + $('#novoEmail').val();
    enviarNovaSenhaAjax('novaSenha.php', campos, "resultado");
}

function enviarNovaSenhaAjax(url, campos, destino) {
    var elemento = document.getElementById(destino);
    $.ajax({
        type: "POST",
        url: url,
        data: campos,
        success: function (data) {
            $("#dialogNovaSenha").dialog("close");
            $("#novoEmail").val('');
            $("#access_acount").poshytip({
                className: 'tip-twitter',
                alignTo: 'target',
                alignX: 'right',
                alignY: 'center',
                offsetX: 5
            }).poshytip('update', data).poshytip('show');
        }
    });
}

//_____________________________________________________FUNÇÕES CADASTRO USUARIO______________________________________________________________
function addUsuario() {

    var campos = "txtPrimeiroNome=" + $("#txtPrimeiroNome").val() + "&txtUltimoNome=" + $("#txtUltimoNome").val();
    campos += "&txtEmail=" + $("#txtEmail").val() + "&txtLogin=" + $("#txtLogin").val();
    campos += "&txtCPF=" + $("#txtCPF").val() + "&txtDigitoVerif=" + $("#txtDigitoVerif").val();
    campos += "&selComoChegouAteNos=" + document.getElementById("selComoChegouAteNos").value + "&txtSenha=" + $("#txtSenha").val();
    campos += "&cad=" + $("#cad").val() + "&news=" + $("#chkReceberEmails").val() + "&txtDCI=" + $("#txtDCI").val();
    addUsuarioBanco('cadusuarios.php', campos, 'divSucesso');
}

function addUsuarioBanco(url, campos, destino) {
    var elemento = document.getElementById(destino);
    $.ajax({
        type: "POST",
        url: url,
        data: campos,
        beforeSend: function () {
            $.blockUI({
                message: "<h1>Enviando dados...</h1><img src='../include/img/loading-cards.gif'>",
                css: {
                    border: 'none',
                    padding: '15px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .5,
                    color: '#fff'
                }
            });
        },
        success: function (data) {
            $.unblockUI();
            //elemento.innerHTML = data;
            $('#mensagemCadastro').html(data);
        }
    });
}

$(function () {
    $("#cadUsuarioForm").validate({
        // Define as regras
        rules: {
            txtPrimeiroNome: {
                required: true
            },
            txtUltimoNome: {
                required: true
            },
            txtEmail: {
                required: true, email: true
            },
            txtCPF: {
                minlength: 11, maxlength: 11, number: true
            },
            txtDCI: {
                minlength: 10, maxlength: 10, number: true
            },
            txtSenhaAtual: {
                required: true, minlength: 6
            },
            txtSenha: {
                required: true, minlength: 6
            },
            txtConfirmaSenha: {
                required: true, minlength: 6, equalTo: '#txtSenha'
            }
        },
        // Define as mensagens de erro para cada regra
        messages: {
            txtPrimeiroNome: {
                required: ""
            },
            txtUltimoNome: {
                required: ""
            },
            txtEmail: {
                required: "",
                email: ""
            },
            txtCPF: {
                cpf: ""
            },
            txtDCI: {
                minLength: ""
            },
            txtSenhaAtual: {
                required: "",
                minLength: ""
            },
            txtSenha: {
                required: "",
                minLength: ""
            },
            txtConfirmaSenha: {
                required: "",
                minLength: "",
                equalTo: ""
            }
        },
        submitHandler: function(e) {
            addUsuario();
        }
    });

    // -------------------------- FORMS ----------------------------
    $('.form').poshytip({
        className: 'tip-twitter',
        alignTo: 'target',
        alignX: 'right',
        alignY: 'center',
        offsetX: 5
    });

});