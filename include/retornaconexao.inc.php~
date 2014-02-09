<?php

    $path = $_SERVER['DOCUMENT_ROOT']; //Caminho absoluto

    require_once($path . '/include/confconexao.inc.php');
    session_start();

    if (!isset($_SESSION[BANCO_SESSAO])) {
        $fabrica = new SimpleFactoryDAOBanco();
        $banco = $fabrica->criaInstanciaBanco(BANCO_DE_DADOS, HOST_BANCO, LOGIN_BANCO, SENHA_BANCO, NOME_BANCO);
        $_SESSION[BANCO_SESSAO] = $banco;
    }