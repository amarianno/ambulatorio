<?php

require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
//require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();
$usuarioBC = new UsuarioBC();

$fabrica = new SimpleFactoryDAOBanco();
$banco = $fabrica->criaInstanciaBanco(BANCO_DE_DADOS, HOST_BANCO, LOGIN_BANCO, SENHA_BANCO, NOME_BANCO);


$filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("cpf" => $_POST['j_username'],
                                                                                "senha" => md5($_POST['j_password'])));
$lista = $usuarioBC->consultar($banco, null, $filtro);

if(count($lista) > 0) {
    session_start();

    $_SESSION[Constantes::ID_USUARIO] = $lista[0]->codigo;
    $_SESSION[Constantes::CPF_USUARIO] = $_POST['j_username'];
    $_SESSION[Constantes::NOME_USUARIO] = $lista[0]->nome;
    $_SESSION[Constantes::PERFIL_USUARIO] = $lista[0]->perfil;
    $_SESSION[Constantes::EMPRESA_USUARIO] = $lista[0]->empresa;

    $_SESSION[BANCO_SESSAO] = $banco;

    $smart->display('index.tpl');
} else {
    $smart->assign('senha_invalida','1');
    $smart->display('login.tpl');
}


