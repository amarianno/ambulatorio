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


function toGridHtml($listaCID, $diasAfastado) {

    $cor = false;
    $htmlRetorno = "";

    $htmlRetorno .= "<div class='datagrid'>";
    $htmlRetorno .= "<table id='mainDeck'>";
    $htmlRetorno .= "<thead>";
    $htmlRetorno .= "   <tr>";
    $htmlRetorno .= "       <th>Quantidade</th>";
    $htmlRetorno .= "       <th>Cid</th>";
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
            $htmlRetorno .= "   <td>" . $relatorio->cid->descricao . "</td>";
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

    $mesAno = $_POST['dtRelatorio'];
    $mesAnoSplit = preg_split('"/"', $mesAno, -1);

    $dataIni = $mesAnoSplit[1]."-".$mesAnoSplit[0]."-01";
    $dataFim = $mesAnoSplit[1]."-".$mesAnoSplit[0]."-31";

    $listaCID = $cidBC->consultarCidPorMes($_SESSION[BANCO_SESSAO], $dataIni, $dataFim);

    $diasAfastado = $atestBC->consultarDiasAfastadoPorMes($_SESSION[BANCO_SESSAO], $dataIni, $dataFim);

    $html = toGridHtml($listaCID, $diasAfastado[0]->diasAfastado);

    echo($html);

} else if($op == 'pdf') {
    $cidBC = new CidBC();
    $atestBC = new AtestadoBC();

    $mesAno = $_GET['dtRelatorio'];
    $mesAnoSplit = preg_split('"/"', $mesAno, -1);

    $dataIni = $mesAnoSplit[1]."-".$mesAnoSplit[0]."-01";
    $dataFim = $mesAnoSplit[1]."-".$mesAnoSplit[0]."-31";

    $listaCID = $cidBC->consultarCidPorMes($_SESSION[BANCO_SESSAO], $dataIni, $dataFim);

    $diasAfastado = $atestBC->consultarDiasAfastadoPorMes($_SESSION[BANCO_SESSAO], $dataIni, $dataFim);

    $html = toGridHtml($listaCID, $diasAfastado[0]->diasAfastado);

    GeradorPDF::pdf($html, "relatorio_cid_mensal_pdf");

    $smarty = retornaSmarty();
    $smarty->assign("html", $html);
    $smarty->display("relatorio_cid_mensal_pdf.tpl");
} else {
    $smarty = retornaSmarty();
    $smarty->display("relatorio_cid_mensal.tpl");
}

?>