<?php

require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();
$operacao = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];

if($operacao == 'gravar') {

    $procedimentoBC = new ProcedimentoBC();

    $campos = array();
    $campos['codigo'] = $_POST['txtCod'];
    $campos['chave'] = $_POST['hddChave'];
    $campos['descricao'] = $_POST['txtDescricao'];

    $cadastraOuAlterar = $_POST['cadastraOuAlterar'];
    if($cadastraOuAlterar == 'cad') {
        $procedimentoBC->incluir($_SESSION[BANCO_SESSAO], $campos);
        echo "Incluido";
    } else {
        $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("chave" => $_POST['hddChave']));
        $procedimentoBC->alterar($_SESSION[BANCO_SESSAO], $campos, $filtro);
        echo "Alterado";
    }

} else if($operacao == 'existe') {

    $procedimentoBC = new ProcedimentoBC();
    $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("codigo" => $_POST['txtCod']));
    $procedimentoDTO = $procedimentoBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);

    if(count($procedimentoDTO) > 0) {
        echo(json_encode($procedimentoDTO[0]));
    } else {
        echo(json_encode(new Procedimento()));
    }

} else {
    $smart->display("procedimento.tpl");
}

