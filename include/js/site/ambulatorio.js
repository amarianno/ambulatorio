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
    if($("#dtRelatorioIni").size() > 0) {
        $("#dtRelatorioIni").mask("99/99/99");
    }
    if($("#dtRelatorioFIM").size() > 0) {
        $("#dtRelatorioFIM").mask("99/99/99");
    }
    if($("#txtAdmissao").size() > 0) {
        $("#txtAdmissao").mask("99/99/9999");
    }
    if($("#txtDataNascimento").size() > 0) {
        $("#txtDataNascimento").mask("99/99/9999");
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
    mes=Number(data[1]);
    ano=Number(data[2]);
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
    document.getElementById('chkINSS').checked = false;
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
    campos += "&chkINSS=" + (document.getElementById('chkINSS').checked ? '1' : '0');
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
            document.getElementById('chkINSS').checked = (atestado.inss == '1' ? true : false);

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
    campos += "&txtAdmissao=" + $("#txtAdmissao").val();
    campos += "&txtDataNascimento=" + $("#txtDataNascimento").val();
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
    $("#txtAdmissao").val('');
    $("#txtDataNascimento").val('');
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
                $('#txtAdmissao').val(funcionario.dataAdmissao);
                $('#txtDataNascimento').val(funcionario.dataNascimento);
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

    if($("#txtCod1").val() == '') {
        $("#txtCod1").focus()
        return false;
    }




    var campos =  "txtMatricula=" + $("#txtMatricula").val();
    campos +=  "&selUf=" + document.getElementById("selUf").value;
    campos +=  "&selCaraterSol=" + document.getElementById("selCaraterSol").value;
    campos +=  "&txtCID=" + $("#txtCID").val();
    campos +=  "&txtIndClicina=" + $("#txtIndClicina").val();

    var cont = 1;
    if(document.getElementById("chkHemogramaCompleto").checked) {
        campos +=  "&txtCod" + cont +"=" + document.getElementById("chkHemogramaCompleto").value;
        campos +=  "&txtDesc" + cont +"=" + document.getElementById("chkHemogramaCompleto").name;
        cont++;
    }

    if(document.getElementById("chkGlicoseJejum").checked) {
        campos +=  "&txtCod" + cont +"=" + document.getElementById("chkGlicoseJejum").value;
        campos +=  "&txtDesc" + cont +"=" + document.getElementById("chkGlicoseJejum").name;
        cont++;
    }

    if(document.getElementById("chkRotinaUrina").checked) {
        campos +=  "&txtCod" + cont +"=" + document.getElementById("chkRotinaUrina").value;
        campos +=  "&txtDesc" + cont +"=" + document.getElementById("chkRotinaUrina").name;
        cont++;
    }

    if(document.getElementById("chkCreatinina").checked) {
        campos +=  "&txtCod" + cont +"=" + document.getElementById("chkCreatinina").value;
        campos +=  "&txtDesc" + cont +"=" + document.getElementById("chkCreatinina").name;
        cont++;
    }

    if(document.getElementById("chkTrigliceris").checked) {
        campos +=  "&txtCod" + cont +"=" + document.getElementById("chkTrigliceris").value;
        campos +=  "&txtDesc" + cont +"=" + document.getElementById("chkTrigliceris").name;
        cont++;
    }

    if(document.getElementById("chkAcidoUrico").checked) {
        campos +=  "&txtCod" + cont +"=" + document.getElementById("chkAcidoUrico").value;
        campos +=  "&txtDesc" + cont +"=" + document.getElementById("chkAcidoUrico").name;
        cont++;
    }

    if(document.getElementById("chkTsh").checked) {
        campos +=  "&txtCod" + cont +"=" + document.getElementById("chkTsh").value;
        campos +=  "&txtDesc" + cont +"=" + document.getElementById("chkTsh").name;
        cont++;
    }

    if(document.getElementById("chkT4livre").checked) {
        campos +=  "&txtCod" + cont +"=" + document.getElementById("chkT4livre").value;
        campos +=  "&txtDesc" + cont +"=" + document.getElementById("chkT4livre").name;
        cont++;
    }

    if(document.getElementById("chkColesterolTotal").checked) {
        campos +=  "&txtCod" + cont +"=" + document.getElementById("chkColesterolTotal").value;
        campos +=  "&txtDesc" + cont +"=" + document.getElementById("chkColesterolTotal").name;
        cont++;
    }

    if(document.getElementById("chkColesterolHDL").checked) {
        campos +=  "&txtCod" + cont +"=" + document.getElementById("chkColesterolHDL").value;
        campos +=  "&txtDesc" + cont +"=" + document.getElementById("chkColesterolHDL").name;
        cont++;
    }

    if(document.getElementById("chkOftalmologista").checked) {
        campos +=  "&txtCod" + cont +"=" + document.getElementById("chkOftalmologista").value;
        campos +=  "&txtDesc" + cont +"=" + document.getElementById("chkOftalmologista").name;
        cont++;
    }

    if(document.getElementById("chkTonometriaBinocular").checked) {
        campos +=  "&txtCod" + cont +"=" + document.getElementById("chkTonometriaBinocular").value;
        campos +=  "&txtDesc" + cont +"=" + document.getElementById("chkTonometriaBinocular").name;
        cont++;
    }

    if(document.getElementById("chkPSA").checked) {
        campos +=  "&txtCod" + cont +"=" + document.getElementById("chkPSA").value;
        campos +=  "&txtDesc" + cont +"=" + document.getElementById("chkPSA").name;
        cont++;
    }

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

    if($("#dtRelatorioIni").val() == '') {return false;}
    if($("#dtRelatorioFIM").val() == '') {return false;}

    var dataINIformatada = $("#dtRelatorioIni").val().split("/");

    var campos =  "dtRelatorioIni=" + dataINIformatada[0] + "/" + dataINIformatada[1] + "/" + "20"+dataINIformatada[2];

    dataINIformatada = $("#dtRelatorioFIM").val().split("/");

    campos +=  "&dtRelatorioFIM=" + dataINIformatada[0] + "/" + dataINIformatada[1] + "/" + "20"+dataINIformatada[2];
    campos +=  "&txtPatologia=" + $("#txtPatologia").val();
    campos +=  "&selEspecialidade=" + document.getElementById("selEspecialidade").value;
    campos += "&op=consultar"
    consulta('relatorio_cid_mensal.php', campos, 'conteudoGrid');
}

