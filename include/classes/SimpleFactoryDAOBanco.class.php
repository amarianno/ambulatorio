<?php

require_once('Loader.class.php');

final class SimpleFactoryDAOBanco {
    const BANCO_MYSQL = "MYSQL";
    private $daoBanco;

    public function criaInstanciaBanco($produto, $servidor, $usuario, $senha, $banco) {
        $this->objetoDAOBanco = null;
        switch ($produto) {
            case self::BANCO_MYSQL:
                $this->daoBanco = MySQLDAOBanco::getInstancia($servidor, $usuario, $senha, $banco);
                break;

            default:
                throw new Exception("Tipo especificado de banco de dados nao existe. Banco: " . $produto);
        }

        return $this->daoBanco;
    }

}