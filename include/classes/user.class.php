<?php

//require_once "../init.php";
include_once 'ConnectDB.class.php';

/**
 * Buscartas.com.br<br>
 * Classe usuário
 *
 * @author Carlos Macapuna
 *
 */
class User
{
    public $user;
    public $passwd;
    public $primeiroNome;
    public $ultimoNome;
    public $email;

    /**
     *
     * @return the $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     *
     * @return the $passwd
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     *
     * @return the $primeiroNome
     */
    public function getPrimeiroNome()
    {
        return $this->primeiroNome;
    }

    /**
     *
     * @return the $UltimoNome
     */
    public function getUltimoNome()
    {
        return $this->ultimoNome;
    }

    /**
     *
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     *
     * @param field_type $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     *
     * @param field_type $passwd
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }

    /**
     *
     * @param field_type $primeiroNome
     */
    public function setPrimeiroNome($primeiroNome)
    {
        $this->primeiroNome = $primeiroNome;
    }

    /**
     *
     * @param field_type $UltimoNome
     */
    public function setUltimoNome($UltimoNome)
    {
        $this->ultimoNome = $UltimoNome;
    }

    /**
     *
     * @param field_type $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Funções básicas

    /**
     * Configurar sessão
     */
    function __construct()
    {
//        if (!isset ($_SESSION)) {
//            print "Iniciando sessao";
////            session_start();
//        }

    }

//    /**
//     * Autenticar usuario
//     *
//     * @param $user
//     * @param $pwd
//     * @return array|bool
//     */
//    function authUser($user, $pwd)
//    {
//        $auth = false;
//        $sql = "SELECT * FROM " . TABELA_USERS . " WHERE _id=\"" . $user . "\" AND pwd=password(\"" . $pwd . "\")";
//
//        $conexao = new ConnectDB();
//        $result = mysql_query($sql) or die("Nao foi possivel se conectar..." . mysql_error());
//        if (!$result) "Erro ao recuperar o usuario" . mysql_error();
//
//        if (mysql_num_rows($result) == 1) {
//            $auth = mysql_fetch_array($result);
//            unset ($auth ['pwd']);
//            session_set_cookie_params(0);
//            @session_start();
//            $_SESSION ['user'] = $auth;
//            $_SESSION ['userid'] = $auth ["_id"];
//            $_SESSION ['firstname'] = $auth ["firstname"];
//            $_SESSION ['lastname'] = $auth ["lastname"];
//
//            $this->user = $auth ["_id"];
//            $this->primeiroNome = $auth ["firstname"];
//            $this->ultimoNome = $auth ["lastname"];
//
//            session_register('user');
//            session_write_close();
//        }
//
//        $conexao->disconnect();
//        return $auth;
//    }

    function dbAuthUser($user, $pwd, $dbconn)
    {
        $auth = FALSE;
        $sql = "SELECT * FROM usersbc WHERE _id=\"" . $user . "\" AND pwd=password(\"" . $pwd . "\")";

        $result = mysql_query($sql, $dbconn) or die(mysql_error());
        if (!$result) mysql_error();

        if (mysql_num_rows($result) == 1) {
            $auth = mysql_fetch_array($result);
            unset($auth['pwd']);
            session_set_cookie_params(0);
            @session_start();
            $_SESSION['user'] = $auth;

            $_SESSION['userid'] = $auth["_id"];
            $_SESSION['firstname'] = $auth["firstname"];
            $_SESSION['lastname'] = $auth["lastname"];

            session_register('user');
            session_write_close();
        }

        mysql_close($dbconn);
        return $auth;
    }

    /**
     * @return bool se está conectado
     */
    function isConnected()
    {
        return isset($_SESSION['user']);
    }

    /**
     * @return bool true se está conectado
     */
    function check_user()
    {
        return isset($_SESSION['user']);
    }
}