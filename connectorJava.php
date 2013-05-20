<?php

function post($nomeParam) {
    return $_POST[$nomeParam];
}

$matricula = post('txtMatricula');
$uf = post('selUf');
$caraterSolicitacao = post('selCaraterSol');
$cid = post('txtCID');
$indicacaoClinica = post('txtIndClicina');

$cod1 = post('txtCod1');
$cod2 = post('txtCod2');
$cod3 = post('txtCod3');
$cod4 = post('txtCod4');
$cod5 = post('txtCod5');

$desc1 = post('txtDesc1');
$desc2 = post('txtDesc2');
$desc3 = post('txtDesc3');
$desc4 = post('txtDesc4');
$desc5 = post('txtDesc5');

$argumentos = '"'.$matricula.'" ';
$argumentos .= '"'.$uf.'" ';
$argumentos .= '"'.$caraterSolicitacao.'" ';
$argumentos .= '"'.$cid.'" ';
$argumentos .= '"'.$indicacaoClinica.'" ';

$argumentos .= '"'.$cod1.'" ';
$argumentos .= '"'.$cod2.'" ';
$argumentos .= '"'.$cod3.'" ';
$argumentos .= '"'.$cod4.'" ';
$argumentos .= '"'.$cod5.'" ';

$argumentos .= '"'.$desc1.'" ';
$argumentos .= '"'.$desc2.'" ';
$argumentos .= '"'.$desc3.'" ';
$argumentos .= '"'.$desc4.'" ';
$argumentos .= '"'.$desc5.'" ';

exec("java -jar php.jar " . $argumentos, $mensagemRetorno);
echo($mensagemRetorno[0]);