<?php


require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();
$operacao = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];
$bc = new PeriodicoBC();

if($operacao == 'incluir') {

    $campos = array();
    $campos['ativ_desenvolvida'] = $_POST['ativ_desenvolvida'];
    $campos['volume_trabalho'] = $_POST['volume_trabalho'];
    $campos['relacao_chefia'] = $_POST['relacao_chefia'];
    $campos['relacao_colegas'] = $_POST['relacao_colegas'];
    $campos['dores'] = $_POST['dores'];
    $campos['fadiga_visual'] = $_POST['fadiga_visual'];
    $campos['tensao_emocional'] = $_POST['tensao_emocional'];
    $campos['outros'] = $_POST['outros'];

    $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("codigo" => $_POST['hidCodigo']));
    $bc->alterar($_SESSION[BANCO_SESSAO], $campos, $filtro);

} else if($operacao == 'visualizar') {

    $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $_POST['txtMatricula']));
    $lista = $bc->consultar($_SESSION[BANCO_SESSAO], null, $filtro);

    for($i = 0; $i < count($lista);  $i++) {
        $ano = preg_split('"-"', $lista[$i]->dataPrevisao, -1);
        if($ano[0] == date('Y')) {
            echo(json_encode($lista[$i]));
        }
    }

} else {
    $smart->display('avaliacao_ocupacional.tpl');
}