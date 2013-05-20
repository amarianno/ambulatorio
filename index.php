<?php

    require_once('include/classes/Loader.class.php');
    require_once('include/retornasmarty.inc.php');

    $smarty = retornaSmarty();
    $smarty->display("index.tpl");