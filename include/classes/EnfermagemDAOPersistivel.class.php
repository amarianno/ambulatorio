<?php

require_once('Loader.class.php');

class EnfermagemDAOPersistivel extends DAOPersistivel {
    const NOME_TABELA = "enfermagem";

    public function __construct() {
        parent::__construct(EnfermagemDAOPersistivel::NOME_TABELA);
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

    public function consultarQuantitativoPorData(DAOBanco $banco, $dataINI, $dataFim, $tipo_funcionario ) {
        $sql = "SELECT COUNT( enf.procedimento ) AS total , enfproc.descricao AS procedimento
                FROM enfermagem enf, enferm_procedimento enfproc
                WHERE enf.procedimento = enfproc.codigo
                AND enf.data BETWEEN '".$dataINI."' AND  '".$dataFim."'
                AND enf.tipo_funcionario = ".$tipo_funcionario."
                GROUP BY enf.procedimento";

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            return $this->criaObjetos($res);
        }
    }

    public function obterProcedimentoPorPk(DAOBanco $banco, $codigo ) {
        $sql = "SELECT enfproc.descricao AS procedimento
                FROM enfermagem enf, enferm_procedimento enfproc
                WHERE enf.procedimento = enfproc.codigo
                AND enf.procedimento = ".$codigo."";

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            $lista = $this->criaObjetos($res);
            return $lista[0];
        }
    }

    public function consultar(DAOBanco $banco, $campos, FiltroSQL $filtro = null) {
        $resultados = parent::consultar($banco, $campos, $filtro, "data");

        return $this->criaObjetos($resultados);
    }

    public function criaObjetos($resultados) {
        $resultsets = array();
        foreach ($resultados as $linha) {
            $enfermagem = new Enfermagem();
            $enfermagem->usuario = new Usuario();
            foreach ($linha as $campo => $valor) {
                if (strcasecmp($campo, "codigo") == 0) {
                    $enfermagem->codigo = $valor;
                } elseif (strcasecmp($campo, "matricula") == 0) {
                    $enfermagem->matricula = $valor;
                } elseif (strcasecmp($campo, "data") == 0) {
                    $enfermagem->data = $valor;
                } elseif (strcasecmp($campo, "tipo_funcionario") == 0) {
                    $enfermagem->tipoFuncionario = $valor;
                } elseif (strcasecmp($campo, "procedimento") == 0) {
                    $enfermagem->procedimento = $valor;
                } elseif (strcasecmp($campo, "obs") == 0) {
                    $enfermagem->obs = $valor;
                } elseif (strcasecmp($campo, "usuario") == 0) {
                    $enfermagem->usuario->codigo = $valor;
                } elseif (strcasecmp($campo, "total") == 0) {
                    $enfermagem->total = $valor;
                }
            }
            $resultsets[] = $enfermagem;
        }

        return $resultsets;
    }
}