jQuery(function($){
    $("#txtDtRecebimento").mask("99/99/99");
    $("#txtDtIniAfastamento").mask("99/99/99");
    if($("#dtRelatorio").size() > 0) {
        $("#dtRelatorio").mask("99/99");
    }
    if($("#diaRelatorio").size() > 0) {
        $("#diaRelatorio").mask("99/99/99");
    }
    if($("#dataInicial").size() > 0) {
        $("#dataInicial").mask("99/99/99");
    }
    if($("#dataFinal").size() > 0) {
        $("#dataFinal").mask("99/99/99");
    }

});

function numdias(mes,ano) {
    if((mes<8 && mes%2==1) || (mes>7 && mes%2==0)) return 31;
    if(mes!=2) return 30;
    if((ano+2000)%4==0) return 29;
    return 28;
}

function somadias(data, dias) {

    data=data.split('/');
    diafuturo =  Number(data[0]) + Number((dias)-1);
    mes=parseInt(data[1]);
    ano=parseInt(data[2]);
    while(diafuturo>numdias(mes,ano)) {
        diafuturo-=numdias(mes,ano);
        mes++;
        if(mes>12) {
            mes=1;
            ano++;
        }
    }
    if(diafuturo<10) diafuturo='0'+diafuturo;
    if(mes<10) mes='0'+mes;

    return diafuturo+"/"+mes+"/"+ano;
}

function calculaDataFinalDeAfastamento() {

    if($('#txtDtIniAfastamento').val() != "" && $('#txtQtdeDiasAfastado').val() != "") {
        $('#txtDtFimAfastamento').val(somadias($('#txtDtIniAfastamento').val(), $('#txtQtdeDiasAfastado').val()));
    }
}

function completaCopyPaste() {

    if($("#txtMatricula").val() == '') {return false;}

    $.ajax({
        type: "GET",
        url: 'include/autocomplete.php',
        data: 'term=' +  $("#txtMatricula").val(),
        success: function (data) {
            var empregado = jQuery.parseJSON ( data );
            if(empregado != null && empregado != "") {
                $("#nomeEmpregado").html('<b>' + empregado[0].nome + '</b>');
            } else {
                $("#nomeEmpregado").html('<span style="color: blue"><b>FUNCIONARIO DESLIGADO OU NÃO ENCONTRADO</b></span>');
            }
        }
    });
}

function preencheGridAtestados() {

    limparCamposAtestado();

    if($("#txtMatricula").val() == '') {return false;}

    var campos =  "txtMatricula=" + $("#txtMatricula").val();
    preencheGridAtestadosBanco('atestadoLST.php', campos, 'conteudoGrid');
    completaCopyPaste();
}

function preencheGridAtestadosBanco(url, campos, destino) {
    var elemento = document.getElementById(destino);
    $.ajax({
        type: "POST",
        url: url,
        data: campos,
        success: function (data) {
            elemento.innerHTML = data;
        }
    });
}

function apagarAtestado(codigo) {

    var campos = 'codigo=' + codigo;

    $.ajax({
        type: "POST",
        url: 'atestadoDEL.php',
        data: campos,
        success: function (data) {
            //$('#mensagemCadastro').html("<h3 style='color: green'>" + data + "</h3>").delay(3000).hide(0);
            alert(data);
            //limparMatriculaAtestado();
            preencheGridAtestados();
        }
    });
}

function limparCamposAtestado() {

    $("#codigo").val('');
   // $("#txtMatricula").val('');
    $("#txtQtdeDiasAfastado").val('');
    $("#txtDtIniAfastamento").val('');
    $("#txtDtFimAfastamento").val('');
    document.getElementById('chkAcompanhamentoFamiliar').checked = false;
    document.getElementById("selgrauParentesco").selectedIndex = 0;
    document.getElementById('chkConcedidosInternos').checked = false;
    document.getElementById('chkHomologados').checked = false;
    $("#txtCID").val('');
    document.getElementById('chklicencaMaternidade').checked = false;
    document.getElementById('chkHomologadoMedico').checked = false;
    //document.getElementById('conteudoGrid').innerHTML = "";
}

