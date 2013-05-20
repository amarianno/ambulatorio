<?php

    require_once('smarty/Smarty.class.php'); //versao 3 - nao funfou
//    require_once('smarty2.1/Smarty.class.php');

    function retornaSmarty() {
        $smarty = new Smarty();
        $smarty->template_dir = "templates";
        $smarty->compile_dir = "templates/templates_c";
        $smarty->cache_dir = "templates/cache";
        $smarty->config_dir = "templates/configs";
        $smarty->plugins_dir = "smarty/plugins";

        return $smarty;
    }