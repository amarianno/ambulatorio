//_____________________________________________________FUNÇÕES DECK PRONTO______________________________________________________________
function buscarDeck() {
    if ($('#nomeCartaEN').val() == '') return false;
    var campos = "idCarta=" + $("#idCarta").val() + "&valorMaximo=" + $("#valorMaximo").val();
    $('#deck_detalhar').hide(0);
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
                message: "<h1>Aguarde, buscando os decks...</h1><img src='../include/img/loading-cards.gif'>",
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