function limparMatriculaAtestado() {
    $("#txtMatricula").val('');
    $("#nomeEmpregado").html('');
    document.getElementById('conteudoGrid').innerHTML = "";
}

function retornaDataFormatada(data) {
    data=data.split('/');
    return data[0] + "/" + data[1] + "/" + "20"+data[2];
}

function syncAcompanhamentoFamiliar() {
    if(document.getElementById("selgrauParentesco").value != '0') {
        document.getElementById('chkAcompanhamentoFamiliar').checked = true;
    } else {
        document.getElementById('chkAcompanhamentoFamiliar').checked = false;
    }
}

function validaCID() {

    if($("#txtCID").val() == '') {return false;}

    var campos = 'cid=' + $("#txtCID").val();
    $.ajax({
        type: "POST",
        url: 'validaCID.php',
        data: campos,
        success: function (data) {
            if(data == 'FALSE') {
                alert('CID inválido');
                $("#txtCID").focus();
            }
        }
    });

}

function addAtestado() {

    if(document.getElementById('chkAcompanhamentoFamiliar').checked && document.getElementById("selgrauParentesco").value == '0') {
        alert('SELECIONAR O GRAU DE PARENTESCO');
        document.getElementById("selgrauParentesco").focus();
        return;
    }

    var campos = "txtDtRecebimento=" + retornaDataFormatada($("#txtDtRecebimento").val()) + "&txtMatricula=" + $("#txtMatricula").val();
    campos += "&txtQtdeDiasAfastado=" + $("#txtQtdeDiasAfastado").val() + "&txtDtIniAfastamento=" + retornaDataFormatada($("#txtDtIniAfastamento").val());
    campos += "&txtDtFimAfastamento=" + retornaDataFormatada($("#txtDtFimAfastamento").val());
    campos += "&chkAcompanhamentoFamiliar=" + (document.getElementById('chkAcompanhamentoFamiliar').checked ? '1' : '0');
    campos += "&selgrauParentesco=" + document.getElementById("selgrauParentesco").value;
    campos += "&chkConcedidosInternos=" + (document.getElementById('chkConcedidosInternos').checked ? '1' : '0');
    campos += "&chkHomologados=" + (document.getElementById('chkHomologados').checked ? '1' : '0');
    campos += "&txtCID=" + $("#txtCID").val();
    campos += "&chklicencaMaternidade=" + (document.getElementById('chklicencaMaternidade').checked ? '1' : '0');
    campos += "&chkHomologadoMedico=" + (document.getElementById('chkHomologadoMedico').checked ? '1' : '0');
    if($("#codigo").val() != '') {
        campos += "&codigo=" + $("#codigo").val();
    }


    addAtestadoBanco('atestadoCAD.php', campos, 'conteudoGrid');
}

function addAtestadoBanco(url, campos, destino) {
    var elemento = document.getElementById(destino);
    $.ajax({
        type: "POST",
        url: url,
        data: campos,
        success: function (data) {
            $('#mensagemCadastro').html("<h3 style='color: green'>" + data + "</h3>").delay(3000).hide(0);
            //alert(data);
            limparCamposAtestado();
            limparMatriculaAtestado();
            //preencheGridAtestados();
        }
    });
}


$(function() {
    if ($("#txtMatricula").size() > 0) {
        $( "#txtMatricula" ).autocomplete({
            source: 'include/autocomplete.php',
            minLength: 2,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#txtMatricula").val(ui.item.matricula);
                $("#nomeEmpregado").html('<b>' + ui.item.nome + '</b>');
                return false;
            },
            select: function (event, ui) {
                $("#txtMatricula").val(ui.item.matricula);
                $("#nomeEmpregado").html('<b>' + ui.item.nome + '</b>');
                return false;
            }
        }).data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li></li>")
                .data("item.autocomplete", item)
                .append("<a><span class='nameEN'>" + item.matricula + "</span></a>")
                .appendTo(ul);
        };
    }
});

