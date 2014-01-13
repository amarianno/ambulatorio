<?php

require_once('Loader.class.php');

class PeriodicoDAOPersistivel extends DAOPersistivel {
    const NOME_TABELA = "periodico";

    public function __construct() {
        parent::__construct(PeriodicoDAOPersistivel::NOME_TABELA);
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
        $resultados = parent::consultar($banco, $campos, $filtro, "data_inicio desc");

        return $this->criaObjetos($resultados);
    }

    public function consultarEmpregadosPendentePeriodicoPorMes(DAOBanco $banco, Periodico $periodico) {
        $sql = " SELECT per.codigo as codigo, emp.nome as nome, emp.matricula as matricula, emp.empresa as empresa, emp.data_nascimento as data_nascimento,
                per.data_inicio as data_inicio , per.data_fim as data_fim, per.data_fim as data_ultimo, (
                CASE WHEN (YEAR(NOW( )) - YEAR(emp.data_nascimento)) > 40
                THEN  '1'
                ELSE  '0'
                END
                ) AS tempo
                FROM periodico per
                JOIN empregado emp ON ( emp.matricula = per.matricula )
                WHERE per.data_previsao = ( SELECT MAX( data_previsao ) FROM periodico WHERE matricula = per.matricula )
                AND MONTH(per.data_previsao) = ". $periodico->dataInicio ."
                 AND emp.empresa =" . $periodico->empregado->localidade;
                if($periodico->empregado->matricula != '') {
                    $sql .= " AND emp.matricula =" . $periodico->empregado->matricula;
                }

                $sql .= " order by nome";

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            return $this->criaObjetos($res);
        }
    }

    public function criaObjetos($resultados) {
        $resultsets = array();
        foreach ($resultados as $linha) {
            $periodico = new Periodico();
            $periodico->empregado = new Empregado();
            foreach ($linha as $campo => $valor) {
                if (strcasecmp($campo, "codigo") == 0) {
                    $periodico->codigo = $valor;
                } elseif (strcasecmp($campo, "matricula") == 0) {
                    $periodico->empregado->matricula = $valor;
                } elseif (strcasecmp($campo, "nome") == 0) {
                    $periodico->empregado->nome = $valor;
                } elseif (strcasecmp($campo, "empresa") == 0) {
                    $periodico->empregado->empresa = $valor;
                } elseif (strcasecmp($campo, "data_nascimento") == 0) {
                    $periodico->empregado->dataNascimento = $valor;
                } elseif (strcasecmp($campo, "data_inicio") == 0) {
                    $periodico->dataInicio = $valor;
                } elseif (strcasecmp($campo, "data_ultimo") == 0) {
                    $periodico->dataUltimo = $valor;
                } elseif (strcasecmp($campo, "data_fim") == 0) {
                    $periodico->dataFim = $valor;
                } elseif (strcasecmp($campo, "data_previsao") == 0) {
                    $periodico->dataPrevisao = $valor;
                } elseif (strcasecmp($campo, "tempo") == 0) {
                    $periodico->isMaisQuarentaAnos = $valor;
                }
            }
            $resultsets[] = $periodico;
        }

        return $resultsets;
    }
}