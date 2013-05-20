//_____________________________________________________FUNÇÕES WISHLIST E DECK _________________________________________________________
function copyDeck(idDeck) {
    var campos = 'op=copydeck';
    campos += '&idDeck=' + idDeck;
    campos += '&deckOrWish=' + ($('#deckOrWish').size() > 0 ? $('#deckOrWish').val() : 'd');
    $.ajax({
        type: "POST",
        url: "crudDeck.php",
        data: campos,
        success: function (data) {
            if (data == "login.php") {
                location.replace(data);
            } else {
                var id = "#btnCopiarDeck" + idDeck;
                $(id).poshytip({
                    content: 'COPIADO',
                    className: 'tip-twitter',
                    alignTo: 'target',
                    alignX: 'right',
                    alignY: 'center',
                    offsetX: 5,
                    showOn: 'none',
                    timeOnScreen: 2000
                }).poshytip('show');
                $("#listaDeDecks").html(data);
            }
        }
    });
}

function exportarDeck(idDeck) {
    $('#idDeckExport').val(idDeck);
    $('#dialogExportDeck').dialog("open");
}

function delDeck(idDeck) {
    var campos = 'op=deldeck';
    campos += '&idDeck=' + idDeck;
    campos += '&deckOrWish=' + $('#deckOrWish').val();
    $.ajax({
        type: "POST",
        url: "crudDeck.php",
        data: campos,
        success: function (data) {
            $("#listaDeDecks").html(data);
//            document.getElementById('listaDeDecks').innerHTML = data;
            $('#exibeDeck').hide();
            $("#textoDeck").html("<h6>Escolha um de seus decks para editar ou crie um novo.</h6>").show();
        }
    });
}

function confirmDelete(idDeck) {
    $("#dialog-confirm").dialog({
        modal: true,
        resizable: false,
        width: 450,
        title: "Excluir " + $('#hdd' + idDeck).val() + "?",
        buttons: {
            "Sim": function () {
                delDeck(idDeck);
                $(this).dialog("close");
            },
            "Não": function () {
                $(this).dialog("close");
            }

        }
    });
    $("#dialog-confirm").html("Confirma exclusão do deck " + $('#hdd' + idDeck).val() + "?");
}

function detalharDeck(idDeck) {
    var deckOrWish = $('#deckOrWish').val();
    var campos = 'op=detail&idDeck=' + idDeck;
    campos += '&deckOrWish=' + deckOrWish;
    $.ajax({
        type: "POST",
        url: "crudDeck.php",
        data: campos,
        beforeSend: function () {
            $("#textoDeck").html("<div style='text-align: center; margin-top: 80px;'>" +
                "Aguarde, carregando deck..." +
                "<br>" +
                "<img src='../include/img/ajax-loader.gif'>" +
                "</div>");
        },
        success: function (data) {
            $("#textoDeck").hide();
            $('#exibeDeck').show();
            $('#idDeckTela').val(idDeck);
            $('#meuDeckMainESide').html(data);
            var qtdeTotal = 0;
            $('[name=qtdeCartas]').each(function () {
                qtdeTotal += Number($(this).val());
            });
            var icones = "";
            if (deckOrWish = "d") {
                icones = "<a id='btnExportarDeck" + idDeck + "' href='javascript:void(0);' onclick='exportarDeck(" + idDeck + ");' style='float: right'>" +
                    "   <img title='Exportar' src='include/img/icon/export-icon.png' class='grayscale'>" +
                    "</a>";
            }
            icones += "<a id='btnCopiarDeck" + idDeck + "' href='javascript:void(0);' onclick='copyDeck(" + idDeck + ");' style='float: right'>" +
                "   <img title='Copiar' src='include/img/icon/copy-icon.png' class='grayscale'>" +
                "</a>" +
                "<a href='javascript:void(0);' onclick='confirmDelete(" + idDeck + ")' style='float: right'>" +
                "   <img title='Apagar' src='include/img/icon/delete-icon.png' class='grayscale'>" +
                "</a>" +
                "<a href='javascript:void(0);' onclick='editNameDeck(" + idDeck + ")' style='float: right'>" +
                "   <img title='Renomear' src='include/img/icon/rename-icon.png' class='grayscale'>" +
                "</a>" +
                "<a href='javascript:void(0);' onclick='abrirAdicionarCartaIndividual();' style='float: right'>" +
                "   <img title='Adicionar carta' src='include/img/icon/add-icon.png' class='grayscale'>" +
                "</a>" +
                "</h4>"
            $('#nomeDeck').html("<h4 class='tituloDeck'>" + "<span id='nomeDeckMudar' > " +
                $('#hdd' + idDeck).val() + " </span> (" + (qtdeTotal == 1 ? "1 carta" : qtdeTotal + " cartas") + ")" +
                icones);
            $("#mainDeck").tablesorter({
                textExtraction: {
                    3: function (node, table, cellIndex) {
                        return $(node).find('img')[0].title;
                    },
                    4: function (node, table, cellIndex) {
                        return $(node).text().split(' ')[1];
                    }

                }
            });
            $("#sideDeck").tablesorter({
                textExtraction: {
                    3: function (node, table, cellIndex) {
                        return $(node).find('img')[0].title;
                    },
                    4: function (node, table, cellIndex) {
                        return $(node).text().split(' ')[1];
                    }

                }
            });
        }
    });
}

