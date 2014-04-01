<?php

require_once ('include/classes/Loader.class.php');
require_once ('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');


function existeDataPrevista($matricula) {
    $bc = new PeriodicoBC();
    $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $matricula));
    $lista = $bc->consultar($_SESSION[BANCO_SESSAO], null, $filtro);

    for($i = 0; $i < count($lista);  $i++) {
        $ano = preg_split('"-"', $lista[$i]->dataPrevisao, -1);
        if($ano[0] == date('Y')) {
            return $lista[$i]->codigo;
        }
    }

    return 0;
}

$op = $_POST['op'];
$smart = retornaSmarty();

if($op == 'consultar') {

    $htmlRetorno = '';

    $periodicoBC = new PeriodicoBC();
    $periodico = new Periodico();

    $periodico->empregado->localidade = $_POST['selEmpresa'];
    $periodico->empregado->matricula = $_POST['txtMatricula'];
    $mes = $_POST['selMes'];
    $periodico->dataInicio = $mes;

    //echo($htmlRetorno = PeriodicoUtil::GRID_Planejamento($periodicoBC->consultarEmpregadosPendentePeriodicoPorMes($_SESSION[BANCO_SESSAO], $periodico), $mes));

    if(isset($_POST['selMes']) && $_POST['selMes'] != '') {
        $htmlRetorno = PeriodicoUtil::GRID_Planejamento($periodicoBC->consultarEmpregadosPendentePeriodicoPorMes($_SESSION[BANCO_SESSAO], $periodico), $mes);
    } else {
        $htmlRetorno = PeriodicoUtil::GRID_Planejamento($periodicoBC->consultarEMPPorMatricula($_SESSION[BANCO_SESSAO], $periodico->empregado->matricula, $periodico->empregado->localidade), '');
    }

    echo($htmlRetorno);



} else if($op == 'mudarplanejamento') {

    $bc = new PeriodicoBC();
    $matriculas = preg_split('"-"', $_POST['matriculas'], -1);

    $camposValores = array();
    $camposValores['data_previsao'] = date('Y') ."-".$_POST['selMesPlanejamento']."-01";
    //print_r($camposValores);

    for($cont = 0; $cont < count($matriculas); $cont++) {
       /* $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $matriculas[$cont]));
        $bc->alterar($_SESSION[BANCO_SESSAO], $camposValores, $filtro);*/

        $codigo = existeDataPrevista($matriculas[$cont]);


        if($codigo != 0) {
            $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("codigo" => $codigo));
            $bc->alterar($_SESSION[BANCO_SESSAO], $camposValores, $filtro);
        } else {
            $camposValores['matricula'] = $matriculas[$cont];
            $bc->incluir($_SESSION[BANCO_SESSAO], $camposValores);
        }
    }

} else {

    $smart->assign("combo", Util::montarOptionEmpresa($_SESSION[Constantes::EMPRESA_USUARIO]));
    $smart->display('planejamento_periodicos.tpl');
}