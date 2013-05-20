<?php

    function dbAuthUser($user, $pwd, $dbconn) {
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

    function isConnected() {
        return isset($_SESSION['user']);
    }

    function check_user($conexao) {
        return isset($_SESSION['user']);
    }