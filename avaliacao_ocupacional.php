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

    //exame clínico
    $campos['pele_mucosas'] = $_POST['pele_mucosas'];
    $campos['cabeca'] = $_POST['cabeca'];
    $campos['pescoco'] = $_POST['pescoco'];
    $campos['torax'] = $_POST['torax'];
    $campos['abdome'] = $_POST['abdome'];
    $campos['membros_sup_inf'] = $_POST['membros_sup_inf'];
    $campos['sist_nervoso_exam_cli'] = $_POST['sist_nervoso_exam_cli'];
    $campos['coluna'] = $_POST['coluna'];
    $campos['gunitario_cli'] = $_POST['gunitario_cli'];
    $campos['psiquismo'] = $_POST['psiquismo'];

    //exame clínico
    $campos['hemograma'] = $_POST['hemograma'];
    $campos['creatinina'] = $_POST['creatinina'];
    $campos['glicemia'] = $_POST['glicemia'];
    $campos['colesterol_total'] = $_POST['colesterol_total'];
    $campos['hdl'] = $_POST['hdl'];
    $campos['ldl'] = $_POST['ldl'];
    $campos['vldl'] = $_POST['vldl'];
    $campos['triglicerideos'] = $_POST['triglicerideos'];
    $campos['psa'] = $_POST['psa'];
    $campos['eas'] = $_POST['eas'];
    $campos['oftalmico'] = $_POST['oftalmico'];
    $campos['outro_exa_comp'] = $_POST['outro_exa_comp'];

    //Diagnostico
    $campos['cid1'] = $_POST['cid1'];
    $campos['cid2'] = $_POST['cid2'];
    $campos['cid3'] = $_POST['cid3'];
    $campos['cid4'] = $_POST['cid4'];
    $campos['cid5'] = $_POST['cid5'];
    $campos['cid6'] = $_POST['cid6'];
    $campos['proximo_periodico'] = $_POST['proximo_periodico'];

    //outros
    $campos['queixas'] = $_POST['queixas'];
    $campos['obs'] = $_POST['obs'];

    $campos['doutor'] = $_POST['doutor'];


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