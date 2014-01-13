<?php

require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$atestadoBC = new AtestadoBC();
$periodicoBC = new PeriodicoBC();

$matricula = $_POST['txtMatricula'];
$filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $matricula));
$listaAtestados = $atestadoBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);

$listaPeriodico = $periodicoBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);

$htmlRetorno = "";

$htmlRetorno .= OperacaoGrid::montaGridAtestado($listaAtestados, true, false);
$htmlRetorno .= "<br><br>";
$htmlRetorno .= OperacaoGrid::montaGridPeriodico($listaPeriodico);

echo($htmlRetorno);

