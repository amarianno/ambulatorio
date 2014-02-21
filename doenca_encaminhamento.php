<?php


require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();
$operacao = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];
$bc = new PeriodicoBC();

function combosDoenca($smart) {
    $bc = new PeriodicoBC();
    $lista = $bc->consultarDoencas($_SESSION[BANCO_SESSAO]);

    $html = '';

    foreach ( $lista as $doenca) {
      $html .= '<option value="'.$doenca->codigo.'">'.$doenca->descricao."</option>";
    }

    $smart->assign('doencas_options',$html);
}

function combosEncaminhamento($smart) {
    $bc = new PeriodicoBC();
    $lista = $bc->consultarEncaminhamentos($_SESSION[BANCO_SESSAO]);

    $html = '';

    foreach ( $lista as $encaminhamento) {
       $html .= '<option value="'.$encaminhamento->codigo.'">'.$encaminhamento->descricao."</option>";
    }

    $smart->assign('encaminhamento_options',$html);
}

if($operacao == 'incluir') {

    $campos = array();
    $campos['doenca'] = $_POST['selDoenca'];
    $campos['encaminhamento'] = $_POST['selEncaminhamento'];
    $campos['doenca2'] = $_POST['selDoenca2'];
    $campos['encaminhamento2'] = $_POST['selEncaminhamento2'];
    $campos['doenca3'] = $_POST['selDoenca3'];
    $campos['encaminhamento3'] = $_POST['selEncaminhamento3'];
    $campos['doenca4'] = $_POST['selDoenca4'];
    $campos['encaminhamento4'] = $_POST['selEncaminhamento4'];
    $campos['obs_doenca_encaminhamento'] = $_POST['obs'];

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
    combosDoenca($smart);
    combosEncaminhamento($smart);
    $smart->display('doenca_encaminhamento.tpl');
}