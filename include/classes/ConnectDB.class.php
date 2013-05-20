<?php
/**
 * Classe de conexão com o banco de dados
 * @author Carlos Macapuna
 * TODO: Depreciado - REMOVER
 */
class ConnectDB {
    //Conexão com o banco
    var $server = "localhost";
    var $user = "root";
    var $passwd = 'Bu$carta5';
    var $dbname = 'ambulatorio';

    //Erro, conexão e resultados
    var $connection;
    var $num_rows;
    var $result;

    function __construct() {
        $this->connect();
    }

    function __destruct() {
        $this->disconnect();
    }

    /**
     * Conecta ao MySQL e seleciona o banco de dados
     */
    function connect() {
        $this->connection = mysql_connect($this->server, $this->user, $this->passwd) or die ("Erro na conexão com servidor. <br />Erro: " . mysql_error());
        $this->result = mysql_select_db($this->dbname, $this->connection) or die ("Banco de dados não encontrado. <br />Erro: " . mysql_error());
    }

    /**
     * Desconecta do banco
     */
    function disconnect() {
        mysql_close($this->connection);
    }

    public function incluir($sql) {
        $this->setComandoSQL(mysql_query($sql));
        if (!$this->getComandoSql()) {
            throw new Exception("Não foi possível executar a query de inserção. Query: " . $sql . " Erro: " . mysql_error() . ". Código: " . mysql_errno());
        } else {
            return true;
        }
    }

    function executeQuery($query) {
        return mysql_query($query, $this->connection) or die ("Erro ao selecionar a tabela do banco. <br />Erro: " . mysql_error());
    }

    /**
     *
     * @return the $connection
     */
    public function getConnection() {
        return ($this->connection);
    }

    /**
     *
     * @param resource $connection
     */
    public function setConnection($connection) {
        $this->connection = $connection;
    }


}