// _____________________________________________ORDENACAO DO RESULTADO__________________________________________________________

function ordenar() {



    $("#resultado_busca").tablesorter({
        textExtraction: {
            1: function(node, table, cellIndex){ return $(node).find(".precoGrande")[0].innerHTML; },
            3: function(node, table, cellIndex){ return $(node).find(".qtde")[0].innerHTML; }

        }
    });

    var sorting = [[1,1]];

    if($("#selectOrdenacao").val() == "REL"){
        sorting = [[5,0],[1,0],[3,1]];
    } else if($("#selectOrdenacao").val() == "QTD"){
        sorting = [[3,1],[1,0]];
    } else if($("#selectOrdenacao").val() == "P-ASC"){
        sorting = [[1,0]];
    } else if($("#selectOrdenacao").val() == "P-DSC"){
        sorting = [[1,1]];
    }

    $("#resultado_busca").trigger("sorton",[sorting]);

    return false;
}