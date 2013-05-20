function alterarDeck(idDeck, qtdeCartasNoDeck, idCarta, mainOuSide) {
    var campos = 'op=alt&idDeck=' + idDeck;
    campos += '&qtdeCartasNoDeck=' + qtdeCartasNoDeck;
    campos += '&mainOuSide=' + mainOuSide;
    campos += '&idCarta=' + idCarta;
    campos += '&deckOrWish=' + $('#deckOrWish').val();

    $.ajax({
        type: "POST",
        url: "crudDeck.php",
        data: campos,
        success: function (data) {
            detalharDeck(idDeck);
        }
    });
}

function enviarPara(idDeck, qtdeCartas, qtdeOriginal, idCarta, mainOuSide) {
    var campos = 'op=sendTo&idDeck=' + idDeck;
    campos += '&qtdeCartasNoDeck=' + qtdeCartas;
    campos += '&qtdeOriginal=' + qtdeOriginal;
    campos += '&mainOuSide=' + mainOuSide;
    campos += '&idCarta=' + idCarta;
    campos += '&deckOrWish=' + $('#deckOrWish').val();

    $.ajax({
        type: "POST",
        url: "crudDeck.php",
        data: campos,
        success: function (data) {
            detalharDeck(idDeck);
        }
    });
}

function addCardDeck(idDeck, idCarta, mainOuSide) {
    var campos = 'op=addcard&idDeck=' + idDeck;
    campos += '&mainOuSide=' + mainOuSide;
    campos += '&idCarta=' + idCarta;
    campos += '&qtdeCartasNoDeck=' + $('#qtdeAdd').val();
    campos += '&deckOrWish=' + $('#deckOrWish').val();

    if (idDeck.length > 0 && idCarta.length > 0) {
        $.ajax({
            type: "POST",
            url: "crudDeck.php",
            data: campos,
            success: function (data) {
                $("#nomeCartaEN").val('');
                $('#qtdeAdd').val('1');
                detalharDeck(idDeck);
                $("#idCarta").val('');
            }
        });
    } else {
        $("#nomeCartaEN").poshytip('update', 'Digite um nome válido').poshytip('show');
    }
}

function addNovoDeck() {
    var campos = 'op=adddeck&deckNome=' + $('#deckNome').val();
    campos += '&deckOrWish=' + $('#deckOrWish').val();

    $.ajax({
        type: "POST",
        url: "crudDeck.php",
        data: campos,
        success: function (data) {
            $("#listaDeDecks").html(data);
            $("#dialogAddNovoDeck").dialog("close");
            $('#deckNome').val('');
        }
    });
}

function editarNomeDeck() {
    var idDeck = $('#edtIdDeck').val();
    var campos = 'op=edtdeck&deckNome=' + $('#edtdeckNome').val();
    campos += '&idDeck=' + idDeck;
    campos += '&deckOrWish=' + $('#deckOrWish').val();

    $.ajax({
        type: "POST",
        url: "crudDeck.php",
        data: campos,
        success: function (data) {
            $('#listaDeDecks').html(data);
            $("#dialogEdtDeck").dialog("close");
            $('#nomeDeckMudar').html("<span id='nomeDeckMudar'>" + $('#edtdeckNome').val() + "</span>");
            $('#hdd' + idDeck).val($('#edtdeckNome').val());
            $('#edtdeckNome').val('');
        }
    });
}

function abrirAdicionarCartaIndividual() {
    $("#divAdicionarCartaIndividual").toggle();
    $("#nomeCartaEN").val('');
}

function editNameDeck(idDeck) {
    $("#dialogEdtDeck").dialog({
        autoOpen: false,
        maxHeight: 640,
        width: 480,
        closeOnEscape: true
    })
    $("#edtIdDeck").val(idDeck);
    $("#edtdeckNome").val($('#hdd' + idDeck).val());
    $("#dialogEdtDeck").dialog("open");
}

function importDeck() {
    var id = $("#deckID").val();
    if (id) {
        var campos = "site=" + $("#siteImport option:selected").val() + "&id=" + id;
        campos += '&deckOrWish=' + $('#deckOrWish').val();

        $.ajax({
            type: "POST",
            url: "importar.php",
            data: campos,
            beforeSend: function () {
                $("#dialogImportDeck").dialog("close");
                $.blockUI({
                    message: "<h2>Importando deck, aguarde...</h2><img src='../include/img/loading-cards.gif'>",
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
                $("#listaDeDecks").html(data);
            }
        });
    }
}

$(function () {
    $("#dialogAddNovoDeck").dialog({
        autoOpen: false,
        maxHeight: 640,
        width: 480,
        closeOnEscape: true
    })

    $("#dialogImportDeck").dialog({
        autoOpen: false,
        maxHeight: 640,
        width: 480,
        closeOnEscape: true
    })

    $("#dialogExportDeck").dialog({
        autoOpen: false,
        maxHeight: 640,
        width: 480,
        closeOnEscape: true
    })

    $("#novoDeck").click(function () {
        $("#dialogAddNovoDeck").dialog("open");
    })

    $("#importarDeck").click(function () {
        $("#dialogImportDeck").dialog("open");
    })
});