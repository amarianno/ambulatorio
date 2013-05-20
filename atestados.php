<?php

require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();

$data = preg_split('"/"', date("d/m/Y"), -1);

$smart->assign("txtDtRecebimento", $data[0]."/".$data[1]."/".$data[2][2].$data[2][3]);
$smart->display("atestados.tpl");




