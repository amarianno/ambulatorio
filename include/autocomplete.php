<?php
    require_once('classes/ConnectDB.class.php');

    $conexao = new ConnectDB();
    //Corrige o termo buscado substituindo os \' por ' (comando stripslashes) e depois substitui ' por '' para o select no mysql
    $term = str_replace("'", "''", stripslashes(trim(strip_tags($_GET['term']))));

    $sql = "SELECT matricula, nome, lotacao, empresa
	        FROM empregado
            WHERE matricula LIKE '" . $term . "%'
            ORDER BY matricula
            LIMIT 0, 20";

    mysql_query("SET NAMES utf8");

    $query = mysql_query($sql, $conexao->connection) or die(mysql_error());

    $data = array();
    while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
        $data[] = array(
            'matricula' => $row['matricula'],
            'nome' => $row['nome'],
            'lotacao' => $row['lotacao'],
            'empresa' => $row['empresa'],
        );
    }

    unset ($conexao);

    echo json_encode($data);