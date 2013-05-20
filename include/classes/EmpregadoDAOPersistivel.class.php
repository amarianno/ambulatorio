<?php

require_once('Loader.class.php');

class EmpregadoDAOPersistivel extends DAOPersistivel {
    const NOME_TABELA = "empregado";

    public function __construct() {
        parent::__construct(EmpregadoDAOPersistivel::NOME_TABELA);
    }

    public function incluir(DAOBanco $banco, $camposValores) {
        return parent::incluir($banco, $camposValores);
    }

    public function alterar(DAOBanco $banco, $camposValores, FiltroSQL $filtro = null) {
        return parent::alterar($banco, $camposValores, $filtro);
    }

    public function excluir(DAOBanco $banco, FiltroSQL $filtro = null) {
        return parent::excluir($banco, $filtro);
    }

    public function consultar(DAOBanco $banco, $campos, FiltroSQL $filtro = null) {
        $resultados = parent::consultar($banco, $campos, $filtro, "lotacao, nome");

        return $this->criaObjetos($resultados);
    }

    public function criaObjetos($resultados) {
        $resultsets = array();
        foreach ($resultados as $linha) {
            $empregado = new Empregado();
            foreach ($linha as $campo => $valor) {
                if (strcasecmp($campo, "nome") == 0) {
                    $empregado->nome = $valor;
                } elseif (strcasecmp($campo, "matricula") == 0) {
                    $empregado->matricula = $valor;
                } elseif (strcasecmp($campo, "lotacao") == 0) {
                    $empregado->lotacao = $valor;
                } elseif (strcasecmp($campo, "empresa") == 0) {
                    $empregado->localidade = $valor;
                }
            }
            $resultsets[] = $empregado;
        }

        return $resultsets;
    }
}