$(function() {

    if ($("#txtCID").size() > 0) {
        $( "#txtCID" ).autocomplete({
            source: 'include/autocompletecid.php',
            minLength: 1,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#txtCID").val(ui.item.nome);
                return false;
            },
            select: function (event, ui) {
                $("#txtCID").val(ui.item.nome);
                return false;
            }
        }).data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li></li>")
                .data("item.autocomplete", item)
                .append("<a><span class='nameEN'>" + item.nome + "</span></a>")
                .appendTo(ul);
        };
    }
});

function formataData(dataParaFormatar) {
    var dataSplit = dataParaFormatar.split("-");
    return dataSplit[2] + "/" + dataSplit[1] + "/" + dataSplit[0][2]+dataSplit[0][3];
}

function editarAtestado(value) {

    var campos = 'codigo=' + value;

    $.ajax({
        type: "POST",
        url: 'atestadoEDT.php',
        data: campos,
        success: function (data) {

            var atestado = jQuery.parseJSON ( data );

            $("#codigo").val(atestado.codigo);
            $("#txtDtRecebimento").val(formataData(atestado.dataRecebimento));
            $("#txtMatricula").val(atestado.empregado.matricula);
            $("#txtQtdeDiasAfastado").val(atestado.diasAfastado);
            $("#txtDtIniAfastamento").val(formataData(atestado.dataInicialAfastamento));
            $("#txtDtFimAfastamento").val(formataData(atestado.dataFinalAfastamento));
            document.getElementById('chkAcompanhamentoFamiliar').checked = (atestado.isAcompanhamentoFamiliar == '1' ? true : false);

            var meuSelect = document.getElementById("selgrauParentesco");
            var i = 0;
            while (true) {
                if (meuSelect.options[i].value == atestado.grauParentesco) {
                    meuSelect.selectedIndex = i;
                    break;
                } else {
                    i++;
                }
            }

            document.getElementById('chkConcedidosInternos').checked = (atestado.isConcedidos == '1' ? true : false);
            document.getElementById('chkHomologados').checked = (atestado.isHomologados == '1' ? true : false);
            $("#txtCID").val(atestado.cid);
            document.getElementById('chklicencaMaternidade').checked = (atestado.isLicencaMaternidade == '1' ? true : false);
            document.getElementById('chkHomologadoMedico').checked = (atestado.isHomologadoMedico == '1' ? true : false);

        }
    });
}
 /*
$(document).ready(function () {
    $("#cadAtestadoForm").validate({
        rules: {
            txtDtRecebimento: {
                required: true
            },
            txtMatricula: {
                required: true
            },
            txtQtdeDiasAfastado: {
                required: true
            },
            txtDtIniAfastamento: {
                cpf: true
            },
            txtCID: {
                required: true
            }
        },
        // Define as mensagens de erro para cada regra
        messages: {
            txtDtRecebimento: {
                required: "Data Recebimento Obrigatório"
            },
            txtMatricula: {
                required: "Matrícula Obrigatório"
            },
            txtQtdeDiasAfastado: {
                required: "Quantidade de dias Afastado Obrigatório"
            },
            txtDtIniAfastamento: {
                required: "Data Inicial Obrigatório"
            },
            txtCID: {
                required: "CID Obrigatória"
            }
        },
        submitHandler: function(e) {
            addAtestado();
        }
    });
});*/
/**************************************** CONSULTAS *******************************************************************/

function consultaCIDPorMatricula() {

    if($("#txtMatricula").val() == '') {return false;}

    var campos =  "txtMatricula=" + $("#txtMatricula").val();
    campos += "&txtCID=" + $("#txtCID").val();
    campos += "&op=buscar"
    consulta('cid_por_matricula.php', campos, 'conteudoGrid');
}

function consultaPorMatricula() {

    if($("#txtMatricula").val() == '') {return false;}

    var campos =  "txtMatricula=" + $("#txtMatricula").val();
    campos += "&consultar=1"
    preencheGridAtestadosBanco('consulta_matricula.php', campos, 'conteudoGrid');
    completaCopyPaste();
}

