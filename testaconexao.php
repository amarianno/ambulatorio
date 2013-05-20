<?php

    require_once('include/confconexao.inc.php');
    require_once('include/classes/Loader.class.php');

    $fabrica = new SimpleFactoryDAOBanco();
    try {
        $banco = $fabrica->criaInstanciaBanco(BANCO_DE_DADOS, HOST_BANCO, LOGIN_BANCO, SENHA_BANCO, NOME_BANCO);
        $banco->abreConexao();
        echo "Conexao efetuada com sucesso.";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $banco->fechaConexao();