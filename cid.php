<?php

require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();
$operacao = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];

if($operacao == 'gravar') {

    $cidBC = new CidBC();

    $campos = array();
    $campos['codigo'] = $_POST['codigo'];
    $campos['nome'] = $_POST['txtCID'];
    $campos['descricao'] = $_POST['txtDescricao'];

    $cadastraOuAlterar = $_POST['cadastraOuAlterar'];
    if($cadastraOuAlterar == 'cad') {
        $cidBC->incluir($_SESSION[BANCO_SESSAO], $campos);
        echo "Incluido";
    } else {
        $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("codigo" => $_POST['codigo']));
        $cidBC->alterar($_SESSION[BANCO_SESSAO], $campos, $filtro);
        echo "Alterado";
    }

} else if($operacao == 'existe') {

    $cidBC = new CidBC();
    $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("nome" => $_POST['txtCID']));
    $cidDTO = $cidBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);

    if(count($cidDTO) > 0) {
        echo(json_encode($cidDTO[0]));
    } else {
        echo(json_encode(new Cid()));
    }

} else {
    $smart->assign("tela", "cad");
    $smart->display("cid.tpl");


}