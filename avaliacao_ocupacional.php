<?php


require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

$smart = retornaSmarty();
$operacao = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];
$bc = new PeriodicoBC();

if($operacao == 'incluir') {

    $campos = array();
    //avaliacao ocupacional
    $campos['ativ_desenvolvida'] = $_POST['ativ_desenvolvida'];
    $campos['volume_trabalho'] = $_POST['volume_trabalho'];
    $campos['relacao_chefia'] = $_POST['relacao_chefia'];
    $campos['relacao_colegas'] = $_POST['relacao_colegas'];
    $campos['dores'] = $_POST['dores'];
    $campos['fadiga_visual'] = $_POST['fadiga_visual'];
    $campos['tensao_emocional'] = $_POST['tensao_emocional'];
    $campos['outros'] = $_POST['outros'];

    //historia patologica pregressa
    $campos['infecto_contag'] = $_POST['infecto_contag'];
    $campos['endocrinas'] = $_POST['endocrinas'];
    $campos['sangue_hemat'] = $_POST['sangue_hemat'];
    $campos['pele'] = $_POST['pele'];
    $campos['respiratorio'] = $_POST['respiratorio'];
    $campos['circulatorio'] = $_POST['circulatorio'];
    $campos['digestivo'] = $_POST['digestivo'];
    $campos['genito_urinario'] = $_POST['genito_urinario'];
    $campos['musculo'] = $_POST['musculo'];
    $campos['sist_nervoso'] = $_POST['sist_nervoso'];
    $campos['emocionais'] = $_POST['emocionais'];
    $campos['outras'] = $_POST['outras'];
    $campos['afast_doenca'] = $_POST['afast_doenca'];
    $campos['deficiencia'] = $_POST['deficiencia'];

    //fatores de risco
    $campos['tabaco'] = $_POST['tabaco'];
    $campos['alcool'] = $_POST['alcool'];
    $campos['ativ_fisica'] = $_POST['ativ_fisica'];
    $campos['drogas'] = $_POST['drogas'];
    $campos['hipert_arterial'] = $_POST['hipert_arterial'];
    $campos['pa'] = $_POST['pa'];
    $campos['fc'] = $_POST['fc'];
    $campos['peso_ideal'] = $_POST['peso_ideal'];
    $campos['peso'] = $_POST['peso'];
    $campos['altura'] = $_POST['altura'];
    $campos['imc'] = $_POST['imc'];


    $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("codigo" => $_POST['hidCodigo']));
    $bc->alterar($_SESSION[BANCO_SESSAO], $campos, $filtro);

} else if($operacao == 'visualizar') {

    $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $_POST['txtMatricula']));
    $lista = $bc->consultar($_SESSION[BANCO_SESSAO], null, $filtro);

    for($i = 0; $i < count($lista);  $i++) {
        $ano = preg_split('"-"', $lista[$i]->dataPrevisao, -1);
        if($ano[0] == date('Y')) {
            echo(json_encode($lista[$i]));
        }
    }

} else {
    $smart->display('avaliacao_ocupacional.tpl');
}