function consulta(url, campos, destino) {
    var elemento = document.getElementById(destino);
    $.ajax({
        type: "POST",
        url: url,
        data: campos,
        success: function (data) {
            elemento.innerHTML = data;
        }
    });
}

function toogle(idDiv) {
    if(idDiv == 1) {
        var o = document.getElementById("gridAcompanhamentoFamiliar");

        if(o.style.display == 'none') {
            o.style.display = 'block';
            $('#addSubaddSubAcompanhamentoFamiliar').html("<img id='addSubAcompanhamentoFamiliar' src='include/img/icon/remove.png' />");
        }  else {
            o.style.display = 'none';
            $('#addSubaddSubAcompanhamentoFamiliar').html("<img id='addSubAcompanhamentoFamiliar' src='include/img/icon/add.png' />");
        }
    } else if(idDiv == 2) {
        var o = document.getElementById("gridHomologados");

        if(o.style.display == 'none') {
            o.style.display = 'block';
            $('#addSubHomologados').html("<img id='addSubHomologados' src='include/img/icon/remove.png' />");
        }  else {
            o.style.display = 'none';
            $('#addSubHomologados').html("<img id='addSubHomologados' src='include/img/icon/add.png' />");
        }
    } else if(idDiv == 3) {
        var o = document.getElementById("gridConcedidos");

        if(o.style.display == 'none') {
            o.style.display = 'block';
            $('#addSubConcedidos').html("<img id='addSubConcedidos' src='include/img/icon/remove.png' />");
        }  else {
            o.style.display = 'none';
            $('#addSubConcedidos').html("<img id='addSubConcedidos' src='include/img/icon/add.png' />");
        }
    } else {
        var o = document.getElementById("gridLicMaternidade");

        if(o.style.display == 'none') {
            o.style.display = 'block';
            $('#addSubLicMaternidade').html("<img id='addSubLicMaternidade' src='include/img/icon/remove.png' />");
        }  else {
            o.style.display = 'none';
            $('#addSubLicMaternidade').html("<img id='addSubLicMaternidade' src='include/img/icon/add.png' />");
        }
    }
}
/**************************************** EMPREGADO *******************************************************************/

function querMesmoApagarEmpregado() {

    if($("#txtMatricula").val() == '') {
        return false;
    }

    $("#dialog-confirm").dialog({
        modal: true,
        resizable: false,
        width: 450,
        title: "Excluir " + $("#txtNome").val() + "?",
        buttons: {
            "Sim": function () {
                apagarEmpregado();
                $(this).dialog("close");
            },
            "Não": function () {
                $(this).dialog("close");
            }

        }
    });
    $("#dialog-confirm").html("Confirma exclusão do Funcionário(a) " + $("#txtNome").val() + "?");
}

function apagarEmpregado() {
    var campos = "txtMatricula=" + $("#txtMatricula").val();
    campos += "&op=apagar";

    $.ajax({
        type: "POST",
        url: 'empregadoCAD.php',
        data: campos,
        success: function (data) {
            alert(data);
            limparCamposEmpregado();
        }
    });
}
function buscarEmpregado() {
    var campos = "txtNomePes=" + $("#txtNomePes").val();
    campos += "&op=buscar";

    $.ajax({
        type: "POST",
        url: 'empregadoCAD.php',
        data: campos,
        success: function (data) {
            document.getElementById('gridEmpregado').innerHTML = data;
        }
    });

}

