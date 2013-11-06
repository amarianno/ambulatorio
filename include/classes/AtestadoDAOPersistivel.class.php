<?php

require_once('Loader.class.php');

class AtestadoDAOPersistivel extends DAOPersistivel {
    const NOME_TABELA = "atestado";

    public function __construct() {
        parent::__construct(AtestadoDAOPersistivel::NOME_TABELA);
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

    public function consultarAtestadoPorDataDeRecebimento(DAOBanco $banco, $dataRecebimento) {
        $sql = "SELECT at.matricula as matricula, emp.lotacao as lotacao, emp.nome as nome, at.dias_afastado as dias_afastado,
                at.data_inicial as data_inicial, at.data_final as data_final
                FROM atestado at
                INNER JOIN empregado emp ON ( at.matricula = emp.matricula )
                WHERE data_recebimento =  '".$dataRecebimento."'";

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            return $this->criaObjetos($res);
        }
    }

    public function consultarAtestadosINSS(DAOBanco $banco, $dataInicial, $dataFinal) {
        $sql = "SELECT at.matricula as matricula, emp.lotacao as lotacao, emp.nome as nome, at.dias_afastado as dias_afastado,
                at.data_inicial as data_inicial, at.data_final as data_final,at.acompanhamento_familiar as acompanhamento_familiar,
                at.concedido as concedido, at.homologados as homologados, at.homologado_medico as homologado_medico, at.cid
                FROM atestado at
                INNER JOIN empregado emp ON ( at.matricula = emp.matricula )
                WHERE data_recebimento BETWEEN  '".$dataInicial."'
                AND '".$dataFinal."'
                AND homologado_medico = 1
                AND inss = 1
                ORDER BY emp.lotacao, at.data_inicial";

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            return $this->criaObjetos($res);
        }
    }

    public function consultarAtestadosHomologadosPorPeriodo(DAOBanco $banco, $dataInicial, $dataFinal) {
        $sql = "SELECT at.matricula as matricula, emp.lotacao as lotacao, emp.nome as nome, at.dias_afastado as dias_afastado,
                at.data_inicial as data_inicial, at.data_final as data_final,at.acompanhamento_familiar as acompanhamento_familiar,
                at.concedido as concedido, at.homologados as homologados, at.homologado_medico as homologado_medico, at.cid
                FROM atestado at
                INNER JOIN empregado emp ON ( at.matricula = emp.matricula )
                WHERE data_recebimento BETWEEN  '".$dataInicial."'
                AND '".$dataFinal."'
                AND homologado_medico = 1
                ORDER BY emp.lotacao, at.data_inicial";

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            return $this->criaObjetos($res);
        }
    }

    public function consultarDiasAfastadoPorMes(DAOBanco $banco, $dataInicial, $dataFinal ) {
        $sql = "SELECT SUM( atestado.dias_afastado ) AS dias_afastado
                FROM atestado
                WHERE atestado.acompanhamento_familiar = 0 AND atestado.homologado_medico = 1 AND atestado.data_recebimento
                BETWEEN  '".$dataInicial."'
                AND  '".$dataFinal."'";

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            return $this->criaObjetos($res);
        }
    }

    public function consultarDiasAfastadoPorPeriodo(DAOBanco $banco, $dataInicial, $dataFinal, $patologia, $especialidade) {
        $sql = "SELECT SUM( atestado.dias_afastado ) AS dias_afastado
                FROM cid, atestado
                WHERE UPPER(cid.nome) = UPPER(atestado.cid) AND atestado.acompanhamento_familiar = 0 AND atestado.data_recebimento
                BETWEEN  '".$dataInicial."'
                AND  '".$dataFinal."'";

        if(isset($patologia)) {
            $sql .= " AND UPPER(cid.descricao) LIKE UPPER('%".$patologia."%')";
        }

        if(isset($especialidade)) {
            $sql .= " AND cid.categoria  = ".$especialidade."";
        }

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            return $this->criaObjetos($res);
        }
    }

    public function consultar(DAOBanco $banco, $campos, FiltroSQL $filtro = null) {
        $resultados = parent::consultar($banco, $campos, $filtro, "data_recebimento DESC");
        return $this->criaObjetos($resultados);
    }

    public function criaObjetos($resultados) {
        // print_r($resultados);
        $resultsets = array();
        foreach ($resultados as $linha) {
            $atestado = new Atestado();
            $empregado = new Empregado();
            foreach ($linha as $campo => $valor) {
                if (strcasecmp($campo, "codigo") == 0) {
                    $atestado->codigo = $valor;
                } else if (strcasecmp($campo, "matricula") == 0) {
                    $empregado->matricula = $valor;
                } else if (strcasecmp($campo, "lotacao") == 0) {
                    $empregado->lotacao = $valor;
                } else if (strcasecmp($campo, "nome") == 0) {
                    $empregado->nome = $valor;
                } else if (strcasecmp($campo, "data_recebimento") == 0) {
                    $atestado->dataRecebimento = $valor;
                } else if (strcasecmp($campo, "dias_afastado") == 0) {
                    $atestado->diasAfastado = $valor;
                } else if (strcasecmp($campo, "data_inicial") == 0) {
                    $atestado->dataInicialAfastamento = $valor;
                } else if (strcasecmp($campo, "data_final") == 0) {
                    $atestado->dataFinalAfastamento = $valor;
                } else if (strcasecmp($campo, "acompanhamento_familiar") == 0) {
                    $atestado->isAcompanhamentoFamiliar = $valor;
                } else if (strcasecmp($campo, "grau_parentesco") == 0) {
                    $atestado->grauParentesco = $valor;
                }  else if (strcasecmp($campo, "concedido") == 0) {
                    $atestado->isConcedidos = $valor;
                } else if (strcasecmp($campo, "homologados") == 0) {
                    $atestado->isHomologados = $valor;
                } else if (strcasecmp($campo, "cid") == 0) {
                    $atestado->cid = $valor;
                } else if (strcasecmp($campo, "licenca_maternidade") == 0) {
                    $atestado->isLicencaMaternidade = $valor;
                } else if (strcasecmp($campo, "homologado_medico") == 0) {
                    $atestado->isHomologadoMedico = $valor;
                } else if (strcasecmp($campo, "inss") == 0) {
                    $atestado->inss = $valor;
                }
            }
            $atestado->empregado = $empregado;
            $resultsets[] = $atestado;
        }

        return $resultsets;
    }
}