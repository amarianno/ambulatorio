<?php

require_once ('include/classes/Loader.class.php');
require_once ('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$op = $_POST['op'];
$smart = retornaSmarty();

if($op == 'consultar') {

    $bc = new PeriodicoBC();
    $periodico = new Periodico();
    $empresa = $_POST['selEmpresa'];
    $banco = $_SESSION[BANCO_SESSAO];

    $html = "";


    $html .= PeriodicoUtil::GRID_Atrasos($bc->consultarEmpregadosComPeriodicoEmAtraso($banco,"03", $empresa), "3");
    $html .= "<br>";
    $html .= PeriodicoUtil::GRID_Atrasos($bc->consultarEmpregadosComPeriodicoEmAtraso($banco,"04", $empresa), "4");
    $html .= "<br>";
    $html .= PeriodicoUtil::GRID_Atrasos($bc->consultarEmpregadosComPeriodicoEmAtraso($banco,"05", $empresa), "5");
    $html .= "<br>";
    $html .= PeriodicoUtil::GRID_Atrasos($bc->consultarEmpregadosComPeriodicoEmAtraso($banco,"06", $empresa), "6");
    $html .= "<br>";
    $html .= PeriodicoUtil::GRID_Atrasos($bc->consultarEmpregadosComPeriodicoEmAtraso($banco,"07", $empresa), "7");
    $html .= "<br>";
    $html .= PeriodicoUtil::GRID_Atrasos($bc->consultarEmpregadosComPeriodicoEmAtraso($banco,"08", $empresa), "8");
    $html .= "<br>";
    $html .= PeriodicoUtil::GRID_Atrasos($bc->consultarEmpregadosComPeriodicoEmAtraso($banco,"09", $empresa), "9");
    $html .= "<br>";
    $html .= PeriodicoUtil::GRID_Atrasos($bc->consultarEmpregadosComPeriodicoEmAtraso($banco,"10", $empresa), "10");
    $html .= "<br>";
    $html .= PeriodicoUtil::GRID_Atrasos($bc->consultarEmpregadosComPeriodicoEmAtraso($banco,"11", $empresa), "11");


    echo($html);


} else {
    $smart->display('periodico_atraso.tpl');
}