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


    $ano = $_POST['ano'];

    /*$filtro = new FiltroSQL(FiltroSQL::CONECTOR_E,
                            FiltroSQL::OPERADOR_ENTRE,
                            array("data_previsao" => $anoSql));

    $lista = $bc->consultar($_SESSION[BANCO_SESSAO], null, $filtro); */
    $lista = $bc->consultarConsolidacaoDados($_SESSION[BANCO_SESSAO], $ano);

    $htmlRetorno = '';
    $htmlRetorno .= $avaliacaoOcupacional->grid($lista);

    echo($htmlRetorno);



} else {
    $smart->display('dados_emp.tpl');
}