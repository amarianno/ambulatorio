<?php

require_once('Loader.class.php');

class EnfermagemBC extends BC {
    private $DAO;

    public function __construct() {
        $this->DAO = new EnfermagemDAOPersistivel();
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

    public function consultar(DAOBanco $banco, $campos, FiltroSQL $filtro = null) {
        $lista = $this->DAO->consultar($banco, $campos, $filtro);
        $usuarioBC = new UsuarioBC();
        $empregadoBC = new EmpregadoBC();

        foreach($lista as $enfermagem) {
            //$enfermagem = new Enfermagem();
            $enfermagem->empregado = $empregadoBC->obterPorPk($banco, $enfermagem->empregado->matricula);
            $enfermagem->usuario = $usuarioBC->obterPorPk($banco, $enfermagem->usuario->codigo);
            $enfermagem->procedimento = $this->DAO->obterProcedimentoPorPk($banco, $enfermagem->procedimento)->procedimento;
        }

        return $lista;

    }

    public function consultarQuantitativoPorData(DAOBanco $banco, $dataIni, $dataFim, $tipo_funcionario ) {
        return $this->DAO->consultarQuantitativoPorData($banco, $dataIni, $dataFim, $tipo_funcionario);
    }
}