//_____________________________________________________FUNÇÕES TESTES______________________________________________________________
function setarCamposTest() {
    var checkbox = [];
    var sites = $("input[name='sitesParser[]']:checked");
    for (var i = 0; i < sites.size(); i++) {
        checkbox.push(encodeURI(sites.eq(i).val()));
    }
    var campos = "nomeCartaEN=" + encodeURI($('#nomeCartaEN').val()) + "&nomeCartaPT=" + encodeURI($('#nomeCartaPT').val()) + "&sitesParser[]=" + checkbox.join("&sitesParser[]=") + "&metodo=html&estoque=" + $('#estoque').attr('checked');
    enviarFormTest('../cardSearch.php', campos, 'divResultado');
}

function setarCamposTestDeck() {
    var checkbox = [];
    var sites = $(':checkbox[name=sitesParser]:checked');
    for (var i = 0; i < sites.size(); i++) {
        checkbox.push(encodeURI(sites.eq(i).val()));
    }
    var campos = "qtdeCartas=" + encodeURI($('#qtdeCartas').val()) + "&sitesParser=" + checkbox.join(",") + "&metodo=html&estoque=" + $('#estoque').attr('checked');
    enviarFormTest('deckSearchImporter.php', campos, 'divResultado');
}

function enviarFormTest(url, campos, destino) {
    var elemento = document.getElementById(destino);
    $.ajax({
        type: "POST",
        url: url,
        data: campos,
        beforeSend: function () {
            $('#divResultado').html("<h1>Aguarde, buscando as cartas...</h1>");
        },
        success: function (data) {
            elemento.innerHTML = data;
        }
    });
}

function maximoCheckboxarCheckbox(nome, maximoCheckbox){
    for (var i=0; i<nome.length; i++){
        nome[i].onclick=function(){
            var num_marcados=0;
            for (var i=0; i<nome.length; i++)
                num_marcados+=(nome[i].checked)? 1 : 0
            if (num_marcados>maximoCheckbox){
                alert('O número máximo de elementos que podem ser selecionados é “+maximoCheckbox+”');
                this.checked=false;
            }
        }
    }
}

function limitarParsers(parser) {

    var contagemCheck = 0;
    var checks = document.getElementsByName('sitesParser[]');

    for(var i = 0;  i < checks.length; i++) {
        if(checks[i].checked) {
            contagemCheck++;
        }
    }
    
    if(contagemCheck > 4) {
        parser.checked = false;
        alert('O número máximo de elementos selecionados não pode ser maior que 4');
        return false;
    }
}
//_____________________________________________________FUNÇÕES WISHLIST E DECK _________________________________________________________

function adicionarCartaDeck() {
    var side = document.forms["frmpesquisar"].elements["addSide"];
    var campos = "idCarta=" + $("#idCarta").val()
        + "&tipoOperacao=" + $("#tipoOperacao").val()
        + "&idset=" + $("#idset").val();

    if (side.checked) {
        campos += "&adds=" + $("#adds").val();
    } else {
        campos += "&addd=" + $("#addd").val();
    }

    adicionarAjax('adicionarCartaSet.php', campos, 'divResultados', "Aguarde, adicionando a carta...");
    $("#nomeCartaEN").focus();
    $("#nomeCartaEN").val("");
}

function adicionarCartaWishlist() {
    var campos = "idCarta=" + $("#idCarta").val()
        + "&idset=" + $("#idset").val()
        + "&tipoOperacao=" + $("#tipoOperacao").val()
        + "&addw=" + $("#addw").val();

    adicionarAjax('adicionarCartaSet.php', campos, 'divResultados', "Aguarde, adicionando a carta...");
    $("#nomeCartaEN").focus();
    $("#nomeCartaEN").val("");
}

function adicionarSet() {
    var campos = "nomeset=" + $("#nomeset").val()
        + "&tiposet=" + $("#tiposet").val()
        + "&idset=" + $("#idset").val()
        + "&iduser=" + $("#iduser").val();

    adicionarAjax('user/adicionarSet.php', campos, 'divResultados', "Aguarde, criando o conjunto...");
    $("#nomeset").focus();
    $("#nomeset").val("");
}


