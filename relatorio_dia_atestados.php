<?php

require_once ('include/classes/Loader.class.php');
require_once ('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$op = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];

if($op == 'pdf') {

    $html = "";

    $atestBC = new AtestadoBC();
    $empregBC = new EmpregadoBC();

    $dataIni = RelatorioAtestadoPorDiaHelper::retornaDataFormatada($_GET['diaRelatorio']);
    $filtro = null;

    $listaAtestadosDoDia = $atestBC->consultarAtestadoPorDataDeRecebimento($_SESSION[BANCO_SESSAO], $dataIni);

    if(count($listaAtestadosDoDia) > 0) {
        $mapLotacao = RelatorioAtestadoPorDiaHelper::retornaMapPorLotacao($listaAtestadosDoDia);
        $qtdeAtestados = 0;

        foreach($mapLotacao as $atestadosAgrupadosPorLotacao) {
            $qtdeAtestados += count($atestadosAgrupadosPorLotacao);
            $html .= RelatorioAtestadoPorDiaHelper::toHtmlPDF($atestadosAgrupadosPorLotacao);
        }

    } else {
        $html .= RelatorioAtestadoPorDiaHelper::toHtmlSemRegistros();
    }

    require_once('MPDF56/mpdf.php');

    $mpdf = new mPDF();
    $stylesheet = file_get_contents('../include/css/template.css');
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML($html, 2);
    $mpdf->Output();
    exit;

} else if($op == 'consultar') {

    $html = "";

    $atestBC = new AtestadoBC();
    $empregBC = new EmpregadoBC();

    $dataIni = RelatorioAtestadoPorDiaHelper::retornaDataFormatada($_POST['diaRelatorio']);
    $filtro = null;

    $listaAtestadosDoDia = $atestBC->consultarAtestadoPorDataDeRecebimento($_SESSION[BANCO_SESSAO], $dataIni);

    if(count($listaAtestadosDoDia) > 0) {
        $mapLotacao = RelatorioAtestadoPorDiaHelper::retornaMapPorLotacao($listaAtestadosDoDia);

        $htmlRetorno = "";
        $qtdeAtestados = 0;

        foreach($mapLotacao as $atestadosAgrupadosPorLotacao) {
            $qtdeAtestados += count($atestadosAgrupadosPorLotacao);
            $htmlRetorno .= RelatorioAtestadoPorDiaHelper::toHtmlGrid($atestadosAgrupadosPorLotacao);
        }
        $html .= "Encontrados <b>". $qtdeAtestados. "</b> atestados para a data <b>". $_POST['diaRelatorio'] . "</b><br><br>";
        $html .= $htmlRetorno;

    } else {
        $html .= RelatorioAtestadoPorDiaHelper::toHtmlSemRegistros();
    }

    echo $html;

} else {
    $smart = retornaSmarty();
    $smart->display('relatorio_dia_atestados.tpl');

}



