<?php


require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$nomeCID = isset($_POST['cid']) ? $_POST['cid'] : $_GET['cid'];

$cidBC = new CidBC();
$filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("nome" => $nomeCID));
$retorno = $cidBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);

if(count($retorno) > 0) {
    echo "TRUE";
} else {
    echo "FALSE";
}