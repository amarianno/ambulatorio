<?php
require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();
$op = $_POST['op'];
$atestadoBC = new AtestadoBC();

if($op == 'consultar') {

    $atestBC = new AtestadoBC();
    $empregBC = new EmpregadoBC();

    $dataInicial = RelatorioAtestadosHomologadosPeriodoHelper::retornaDataFormatada($_POST['dataInicial']);
    $dataFinal = RelatorioAtestadosHomologadosPeriodoHelper::retornaDataFormatada($_POST['dataFinal']);
    $filtro = null;

    $listaAtestadosHomologadosPeriodo = $atestBC->consultarAtestadosINSS($_SESSION[BANCO_SESSAO], $dataInicial, $dataFinal);

    if(count($listaAtestadosHomologadosPeriodo) > 0) {

        $htmlRetorno = "";
        $htmlRetorno .= "Encontrados <b>". count($listaAtestadosHomologadosPeriodo). "</b> atestados para o período <b>". $_POST['dataInicial'] . " a ".$_POST['dataFinal']."</b><br>";
        $htmlRetorno .= RelatorioAtestadosHomologadosPeriodoHelper::toHtmlGrid($listaAtestadosHomologadosPeriodo);
        //$htmlRetorno .= RelatorioAtestadosHomologadosPeriodoHelper::infoAdicional($listaAtestadosHomologadosPeriodo);

    } else {
        $htmlRetorno .= RelatorioAtestadosHomologadosPeriodoHelper::toHtmlSemRegistros();
    }

    echo $htmlRetorno;


} else {
    $smart->display('consulta_inss.tpl');
}



?>