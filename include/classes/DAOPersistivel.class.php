<?php

    require_once('Loader.class.php');

    abstract class DAOPersistivel {
        private $nomeTabela;

        public function __construct($nomeTabela) {
            $this->nomeTabela = $nomeTabela;
        }

        public function incluir(DAOBanco $banco, $camposValores) {
            $conta = 0;
            $sql = "INSERT INTO " . $this->nomeTabela . " (";
            $size = count($camposValores);
            foreach ($camposValores as $campo => $valor) {
                $sql .= $campo;
                if ($conta < ($size - 1)) {
                    $sql .= ", ";
                }
                $conta++;
            }
            $sql .= ") VALUES (";
            $conta = 0;
            foreach ($camposValores as $valor) {
                $sql .= $this->formataValor($valor, $conta, $size);
                $conta++;
            }
            $sql .= ")";

            //print_r($sql);

            if ($banco->abreConexao() == true) {
                $retorno = $banco->incluir($sql);
                $lastID = mysql_insert_id();
                $banco->fechaConexao();

                return $lastID;
            } else {
                return false;
            }
        }

        public function alterar(DAOBanco $banco, $camposValores, FiltroSQL $filtro = null) {
            $conta = 0;
            $sql = "UPDATE " . $this->nomeTabela . " SET ";
            $size = count($camposValores);
            foreach ($camposValores as $campo => $valor) {
                $sql .= $campo . " = ";
                $sql .= $this->formataValor($valor, $conta, $size);
                $conta++;
            }
            if (!is_null($filtro)) {
                $sizeFiltro = count($filtro->camposFiltro);
                if ($sizeFiltro > 0) {
                    $conta = 0;
                    $sql .= " WHERE ";
                    foreach ($filtro->camposFiltro as $campo => $valor) {
                        $sql .= $campo . $filtro->operador . $this->formataValor($valor, 0, 0);
                        if ($conta < ($sizeFiltro - 1)) {
                            $sql .= " " . $filtro->conector . " ";
                        }
                        $conta++;
                    }
                }
            }
            if ($banco->abreConexao() == true) {
                $retorno = $banco->alterar($sql);
                $banco->fechaConexao();

                return $retorno;
            } else {
                return false;
            }
        }

        public function excluir(DAOBanco $banco, FiltroSQL $filtro = null) {
            $conta = 0;
            $sql = "DELETE FROM " . $this->nomeTabela;
            if (!is_null($filtro)) {
                $sizeFiltro = count($filtro->camposFiltro);
                $sql .= " WHERE ";
                foreach ($filtro->camposFiltro as $campo => $valor) {
                    $sql .= $campo . $filtro->operador . $this->formataValor($valor, 0, 0);
                    if ($conta < ($sizeFiltro - 1)) {
                        $sql .= " " . $filtro->conector . " ";
                    }
                    $conta++;
                }
            }
            if ($banco->abreConexao() == true) {
                $retorno = $banco->excluir($sql);
                $banco->fechaConexao();

                return $retorno;
            } else {
                return false;
            }
        }

        public function consultar(DAOBanco $banco, $campos, FiltroSQL $filtro = null, $orderBy = null) {
            $conta = 0;
            $res = null;
            $size = count($campos);
            if ($size > 0) {
                $sql = "SELECT ";
                foreach ($campos as $valor) {
                    $sql .= $valor;
                    if ($conta < ($size - 1)) {
                        $sql .= ", ";
                    }
                    $conta++;
                }
            } else {
                $sql = "SELECT * ";
            }
            $sql .= " FROM " . $this->nomeTabela;
            $conta = 0;
            if (!is_null($filtro)) {
                $sizeFiltro = count($filtro->camposFiltro);
                $sql .= " WHERE ";
                foreach ($filtro->camposFiltro as $campo => $valor) {
                    if ($campo == Constantes::PWD) { //Verifica se é senha
                        $sql .= $campo . " " . $filtro->operador . " " . $this->formataValor($valor, 0, 0);
                    } else {
                        $sql .= $campo . " " . $filtro->operador . " " . $this->formataValor($valor, 0, 0);
                    }
                    if ($conta < ($sizeFiltro - 1)) {
                        $sql .= " " . $filtro->conector . " ";
                    }
                    $conta++;
                }
            }

            if(!is_null($orderBy)) {
                $sql .= " ORDER BY ".$orderBy;
            }

            //print_r($sql);

            if ($banco->abreConexao() == true) {
                $res = $banco->consultar($sql);
                $banco->fechaConexao();

                return $res;
            } else {
                return false;
            }
        }

        public function formataValor($valor, $posAtual, $posTotal) {
            if (is_string($valor)) {
                if (!get_magic_quotes_gpc()) {
                    $retorno = "'" . addslashes($valor) . "'";
                } else {
                    $retorno = "'" . $valor . "'";
                }
            } else if (empty($valor) && $valor != 0) {
                $retorno = "NULL";
            } else {
                $retorno = "'" . $valor . "'";
            }
            if ($posAtual < ($posTotal - 1)) {
                $retorno .= ", ";
            }

            return $retorno;
        }

        protected function getNomeTabela() {
            return $this->nomeTabela;
        }

        protected function setNomeTabela($nomeTabela) {
            $this->nomeTabela = $nomeTabela;
        }

        public abstract function criaObjetos($resultados);
    }