function adicionarCartaDeck() { // remover quando apagar exibe_deck.tpl *******************************************************************************************
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

function adicionarCartaWishlist() { // remover quando apagar exibe_deck.tpl *******************************************************************************************
    var campos = "idCarta=" + $("#idCarta").val()
        + "&idset=" + $("#idset").val()
        + "&tipoOperacao=" + $("#tipoOperacao").val()
        + "&addw=" + $("#addw").val();

    adicionarAjax('adicionarCartaSet.php', campos, 'divResultados', "Aguarde, adicionando a carta...");
    $("#nomeCartaEN").focus();
    $("#nomeCartaEN").val("");
}

function adicionarSet() { // remover quando apagar exibe_deck.tpl *******************************************************************************************
    var campos = "nomeset=" + $("#nomeset").val()
        + "&tiposet=" + $("#tiposet").val()
        + "&idset=" + $("#idset").val()
        + "&iduser=" + $("#iduser").val();

    adicionarAjax('user/adicionarSet.php', campos, 'divResultados', "Aguarde, criando o conjunto...");
    $("#nomeset").focus();
    $("#nomeset").val("");
}

function adicionarAjax(url, campos, destino, mensagem) { // remover quando apagar exibe_deck.tpl *******************************************************************************************
    var elemento = document.getElementById(destino);
    $.ajax({
        type: "POST",
        url: url,
        data: campos,
        beforeSend: function () {
            elemento.innerHTML = mensagem
        },
        success: function (data) {
            location.reload();
        }
    });
}

function setaSelect(valor, check) {

    if (check == '1') {
        document.getElementById("chkReceberEmails").checked = true;
    } else {
        document.getElementById("chkReceberEmails").checked = false;
    }

    if (valor == '') return true;
    var meuSelect = document.getElementById("selComoChegouAteNos");
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

// _____________________________________________BOTÕES ADICIONAR e DETALHES_____________________________________________
function addWishList() {
    $("#radioMain, #radioSide").buttonset();

    $("#dialogAddDeckw").dialog({
        autoOpen: true,
        maxHeight: 640,
        width: 480,
        closeOnEscape: true
    })
}
function showDetails() {
    $("#dialogDetalhes.ui-dialog-content").remove();

    $("#dialogDetalhes").clone().dialog({
        autoOpen: true,
        maxHeight: 640,
        width: 580,
        closeOnEscape: true
    });
}

function addDeck() {
    $("#radioMain, #radioSide").buttonset();

    $("#dialogAddDeckd").dialog({
        autoOpen: true,
        maxHeight: 640,
        width: 480,
        closeOnEscape: true
    })
}

function addDeckAjax() {
    var campos = "idCarta=" + $("#idCarta").val() + "&operacao=d";

    campos += "&radioMain=" + $("[name=radioMain]:checked").val();
    campos += "&radioSide=" + $("[name=radioSide]:checked").val();
    campos += "&deckChoosed=" + $('#deckChoosed').val();

    addWishListAjax("addWishListDeck.php", campos, 'd');
}

function addWishListAjaxTela() {
    var campos = "idCarta=" + $("#idCarta").val() + "&operacao=w";

    campos += "&radioMain=" + $("[name=radioMain]:checked").val();
    campos += "&radioSide=0";
    campos += "&deckChoosew=" + $('#deckChoosew').val();

    addWishListAjax("addWishListDeck.php", campos, 'w');
}

function addWishListAjax(url, campos, operacao) {
    $.ajax({
        type: "POST",
        url: url,
        data: campos,
        success: function (data) {
            if (data == "sucesso") {
                $("#msg" + operacao).show().delay(3000).hide(0);
            } else {
                var myurl = "login.php";
                $(location).attr('href', myurl);
            }
        }
    });
}

function toLoginPage() {
    var myurl = "http://www.buscartas.com.br/login.php";
    $(location).attr('href', myurl);
}

//_______________________________________________FUNÇÕES ONLOAD_________________________________________________________
$(function () {
    // Mouseover imagem da carta
    $(document).tooltip({
        items: "[alt]",
        content: function () {
            var element = $(this);
            if (element.is("[alt]")) {
                return "<img src='" + element.attr("alt") + "'>";
            }
        }
    });

    $(".numerico").keydown(function (event) {
        // Allow: backspace, delete, tab, escape, and enter
        if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
            // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) ||
            // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault();
            }
        }
    });

    // -------------------------- MENU --------------------------
    $("ul.sf-menu").superfish({
        animation: {height: 'show'},   // slide-down effect without fade-in
        autoArrows: false,
        speed: 'fast'
    });

    // --------------------------  --------------------------
    $("#wishlistBtnResultTela").click(function () {
        var campos = "idCarta=" + $("#idCarta").val() + "&operacao=w";
        addWishListAjax("addWishListDeck.php", campos);
    });

});

// Exibe mensagem de no máximo 4 sites para serem escolhidos na busca
function limitarParsers(parser) {
    if ($("input[name='sitesParser[]']:checked").size() > 4) {
        parser.checked = false;
        $("#sitesParserBox").poshytip('show');
        return false;
    }
}