<?php

    interface Loader {
    }

    define('SMARTY_SPL_AUTOLOAD', 0); // incluído para evitar erros na versão 3 do Smarty

    function __autoload($classe) {
        include $classe . '.class.php';
    }

    spl_autoload_register('__autoload'); //versao 3