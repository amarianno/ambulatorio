<?php


require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$atestadoBC = new AtestadoBC();

$codigo = $_POST['codigo'];
$filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("codigo" => $codigo));
$atestadoRetorno = $atestadoBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);

/*$retorno = array();
$retorno['cid'] =  $atestadoRetorno[0]->cid;
$retorno['matricula'] =  $atestadoRetorno[0]->empregado->matricula;
$retorno['dataRecebimento'] =  $atestadoRetorno[0]->dataRecebimento;  */


//echo json_encode(array_map('htmlentities',$retorno));
echo json_encode($atestadoRetorno[0]);