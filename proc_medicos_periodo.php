<?php

require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();
$bc = new EnfermagemBC();

$operacao = (isset( $_POST['operacao'])) ? $_POST['operacao'] :  $_GET['operacao'];

function grid($lista, $tipoFuncionario) {

    $cor = false;
    $htmlRetorno = "";

    $htmlRetorno .= "<table id='mainDeck'>";
    $htmlRetorno .= "<thead>";
    $htmlRetorno .= "   <tr>";
    $htmlRetorno .= "       <th>".$tipoFuncionario."</th>";
    $htmlRetorno .= "   </tr>";
    $htmlRetorno .= "</thead>";
    $htmlRetorno .= "</table>";

    if(count($lista) > 0) {
        $htmlRetorno .= count($lista)." procedimentos médicos para a data pesquisada";
    }
    $htmlRetorno .= "<div class='datagrid'>";
    $htmlRetorno .= "<table id='mainDeck'>";
    $htmlRetorno .= "<thead>";
    $htmlRetorno .= "   <tr>";
    $htmlRetorno .= "       <th>Total</th>";
    $htmlRetorno .= "       <th>Procedimento</th>";
    $htmlRetorno .= "   </tr>";
    $htmlRetorno .= "</thead>";
    $htmlRetorno .= "<tbody>";

    if(count($lista) > 0) {
        foreach ($lista as $enfermagem) {

            $classe = ($cor = !$cor) ? 'normal' : 'alt';
            $htmlRetorno .= "<tr class='" . $classe . "'>";
            $htmlRetorno .= "   <td>" . $enfermagem->total . "</td>";
            $htmlRetorno .= "   <td>" . $enfermagem->procedimento . "</td>";
            $htmlRetorno .= '</tr>';
        }
    } else {
        $htmlRetorno .= "   <tr class='conteudo'>";
        $htmlRetorno .= "       <td class='semCartas' colspan='5'>Nenhum procedimento médico Cadastrado</td>";
        $htmlRetorno .= "   </tr>";
    }

    $htmlRetorno .= "</tbody>";
    $htmlRetorno .= "</table>";
    $htmlRetorno .= "</div>";
    $htmlRetorno .= "<br>";

    return $htmlRetorno;
}

if($operacao == 'visualizar') {

    $dataIni = implode("-",array_reverse(explode("/", $_POST['dtRelatorioIni'])));
    $dataFim = implode("-",array_reverse(explode("/", $_POST['dtRelatorioFIM'])));

    $html = '';
    $html .= grid($bc->consultarQuantitativoPorData($_SESSION[BANCO_SESSAO], $dataIni, $dataFim , "1"), 'SERPRO');
    $html .= grid($bc->consultarQuantitativoPorData($_SESSION[BANCO_SESSAO], $dataIni, $dataFim , "2"), 'TERCEIRIZADO');
    $html .= grid($bc->consultarQuantitativoPorData($_SESSION[BANCO_SESSAO], $dataIni, $dataFim , "3"), 'ESTAGIÁRIO');

    echo($html);

} else if($operacao == 'pdf') {

    $dataIni = implode("-",array_reverse(explode("/", $_GET['dtRelatorioIni'])));
    $dataFim = implode("-",array_reverse(explode("/", $_GET['dtRelatorioFIM'])));

    $html = '<strong> Procedimentos Médicos / Enfermagem para o período '.$_GET['dtRelatorioIni'].' até '.$_GET['dtRelatorioFIM'].'</strong><br><br>';
    $html .= grid($bc->consultarQuantitativoPorData($_SESSION[BANCO_SESSAO], $dataIni, $dataFim , "1"), 'SERPRO');
    $html .= grid($bc->consultarQuantitativoPorData($_SESSION[BANCO_SESSAO], $dataIni, $dataFim , "2"), 'TERCEIRIZADO');
    $html .= grid($bc->consultarQuantitativoPorData($_SESSION[BANCO_SESSAO], $dataIni, $dataFim , "3"), 'ESTAGIÁRIO');

    require_once('MPDF56/mpdf.php');

    $mpdf = new mPDF();
    $stylesheet = file_get_contents('include/css/template.css');
    $mpdf->WriteHTML($stylesheet,1);
    $mpdf->WriteHTML($html, 2);
    $mpdf->Output();
    exit;

} else {
    $smart->display('proc_medico_periodo.tpl');
}

