<?php

function post($nomeParam)
{
    return $_POST[$nomeParam];
}

function UTF8toiso8859_11($string)
{

    if (!ereg("[\241-\377]", $string))
        return $string;

    $UTF8 = array(
        "\xe0\xb8\x81" => "\xa1",
        "\xe0\xb8\x82" => "\xa2",
        "\xe0\xb8\x83" => "\xa3",
        "\xe0\xb8\x84" => "\xa4",
        "\xe0\xb8\x85" => "\xa5",
        "\xe0\xb8\x86" => "\xa6",
        "\xe0\xb8\x87" => "\xa7",
        "\xe0\xb8\x88" => "\xa8",
        "\xe0\xb8\x89" => "\xa9",
        "\xe0\xb8\x8a" => "\xaa",
        "\xe0\xb8\x8b" => "\xab",
        "\xe0\xb8\x8c" => "\xac",
        "\xe0\xb8\x8d" => "\xad",
        "\xe0\xb8\x8e" => "\xae",
        "\xe0\xb8\x8f" => "\xaf",
        "\xe0\xb8\x90" => "\xb0",
        "\xe0\xb8\x91" => "\xb1",
        "\xe0\xb8\x92" => "\xb2",
        "\xe0\xb8\x93" => "\xb3",
        "\xe0\xb8\x94" => "\xb4",
        "\xe0\xb8\x95" => "\xb5",
        "\xe0\xb8\x96" => "\xb6",
        "\xe0\xb8\x97" => "\xb7",
        "\xe0\xb8\x98" => "\xb8",
        "\xe0\xb8\x99" => "\xb9",
        "\xe0\xb8\x9a" => "\xba",
        "\xe0\xb8\x9b" => "\xbb",
        "\xe0\xb8\x9c" => "\xbc",
        "\xe0\xb8\x9d" => "\xbd",
        "\xe0\xb8\x9e" => "\xbe",
        "\xe0\xb8\x9f" => "\xbf",
        "\xe0\xb8\xa0" => "\xc0",
        "\xe0\xb8\xa1" => "\xc1",
        "\xe0\xb8\xa2" => "\xc2",
        "\xe0\xb8\xa3" => "\xc3",
        "\xe0\xb8\xa4" => "\xc4",
        "\xe0\xb8\xa5" => "\xc5",
        "\xe0\xb8\xa6" => "\xc6",
        "\xe0\xb8\xa7" => "\xc7",
        "\xe0\xb8\xa8" => "\xc8",
        "\xe0\xb8\xa9" => "\xc9",
        "\xe0\xb8\xaa" => "\xca",
        "\xe0\xb8\xab" => "\xcb",
        "\xe0\xb8\xac" => "\xcc",
        "\xe0\xb8\xad" => "\xcd",
        "\xe0\xb8\xae" => "\xce",
        "\xe0\xb8\xaf" => "\xcf",
        "\xe0\xb8\xb0" => "\xd0",
        "\xe0\xb8\xb1" => "\xd1",
        "\xe0\xb8\xb2" => "\xd2",
        "\xe0\xb8\xb3" => "\xd3",
        "\xe0\xb8\xb4" => "\xd4",
        "\xe0\xb8\xb5" => "\xd5",
        "\xe0\xb8\xb6" => "\xd6",
        "\xe0\xb8\xb7" => "\xd7",
        "\xe0\xb8\xb8" => "\xd8",
        "\xe0\xb8\xb9" => "\xd9",
        "\xe0\xb8\xba" => "\xda",
        "\xe0\xb8\xbf" => "\xdf",
        "\xe0\xb9\x80" => "\xe0",
        "\xe0\xb9\x81" => "\xe1",
        "\xe0\xb9\x82" => "\xe2",
        "\xe0\xb9\x83" => "\xe3",
        "\xe0\xb9\x84" => "\xe4",
        "\xe0\xb9\x85" => "\xe5",
        "\xe0\xb9\x86" => "\xe6",
        "\xe0\xb9\x87" => "\xe7",
        "\xe0\xb9\x88" => "\xe8",
        "\xe0\xb9\x89" => "\xe9",
        "\xe0\xb9\x8a" => "\xea",
        "\xe0\xb9\x8b" => "\xeb",
        "\xe0\xb9\x8c" => "\xec",
        "\xe0\xb9\x8d" => "\xed",
        "\xe0\xb9\x8e" => "\xee",
        "\xe0\xb9\x8f" => "\xef",
        "\xe0\xb9\x90" => "\xf0",
        "\xe0\xb9\x91" => "\xf1",
        "\xe0\xb9\x92" => "\xf2",
        "\xe0\xb9\x93" => "\xf3",
        "\xe0\xb9\x94" => "\xf4",
        "\xe0\xb9\x95" => "\xf5",
        "\xe0\xb9\x96" => "\xf6",
        "\xe0\xb9\x97" => "\xf7",
        "\xe0\xb9\x98" => "\xf8",
        "\xe0\xb9\x99" => "\xf9",
        "\xe0\xb9\x9a" => "\xfa",
        "\xe0\xb9\x9b" => "\xfb",
    );

    $string = strtr($string, $UTF8);
    return $string;
}

$matricula = post('txtMatricula');
$uf = post('selUf');
$caraterSolicitacao = post('selCaraterSol');
$cid = post('txtCID');
$indicacaoClinica = post('txtIndClicina');

$cod1 = post('txtCod1');
$cod2 = post('txtCod2');
$cod3 = post('txtCod3');
$cod4 = post('txtCod4');
$cod5 = post('txtCod5');

$desc1 = post('txtDesc1');
$desc2 = post('txtDesc2');
$desc3 = post('txtDesc3');
$desc4 = post('txtDesc4');
$desc5 = post('txtDesc5');

$argumentos = '"' . $matricula . '" ';
$argumentos .= '"' . $uf . '" ';
$argumentos .= '"' . $caraterSolicitacao . '" ';
$argumentos .= '"' . $cid . '" ';
$argumentos .= '"' . $indicacaoClinica . '" ';

$argumentos .= '"' . $cod1 . '" ';
$argumentos .= '"' . $cod2 . '" ';
$argumentos .= '"' . $cod3 . '" ';
$argumentos .= '"' . $cod4 . '" ';
$argumentos .= '"' . $cod5 . '" ';

$argumentos .= '"' . ($desc1) . '" ';
$argumentos .= '"' . ($desc2) . '" ';
$argumentos .= '"' . ($desc3) . '" ';
$argumentos .= '"' . ($desc4) . '" ';
$argumentos .= '"' . ($desc5) . '" ';

//echo "utf8_decode: " . utf8_decode($str) . "<br>";
//echo "utf8_encode: " . utf8_encode($str) . "<br>";
//echo "html_entity_decode: " . html_entity_decode($str) . "<br>";
//echo "htmlentities: " . htmlentities($str, ENT_QUOTES, "UTF-8") . "<br>";
//echo "get_html_translation_table: " . get_html_translation_table($str) . "<br>";
//echo "htmlspecialchars: " . htmlspecialchars($str) . "<br>";
//echo "urlencode: " . urlencode($str) . "<br>";
//echo "urldecode: " . urldecode($str) . "<br>";

exec("java -jar php.jar " . $argumentos, $mensagemRetorno);
echo($mensagemRetorno[0]);