function adicionarAjax(url, campos, destino, mensagem) {
    var elemento = document.getElementById(destino);
    $.ajax({
        type: "POST",
        url: url,
        data: campos,
        beforeSend: function () {
            $.blockUI({
                message: "<h1>mensagem</h1><img src='../images/loading-cards.gif'>",
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
            elemento.innerHTML = data;
        }
    });
}


//_____________________________________________________FUNÇÕES DECK PRONTO______________________________________________________________


function buscarDeck() {
    var campos = "idCarta=" + $("#idCarta").val() + "&valorMaximo=" + $("#valorMaximo").val();
    buscarDeckAjax('deckProntoSearch.php', campos, 'divResultados');
}

function buscarDeckAjax(url, campos, destino) {
    var elemento = document.getElementById(destino);
    $.ajax({
        type: "POST",
        url: url,
        data: campos,
        beforeSend: function () {
            $.blockUI({
                message: "<h1>Aguarde, buscando os decks...</h1><img src='../images/loading-cards.gif'>",
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
            elemento.innerHTML = data;
        }
    });
}

//_____________________________________________________FUNÇÕES CADASTRO USUARIO______________________________________________________________


function aaaaddUsuario() {
    var campos = "txtPrimeiroNome=" + $("#txtPrimeiroNome").val() + "&txtUltimoNome=" + $("#txtUltimoNome").val();
    campos += "&txtEmail=" + $("#txtEmail").val() + "&txtLogin=" + $("#txtLogin").val();
    campos += "&txtCPF=" + $("#txtCPF").val() + "&txtDigitoVerif=" + $("#txtDigitoVerif").val();
    campos += "&selComoChegouAteNos=" + $("#selComoChegouAtehidCodigoNos").val() + "&txtSenha=" + $("#txtSenha").val();
    campos += "&cad=" + $("#cad").val() + "&news=" + $("#chkReceberEmails").val();
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
                message: "<h1>Enviando dados...</h1><img src='../images/loading-cards.gif'>",
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
            elemento.innerHTML = data;
        }
    });
}

$(document).ready(function () {
    $("#form73").validate({
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
                cpf: true
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
                required: "Nome Obrigatório"
            },
            txtUltimoNome: {
                required: "Último Nome Obrigatório"
            },
            txtEmail: {
                required: "E-mail Obrigatório",
                email: "Digite um e-mail válido"
            },
            txtCPF: {
                //required: "CPF Obrigatório",
                cpf: "CPF Inválido"
            },
            txtSenhaAtual: {
                required: "Senha Atual Obrigatória",
                minLength: "Mínimo de 6 caracteres"
            },
            txtSenha: {
                required: "Senha  Obrigatória",
                minLength: "Mínimo de 6 caracteres"
            },
            txtConfirmaSenha: {
                required: "Senha  Obrigatória",
                minLength: "Mínimo de 6 caracteres",
                equalTo: "Senhas devem ser iguais"
            }
        }
    });
});

function setaSelect(valor, check) {

    if (check == '1') {
        document.getElementById("chkReceberEmails").checked = true;
    } else {
        document.getElementById("chkReceberEmails").checked = false;
    }

    if (valor == '') return true;
    var meuSelect = $("#selComoChegouAteNos");
    var i = 0;
    while (true) {
        if (meuSelect.options[i].value == valor) {
            meuSelect.selectedIndex = i;
            break;
        } else {
            i++;
        }
    }
}

// _______________________________________________FUNÇÕES NORMAIS______________________________________________________________
function setarCampos() {
    if ($('#nomeCartaEN').val()) {
        var sites = $("input[name='sitesParser[]']:checked");
        if (sites.size() == 0) {
            if ($("#sitesParserBox").is(":hidden")) {
                $("#sitesParserBox").toggle();
            }
            $("#divResultado").html("<h2>Marque um site para realizar sua busca</h2>");
        } else {
            if ($("#sitesParserBox").is(":visible")) {
                $("#sitesParserBox").toggle();
            }
            var checkbox = [];
            for (var i = 0; i < sites.size(); i++) {
                checkbox.push(encodeURI(sites.eq(i).val()));
            }
            var campos = "nomeCartaEN=" + encodeURI($('#nomeCartaEN').val())
                    + "&nomeCartaPT=" + encodeURI($('#nomeCartaPT').val())
                    + "&sitesParser[]=" + checkbox.join("&sitesParser[]=")
                    + "&metodo=html"
                    + "&idCarta=" + $('#idCarta').val()
                    + "&estoque=" + $('#estoque').attr('checked')
                    + "&cardImagePath=" + $("#edition_code").val() + "/thumb/" + $("#cartaNum").val() + ".jpg"
                ;

            enviarForm('cardSearch.php', campos, 'divResultado');
        }
    }
}

