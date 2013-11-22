<?php

require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();
$atestadoBC = new AtestadoBC();

function valorCheck($campoCheckbox) {
    return $_POST[$campoCheckbox];
}

try {
    $camposValores = array();
    $camposValores['data_recebimento'] = implode('-',array_reverse(explode('/',valorCheck('txtDtRecebimento'))));
    $camposValores['matricula'] = valorCheck('txtMatricula');
    $camposValores['dias_afastado'] = valorCheck('txtQtdeDiasAfastado');
    $camposValores['data_inicial'] = implode('-',array_reverse(explode('/',valorCheck('txtDtIniAfastamento'))));
    $camposValores['data_final'] = implode('-',array_reverse(explode('/',valorCheck('txtDtFimAfastamento'))));
    $camposValores['acompanhamento_familiar'] = valorCheck('chkAcompanhamentoFamiliar');
    $camposValores['grau_parentesco'] = valorCheck('selgrauParentesco');
    $camposValores['concedido'] = valorCheck('chkConcedidosInternos');
    $camposValores['homologados'] = valorCheck('chkHomologados');
    $camposValores['cid'] = strtr(strtoupper(valorCheck('txtCID')),"àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ","ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
    $camposValores['licenca_maternidade'] = valorCheck('chklicencaMaternidade');
    $camposValores['homologado_medico'] = valorCheck('chkHomologadoMedico');
    $camposValores['erlandia'] = 0;
    $camposValores['inss'] = valorCheck('chkINSS');

    $codigo = valorCheck('codigo');

    //caso o CID venha vazio, deve colocar SEM CID por padrão
    if($camposValores['cid'] == "") {
        $camposValores['cid'] = "SEM CID";
    }

    if(isset($codigo) && $codigo !== null) {

        $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("codigo" => $codigo));
        $atestadoBC->alterar($_SESSION[BANCO_SESSAO], $camposValores, $filtro);
        echo "Alterado";

    } else {

        $atestadoBC->incluir($_SESSION[BANCO_SESSAO], $camposValores);
        echo "Incluído";
    }

} catch (Exception $e) {
    echo "ERRO";
}

