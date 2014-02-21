<?php

require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');

$smarty = retornaSmarty();
if(!isset($_SESSION[Constantes::NOME_USUARIO])) {
    $smarty->display("login.tpl");
} else {
    $smarty->display("index.tpl");
}