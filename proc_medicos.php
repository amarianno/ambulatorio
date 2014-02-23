<?php

require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();
$bc = new EnfermagemBC();

$operacao = $_POST['operacao'];

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

if($operacao == 'incluir') {

    $campos = array();
    if(isset($_POST['matricula']) && $_POST['matricula'] !== '') {
        $campos['matricula'] = $_POST['matricula'];
    }
    $campos['data'] = implode("-",array_reverse(explode("/", $_POST['data'])));
    $campos['tipo_funcionario'] = $_POST['tipo_funcionario'];
    $campos['procedimento'] = $_POST['procedimento'];
    $campos['obs'] = $_POST['obs'];
    $campos['usuario'] = $_POST['usuario'];

    $bc->incluir($_SESSION[BANCO_SESSAO], $campos);

} else if($operacao == 'visualizar') {

    $html = '';
    $html .= grid($bc->consultarQuantitativoPorData($_SESSION[BANCO_SESSAO], implode("-",array_reverse(explode("/", $_POST['data']))), "1"), 'SERPRO');
    $html .= grid($bc->consultarQuantitativoPorData($_SESSION[BANCO_SESSAO], implode("-",array_reverse(explode("/", $_POST['data']))), "2"), 'TERCEIRIZADO');
    $html .= grid($bc->consultarQuantitativoPorData($_SESSION[BANCO_SESSAO], implode("-",array_reverse(explode("/", $_POST['data']))), "3"), 'ESTAGIÁRIO');

    echo($html);

} else {
    $smart->assign('usuario',$_SESSION[Constantes::ID_USUARIO]);
    $data = preg_split('"/"', date("d/m/Y"), -1);
    $smart->assign('diaRelatorio', $data[0]."/".$data[1]."/".$data[2][2].$data[2][3]);
    $smart->display('proc_medicos.tpl');
}

