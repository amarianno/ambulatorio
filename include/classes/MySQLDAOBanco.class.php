<?php

require_once('Loader.class.php');

class MySQLDAOBanco extends DAOBanco {
    private $servidor;
    private $usuario;
    private $senha;
    private $banco;
    private $conexao;
    private $comandoSQL;
    private static $instancia = null;

    private function __construct($servidor, $usuario, $senha, $banco) {
        parent::inicializaConstrutor(false, true);
        $this->servidor = $servidor;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->banco = $banco;
    }

    public function abreConexao() {
        try {
            if (!$this->conexao) {
                $this->conexao = mysql_connect($this->servidor, $this->usuario, $this->senha);
                if (!$this->conexao) {
                    throw new Exception("Não foi possível conectar no banco de dados. Erro: " . mysql_error() . ". Código: " . mysql_errno());
                } else {
                    if (!mysql_select_db($this->banco, $this->conexao)) {
                        throw new Exception("Não foi possível selecionar o banco de dados. Erro: " . mysql_error() . ". Código: " . mysql_errno());
                    }
                }
            } else {
                if (!is_resource($this->conexao)) {
                    $this->conexao = mysql_connect($this->servidor, $this->usuario, $this->senha);
                }
                if (!$this->conexao) {
                    throw new Exception("Não foi possível conectar no banco de dados. Erro: " . mysql_error() . ". Código: " . mysql_errno());
                } else {
                    if (!mysql_select_db($this->banco, $this->conexao)) {
                        throw new Exception("Não foi possível selecionar o banco de dados. Erro: " . mysql_error() . ". Código: " . mysql_errno());
                    }
                }
            }
        } catch (Exception $e) {
            BuscartasEmailSender::enviarEmailException($e, "MySQLDAOBanco.class.php");
        }

        return true;
    }

    public function fechaConsulta() {
        return mysql_free_result($this->comandoSQL);
    }

    public function fechaConexao() {
        mysql_close($this->conexao);
    }

    public function incluir($sql) {
        try {
            $this->comandoSQL = mysql_query($sql);
            if (!$this->comandoSQL) {
                throw new Exception("Não foi possível executar a query de inserção. Query: " . $sql . " Erro: " . mysql_error() . ". Código: " . mysql_errno());
            } else {
                return true;
            }
        } catch (Exception $e) {
            BuscartasEmailSender::enviarEmailException($e, "MySQLDAOBanco.class.php");
        }
    }

    public function alterar($sql) {
        try {
            $this->comandoSQL = mysql_query($sql);
            if (!$this->comandoSQL) {
                throw new Exception("Não foi possível executar a query de alteração. Query: " . $sql . " Erro: " . mysql_error() . ". Código: " . mysql_errno());
            } else {
                return true;
            }
        } catch (Exception $e) {
            BuscartasEmailSender::enviarEmailException($e, "MySQLDAOBanco.class.php");
        }
    }

    public function excluir($sql) {
        try {
            $this->comandoSQL = mysql_query($sql);
            if (!$this->comandoSQL) {
                throw new Exception("Não foi possível executar a query de exclusão. Query: " . $sql . " Erro: " . mysql_error() . ". Código: " . mysql_errno());
            } else {
                return true;
            }
        } catch (Exception $e) {
            BuscartasEmailSender::enviarEmailException($e, "MySQLDAOBanco.class.php");
        }
    }

    public function consultar($sql) {
        $registros = array();
        $linha = null;
        $conta = 0;
        $this->comandoSQL = mysql_query($sql);
        try {
            if (!$this->comandoSQL) {
                throw new Exception("Não foi possível executar a query de consulta. Query: " . $sql . " Erro: " . mysql_error() . ". Código: " . mysql_errno());
            } else {
                while ($linha = mysql_fetch_array($this->comandoSQL, MYSQL_ASSOC)) {
                    $registros[$conta] = $linha;
                    $conta++;
                }
                $this->fechaConsulta();

                return $registros;
            }
        } catch (Exception $e) {
            BuscartasEmailSender::enviarEmailException($e, "MySQLDAOBanco.class.php");
        }
    }

    public function commit() {
        try {
            if ($this->isEmTransacao() && !$this->isAutoCommit()) {
                $this->comandoSQL = mysql_query("COMMIT");
                if (!$this->comandoSQL) {
                    throw new Exception("Não foi possível commitar a transação." . " Erro: " . mysql_error() . ". Código: " . mysql_errno());
                } else {
                    $this->comandoSQL = mysql_query("SET AUTOCOMMIT=1");
                    if (!$this->comandoSQL) {
                        throw new Exception("Não foi possível configurar a transação para autocommit." . " Erro: " . mysql_error() . ". Código: " . mysql_errno());
                    } else {
                        $this->setAutoCommit(true);
                        $this->setEmTransacao(false);

                        return true;
                    }
                }
            }
        } catch (Exception $e) {
            BuscartasEmailSender::enviarEmailException($e, "MySQLDAOBanco.class.php");
        }

        return false;
    }

    public function rollback() {
        try {
            if ($this->isEmTransacao() && !$this->isAutoCommit()) {
                $this->comandoSQL = mysql_query("ROLLBACK");
                if (!$this->comandoSQL) {
                    throw new Exception("Não foi possível efetuar o rollback da transação." . " Erro: " . mysql_error() . ". Código: " . mysql_errno());
                } else {
                    $this->comandoSQL = mysql_query("SET AUTOCOMMIT=1");
                    if (!$this->comandoSQL) {
                        throw new Exception("Não foi possível configurar a transação para autocommit." . " Erro: " . mysql_error() . ". Código: " . mysql_errno());
                    } else {
                        $this->setAutoCommit(true);
                        $this->setEmTransacao(false);

                        return true;
                    }
                }
            }
        } catch (Exception $e) {
            BuscartasEmailSender::enviarEmailException($e, "MySQLDAOBanco.class.php");
        }

        return false;
    }

    public function startTransaction() {
        try {
            if (!$this->isEmTransacao() && $this->isAutoCommit()) {
                $this->comandoSQL = mysql_query("SET AUTOCOMMIT=0");
                if (!$this->comandoSQL) {
                    throw new Exception("Não foi possível configurar a transação para autocommit." . " Erro: " . mysql_error() . ". Código: " . mysql_errno());
                } else {
                    $this->setAutoCommit(false);
                    $this->setEmTransacao(true);

                    return true;
                }
            }
        } catch (Exception $e) {
            BuscartasEmailSender::enviarEmailException($e, "MySQLDAOBanco.class.php");
        }

        return false;
    }

    public static function getInstancia($servidor, $usuario, $senha, $banco) {
        if (is_null(self::$instancia)) {
            self::$instancia = new self($servidor, $usuario, $senha, $banco);
        }

        return self::$instancia;
    }
}