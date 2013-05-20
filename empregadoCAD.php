<?php

require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();
$operacao = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];

function retornaEmpresa($cod) {
    if($cod == '2') {
        return "LUZ";
    } else if($cod == '3') {
        return "NOVA REDENÇÃO";
    } else {
        return "SOCORRO";
    }
}

function grid($listaEmpregados) {
    $cor = false;
    $htmlRetorno = "";

    $htmlRetorno .= "<div class='datagrid'>";
    $htmlRetorno .= "<table id='mainDeck'>";
    $htmlRetorno .= "<thead>";
    $htmlRetorno .= "   <tr>";
    $htmlRetorno .= "       <th>Nome</th>";
    $htmlRetorno .= "       <th>Matrícula</th>";
    $htmlRetorno .= "       <th>Lotação</th>";
    $htmlRetorno .= "       <th>Empresa</th>";
    $htmlRetorno .= "   </tr>";
    $htmlRetorno .= "</thead>";
    $htmlRetorno .= "<tbody>";

    if(count($listaEmpregados) > 0) {
        foreach ($listaEmpregados as $emp) {

            $classe = ($cor = !$cor) ? 'normal' : 'alt';
            $htmlRetorno .= "<tr class='" . $classe . "'>";
            $htmlRetorno .= "   <td class='tipo'>" . $emp->nome . "</td>";
            $htmlRetorno .= "   <td class='tipo'>" . $emp->matricula . "</td>";
            $htmlRetorno .= "   <td class='tipo'>" . $emp->lotacao . "</td>";
            $htmlRetorno .= "   <td class='tipo'>" . retornaEmpresa($emp->localidade) . "</td>";
            $htmlRetorno .= '</tr>';


        }
    } else {
        $htmlRetorno .= "   <tr class='conteudo'>";
        $htmlRetorno .= "       <td class='semCartas' colspan='5'>Nenhum Funcionário para o filtro</td>";
        $htmlRetorno .= "   </tr>";
    }

    $htmlRetorno .= "</tbody>";
    $htmlRetorno .= "</table>";
    $htmlRetorno .= "</div>";

    return $htmlRetorno;
}

if($operacao == 'existe') {

    $empregadoBC = new EmpregadoBC();
    $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $_POST['matricula']));
    $empregadoDTO = $empregadoBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);

    if(count($empregadoDTO) > 0) {
        echo(json_encode($empregadoDTO[0]));
    } else {
        echo(json_encode(new Empregado()));
    }

} else if($operacao == 'gravar') {

    $empregadoBC = new EmpregadoBC();

    $campos = array();
    $campos['matricula'] = $_POST['txtMatricula'];
    $campos['nome'] = strtr(strtoupper($_POST['txtNome']),"àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ","ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
    $campos['lotacao'] = $_POST['txtLotacao'];
    $campos['empresa'] = $_POST['selLocalidade'];

    $cadastraOuAlterar = $_POST['cadastraOuAlterar'];
    if($cadastraOuAlterar == 'cad') {
        $empregadoBC->incluir($_SESSION[BANCO_SESSAO], $campos);

        echo "Incluido";
    } else {
        $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $_POST['txtMatricula']));
        $empregadoBC->alterar($_SESSION[BANCO_SESSAO], $campos, $filtro);

        echo "Alterado";
    }


} else if($operacao == 'buscar') {

    $empregadoBC = new EmpregadoBC();

    $campos = array();
    $campos['nome'] = strtr(strtoupper($_POST['txtNomePes']),"àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ","ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");

    $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_CONTEM, array("nome" => '%'. $campos['nome'] . '%'));
    $listaEmpregados = $empregadoBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);
    $htmlRetorno = "";

    if(count($listaEmpregados) > 0) {
        $htmlRetorno .= count($listaEmpregados)." funcionários encontrados para a busca <b>" .$campos['nome'].'<b>' ;
    }

    $htmlRetorno .= grid($listaEmpregados);

    echo $htmlRetorno;

} else if($operacao == 'listar') {
    $smart->assign("tela", "list");
    $smart->display("empregado.tpl");

} else if($operacao == 'apagar') {

    $atestadoBC = new AtestadoBC();
    $empregadoBC = new EmpregadoBC();

    $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $_POST['txtMatricula']));
    $atestadoBC->excluir($_SESSION[BANCO_SESSAO], $filtro);
    $empregadoBC->excluir($_SESSION[BANCO_SESSAO], $filtro);

    echo "Excluido com sucesso";

} else {
    $smart->assign("tela", "cad");
    $smart->display("empregado.tpl");
}