function addEmpregado() {

    var campos = "txtMatricula=" + $("#txtMatricula").val();
    campos += "&txtNome=" + $("#txtNome").val();
    campos += "&txtLotacao=" + $("#txtLotacao").val();
    campos += "&txtNumCarteira=" + $("#txtNumCarteira").val();
    campos += "&selLocalidade=" + document.getElementById("selLocalidade").value;
    campos += "&cadastraOuAlterar=" + $("#cadastraOuAlterar").val();
    campos += "&op=gravar";


    $.ajax({
        type: "POST",
        url: 'empregadoCAD.php',
        data: campos,
        success: function (data) {
            limparCamposEmpregado();
            alert(data);
        }
    });
}
function limparCamposEmpregado() {

    $("#txtMatricula").val('');
    $("#txtNome").val('');
    $("#txtNumCarteira").val('');
    $("#txtLotacao").val('');
    document.getElementById("selLocalidade").selectedIndex = 0;
}
function existeFuncionario() {

    if($('#txtMatricula').val() == '') {
        return false;
    }

    var campos = 'op=existe&matricula=' + $('#txtMatricula').val();

    $.ajax({
        type: "POST",
        url: 'empregadoCAD.php',
        data: campos,
        success: function (data) {
            var funcionario = jQuery.parseJSON ( data );

            if(funcionario.nome == '' || funcionario.nome == null) {
                $('#cadastraOuAlterar').val('cad');
                $('#txtNome').val('');
                $('#txtLotacao').val('');
                document.getElementById("selLocalidade").selectedIndex = 0;
            } else {
                $('#cadastraOuAlterar').val('alt');
                $('#txtNome').val(funcionario.nome);
                $('#txtLotacao').val(funcionario.lotacao);
                $('#txtNumCarteira').val(funcionario.numCarteira);
                if(funcionario.localidade != '') {
                    var meuSelect = document.getElementById("selLocalidade");
                    var i = 0;
                    while (true) {
                        if (meuSelect.options[i].value == funcionario.localidade) {
                            meuSelect.selectedIndex = i;
                            break;
                        } else {
                            i++;
                        }
                    }
                }
            }
        }
    });
}
/**************************************** EMPREGADO *******************************************************************/
function addCid() {

    var campos = "txtCID=" + $("#txtCID").val();
    campos += "&txtDescricao=" + $("#txtDescricao").val();
    campos += "&cadastraOuAlterar=" + $("#cadastraOuAlterar").val();
    campos += "&op=gravar";


    $.ajax({
        type: "POST",
        url: 'cid.php',
        data: campos,
        success: function (data) {
            limparCamposCid();
            alert(data);
        }
    });
}
function limparCamposCid() {
    $("#cadastraOuAlterar").val('cad');
    $("#codigo").val('');
    $("#txtCID").val('');
    $("#txtDescricao").val('');
}

function existeCID() {

    if($('#txtCID').val() == '') {
        return false;
    }

    var campos = 'op=existe&txtCID=' + $('#txtCID').val();

    $.ajax({
        type: "POST",
        url: 'cid.php',
        data: campos,
        success: function (data) {
            var cid = jQuery.parseJSON ( data );

            if(cid.descricao == '' || cid.descricao == null) {
                $('#cadastraOuAlterar').val('cad');
                $('#txtDescricao').val('');
            } else {
                $('#cadastraOuAlterar').val('alt');
                $('#txtNome').val(cid.nome);
                $('#txtDescricao').val(cid.descricao);
            }
        }
    });
}
/**************************************** PROCEDIMENTO *******************************************************************/
function addProcedimento() {

    var campos = "txtCod=" + $("#txtCod").val();
    campos += "&txtDescricao=" + $("#txtDescricao").val();
    campos += "&hddChave=" + $("#hddChave").val();
    campos += "&cadastraOuAlterar=" + $("#cadastraOuAlterar").val();
    campos += "&op=gravar";


    $.ajax({
        type: "POST",
        url: 'procedimento.php',
        data: campos,
        success: function (data) {
            limparCamposProcedimento();
            alert(data);
        }
    });
}
function limparCamposProcedimento() {
    $("#cadastraOuAlterar").val('cad');
    $("#hddChave").val('');
    $("#txtCod").val('');
    $("#txtDescricao").val('');
}
function existeProcedimento() {

    if($('#txtCod').val() == '') {
        return false;
    }

    var campos = 'op=existe&txtCod=' + $('#txtCod').val();

    $.ajax({
        type: "POST",
        url: 'procedimento.php',
        data: campos,
        success: function (data) {
            var proc = jQuery.parseJSON ( data );

            if(proc.chave == '' || proc.chave == null) {
                $('#cadastraOuAlterar').val('cad');
                $('#txtDescricao').val('');
            } else {
                $('#cadastraOuAlterar').val('alt');
                $('#hddChave').val(proc.chave);
                $('#txtCod').val(proc.codigo);
                $('#txtDescricao').val(proc.descricao);
            }
        }
    });
}

