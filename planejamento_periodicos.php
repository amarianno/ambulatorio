<?php

require_once ('include/classes/Loader.class.php');
require_once ('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);

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
        $htmlRetorno .= count($listaPeriodicos)." empregados planejados para o mês de <b>". mes($mes) ."</b><br>";
    }
    $htmlRetorno .= "<div class='datagrid'>";
    $htmlRetorno .= "<table id='mainDeck'>";
    $htmlRetorno .= "<thead>";
    $htmlRetorno .= "   <tr>";
    $htmlRetorno .= "       <th></th>";
    $htmlRetorno .= "       <th>Matrícula</th>";
    $htmlRetorno .= "       <th>Nome</th>";
    $htmlRetorno .= "   </tr>";
    $htmlRetorno .= "</thead>";
    $htmlRetorno .= "<tbody>";

    if(count($listaPeriodicos) > 0) {
        foreach ($listaPeriodicos as $periodico) {

            $classe = ($cor = !$cor) ? 'normal' : 'alt';
            $htmlRetorno .= "<tr class='" . $classe . "'>";
            $htmlRetorno .= "   <td>" . "<input type='checkbox' class='chkEmpregado' value='".$periodico->empregado->matricula."'>" . "</td>";
            $htmlRetorno .= "   <td>" . $periodico->empregado->matricula . "</td>";
            $htmlRetorno .= "   <td>" . $periodico->empregado->nome . "</td>";
            $htmlRetorno .= '</tr>';
        }
    } else {
        $htmlRetorno .= "   <tr class='conteudo'>";
        $htmlRetorno .= "       <td class='semCartas' colspan='5'>Nenhum Empregado planejado para o Mês</td>";
        $htmlRetorno .= "   </tr>";
    }

    $htmlRetorno .= "</tbody>";
    $htmlRetorno .= "</table>";
    $htmlRetorno .= "</div>";
    $htmlRetorno .= "<table>";
    $htmlRetorno .= "<thead>";
    $htmlRetorno .= "   <tr>";
    $htmlRetorno .= "       <th>";
    $htmlRetorno .= "       Mudar para: ";
    $htmlRetorno .= "            <select id='selMesPlanejamento' name='selMesPlanejamento' tabindex='1'>";
    $htmlRetorno .= "               <option value='1'>";
    $htmlRetorno .= "                   JANEIRO";
    $htmlRetorno .= "               </option>";
    $htmlRetorno .= "               <option value='2'>";
    $htmlRetorno .= "                   FEVEREIRO";
    $htmlRetorno .= "               </option>";
    $htmlRetorno .= "               <option value='3'>";
    $htmlRetorno .= "                   MARÇO";
    $htmlRetorno .= "               </option>";
    $htmlRetorno .= "               <option value='4'>";
    $htmlRetorno .= "                   ABRIL";
    $htmlRetorno .= "               </option>";
    $htmlRetorno .= "               <option value='5'>";
    $htmlRetorno .= "                   MAIO";
    $htmlRetorno .= "               </option>";
    $htmlRetorno .= "               <option value='6'>";
    $htmlRetorno .= "                   JUNHO";
    $htmlRetorno .= "               </option>";
    $htmlRetorno .= "               <option value='7'>";
    $htmlRetorno .= "                   JULHO";
    $htmlRetorno .= "               </option>";
    $htmlRetorno .= "               <option value='8'>";
    $htmlRetorno .= "                   AGOSTO";
    $htmlRetorno .= "               </option>";
    $htmlRetorno .= "               <option value='9'>";
    $htmlRetorno .= "                   SETEMBRO";
    $htmlRetorno .= "               </option>";
    $htmlRetorno .= "               <option value='10'>";
    $htmlRetorno .= "                   OUTUBRO";
    $htmlRetorno .= "               </option>";
    $htmlRetorno .= "               <option value='11'>";
    $htmlRetorno .= "                   NOVEMBRO";
    $htmlRetorno .= "               </option>";
    $htmlRetorno .= "               <option value='12'>";
    $htmlRetorno .= "                   DEZEMBRO";
    $htmlRetorno .= "               </option>";
    $htmlRetorno .= "            </select>";
    $htmlRetorno .= "           <input type='button' value='Mudar' class='button black' onclick='planejarPeriodico()'>";
    $htmlRetorno .= "       <th>";
    $htmlRetorno .= "   </tr>";
    $htmlRetorno .= "</thead>";
    $htmlRetorno .= "</table>";

    return $htmlRetorno;
}

$op = $_POST['op'];
$smart = retornaSmarty();

if($op == 'consultar') {
    $periodicoBC = new PeriodicoBC();
    $periodico = new Periodico();

    $periodico->empregado->localidade = $_POST['selEmpresa'];
    $periodico->empregado->matricula = $_POST['txtMatricula'];
    $mes = $_POST['selMes'];
    $periodico->dataInicio = $mes;

    $listaPeriodicosPorPeriodo = $periodicoBC->consultarEmpregadosPendentePeriodicoPorMes($_SESSION[BANCO_SESSAO], $periodico);
    $listaRetornoTela = array();
    $listaDatas = array();

    foreach ($listaPeriodicosPorPeriodo as $periodicoIterator) {

        $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $periodicoIterator->empregado->matricula));
        $listaDatas = $periodicoBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);

        $anoUltimaDataInicio = preg_split('"-"', $listaDatas[0]->dataInicio, -1);

        if(($anoUltimaDataInicio[0]) == date('Y')) {
            $periodicoIterator->dataInicio = $listaDatas[0]->dataInicio;
            $periodicoIterator->dataFim = $listaDatas[0]->dataFim;
            //$periodicoIterator->dataUltimo = $listaDatas[count($listaDatas) - 1]->dataFim;
        } else {
            $periodicoIterator->dataInicio = null;
            $periodicoIterator->dataFim = null;
            //$periodicoIterator->dataUltimo = $listaDatas[count($listaDatas) - 1]->dataFim;
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

} else if($op == 'mudarplanejamento') {

    $bc = new PeriodicoBC();
    $matriculas = preg_split('"-"', $_POST['matriculas'], -1);

    $camposValores = array();
    $camposValores['data_previsao'] = date('Y') ."-".$_POST['selMesPlanejamento']."-".date('d');

    for($cont = 0; $cont < count($codigos); $cont++) {
        $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $matriculas[$cont]));
        $bc->alterar($_SESSION[BANCO_SESSAO], $camposValores, $filtro);
    }

} else {
    $smart->display('planejamento_periodicos.tpl');
}