function enviarForm(url, campos, destino) {
    var elemento = document.getElementById(destino);
    $.ajax({
        type: "POST",
        url: url,
        data: campos,
        beforeSend: function () {
            $.blockUI({
                message: "<h1>Aguarde, buscando as cartas...</h1><img src='../images/loading-cards.gif'>",
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
            elemento.innerHTML = data;
           // $('#logo_buscartas').hide();
           // $('#logo_buscartas_peq').show();
           // $('#infocards').show();

        }
    });
}

$(function () {
    $(document).tooltip({
        items: "[title], [alt]",
        content: function () {
            var element = $(this);
            if (element.is("[title]")) {
                return "<img src='" + element.attr("title") + "'>";
            }
            if (element.is("[alt]")) {
                return element.attr("alt");
            }
        }
    });
    $('#logo_buscartas_peq').hide();


    //----------------------Modal dos dados do usuário-----------------------
    $("#dialog").dialog({
        autoOpen: false,
        minHeight: 'auto',
        width: 'auto',
        closeOnEscape: true,
        draggable: false,
        resizable: false,
        position: { my: "left top", at: "left bottom+10", of: "#dados_usuario" }
    });
    $(".ui-dialog-titlebar").hide();
    jQuery('body')
        .bind(
        'click',
        function (e) {
            if (jQuery('#dialog').dialog('isOpen')
                && !jQuery(e.target).is('.ui-dialog, a')
                && !jQuery(e.target).closest('.ui-dialog').length) {
                jQuery('#dialog').dialog('close');
            }
        }
    );
    $("#dados_usuario")
        .click(function () {
            $("#dialog").dialog("open");
        });
    //-------------------------------------------------------------------------

    $('#nomeCartaEN').keyup(function () {
        $("#nomeCartaPT").val("");
    });

    $("#nomeCartaEN").autocomplete({
        source: '../include/autocomplete.php',
        minLength: 2,
        maxHeight: 400,
        highlight: true,
        search: function () {
//            $(this).addClass('working');
        },
        open: function () {
//            $(this).removeClass('working');
        },
        focus: function (event, ui) {
            $("#nomeCartaEN").val(ui.item.nameEN);
            return false;
        },
        select: function (event, ui) {
            $("#nomeCartaEN").val(ui.item.nameEN);
            $("#nomeCartaPT").val(ui.item.namePT);
            $("#idCarta").val(ui.item._id);
            $("#edition_code").val(ui.item.edition);
            $("#cartaNum").val(ui.item.number);
//            $( "#cardImage" ).attr('src', 'cards/'+ui.item.edition+'/'+ui.item.number+'.jpg');
            return false;
        }
    }).data("autocomplete")._renderItem = function (ul, item) {
        var namePT = item.nameEN;
        if (item.namePT != null && item.namePT != "") {
            namePT = item.namePT.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + $.ui.autocomplete.escapeRegex(this.term) + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<span class='highlight'>$1</span>");
        }
        var nameEN = item.nameEN.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + $.ui.autocomplete.escapeRegex(this.term) + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<span class='highlight'>$1</span>");
        return $("<li></li>")
            .data("item.autocomplete", item)
            .append("<a><span class='nameEN'>" + nameEN + "</span><br /><span class='namePT'>" + namePT + "</span></a>")
            .appendTo(ul);
    }
    ;
    $('.checkall').click(function () {
        $(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
    });

    $('#sitesParserBox').hide();

    $("#sitesParserLink").click(function () {
        $("#sitesParserBox").toggle();
    });

    $('#selectAll').toggle(
        function () {
            $('input[name="sitesParser"]').prop('checked', true);
        },
        function () {
            $('input[name="sitesParser"]').prop('checked', false);
        }
    );
});