<?php

require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$atestadoBC = new AtestadoBC();

$matricula = $_POST['txtMatricula'];
$filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $matricula));
$listaAtestados = $atestadoBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);

echo(OperacaoGrid::montaGridAtestado($listaAtestados, true, false));

