<?php

require_once('Loader.class.php');

class CidDAOPersistivel extends DAOPersistivel {
    const NOME_TABELA = "cid";

    public function __construct() {
        parent::__construct(CidDAOPersistivel::NOME_TABELA);
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
            $cid = new Cid();
            foreach ($linha as $campo => $valor) {
                if (strcasecmp($campo, "codigo") == 0) {
                    $cid->codigo = $valor;
                } elseif (strcasecmp($campo, "nome") == 0) {
                    $cid->nome = $valor;
                } elseif (strcasecmp($campo, "descricao") == 0) {
                    $cid->descricao = $valor;
                }
            }
            $resultsets[] = $cid;
        }

        return $resultsets;
    }

    public function consultarCidPorMes(DAOBanco $banco, $dataInicial, $dataFinal ) {
        $sql = "SELECT COUNT( cid.nome ) AS quantidade , cid.nome AS nome, cid.descricao AS descricao
                FROM cid, atestado
                WHERE cid.nome = atestado.cid AND atestado.acompanhamento_familiar = 0
                AND atestado.data_recebimento
                BETWEEN  '".$dataInicial."'
                AND  '".$dataFinal."'
                GROUP BY cid.nome";

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            return $this->criaObjetosRelatorioCIDPorMes($res);
        }
    }

    public function criaObjetosRelatorioCIDPorMes($resultados) {
        $resultsets = array();
        foreach ($resultados as $linha) {
            $relatorio = new RelatorioCIDPorMes();
            $relatorio->cid = new Cid();
            foreach ($linha as $campo => $valor) {
                if (strcasecmp($campo, "quantidade") == 0) {
                    $relatorio->quantidade = $valor;
                } elseif (strcasecmp($campo, "nome") == 0) {
                    $relatorio->cid->nome = $valor;
                } elseif (strcasecmp($campo, "descricao") == 0) {
                    $relatorio->cid->descricao = $valor;
                }
            }
            $resultsets[] = $relatorio;
        }

        return $resultsets;
    }
}