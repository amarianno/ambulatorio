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

    public function consultarConsolidacaoDados(DAOBanco $banco, $ano) {
        $sql = " SELECT *
                 FROM periodico per
                 WHERE
                 data_previsao BETWEEN '".$ano."-01-01' AND '".$ano."-12-31'";

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            return $this->criaObjetos($res);
        }
    }

    public function consultar(DAOBanco $banco, $campos, FiltroSQL $filtro = null) {
        $resultados = parent::consultar($banco, $campos, $filtro, "data_inicio desc");
        return $this->criaObjetos($resultados);
    }

    public function consultarEmpregadosComPeriodicoEmAtraso(DAOBanco $banco, $mes, $empresa) {

        $sql = " SELECT per.codigo as codigo, emp.nome as nome, emp.matricula as matricula,
                    emp.empresa as empresa, per.data_previsao as data_previsao, emp.data_nascimento as data_nascimento,
                    per.data_inicio as data_inicio
                 FROM periodico per
                 JOIN empregado emp ON ( emp.matricula = per.matricula )
                 WHERE
                 (NOW() > DATE_ADD(per.data_inicio, INTERVAL 30 DAY) )
                  AND MONTH(per.data_previsao) = ". $mes ." AND emp.empresa = ".$empresa." AND YEAR(NOW()) = YEAR(per.data_previsao)";

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            return $this->criaObjetos($res);
        }
    }

    public function consultarEmpregadosPendentePeriodicoPorMes(DAOBanco $banco, Periodico $periodico) {

        $camposSQL = " per.codigo as codigo, emp.nome as nome, emp.matricula as matricula, emp.lotacao as lotacao,
                    emp.empresa as empresa, per.data_previsao as data_previsao, emp.data_nascimento as data_nascimento,
                    (
                        CASE WHEN (YEAR(NOW( )) = YEAR(per.data_inicio))
                        THEN  per.data_inicio
                        ELSE  ''
                        END
                    ) as data_inicio ,
                    (
                        CASE WHEN (YEAR(NOW( )) = YEAR(per.data_fim))
                        THEN  per.data_fim
                        ELSE  ''
                        END
                    ) as data_fim,
                    (SELECT MAX( data_fim ) FROM periodico WHERE matricula = per.matricula AND data_fim IS NOT NULL) as data_ultimo ";

        $matriculaSQL = "";

        if($periodico->empregado->matricula != '') {
            $matriculaSQL .= " AND emp.matricula =" . $periodico->empregado->matricula;
        } else {
            $matriculaSQL = "";
        }


        $sql = "SELECT ".$camposSQL."
                FROM periodico per
                JOIN empregado emp ON ( emp.matricula = per.matricula )
                WHERE per.data_previsao = ( SELECT MAX( data_previsao ) FROM periodico WHERE matricula = per.matricula )
                AND ((YEAR(NOW( )) - YEAR(emp.data_nascimento)) >= 40)
                AND MONTH(per.data_previsao) = ". $periodico->dataInicio ."
                AND emp.empresa =". $periodico->empregado->localidade."".$matriculaSQL."
                UNION
                SELECT ".$camposSQL."
                FROM periodico per
                JOIN empregado emp ON ( emp.matricula = per.matricula )
                WHERE per.data_previsao = ( SELECT MAX( data_previsao ) FROM periodico WHERE matricula = per.matricula )
                AND (YEAR(per.data_previsao) = YEAR(NOW()) OR (YEAR(per.data_previsao) + 2) = YEAR(NOW()) OR (YEAR(NOW()) = (YEAR(emp.data_admissao) + 2)))
                AND ((YEAR(NOW( )) - YEAR(emp.data_nascimento)) < 40)
                AND MONTH(per.data_previsao) = ". $periodico->dataInicio ."
                AND emp.empresa =". $periodico->empregado->localidade."".$matriculaSQL." order by nome";


        /*$sql = " SELECT per.codigo as codigo, emp.nome as nome, emp.matricula as matricula,
                emp.empresa as empresa, per.data_previsao as data_previsao, emp.data_nascimento as data_nascimento,
                per.data_inicio as data_inicio , per.data_fim as data_fim, per.data_fim as data_ultimo, (
                CASE WHEN (YEAR(NOW( )) - YEAR(emp.data_nascimento)) >= 40
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

                $sql .= " order by nome";*/

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            return $this->criaObjetos($res);
        }
    }

    public function consultarDoencas(DAOBanco $banco) {

        $sql = " SELECT codigo, descricao FROM doenca ORDER BY descricao";

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            return $this->criaObjetosDoenca($res);
        }
    }

    public function consultarEncaminhamentos(DAOBanco $banco) {

        $sql = " SELECT codigo, descricao FROM encaminhamento ORDER BY descricao";

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            return $this->criaObjetosEncaminhamentos($res);
        }
    }

    public function consultarDoencaPorChave(DAOBanco $banco, $chave) {

        $sql = " SELECT codigo, descricao FROM doenca WHERE codigo = ".$chave;

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            $lista =  $this->criaObjetosDoenca($res);
            return $lista[0];
        }
    }

    public function consultarEncaminhamentoPorChave(DAOBanco $banco, $chave) {

        $sql = " SELECT codigo, descricao FROM encaminhamento WHERE codigo = ".$chave;

        if ($banco->abreConexao() == true) {
            $res = $banco->consultar($sql);
            $banco->fechaConexao();
            $lista = $this->criaObjetosEncaminhamentos($res);
            return $lista[0];
        }
    }

    public function criaObjetosEncaminhamentos($resultados) {
        $resultsets = array();
        foreach ($resultados as $linha) {
            $encaminhamento = new Encaminhamento();
            foreach ($linha as $campo => $valor) {
                if (strcasecmp($campo, "codigo") == 0) {
                    $encaminhamento->codigo = $valor;
                } elseif (strcasecmp($campo, "descricao") == 0) {
                    $encaminhamento->descricao = $valor;
                }
            }
            $resultsets[] = $encaminhamento;
        }

        return $resultsets;
    }

    public function criaObjetosDoenca($resultados) {
        $resultsets = array();
        foreach ($resultados as $linha) {
            $doenca = new Doenca();
            foreach ($linha as $campo => $valor) {
                if (strcasecmp($campo, "codigo") == 0) {
                    $doenca->codigo = $valor;
                } elseif (strcasecmp($campo, "descricao") == 0) {
                    $doenca->descricao = $valor;
                }
            }
            $resultsets[] = $doenca;
        }

        return $resultsets;
    }

    public function criaObjetos($resultados) {
        $resultsets = array();
        foreach ($resultados as $linha) {
            $periodico = new Periodico();
            $periodico->empregado = new Empregado();
            $periodico->doenca = new Doenca();
            $periodico->encaminhamento->codigo = new Encaminhamento();
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
                } elseif (strcasecmp($campo, "lotacao") == 0) {
                    $periodico->empregado->lotacao = $valor;
                } elseif (strcasecmp($campo, "doenca") == 0) {
                    $periodico->doenca->codigo = $valor;
                } elseif (strcasecmp($campo, "encaminhamento") == 0) {
                    $periodico->encaminhamento->codigo = $valor;
                } elseif (strcasecmp($campo, "ativ_desenvolvida") == 0) {
                    $periodico->atividadeDesenvolvida = $valor;
                } elseif (strcasecmp($campo, "volume_trabalho") == 0) {
                    $periodico->volumeTrabalho = $valor;
                } elseif (strcasecmp($campo, "relacao_chefia") == 0) {
                    $periodico->relacaoChefia = $valor;
                } elseif (strcasecmp($campo, "relacao_colegas") == 0) {
                    $periodico->relacaoColegas = $valor;
                } elseif (strcasecmp($campo, "dores") == 0) {
                    $periodico->dores = $valor;
                } elseif (strcasecmp($campo, "fadiga_visual") == 0) {
                    $periodico->fadigaVisual = $valor;
                } elseif (strcasecmp($campo, "tensao_emocional") == 0) {
                    $periodico->tensaoEmocional = $valor;
                } elseif (strcasecmp($campo, "infecto_contag") == 0) {
                    $periodico->infectoContagiosa = $valor;
                } elseif (strcasecmp($campo, "endocrinas") == 0) {
                    $periodico->endocrinas = $valor;
                } elseif (strcasecmp($campo, "sangue_hemat") == 0) {
                    $periodico->sangue = $valor;
                } elseif (strcasecmp($campo, "pele") == 0) {
                    $periodico->pele = $valor;
                } elseif (strcasecmp($campo, "respiratorio") == 0) {
                    $periodico->respiratorio = $valor;
                } elseif (strcasecmp($campo, "circulatorio") == 0) {
                    $periodico->circulatorio = $valor;
                } elseif (strcasecmp($campo, "digestivo") == 0) {
                    $periodico->digestivo = $valor;
                } elseif (strcasecmp($campo, "genito_urinario") == 0) {
                    $periodico->genitoUrinario = $valor;
                } elseif (strcasecmp($campo, "musculo") == 0) {
                    $periodico->musculo = $valor;
                } elseif (strcasecmp($campo, "sist_nervoso") == 0) {
                    $periodico->sistemaNervoso = $valor;
                } elseif (strcasecmp($campo, "emocionais") == 0) {
                    $periodico->emocionais = $valor;
                } elseif (strcasecmp($campo, "outras") == 0) {
                    $periodico->outras = $valor;
                } elseif (strcasecmp($campo, "afast_doenca") == 0) {
                    $periodico->afastamentoDoenca = $valor;
                } elseif (strcasecmp($campo, "deficiencia") == 0) {
                    $periodico->portadorDeficiencia = $valor;
                } elseif (strcasecmp($campo, "outros") == 0) {
                    $periodico->outros = $valor;
                } elseif (strcasecmp($campo, "tabaco") == 0) {
                    $periodico->tabaco = $valor;
                } elseif (strcasecmp($campo, "alcool") == 0) {
                    $periodico->alcool = $valor;
                } elseif (strcasecmp($campo, "ativ_fisica") == 0) {
                    $periodico->atividadeFisica = $valor;
                } elseif (strcasecmp($campo, "drogas") == 0) {
                    $periodico->drogas = $valor;
                } elseif (strcasecmp($campo, "hipert_arterial") == 0) {
                    $periodico->hipertensaoArterial = $valor;
                } elseif (strcasecmp($campo, "pa") == 0) {
                    $periodico->pa = $valor;
                } elseif (strcasecmp($campo, "fc") == 0) {
                    $periodico->fc = $valor;
                } elseif (strcasecmp($campo, "peso_ideal") == 0) {
                    $periodico->pesoIdeal = $valor;
                } elseif (strcasecmp($campo, "peso") == 0) {
                    $periodico->peso = $valor;
                } elseif (strcasecmp($campo, "altura") == 0) {
                    $periodico->altura = $valor;
                } elseif (strcasecmp($campo, "imc") == 0) {
                    $periodico->imc = $valor;
                } elseif (strcasecmp($campo, "pele_mucosas") == 0) {
                    $periodico->peleMucosas = $valor;
                } elseif (strcasecmp($campo, "cabeca") == 0) {
                    $periodico->cabeca = $valor;
                } elseif (strcasecmp($campo, "pescoco") == 0) {
                    $periodico->pescoco = $valor;
                } elseif (strcasecmp($campo, "torax") == 0) {
                    $periodico->torax = $valor;
                } elseif (strcasecmp($campo, "abdome") == 0) {
                    $periodico->abdome = $valor;
                } elseif (strcasecmp($campo, "membros_sup_inf") == 0) {
                    $periodico->membrosSupInf = $valor;
                } elseif (strcasecmp($campo, "sist_nervoso_exam_cli") == 0) {
                    $periodico->sistNervosoExameClinico = $valor;
                } elseif (strcasecmp($campo, "coluna") == 0) {
                    $periodico->coluna = $valor;
                } elseif (strcasecmp($campo, "gunitario_cli") == 0) {
                    $periodico->genitoUrinarioExameClinico = $valor;
                } elseif (strcasecmp($campo, "psiquismo") == 0) {
                    $periodico->psiquismo = $valor;
                } elseif (strcasecmp($campo, "hemograma") == 0) {
                    $periodico->hemograma = $valor;
                } elseif (strcasecmp($campo, "creatinina") == 0) {
                    $periodico->creatinina = $valor;
                } elseif (strcasecmp($campo, "glicemia") == 0) {
                    $periodico->glicemia = $valor;
                } elseif (strcasecmp($campo, "colesterol_total") == 0) {
                    $periodico->colesterolTotal = $valor;
                } elseif (strcasecmp($campo, "hdl") == 0) {
                    $periodico->hdl = $valor;
                } elseif (strcasecmp($campo, "ldl") == 0) {
                    $periodico->ldl = $valor;
                } elseif (strcasecmp($campo, "vldl") == 0) {
                    $periodico->vldl = $valor;
                } elseif (strcasecmp($campo, "triglicerideos") == 0) {
                    $periodico->triglicerideos = $valor;
                } elseif (strcasecmp($campo, "psa") == 0) {
                    $periodico->psa = $valor;
                } elseif (strcasecmp($campo, "eas") == 0) {
                    $periodico->eas = $valor;
                } elseif (strcasecmp($campo, "oftalmico") == 0) {
                    $periodico->exameOftalmico = $valor;
                } elseif (strcasecmp($campo, "outro_exa_comp") == 0) {
                    $periodico->outroExamesComplementares = $valor;
                } elseif (strcasecmp($campo, "cid1") == 0) {
                    $periodico->cid1 = $valor;
                } elseif (strcasecmp($campo, "cid2") == 0) {
                    $periodico->cid2 = $valor;
                } elseif (strcasecmp($campo, "cid3") == 0) {
                    $periodico->cid3 = $valor;
                } elseif (strcasecmp($campo, "cid4") == 0) {
                    $periodico->cid4 = $valor;
                } elseif (strcasecmp($campo, "cid5") == 0) {
                    $periodico->cid5 = $valor;
                } elseif (strcasecmp($campo, "cid6") == 0) {
                    $periodico->cid6 = $valor;
                } elseif (strcasecmp($campo, "proximo_periodico") == 0) {
                    $periodico->proximoPeriodico = $valor;
                } elseif (strcasecmp($campo, "queixas") == 0) {
                    $periodico->queixas = $valor;
                } elseif (strcasecmp($campo, "obs") == 0) {
                    $periodico->obs = $valor;
                }

            }

            $resultsets[] = $periodico;
        }

        return $resultsets;
    }
}