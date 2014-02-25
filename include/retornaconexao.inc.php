<?php

    $path = $_SERVER['DOCUMENT_ROOT']; //Caminho absoluto

    require_once($path . '/ambulatorio/include/confconexao.inc.php');

    /* Define o limitador de cache para 'private' */
    session_cache_limiter('private');
    $cache_limiter = session_cache_limiter();

    /* Define o limite de tempo do cache em 30 minutos */
    session_cache_expire(180);
    $cache_expire = session_cache_expire();

    session_start();

    if(!isset($_SESSION[Constantes::ID_USUARIO])) {
        header("Location: index.php");
    }

    if (!isset($_SESSION[BANCO_SESSAO])) {
        $fabrica = new SimpleFactoryDAOBanco();
        $banco = $fabrica->criaInstanciaBanco(BANCO_DE_DADOS, HOST_BANCO, LOGIN_BANCO, SENHA_BANCO, NOME_BANCO);
        $_SESSION[BANCO_SESSAO] = $banco;
    }