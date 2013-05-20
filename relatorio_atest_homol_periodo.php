<?php

require_once ('include/classes/Loader.class.php');
require_once ('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

//ini_set('memory_limit','256M');
/*ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);*/

$op = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];

if($op == 'pdf') {

    $atestBC = new AtestadoBC();
    $empregBC = new EmpregadoBC();

    $dataInicial = RelatorioAtestadosHomologadosPeriodoHelper::retornaDataFormatada($_GET['dataInicial']);
    $dataFinal = RelatorioAtestadosHomologadosPeriodoHelper::retornaDataFormatada($_GET['dataFinal']);
    $filtro = null;

    $listaAtestadosHomologadosPeriodo = $atestBC->consultarAtestadosHomologadosPorPeriodo($_SESSION[BANCO_SESSAO], $dataInicial, $dataFinal);

    if(count($listaAtestadosHomologadosPeriodo) > 0) {

        $htmlRetorno = "";
        $htmlRetorno .= "<h1><b> ATESTADOS HOMOLOGADOS PELO SESMT </b><h1>";
        $htmlRetorno .= "Período solicitado: <b>". $_GET['dataInicial'] . " a ".$_GET['dataFinal']."</b><br><br>";
        $htmlRetorno .= RelatorioAtestadosHomologadosPeriodoHelper::toHtmlGrid($listaAtestadosHomologadosPeriodo);

    } else {
        $htmlRetorno .= RelatorioAtestadosHomologadosPeriodoHelper::toHtmlSemRegistros();
    }

    require_once('MPDF56/mpdf.php');

    $mpdf = new mPDF();
    $stylesheet = file_get_contents('../include/css/template.css');
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML($htmlRetorno, 2);
    $mpdf->Output();
    exit;

} else if($op == 'consultar') {

    $atestBC = new AtestadoBC();
    $empregBC = new EmpregadoBC();

    $dataInicial = RelatorioAtestadosHomologadosPeriodoHelper::retornaDataFormatada($_POST['dataInicial']);
    $dataFinal = RelatorioAtestadosHomologadosPeriodoHelper::retornaDataFormatada($_POST['dataFinal']);
    $filtro = null;

    $listaAtestadosHomologadosPeriodo = $atestBC->consultarAtestadosHomologadosPorPeriodo($_SESSION[BANCO_SESSAO], $dataInicial, $dataFinal);

    if(count($listaAtestadosHomologadosPeriodo) > 0) {

        $htmlRetorno = "";
        $htmlRetorno .= "Encontrados <b>". count($listaAtestadosHomologadosPeriodo). "</b> atestados para o período <b>". $_POST['dataInicial'] . " a ".$_POST['dataFinal']."</b><br>";
        $htmlRetorno .= RelatorioAtestadosHomologadosPeriodoHelper::toHtmlGrid($listaAtestadosHomologadosPeriodo);


    } else {
        $htmlRetorno .= RelatorioAtestadosHomologadosPeriodoHelper::toHtmlSemRegistros();
    }

    echo $htmlRetorno;

} else {
    $smart = retornaSmarty();
    $smart->display('relatorio_atest_homol_periodo.tpl');

}



