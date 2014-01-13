<?php

require_once ('include/classes/Loader.class.php');
require_once ('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);

function formataData($data) {

    if(!isset($data)) {
        return "";
    }

    $returnValue = preg_split('"-"', $data, -1);
    return $returnValue[2] . "/" . $returnValue[1] . "/" . $returnValue[0];
}

function mes($mes) {
    if($mes == '1') {
        return "JANEIRO";
    } else if($mes == '2') {
        return "FEVEREIRO";
    }  else if($mes == '3') {
        return "MARÇO";
    } else if($mes == '4') {
        return "ABRIL";
    } else if($mes == '5') {
        return "MAIO";
    } else if($mes == '6') {
        return "JUNHO";
    } else if($mes == '7') {
        return "JULHO";
    } else if($mes == '8') {
        return "AGOSTO";
    } else if($mes == '9') {
        return "SETEMBRO";
    } else if($mes == '10') {
        return "OUTUBRO";
    } else if($mes == '11') {
        return "NOVEMBRO";
    } else {
        return "DEZEMBRO";
    }
}

function grid($listaPeriodicos, $mes) {

    $cor = false;
    $htmlRetorno = "";

    if(count($listaPeriodicos) > 0) {
        $htmlRetorno .= count($listaPeriodicos)." Periódicos para o Mês de <b>". mes($mes) ."</b><br>";
    }
    $htmlRetorno .= "<div class='datagrid'>";
    $htmlRetorno .= "<table id='mainDeck'>";
    $htmlRetorno .= "<thead>";
    $htmlRetorno .= "   <tr>";
    $htmlRetorno .= "       <th></th>";
    $htmlRetorno .= "       <th>Nome</th>";
    $htmlRetorno .= "       <th>Matrícula</th>";
    $htmlRetorno .= "       <th>Idade</th>";
    $htmlRetorno .= "       <th>Último Periódico</th>";
    $htmlRetorno .= "       <th>Data Inicio</th>";
    $htmlRetorno .= "       <th>Data Fim</th>";
    $htmlRetorno .= "   </tr>";
    $htmlRetorno .= "</thead>";
    $htmlRetorno .= "<tbody>";

    if(count($listaPeriodicos) > 0) {
        foreach ($listaPeriodicos as $periodico) {

            //$periodico = new Periodico();
            $anoNascimento = preg_split('"-"', $periodico->empregado->dataNascimento, -1);

            $classe = ($cor = !$cor) ? 'normal' : 'alt';
            $htmlRetorno .= "<tr class='" . $classe . "'>";
            $htmlRetorno .= "   <td>" . "<input type='checkbox' class='chkPeriodico' value='".$periodico->codigo."'>" . "</td>";
            $htmlRetorno .= "   <td>" . $periodico->empregado->nome . "</td>";
            $htmlRetorno .= "   <td>" . $periodico->empregado->matricula . "</td>";
            $htmlRetorno .= "   <td>" . (date('Y') - $anoNascimento[0]) . " anos</td>";
            $htmlRetorno .= "   <td>" . formataData($periodico->dataUltimo) . "</td>";
            $htmlRetorno .= "   <td>" . formataData($periodico->dataInicio) . "</td>";
            $htmlRetorno .= "   <td>" . formataData($periodico->dataFim) . "</td>";
            $htmlRetorno .= '</tr>';
        }
    } else {
        $htmlRetorno .= "   <tr class='conteudo'>";
        $htmlRetorno .= "       <td class='semCartas' colspan='5'>Nenhum Periódico Cadastrado</td>";
        $htmlRetorno .= "   </tr>";
    }

    $htmlRetorno .= "</tbody>";
    $htmlRetorno .= "</table>";
    $htmlRetorno .= "</div>";
    $htmlRetorno .= "<table>";
    $htmlRetorno .= "<thead>";
    $htmlRetorno .= "   <tr>";
    $htmlRetorno .= "       <th><input type='button' value='Iniciar' class='button black' onclick='marcarPeriodico(1)'></th>";
    $htmlRetorno .= "       <th><input type='button' value='Finalizar' class='button black' onclick='marcarPeriodico(2)'></th>";
    $htmlRetorno .= "   </tr>";
    $htmlRetorno .= "</thead>";
    $htmlRetorno .= "</table>";

    return $htmlRetorno;
}

$op = $_POST['op'];
$smart = retornaSmarty();


if($op == 'consultar') {

    $bc = new PeriodicoBC();
    $periodico = new Periodico();

    $periodico->empregado->localidade = $_POST['selEmpresa'];
    $periodico->empregado->matricula = $_POST['txtMatricula'];
    $mes = $_POST['selMes'];
    $periodico->dataInicio = $mes;

    $listaPeriodicosPorPeriodo = $bc->consultarEmpregadosPendentePeriodicoPorMes($_SESSION[BANCO_SESSAO], $periodico);
    $listaRetornoTela = array();
    $listaDatas = array();

    foreach ($listaPeriodicosPorPeriodo as $periodicoIterator) {

        $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $periodicoIterator->empregado->matricula));
        $listaDatas = $bc->consultar($_SESSION[BANCO_SESSAO], null, $filtro);

        $anoUltimaDataInicio = preg_split('"-"', $listaDatas[0]->dataInicio, -1);

        if(($anoUltimaDataInicio[0]) == date('Y')) {
            $periodicoIterator->dataInicio = $listaDatas[0]->dataInicio;
            $periodicoIterator->dataFim = $listaDatas[0]->dataFim;
            $periodicoIterator->dataUltimo = $listaDatas[count($listaDatas) - 1]->dataFim;
        } else {
            $periodicoIterator->dataInicio = null;
            $periodicoIterator->dataFim = null;
            $periodicoIterator->dataUltimo = $listaDatas[count($listaDatas) - 1]->dataFim;
        }

        if($periodicoIterator->isMaisQuarentaAnos == '1') {
            $listaRetornoTela[] = $periodicoIterator;
        } else {
            $anoUltimoPeriodico = preg_split('"-"', $periodicoIterator->dataUltimo, -1);
            if(($anoUltimoPeriodico[0] + 2) == date('Y')) {
                $listaRetornoTela[] = $periodicoIterator;
            }
        }
    }

    //*************** GRID *************************
    echo(grid($listaRetornoTela, $mes));

} else if($op == 'datas') {

    $bc = new PeriodicoBC();
    $codigos = preg_split('"-"', $_POST['codigosAlterarData'], -1);

    $camposValores = array();

    if($_POST['inicioOuFim'] == '1') {
        $camposValores['data_inicio'] = date('Y-m-d');
    } else {
        $camposValores['data_fim'] = date('Y-m-d');
    }

    for($cont = 0; $cont < count($codigos); $cont++) {
        $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("codigo" => $codigos[$cont]));
        $bc->alterar($_SESSION[BANCO_SESSAO], $camposValores, $filtro);
    }


} else {
    $smart->display('periodico_por_mes.tpl');
}