$(function() {

    if ($("#txtCod").size() > 0) {
        $( "#txtCod" ).autocomplete({
            source: 'include/autocompleteprocedimento.php',
            minLength: 1,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#txtCod").val(ui.item.codigo);
                $("#txtDescricao").val(ui.item.descricao);
                return false;
            },
            select: function (event, ui) {
                $("#txtCod").val(ui.item.codigo);
                $("#txtDescricao").val(ui.item.descricao);
                return false;
            }
        }).data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li></li>")
                .data("item.autocomplete", item)
                .append("<a><span class='nameEN'>" + item.codigo + "</span></a>")
                .appendTo(ul);
        };
    }
});
/**************************************** GUIAS *******************************************************************/
function gerarGuia() {


    if($("#txtMatricula").val() == '' || $("#txtMatricula").val().length < 8) {
        $("#txtMatricula").focus()
        return false;
    }

    if($("#txtCID").val() == '') {
        $("#txtCID").focus()
        return false;
    }

    if($("#txtCod1").val() == '') {
        $("#txtCod1").focus()
        return false;
    }


    var campos =  "txtMatricula=" + $("#txtMatricula").val();
    campos +=  "&selUf=" + document.getElementById("selUf").value;
    campos +=  "&selCaraterSol=" + document.getElementById("selCaraterSol").value;
    campos +=  "&txtCID=" + $("#txtCID").val();
    campos +=  "&txtIndClicina=" + $("#txtIndClicina").val();
    campos +=  "&txtCod1=" + $("#txtCod1").val();
    campos +=  "&txtDesc1=" + $("#txtDesc1").val();
    campos +=  "&txtCod2=" + $("#txtCod2").val();
    campos +=  "&txtDesc2=" + $("#txtDesc2").val();
    campos +=  "&txtCod3=" + $("#txtCod3").val();
    campos +=  "&txtDesc3=" + $("#txtDesc3").val();
    campos +=  "&txtCod4=" + $("#txtCod4").val();
    campos +=  "&txtDesc4=" + $("#txtDesc4").val();
    campos +=  "&txtCod5=" + $("#txtCod5").val();
    campos +=  "&txtDesc5=" + $("#txtDesc5").val();

    $.ajax({
        type: "POST",
        url: 'connectorJava.php',
        data: campos,
        success: function (data) {
            window.open('baixarArquivo.php?file='+data, 'Nova Guia','width=300,height=150');
        }
    });
}

$(function() {
    if ($("#txtCod1").size() > 0) {
        $( "#txtCod1" ).autocomplete({
            source: 'include/autocompleteprocedimento.php',
            minLength: 1,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#txtCod1").val(ui.item.codigo);
                $("#txtDesc1").val(ui.item.descricao);
                return false;
            },
            select: function (event, ui) {
                $("#txtCod1").val(ui.item.codigo);
                $("#txtDesc1").val(ui.item.descricao);
                return false;
            }
        }).data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li></li>")
                .data("item.autocomplete", item)
                .append("<a><span class='nameEN'>" + item.codigo + "</span></a>")
                .appendTo(ul);
        };
    }
});

$(function() {
    if ($("#txtCod2").size() > 0) {
        $( "#txtCod2" ).autocomplete({
            source: 'include/autocompleteprocedimento.php',
            minLength: 1,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#txtCod2").val(ui.item.codigo);
                $("#txtDesc2").val(ui.item.descricao);
                return false;
            },
            select: function (event, ui) {
                $("#txtCod2").val(ui.item.codigo);
                $("#txtDesc2").val(ui.item.descricao);
                return false;
            }
        }).data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li></li>")
                .data("item.autocomplete", item)
                .append("<a><span class='nameEN'>" + item.codigo + "</span></a>")
                .appendTo(ul);
        };
    }
});

