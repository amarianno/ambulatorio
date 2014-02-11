<?php

require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();
$operacao = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];
$bc = new PeriodicoBC();

if($operacao == 'buscar') {

    $avaliacaoOcupacional = new RelatorioEMPAvaliacaoOcupUtil();
    $fatoresRisco = new RelatorioEMPFatRiscoUtil();
    $diagnosticos = new RelatorioEMPDiagnosticos();
    $examesComplementares = new RelatorioEMPExamComp();

    $ano = $_POST['ano'];

    $lista = $bc->consultarConsolidacaoDados($_SESSION[BANCO_SESSAO], $ano);
    $total = count($lista);

    $htmlRetorno = '';
    $htmlRetorno .= $avaliacaoOcupacional->grid($lista);
    $htmlRetorno .= $fatoresRisco->grid($lista);
    $htmlRetorno .= $examesComplementares->grid($lista);

    $lista = $bc->consultarQuantitativoDoencas($_SESSION[BANCO_SESSAO], $ano."-01-01", $ano."-12-31");
    $htmlRetorno .= $diagnosticos->gridDoencas($lista, $total);
    $lista = $bc->consultarQuantitativoEncaminhamento($_SESSION[BANCO_SESSAO], $ano."-01-01", $ano."-12-31");
    $htmlRetorno .= $diagnosticos->gridEncaminhamento($lista, $total);

    echo($htmlRetorno);



} else {
    $smart->display('dados_emp.tpl');
}