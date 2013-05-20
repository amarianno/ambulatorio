<?php

    require_once('include/classes/Loader.class.php');
    require_once('include/retornasmarty.inc.php');
    require_once ('include/confconexao.inc.php');
    require_once ('include/retornaconexao.inc.php');

    $atestadoBC = new AtestadoBC();

    $codigo = $_POST['codigo'];
    $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("codigo" => $codigo));
    $atestadoBC->excluir($_SESSION[BANCO_SESSAO], $filtro);

    echo "EXCLUÍDO";




