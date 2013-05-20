// _____________________________________________BUSCA DE CARTA__________________________________________________________
function setarCampos() {
    if ($('#nomeCartaEN').val()) {
        var sites = $("input[name='sitesParser[]']:checked");
        if (sites.size() == 0) {
            if ($("#sitesParserBox").is(":hidden")) {
                $("#sitesParserBox").toggle();
            }
            $("#sitesParserLink").poshytip('update', 'Escolha ao menos um site para buscar').poshytip('show');
        } else if (sites.size() > 4) {
            $("#sitesParserBox").poshytip('show');
        } else {
            if ($("#sitesParserBox").is(":visible")) {
                $("#sitesParserBox").toggle();
            }

            var checkbox = [];
            for (var i = 0; i < sites.size(); i++) {
                checkbox.push(encodeURI(sites.eq(i).val()));
            }

            var campos = "nomeCartaBuscar=" + encodeURI($('#nomeCartaEN').val())
                + "&sitesParser[]=" + checkbox.join("&sitesParser[]=")
                + "&metodo=html";

            if ($('#nomeCartaEN')[0].selecionado) {
                enviarForm('cardSearch.php', campos, 'divResultado');
            } else {
                verificarCarta('include/verifyCard.php', campos, 'divResultado');
            }
            $('#nomeCartaEN')[0].selecionado = false;
        }
    } else {
        $("#nomeCartaEN").poshytip('update', 'Digite um nome de carta..').poshytip('show');
    }
}

function verificarCarta(url, campos, destino) {
    var elemento = document.getElementById(destino);
    $.ajax({
        type: "POST",
        url: url,
        data: campos,
        beforeSend: function () {
            $.blockUI({
                message: "<h2>Aguarde, buscando as cartas...</h2><img src='../include/img/loading-cards.gif'>",
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
            $("#nomeCartaEN").autocomplete("close");
            if (data.substring(0, 2) === "@@") {
                $("#nomeCartaEN").val(decodeURIComponent((data.substring(18, data.indexOf("&")) + '').replace(/\+/g, '%20')));
                enviarForm("cardSearch.php", data.substr(2), destino);
            } else {
                $.unblockUI();
                elemento.innerHTML = data;
                $('#logo_buscartas, #br_pesquisa').hide();
                $('#logo_buscartas_peq, #dadosCarta, #resultadosBusca').show();
            }
        }
    });
}

function enviarForm(url, campos, destino) {
    var elemento = document.getElementById(destino);
    $.ajax({
        type: "POST",
        url: url,
        data: campos,
        beforeSend: function () {
            $.blockUI({
                message: "<h2>Aguarde, buscando as cartas...</h2><img src='../include/img/loading-cards.gif'>",
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
            $("#nomeCartaEN").autocomplete("close");
            elemento.innerHTML = data;
            ordenar();
            var cnt = $("#botoesBuscar").contents();
            $("#botoesBuscar").replaceWith(cnt);
            $('#logo_buscartas, #br_pesquisa').hide();
            $('#logo_buscartas_peq, #dadosCarta, #resultadosBusca').show();
        }
    });
}

$(function () {
    // -------------------------- BOTÃO CONFIGURAR --------------------------
    $("#sitesParserLink").click(function () {
        $("#sitesParserBox").toggle();
    });

    if ($("#nomeCartaEN").size() > 0) {
        $("#nomeCartaEN").focus().autocomplete({
            source: '../include/autocomplete.php',
            minLength: 2,
            maxHeight: 400,
            select: function (event, ui) {
                var item = ui.item;
                $("#nomeCartaEN").val(item.nameEN);
                $("#nomeCartaPT").val(item[item.namePT == "" ? 'nameEN' : 'namePT']);
                $("#idCarta").val(item._id);
                $("#edition_code").val(item.edition);
                $("#cartaNum").val(item.number);
                this.selecionado = true;
                setarCampos();
                return false;
            },
            focus: function (event, ui) {
                return false;
            }
        }).data("uiAutocomplete")._renderItem = function (ul, item) {
            var namePT = item.nameEN;
            var regex = new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + $.ui.autocomplete.escapeRegex(this.term) + ")(?![^<>]*>)(?![^&;]+;)", "gi");
            if (item.namePT != null && item.namePT != "") {
                namePT = item.namePT.replace(regex, "<span class='highlight_search'>$1</span>");
            }
            var nameEN = item.nameEN.replace(regex, "<span class='highlight_search'>$1</span>");
            return $("<li></li>")
                .data("item.autocomplete", item)
                .append("<a><span class='nameEN'>" + nameEN + "</span><br><span class='namePT'>" + namePT + "</span></a>")
                .appendTo(ul);
        };
    }

    $('#sitesParserLink').poshytip({
        className: 'tip-darkgray',
        content: 'Escolha ao menos um site para buscar',
        alignTo: 'target',
        alignX: 'right',
        offsetX: 0,
        offsetY: -37,
        showOn: 'none',
        timeOnScreen: 2000
    });

    $('#nomeCartaEN').poshytip({
        className: 'tip-darkgray',
        content: 'Digite um nome de carta válido...',
        alignTo: 'target',
        alignX: 'left',
        offsetX: 0,
        offsetY: -37,
        showOn: 'none',
        timeOnScreen: 2000
    });

    $("#sitesParserBox").poshytip({
        className: 'tip-darkgray',
        content: 'Escolha no máximo 4 sites para buscar',
        alignTo: 'target',
        alignX: 'right',
        offsetX: 0,
        offsetY: -37,
        showOn: 'none',
        timeOnScreen: 2000
    })
});