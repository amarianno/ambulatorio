<?php

$pasta = 'guias_cassi';
if(isset($_GET['file']) && file_exists("{$pasta}/".$_GET['file'])){
    $file = $_GET['file'];
    $type = filetype("{$pasta}/{$file}");
    $size = filesize("{$pasta}/{$file}");
    header("Content-Description: File Transfer");
    header("Content-Type:{$type}");
    header("Content-Length:{$size}");
    header("Content-Disposition: attachment; filename=$file");
    readfile("{$pasta}/{$file}");
    exit;
} else {
    echo "Não existe documento com o nome:" . $_GET['file'];
}

