<?php

require_once('Loader.class.php');

class ProcedimentoDAOPersistivel extends DAOPersistivel {
    const NOME_TABELA = "procedimentos";

    public function __construct() {
        parent::__construct(ProcedimentoDAOPersistivel::NOME_TABELA);
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
        $resultados = parent::consultar($banco, $campos, $filtro);
        return $this->criaObjetos($resultados);
    }

    public function criaObjetos($resultados) {
        $resultsets = array();
        foreach ($resultados as $linha) {
            $proc = new Procedimento();
            foreach ($linha as $campo => $valor) {
                if (strcasecmp($campo, "codigo") == 0) {
                    $proc->codigo = $valor;
                } else if (strcasecmp($campo, "chave") == 0) {
                    $proc->chave = $valor;
                } else if (strcasecmp($campo, "descricao") == 0) {
                    $proc->descricao = $valor;
                }
            }
            $resultsets[] = $proc;
        }

        return $resultsets;
    }
}