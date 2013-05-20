<?php


require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();
$op = $_POST['op'];
$atestadoBC = new AtestadoBC();

if($op == 'buscar') {
    $matricula = $_POST['txtMatricula'];
    $cid = $_POST['txtCID'];
    $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $matricula, "cid" => $cid));
    $retorno = $atestadoBC->consultar($_SESSION[BANCO_SESSAO],null, $filtro);

    echo OperacaoGrid::montaGridAtestado($retorno, false);

} else {
    $smart->display('cid_por_matricula.tpl');
}
