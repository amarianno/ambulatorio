<?php

require_once('include/classes/Loader.class.php');
require_once('include/retornasmarty.inc.php');
require_once ('include/confconexao.inc.php');
require_once ('include/retornaconexao.inc.php');

/*ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL); */

$operacao = isset($_POST['operacao']) ? $_POST['operacao'] : '';
$smart = retornaSmarty();

if($operacao == 'cadastrar') {

    if(isset($_POST['txtSenha']) && $_POST['txtSenha'] != '') {
        $campos = array();
        $campos['senha'] = md5( $_POST['txtSenha'] );

        $cpf = str_replace(".", "", $_POST['txtCpf']);
        $cpf = str_replace("-", "", $cpf);

        $usuarioBC = new UsuarioBC();

        $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("cpf" => $cpf));
        $usuarioBC->alterar($_SESSION[BANCO_SESSAO], $campos, $filtro);

        $smart->assign('message', 'Cadastrado com sucesso');

    } else {

        $smart->assign('message', 'Senha não pode ser vazia');

    }

    $smart->assign('txtCpf', Util::mask($_SESSION[Constantes::CPF_USUARIO], '###.###.###-##'));
    $smart->assign('txtSenha', '');
    $smart->display('senha.tpl');


} else {
    $smart->assign('txtCpf', Util::mask($_SESSION[Constantes::CPF_USUARIO], '###.###.###-##'));
    $smart->assign('txtSenha', '');
    $smart->display('senha.tpl');
}
