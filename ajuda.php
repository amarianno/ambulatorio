<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php


$de = $_GET['de'];
$guardaValorDe = $de;
$ate = $_GET['ate'];
$letra = $_GET['letra'];
$descricao = $_GET['descricao'];

while ($de != $ate) {
    echo "insert into cid (nome, descricao) values ('". $letra . $de ." (". $letra.$guardaValorDe ."-". $letra.$ate .")','".$descricao."');<br>";
    $de++;
}
?>
</html>

