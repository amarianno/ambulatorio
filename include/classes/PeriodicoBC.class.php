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

            if($periodico->encaminhamento->codigo != '' && $periodico->encaminhamento->codigo != null) {
                $periodico->encaminhamento = $this->DAO->consultarEncaminhamentoPorChave($banco, $periodico->encaminhamento->codigo);
            }
        }

        return $lista;

    }

    public function consultarDoencas(DAOBanco $banco) {
        return $this->DAO->consultarDoencas($banco);
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