function consultaCIDPorMesPDF() {

    if($("#dtRelatorioIni").val() == '') {return false;}
    if($("#dtRelatorioFIM").val() == '') {return false;}

    var dataINIformatada = $("#dtRelatorioIni").val().split("/");

    var campos =  "dtRelatorioIni=" + dataINIformatada[0] + "/" + dataINIformatada[1] + "/" + "20"+dataINIformatada[2];

    dataINIformatada = $("#dtRelatorioFIM").val().split("/");

    campos +=  "&dtRelatorioFIM=" + dataINIformatada[0] + "/" + dataINIformatada[1] + "/" + "20"+dataINIformatada[2];
    campos +=  "&txtPatologia=" + $("#txtPatologia").val();
    campos +=  "&selEspecialidade=" + document.getElementById("selEspecialidade").value;
    campos += "&op=pdf"
    //consulta('relatorio_cid_mensal.php', campos, 'conteudoGrid');

    window.open('relatorio_cid_mensal.php?' + campos);

}

function consultaCIDPorAnual() {

    var campos = "op=consultar_anual"
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

function consultaPeriodicoPendentesPorMes() {

    if($("#dtRelatorio").val() == '') {return false;}

    var campos =  "selMes=" +document.getElementById("selMes").value;
    campos +=  "&selEmpresa=" + document.getElementById("selEmpresa").value;
    campos +=  "&txtMatricula=" + $("#txtMatricula").val();
    campos += "&op=consultar"
    consulta('periodico_por_mes.php', campos, 'conteudoGrid');
}

function consultaEmpregadosAtrasados() {

    var campos =  "selEmpresa=" + document.getElementById("selEmpresa").value;
    campos += "&op=consultar"
    consulta('periodico_atraso.php', campos, 'conteudoGrid');
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

function consultaAtestadosLicencaINSS() {

    if($("#dataInicial").val() == '' || $("#dataFinal").val() == '') {return false;}

    var campos =  "dataInicial=" + $("#dataInicial").val();
    campos +=  "&dataFinal=" + $("#dataFinal").val();
    campos += "&op=consultar";
    consulta('consulta_inss.php', campos, 'conteudoGrid');
}

function desmarcarTodosExames() {

    document.getElementById("chkHemogramaCompleto").checked = false;
    document.getElementById("chkGlicoseJejum").checked = false;
    document.getElementById("chkRotinaUrina").checked = false;
    document.getElementById("chkCreatinina").checked = false;
    document.getElementById("chkTrigliceris").checked = false;
    document.getElementById("chkAcidoUrico").checked = false;
    document.getElementById("chkTsh").checked = false;
    document.getElementById("chkT4livre").checked = false;
    document.getElementById("chkColesterolTotal").checked = false;
    document.getElementById("chkColesterolHDL").checked = false;
    document.getElementById("chkOftalmologista").checked = false;
    document.getElementById("chkTonometriaBinocular").checked = false;
    document.getElementById("chkPSA").checked = false;

}

function marcarExames() {

    if(document.getElementById("selGrupoExames").value == '1') {

        desmarcarTodosExames();
        document.getElementById("chkHemogramaCompleto").checked = true;
        document.getElementById("chkGlicoseJejum").checked = true;
        document.getElementById("chkRotinaUrina").checked = true;
        document.getElementById("chkCreatinina").checked = true;
        document.getElementById("chkTrigliceris").checked = true;

    } else if(document.getElementById("selGrupoExames").value == '2') {

        desmarcarTodosExames();
        document.getElementById("chkAcidoUrico").checked = true;
        document.getElementById("chkTsh").checked = true;
        document.getElementById("chkT4livre").checked = true;

    } else if(document.getElementById("selGrupoExames").value == '3') {

        desmarcarTodosExames();
        document.getElementById("chkColesterolTotal").checked = true;
        document.getElementById("chkColesterolHDL").checked = true;

    } else if(document.getElementById("selGrupoExames").value == '4') {

        desmarcarTodosExames();
        document.getElementById("chkOftalmologista").checked = true;
        document.getElementById("chkTonometriaBinocular").checked = true;

    } else {
        desmarcarTodosExames();
    }

}

//****************** PERIODICOS **********************************************
function marcarPeriodico(inicioOuFim) {
    var checados =  $("input.chkPeriodico:checked");
    var retorno = "";
    var cont = 1;

    for(var i = 0; i < checados.length; i++) {
        retorno += checados[i].value;
        if(cont != checados.length) {
            retorno += "-";
            cont++;
        }
    }

    $.ajax({
        type: "POST",
        url: 'periodico_por_mes.php',
        data: 'op=datas&matriculas=' + retorno + "&inicioOuFim=" + inicioOuFim,
        success: function (data) {
            consultaPeriodicoPendentesPorMes();
        }
    });
}

function consultaEmpregadosPlanejamentoPorMes() {

    if(document.getElementById("selMes").value == '' && $("#txtMatricula").val() == '') {
        return false;
    }

    var campos =  "selMes=" +document.getElementById("selMes").value;
    campos +=  "&selEmpresa=" + document.getElementById("selEmpresa").value;
    campos +=  "&txtMatricula=" + $("#txtMatricula").val();
    campos += "&op=consultar"
    consulta('planejamento_periodicos.php', campos, 'conteudoGrid');
}

function planejarPeriodico() {
    var matriculas =  $("input.chkEmpregado:checked");
    var retorno = "";
    var cont = 1;

    for(var i = 0; i < matriculas.length; i++) {
        retorno += matriculas[i].value;
        if(cont != matriculas.length) {
            retorno += "-";
            cont++;
        }
    }

    $.ajax({
        type: "POST",
        url: 'planejamento_periodicos.php',
        data: 'op=mudarplanejamento&matriculas=' + retorno + "&selMesPlanejamento=" + document.getElementById("selMesPlanejamento").value,
        success: function (data) {
            alert('Alterado com sucesso')
            consultaEmpregadosPlanejamentoPorMes();
        }
    });
}

function recuperarPeriodicoAno() {
    completaCopyPaste();

    var campos =  "txtMatricula=" + $("#txtMatricula").val();
    campos += "&op=visualizar";

    document.getElementById("selDoenca").value = '';
    document.getElementById("selEncaminhamento").value = '';

    $.ajax({
        type: "POST",
        url: 'doenca_encaminhamento.php',
        data: campos,
        success: function (data) {
            var periodico = jQuery.parseJSON ( data );
            if(periodico != null && periodico != '') {
                $("#hidCodigo").val(periodico.codigo);
                document.getElementById("selDoenca").value = periodico.doenca.codigo;
                document.getElementById("selEncaminhamento").value = periodico.encaminhamento.codigo;
            }
        }
    });
}

function limparCamposDoencaEncaminhamento() {
    $("#txtMatricula").val('');
    document.getElementById("selDoenca").value = '';
    document.getElementById("selEncaminhamento").value = '';
    $("#nomeEmpregado").html('');
    $("#hidCodigo").val('');
}

function cadastrarDoencaEncaminhamento() {

    if($("#txtMatricula").val() == '') {return false;}

    var campos =  "txtMatricula=" + $("#txtMatricula").val();
    campos +=  "&selDoenca=" + document.getElementById("selDoenca").value;
    campos +=  "&selEncaminhamento=" + document.getElementById("selEncaminhamento").value;
    campos +=  "&hidCodigo=" + $("#hidCodigo").val();
    campos += "&op=incluir";

    $.ajax({
        type: "POST",
        url: 'doenca_encaminhamento.php',
        data: campos,
        success: function (data) {
            alert('Alterado com sucesso')
            $("#txtMatricula").val('');
            document.getElementById("selDoenca").value = '';
            document.getElementById("selEncaminhamento").value = '';
            $("#nomeEmpregado").html('');
            $("#hidCodigo").val('');
        }
    });
}


//********AVALIACAO OCUPACIONAL**************************************

function recuperarAvaliacaoOcupacional() {
    completaCopyPaste();

    var campos =  "txtMatricula=" + $("#txtMatricula").val();
    campos += "&op=visualizar";

    limparCamposAvaliacaoOcupacional(false);

    $.ajax({
        type: "POST",
        url: 'avaliacao_ocupacional.php',
        data: campos,
        success: function (data) {
            var periodico = jQuery.parseJSON ( data );
            if(periodico != null && periodico != '') {
                $("#hidCodigo").val(periodico.codigo);
                document.getElementById("ativ_desenvolvida").checked = (periodico.atividadeDesenvolvida != '0');
                document.getElementById("volume_trabalho").checked = (periodico.volumeTrabalho != '0');
                document.getElementById("relacao_chefia").checked = (periodico.relacaoChefia != '0');
                document.getElementById("relacao_colegas").checked = (periodico.relacaoColegas != '0');
                document.getElementById("dores").checked = (periodico.dores != '0');
                document.getElementById("fadiga_visual").checked = (periodico.fadigaVisual != '0');
                document.getElementById("tensao_emocional").checked = (periodico.tensaoEmocional != '0');
                document.getElementById("outros").checked = (periodico.outros != '0');

                //historia patologica
                document.getElementById("infecto_contag").checked = (periodico.infectoContagiosa != '0');
                document.getElementById("endocrinas").checked = (periodico.endocrinas != '0');
                document.getElementById("sangue_hemat").checked = (periodico.sangue != '0');
                document.getElementById("pele").checked = (periodico.pele != '0');
                document.getElementById("respiratorio").checked = (periodico.respiratorio != '0');
                document.getElementById("circulatorio").checked = (periodico.circulatorio != '0');
                document.getElementById("digestivo").checked = (periodico.digestivo != '0');
                document.getElementById("genito_urinario").checked = (periodico.genitoUrinario != '0');
                document.getElementById("musculo").checked = (periodico.musculo != '0');
                document.getElementById("sist_nervoso").checked = (periodico.sistemaNervoso != '0');
                document.getElementById("emocionais").checked = (periodico.emocionais != '0');
                document.getElementById("outras").checked = (periodico.outras != '0');
                document.getElementById("afast_doenca").checked = (periodico.afastamentoDoenca != '0');
                document.getElementById("deficiencia").checked = (periodico.portadorDeficiencia != '0');

                //Fatores de risco
                document.getElementById("tabaco").value = periodico.tabaco;
                document.getElementById("alcool").value = periodico.alcool;
                document.getElementById("ativ_fisica").checked = (periodico.atividadeFisica != '0');
                document.getElementById("drogas").checked = (periodico.drogas != '0');
                document.getElementById("hipert_arterial").checked = (periodico.hipertensaoArterial != '0');
                $("#pa").val(periodico.pa);
                $("#fc").val(periodico.fc);
                document.getElementById("peso_ideal").value = periodico.pesoIdeal;
                $("#peso").val(periodico.peso);
                $("#altura").val(periodico.altura);
                $("#imc").val(periodico.imc);

                //Exame Clínico
                document.getElementById("pele_mucosas").value = periodico.peleMucosas;
                document.getElementById("cabeca").value = periodico.cabeca;
                document.getElementById("pescoco").value = periodico.pescoco;
                document.getElementById("torax").value = periodico.torax;
                document.getElementById("abdome").value = periodico.abdome;
                document.getElementById("membros_sup_inf").value = periodico.membrosSupInf;
                document.getElementById("sist_nervoso_exam_cli").value = periodico.sistNervosoExameClinico;
                document.getElementById("coluna").value = periodico.coluna;
                document.getElementById("gunitario_cli").value = periodico.genitoUrinarioExameClinico;
                document.getElementById("psiquismo").value = periodico.psiquismo;

                //Exames complementares
                document.getElementById("hemograma").value = periodico.hemograma;
                document.getElementById("creatinina").value = periodico.creatinina;
                document.getElementById("glicemia").value = periodico.glicemia;
                document.getElementById("colesterol_total").value = periodico.colesterolTotal;
                document.getElementById("hdl").value = periodico.hdl;
                document.getElementById("ldl").value = periodico.ldl;
                document.getElementById("vldl").value = periodico.vldl;
                document.getElementById("triglicerideos").value = periodico.triglicerideos;
                document.getElementById("psa").value = periodico.psa;
                document.getElementById("eas").value = periodico.eas;
                document.getElementById("oftalmico").value = periodico.exameOftalmico;
                document.getElementById("outro_exa_comp").value = periodico.outroExamesComplementares;

                //Diagnostico
                $("#cid1").val(periodico.cid1);
                $("#cid2").val(periodico.cid2);
                $("#cid3").val(periodico.cid3);
                $("#cid4").val(periodico.cid4);
                $("#cid5").val(periodico.cid5);
                $("#cid6").val(periodico.cid6);
                document.getElementById("proximo_periodico").value = periodico.proximoPeriodico;

                document.getElementById("doutor").value = periodico.doutor;

                //outros
                $("#queixas").val(periodico.queixas);
                $("#obs").val(periodico.obs);
            }
        }
    });
}

function limparCamposAvaliacaoOcupacional(limpaMatricula) {

    if(limpaMatricula) {
        $("#txtMatricula").val('');
        $("#nomeEmpregado").html('');
        $("#hidCodigo").val('');
    }

    //Avaliacao Ocupacional
    document.getElementById("ativ_desenvolvida").checked = false;
    document.getElementById("volume_trabalho").checked = false;
    document.getElementById("relacao_chefia").checked = false;
    document.getElementById("relacao_colegas").checked = false;
    document.getElementById("dores").checked = false;
    document.getElementById("fadiga_visual").checked = false;
    document.getElementById("tensao_emocional").checked = false;
    document.getElementById("outros").checked = false;
    //historia pregressa
    document.getElementById("infecto_contag").checked = false;
    document.getElementById("endocrinas").checked = false;
    document.getElementById("sangue_hemat").checked = false;
    document.getElementById("pele").checked = false;
    document.getElementById("respiratorio").checked = false;
    document.getElementById("circulatorio").checked = false;
    document.getElementById("digestivo").checked = false;
    document.getElementById("genito_urinario").checked = false;
    document.getElementById("musculo").checked = false;
    document.getElementById("sist_nervoso").checked = false;
    document.getElementById("emocionais").checked = false;
    document.getElementById("outras").checked = false;
    document.getElementById("afast_doenca").checked = false;
    document.getElementById("deficiencia").checked = false;
    //Fatores de risco
    document.getElementById("tabaco").value = '1';
    document.getElementById("alcool").value = '1';
    document.getElementById("ativ_fisica").checked = false;
    document.getElementById("drogas").checked = false;
    document.getElementById("hipert_arterial").checked = false;
    $("#pa").val('');
    $("#fc").val('');
    document.getElementById("peso_ideal").value = '1';
    $("#peso").val('');
    $("#altura").val('');
    $("#imc").val('');

    //Exame Clínico
    document.getElementById("pele_mucosas").value = '1';
    document.getElementById("cabeca").value = '1';
    document.getElementById("pescoco").value = '1';
    document.getElementById("torax").value = '1';
    document.getElementById("abdome").value = '1';
    document.getElementById("membros_sup_inf").value = '1';
    document.getElementById("sist_nervoso_exam_cli").value = '1';
    document.getElementById("coluna").value = '1';
    document.getElementById("gunitario_cli").value = '1';
    document.getElementById("psiquismo").value = '1';

    //Exames complementares
    document.getElementById("hemograma").value = '1';
    document.getElementById("creatinina").value = '1';
    document.getElementById("glicemia").value = '1';
    document.getElementById("colesterol_total").value = '1';
    document.getElementById("hdl").value = '1';
    document.getElementById("ldl").value = '1';
    document.getElementById("vldl").value = '1';
    document.getElementById("triglicerideos").value = '1';
    document.getElementById("psa").value = '1';
    document.getElementById("eas").value = '1';
    document.getElementById("oftalmico").value = '1';
    document.getElementById("outro_exa_comp").value = '1';

    //Diagnostico
    $("#cid1").val('');
    $("#cid2").val('');
    $("#cid3").val('');
    $("#cid4").val('');
    $("#cid5").val('');
    $("#cid6").val('');
    document.getElementById("proximo_periodico").value = '';
    document.getElementById("doutor").value = '';

    //outros
    $("#queixas").val('');
    $("#obs").val('');

}

function cadastrarAvaliacaoOcupacional() {

    if($("#txtMatricula").val() == '') {return false;}

    var campos =  "txtMatricula=" + $("#txtMatricula").val();
    //Avaliação Ocupacional
    campos +=  "&ativ_desenvolvida=" + (document.getElementById("ativ_desenvolvida").checked ? '1' : '0');
    campos +=  "&volume_trabalho=" + (document.getElementById("volume_trabalho").checked ? '1' : '0');
    campos +=  "&relacao_chefia=" + (document.getElementById("relacao_chefia").checked ? '1' : '0');
    campos +=  "&relacao_colegas=" + (document.getElementById("relacao_colegas").checked ? '1' : '0');
    campos +=  "&dores=" + (document.getElementById("dores").checked ? '1' : '0');
    campos +=  "&fadiga_visual=" + (document.getElementById("fadiga_visual").checked ? '1' : '0');
    campos +=  "&tensao_emocional=" + (document.getElementById("tensao_emocional").checked ? '1' : '0');
    campos +=  "&outros=" + (document.getElementById("outros").checked ? '1' : '0');
    //Historia Pregressa
    campos +=  "&infecto_contag=" + (document.getElementById("infecto_contag").checked ? '1' : '0');
    campos +=  "&endocrinas=" + (document.getElementById("endocrinas").checked ? '1' : '0');
    campos +=  "&sangue_hemat=" + (document.getElementById("sangue_hemat").checked ? '1' : '0');
    campos +=  "&pele=" + (document.getElementById("pele").checked ? '1' : '0');
    campos +=  "&respiratorio=" + (document.getElementById("respiratorio").checked ? '1' : '0');
    campos +=  "&circulatorio=" + (document.getElementById("circulatorio").checked ? '1' : '0');
    campos +=  "&digestivo=" + (document.getElementById("digestivo").checked ? '1' : '0');
    campos +=  "&genito_urinario=" + (document.getElementById("genito_urinario").checked ? '1' : '0');
    campos +=  "&musculo=" + (document.getElementById("musculo").checked ? '1' : '0');
    campos +=  "&sist_nervoso=" + (document.getElementById("sist_nervoso").checked ? '1' : '0');
    campos +=  "&emocionais=" + (document.getElementById("emocionais").checked ? '1' : '0');
    campos +=  "&outras=" + (document.getElementById("outras").checked ? '1' : '0');
    campos +=  "&afast_doenca=" + (document.getElementById("afast_doenca").checked ? '1' : '0');
    campos +=  "&deficiencia=" + (document.getElementById("deficiencia").checked ? '1' : '0');
    //Fatores de risco
    campos +=  "&tabaco=" + document.getElementById("tabaco").value;
    campos +=  "&alcool=" + document.getElementById("alcool").value;
    campos +=  "&ativ_fisica=" + (document.getElementById("ativ_fisica").checked ? '1' : '0');
    campos +=  "&drogas=" + (document.getElementById("drogas").checked ? '1' : '0');
    campos +=  "&hipert_arterial=" + (document.getElementById("hipert_arterial").checked ? '1' : '0');
    campos +=  "&pa=" + $("#pa").val();
    campos +=  "&fc=" + $("#fc").val();
    campos +=  "&peso_ideal=" + document.getElementById("peso_ideal").value;
    campos +=  "&peso=" + $("#peso").val();
    campos +=  "&altura=" + $("#altura").val();
    campos +=  "&imc=" + $("#imc").val();
    //Exame clinico
    campos +=  "&pele_mucosas=" + document.getElementById("pele_mucosas").value;
    campos +=  "&cabeca=" + document.getElementById("cabeca").value;
    campos +=  "&pescoco=" + document.getElementById("pescoco").value;
    campos +=  "&torax=" + document.getElementById("torax").value;
    campos +=  "&abdome=" + document.getElementById("abdome").value;
    campos +=  "&membros_sup_inf=" + document.getElementById("membros_sup_inf").value;
    campos +=  "&sist_nervoso_exam_cli=" + document.getElementById("sist_nervoso_exam_cli").value;
    campos +=  "&coluna=" + document.getElementById("coluna").value;
    campos +=  "&gunitario_cli=" + document.getElementById("gunitario_cli").value;
    campos +=  "&psiquismo=" + document.getElementById("psiquismo").value;
    //Exames complementares
    campos +=  "&hemograma=" + document.getElementById("hemograma").value;
    campos +=  "&creatinina=" + document.getElementById("creatinina").value;
    campos +=  "&glicemia=" + document.getElementById("glicemia").value;
    campos +=  "&colesterol_total=" + document.getElementById("colesterol_total").value;
    campos +=  "&hdl=" + document.getElementById("hdl").value;
    campos +=  "&ldl=" + document.getElementById("ldl").value;
    campos +=  "&vldl=" + document.getElementById("vldl").value;
    campos +=  "&triglicerideos=" + document.getElementById("triglicerideos").value;
    campos +=  "&psa=" + document.getElementById("psa").value;
    campos +=  "&eas=" + document.getElementById("eas").value;
    campos +=  "&oftalmico=" + document.getElementById("oftalmico").value;
    campos +=  "&outro_exa_comp=" + document.getElementById("outro_exa_comp").value;
    //Diagnostico
    campos +=  "&cid1=" + $("#cid1").val();
    campos +=  "&cid2=" + $("#cid2").val();
    campos +=  "&cid3=" + $("#cid3").val();
    campos +=  "&cid4=" + $("#cid4").val();
    campos +=  "&cid5=" + $("#cid5").val();
    campos +=  "&cid6=" + $("#cid6").val();
    campos +=  "&proximo_periodico=" + document.getElementById("proximo_periodico").value;
    //outros
    campos +=  "&queixas=" + $("#queixas").val();
    campos +=  "&obs=" + $("#obs").val();
    campos +=  "&doutor=" +  + document.getElementById("doutor").value;
    //codigo
    campos +=  "&hidCodigo=" + $("#hidCodigo").val();
    campos += "&op=incluir";

    $.ajax({
        type: "POST",
        url: 'avaliacao_ocupacional.php',
        data: campos,
        success: function (data) {
            alert('Alterado com sucesso')
            limparCamposAvaliacaoOcupacional(true);
        }
    });
}

function calculaImc() {

    if($("#peso").val() == '') { return ''}
    if($("#altura").val() == '') { return ''}

    var peso = $("#peso").val();
    peso = peso.replace(",", ".");
    var altura = $("#altura").val();
    altura = altura.replace(",", "");

    altura = Number(altura) * Number(altura);
    var imc = Number(peso) / altura;
    imc = imc * 10000;
    imc = imc.toFixed(2);

    $("#imc").val(imc.replace(".", ","));
    /**
     * Abaixo de 17	Muito abaixo do peso
     Entre 17 e 18,49	Abaixo do peso
     Entre 18,5 e 24,99	Peso normal
     Entre 25 e 29,99	Acima do peso
     Entre 30 e 34,99	Obesidade I
     Entre 35 e 39,99	Obesidade II (severa)
     Acima de 40	Obesidade III (mórbida)
     */
    if(imc < 17) {
        document.getElementById("peso_ideal").value = '1';
    } else if(imc < 18.49) {
        document.getElementById("peso_ideal").value = '2';
    } else if(imc < 24.99) {
        document.getElementById("peso_ideal").value = '3';
    } else if(imc < 29.99) {
        document.getElementById("peso_ideal").value = '4';
    } else if(imc < 34.99) {
        document.getElementById("peso_ideal").value = '5';
    } else if(imc < 39.99) {
        document.getElementById("peso_ideal").value = '6';
    } else {
        document.getElementById("peso_ideal").value = '7';
    }
}

$(function() {

    if ($("#cid1").size() > 0) {
        $( "#cid1" ).autocomplete({
            source: 'include/autocompletecid.php',
            minLength: 1,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#cid1").val(ui.item.nome);
                return false;
            },
            select: function (event, ui) {
                $("#cid1").val(ui.item.nome);
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

$(function() {

    if ($("#cid2").size() > 0) {
        $( "#cid2" ).autocomplete({
            source: 'include/autocompletecid.php',
            minLength: 1,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#cid2").val(ui.item.nome);
                return false;
            },
            select: function (event, ui) {
                $("#cid2").val(ui.item.nome);
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

$(function() {

    if ($("#cid3").size() > 0) {
        $( "#cid3" ).autocomplete({
            source: 'include/autocompletecid.php',
            minLength: 1,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#cid3").val(ui.item.nome);
                return false;
            },
            select: function (event, ui) {
                $("#cid3").val(ui.item.nome);
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

$(function() {

    if ($("#cid4").size() > 0) {
        $( "#cid4" ).autocomplete({
            source: 'include/autocompletecid.php',
            minLength: 1,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#cid4").val(ui.item.nome);
                return false;
            },
            select: function (event, ui) {
                $("#cid4").val(ui.item.nome);
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

$(function() {

    if ($("#cid5").size() > 0) {
        $( "#cid5" ).autocomplete({
            source: 'include/autocompletecid.php',
            minLength: 1,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#cid5").val(ui.item.nome);
                return false;
            },
            select: function (event, ui) {
                $("#cid5").val(ui.item.nome);
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

$(function() {

    if ($("#cid6").size() > 0) {
        $( "#cid6" ).autocomplete({
            source: 'include/autocompletecid.php',
            minLength: 1,
            highlight: true,
            autoFocus: false,
            focus: function (event, ui) {
                $("#cid6").val(ui.item.nome);
                return false;
            },
            select: function (event, ui) {
                $("#cid6").val(ui.item.nome);
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

function abrirInstrucoes() {
    $("#dialog" ).dialog({ width: 700, modal: true  });
}

//*******************************CONSOLIDACAO EMPS******************************
function consultaConsolidacaoEMP() {

    if($("#ano").val() == '') {return false;}

    var campos =  "ano=" + $("#ano").val();
    campos += "&op=buscar"
    consulta('dados_emp.php', campos, 'conteudoGrid');
}
