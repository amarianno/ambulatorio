<?php

require_once('Loader.class.php');

class PeriodicoBC extends BC {
    private $DAO;

    public function __construct() {
        $this->DAO = new PeriodicoDAOPersistivel();
    }

    public function incluir(DAOBanco $banco, $camposValores) {
        return $this->DAO->incluir($banco, $camposValores);
    }

    public function alterar(DAOBanco $banco, $camposValores, FiltroSQL $filtro = null) {
        return $this->DAO->alterar($banco, $camposValores, $filtro);
    }

    public function excluir(DAOBanco $banco, FiltroSQL $filtro = null) {
        return $this->DAO->excluir($banco, $filtro);
    }

    public function consultarConsolidacaoDados(DAOBanco $banco, $ano) {
          return $this->DAO->consultarConsolidacaoDados($banco, $ano);
    }

    public function consultar(DAOBanco $banco, $campos, FiltroSQL $filtro = null) {
        $lista = $this->DAO->consultar($banco, $campos, $filtro);

        foreach ($lista as $periodico) {
            //$periodico = new Periodico();

            if($periodico->doenca->codigo != '' && $periodico->doenca->codigo != null) {
                $periodico->doenca = $this->DAO->consultarDoencaPorChave($banco, $periodico->doenca->codigo);
            }

            if($periodico->doenca2->codigo != '' && $periodico->doenca2->codigo != null) {
                $periodico->doenca2 = $this->DAO->consultarDoencaPorChave($banco, $periodico->doenca2->codigo);
            }

            if($periodico->doenca3->codigo != '' && $periodico->doenca3->codigo != null) {
                $periodico->doenca3 = $this->DAO->consultarDoencaPorChave($banco, $periodico->doenca3->codigo);
            }

            if($periodico->doenca4->codigo != '' && $periodico->doenca4->codigo != null) {
                $periodico->doenca4 = $this->DAO->consultarDoencaPorChave($banco, $periodico->doenca4->codigo);
            }

            if($periodico->encaminhamento->codigo != '' && $periodico->encaminhamento->codigo != null) {
                $periodico->encaminhamento = $this->DAO->consultarEncaminhamentoPorChave($banco, $periodico->encaminhamento->codigo);
            }

            if($periodico->encaminhamento2->codigo != '' && $periodico->encaminhamento2->codigo != null) {
                $periodico->encaminhamento2 = $this->DAO->consultarEncaminhamentoPorChave($banco, $periodico->encaminhamento2->codigo);
            }

            if($periodico->encaminhamento3->codigo != '' && $periodico->encaminhamento3->codigo != null) {
                $periodico->encaminhamento3 = $this->DAO->consultarEncaminhamentoPorChave($banco, $periodico->encaminhamento3->codigo);
            }

            if($periodico->encaminhamento4->codigo != '' && $periodico->encaminhamento4->codigo != null) {
                $periodico->encaminhamento4 = $this->DAO->consultarEncaminhamentoPorChave($banco, $periodico->encaminhamento4->codigo);
            }
        }

        return $lista;

    }

    public function consultarDoencas(DAOBanco $banco) {
        return $this->DAO->consultarDoencas($banco);
    }

    public function consultarQuantitativoDoencas(DAOBanco $banco, $dataInicial, $dataFinal) {
        return $this->DAO->consultarQuantitativoDoencas($banco, $dataInicial, $dataFinal);
    }

    public function consultarQuantitativoEncaminhamento(DAOBanco $banco, $dataInicial, $dataFinal) {
        return $this->DAO->consultarQuantitativoEncaminhamento($banco, $dataInicial, $dataFinal);
    }

    public function consultarEncaminhamentos(DAOBanco $banco) {
        return $this->DAO->consultarEncaminhamentos($banco);
    }

    public function consultarEmpregadosPendentePeriodicoPorMes(DAOBanco $banco, Periodico $periodico) {
        return $this->DAO->consultarEmpregadosPendentePeriodicoPorMes($banco, $periodico);
    }

    public function consultarEmpregadosComPeriodicoEmAtraso(DAOBanco $banco, $mes, $empresa) {
        return $this->DAO->consultarEmpregadosComPeriodicoEmAtraso($banco, $mes, $empresa);
    }
}