$(function() {
    if ($("#txtCod3").size() > 0) {
        $( "#txtCod3" ).autocomplete({
            source: 'include/autocompleteprocedimento.php',
            minLength: 1,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#txtCod3").val(ui.item.codigo);
                $("#txtDesc3").val(ui.item.descricao);
                return false;
            },
            select: function (event, ui) {
                $("#txtCod3").val(ui.item.codigo);
                $("#txtDesc3").val(ui.item.descricao);
                return false;
            }
        }).data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li></li>")
                .data("item.autocomplete", item)
                .append("<a><span class='nameEN'>" + item.codigo + "</span></a>")
                .appendTo(ul);
        };
    }
});

$(function() {
    if ($("#txtCod4").size() > 0) {
        $( "#txtCod4" ).autocomplete({
            source: 'include/autocompleteprocedimento.php',
            minLength: 1,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#txtCod4").val(ui.item.codigo);
                $("#txtDesc4").val(ui.item.descricao);
                return false;
            },
            select: function (event, ui) {
                $("#txtCod4").val(ui.item.codigo);
                $("#txtDesc4").val(ui.item.descricao);
                return false;
            }
        }).data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li></li>")
                .data("item.autocomplete", item)
                .append("<a><span class='nameEN'>" + item.codigo + "</span></a>")
                .appendTo(ul);
        };
    }
});

$(function() {
    if ($("#txtCod5").size() > 0) {
        $( "#txtCod5" ).autocomplete({
            source: 'include/autocompleteprocedimento.php',
            minLength: 1,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#txtCod5").val(ui.item.codigo);
                $("#txtDesc5").val(ui.item.descricao);
                return false;
            },
            select: function (event, ui) {
                $("#txtCod5").val(ui.item.codigo);
                $("#txtDesc5").val(ui.item.descricao);
                return false;
            }
        }).data("uiAutocomplete")._renderItem = function (ul, item) {
            return $("<li></li>")
                .data("item.autocomplete", item)
                .append("<a><span class='nameEN'>" + item.codigo + "</span></a>")
                .appendTo(ul);
        };
    }
});

/**************************************** RELATORIOS *******************************************************************/
function consultaCIDPorMes() {

    if($("#dtRelatorio").val() == '') {return false;}

    var campos =  "dtRelatorio=" + $("#dtRelatorio").val();
    campos += "&op=consultar"
    consulta('relatorio_cid_mensal.php', campos, 'conteudoGrid');
}

function consultaAtestadoPorDiaPDF() {
    if($("#diaRelatorio").val() == '') {return false;}
    window.open('relatorio_dia_atestados.php?op=pdf&diaRelatorio=' + $('#diaRelatorio').val());
}

function consultaAtestadoPorDia() {

    if($("#diaRelatorio").val() == '') {return false;}

    var campos =  "diaRelatorio=" + $("#diaRelatorio").val();
    campos += "&op=consultar"
    consulta('relatorio_dia_atestados.php', campos, 'conteudoGrid');
}

function consultaAtestadosHomologadosPorPeriodoPDF() {
    if($("#dataInicial").val() == '' || $("#dataFinal").val() == '') {return false;}
    window.open('relatorio_atest_homol_periodo.php?op=pdf&dataFinal='+ $('#dataFinal').val() +'&dataInicial=' + $('#dataInicial').val());
}

function consultaAtestadosHomologadosPorPeriodo() {

    if($("#dataInicial").val() == '' || $("#dataFinal").val() == '') {return false;}

    var campos =  "dataInicial=" + $("#dataInicial").val();
    campos +=  "&dataFinal=" + $("#dataFinal").val();
    campos += "&op=consultar";
    consulta('relatorio_atest_homol_periodo.php', campos, 'conteudoGrid');
}