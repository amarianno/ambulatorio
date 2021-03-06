<?php

require_once ('include/classes/Loader.class.php');
require_once ('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');



function somaQtdeAtestados($listaCID) {
    $total = 0;
    if(count($listaCID) > 0) {
        foreach ($listaCID as $relatorio) {
            $total += $relatorio->quantidade;
        }
    }

    return $total;

}

function quantitativoCIDPorPeriodoToHtml($listaQuantidades) {

    $total = 0;
    $htmlRetorno = "";
    $cor = false;

    if(count($listaQuantidades) > 0) {
        foreach ($listaQuantidades as $relatorio) {
            $total += $relatorio->quantidade;
        }

        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th>Quantidade (%)</th>";
        $htmlRetorno .= "       <th>Dias</th>";
        $htmlRetorno .= "       <th>Descrição</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";

        foreach ($listaQuantidades as $relatorio) {

            //$relatorio = new RelatorioCIDPorMes();
            $classe = ($cor = !$cor) ? 'normal' : 'alt';
            $htmlRetorno .= "<tr class='" . $classe . "'>";
            $htmlRetorno .= "   <td>" . number_format(($relatorio->quantidade * 100)  / $total, 2, '.', ''). "%</td>";
            $htmlRetorno .= "   <td>" . $relatorio->dias . "</td>";
            $htmlRetorno .= "   <td>" . utf8_encode($relatorio->cid->descricao) . "</td>";
            $htmlRetorno .= '</tr>';
        }

        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
    }

    return $htmlRetorno;

}

function toGridHtml($listaCID, $diasAfastado) {

    $cor = false;
    $htmlRetorno = "";

    $htmlRetorno .= "<div class='datagrid'>";
    $htmlRetorno .= "<table id='mainDeck'>";
    $htmlRetorno .= "<thead>";
    $htmlRetorno .= "   <tr>";
    $htmlRetorno .= "       <th>Quantidade</th>";
    $htmlRetorno .= "       <th>CID</th>";
    $htmlRetorno .= "       <th>Descrição</th>";
    $htmlRetorno .= "   </tr>";
    $htmlRetorno .= "</thead>";
    $htmlRetorno .= "<tbody>";

    if(count($listaCID) > 0) {
        foreach ($listaCID as $relatorio) {

            //$relatorio = new RelatorioCIDPorMes();
            $classe = ($cor = !$cor) ? 'normal' : 'alt';
            $htmlRetorno .= "<tr class='" . $classe . "'>";
            $htmlRetorno .= "   <td>" . $relatorio->quantidade . "</td>";
            $htmlRetorno .= "   <td>" . $relatorio->cid->nome . "</td>";
            $htmlRetorno .= "   <td>" . utf8_encode($relatorio->cid->descricao) . "</td>";
            $htmlRetorno .= '</tr>';
        }
    } else {
        $htmlRetorno .= "   <tr class='conteudo'>";
        $htmlRetorno .= "       <td class='semCartas' colspan='5'>Nenhum cid para o mês/ano fornecido</td>";
        $htmlRetorno .= "   </tr>";
    }

    $htmlRetorno .= "</tbody>";
    $htmlRetorno .= "</table>";

    if(count($listaCID) > 0) {
        $htmlRetorno .= "<hr>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "   <tr class='alt'>";
        $htmlRetorno .= "       <td><b>" .$diasAfastado. " DIAS PERDIDOS (exceto de acompanhante)</b></td>";
        $htmlRetorno .= '   </tr>';
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "<hr>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "   <tr class='alt'>";
        $htmlRetorno .= "       <td><b>" . somaQtdeAtestados($listaCID) . " Atestados (exceto de acompanhante) </b></td>";
        $htmlRetorno .= '   </tr>';
        $htmlRetorno .= "</table>";
        //$htmlRetorno .= "<a href='relatorio_cid_mensal.php?dtRelatorio=04/2013&op=pdf' target='_blank'>link</a>";

    }
    $htmlRetorno .= "</div>";

    return $htmlRetorno;

}


    $op = (isset( $_POST['op'])) ? $_POST['op'] :  $_GET['op'];

if($op == 'consultar') {

    $cidBC = new CidBC();
    $atestBC = new AtestadoBC();

    $dataIni = implode('-',array_reverse(explode('/',$_POST['dtRelatorioIni'])));
    $dataFim = implode('-',array_reverse(explode('/',$_POST['dtRelatorioFIM'])));
    $patologia = $_POST['txtPatologia'];
    $especialidade = $_POST['selEspecialidade'];

    if($patologia == '' || $patologia == null) {
        $patologia = null;
    }

    if($especialidade == 1) {
        $especialidade = null;
    }

    $listaCID = $cidBC->consultarCidPorPeriodo($_SESSION[BANCO_SESSAO], $dataIni, $dataFim, $patologia, $especialidade);

    $diasAfastado = $atestBC->consultarDiasAfastadoPorPeriodo($_SESSION[BANCO_SESSAO], $dataIni, $dataFim, $patologia, $especialidade);
    $html = toGridHtml($listaCID, $diasAfastado[0]->diasAfastado);
    if($patologia == null && $especialidade == null) {
        $html .= quantitativoCIDPorPeriodoToHtml($cidBC->consultarQuantitativoTipoCIDPorPeriodo($_SESSION[BANCO_SESSAO], $dataIni, $dataFim));
       // $html .= quantitativoCIDPorPeriodoToHtml($cidBC->consultarQuantitativoTipoCIDPorPeriodoApenasAtestadosMais15Dias($_SESSION[BANCO_SESSAO], $dataIni, $dataFim));
    }

    echo($html);

} else if($op == 'pdf') {
    $cidBC = new CidBC();
    $atestBC = new AtestadoBC();

    $dataIni = implode('-',array_reverse(explode('/',$_GET['dtRelatorioIni'])));
    $dataFim = implode('-',array_reverse(explode('/',$_GET['dtRelatorioFIM'])));
    $html = "Período: de <b>" . $_GET['dtRelatorioIni'] . "</b> a <b>" . $_GET['dtRelatorioFIM'] . "</b><br>";
    $patologia = $_GET['txtPatologia'];
    $especialidade = $_GET['selEspecialidade'];

    if($patologia == '' || $patologia == null) {
        $patologia = null;
    } else {
        $html .= "Patologia: <b>". $patologia . "</b><br>";
    }

    if($especialidade == 1) {
        $especialidade = null;
    } else {
        $html .= "Especialidade: <b>". $especialidade . "</b><br>";
    }

    $listaCID = $cidBC->consultarCidPorPeriodo($_SESSION[BANCO_SESSAO], $dataIni, $dataFim, $patologia, $especialidade);

    $diasAfastado = $atestBC->consultarDiasAfastadoPorPeriodo($_SESSION[BANCO_SESSAO], $dataIni, $dataFim, $patologia, $especialidade);
    $html .= toGridHtml($listaCID, $diasAfastado[0]->diasAfastado);
    if($patologia == null && $especialidade == null) {
        $html .= quantitativoCIDPorPeriodoToHtml($cidBC->consultarQuantitativoTipoCIDPorPeriodo($_SESSION[BANCO_SESSAO], $dataIni, $dataFim));
    }

    require_once('MPDF56/mpdf.php');

    $mpdf = new mPDF();
    $stylesheet = file_get_contents('include/css/template.css');
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML($html, 2);
    $mpdf->Output();
    exit;

} else {
    $smarty = retornaSmarty();
    $smarty->display("relatorio_cid_mensal.tpl");
}

?>