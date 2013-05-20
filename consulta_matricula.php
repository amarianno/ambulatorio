<?php

    require_once('include/classes/Loader.class.php');
    require_once('include/retornasmarty.inc.php');
    require_once ('include/confconexao.inc.php');
    require_once ('include/retornaconexao.inc.php');

/**
 * @param $data
 * @return bool
 */
function isDesseAno($data) {
        $novaData = preg_split('"-"', $data, -1);
        $ano = date("Y");
        return ($ano == $novaData[0]) ? true : false;
    }

/**
 * @param $listaAcompanhamentoFamiliar
 * @return int
 */
function somaAcompanhamentoFamiliarPorAno($listaAcompanhamentoFamiliar) {

        $qtdeDias = 0;

        if(count($listaAcompanhamentoFamiliar) > 0) {
            foreach ($listaAcompanhamentoFamiliar as $atestado) {
                if(isDesseAno($atestado->dataInicialAfastamento)) {
                    $qtdeDias += $atestado->diasAfastado;
                }
            }
        }

        return $qtdeDias;
    }

    if(!isset($_POST['consultar'])) {
        $smarty = retornaSmarty();
        $smarty->display("consulta_matricula.tpl");
    } else {
        $atestadoBC = new AtestadoBC();
        $matricula = $_POST['txtMatricula'];
        $resultadoConsulta = '';

        //HOMOLOGADOS
        $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $matricula, "homologado_medico" => '1'));
        $listaAtestados = $atestadoBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);
        $resultadoConsulta .= "<fieldset>";
        $resultadoConsulta .= "<legend><b>ATESTADOS HOMOLOGADOS<img id='addSubHomologados' src='include/img/icon/remove.png' onclick='toogle(2);' /></b></legend><br>";

        $resultadoConsulta .= "<div id='gridHomologados' style='display: block;'>";
        $resultadoConsulta .= OperacaoGrid::montaGridAtestado($listaAtestados, false);
        $resultadoConsulta .= "</div>";
        $resultadoConsulta .= "</fieldset>";

        //ACOMPANHAMENTO FAMILIAR
        $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $matricula, "acompanhamento_familiar" => '1'));
        $listaAtestados = $atestadoBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);
        $resultadoConsulta .= "<fieldset>";
        $resultadoConsulta .= "<legend><b>ATESTADOS DE ACOMPANHAMENTO FAMILIAR<img id='addSubAcompanhamentoFamiliar' src='include/img/icon/remove.png' onclick='toogle(1);' /></b></legend><br>";

        $resultadoConsulta .= "<div id='gridAcompanhamentoFamiliar' style='display: block;'>";
        $resultadoConsulta .= OperacaoGrid::montaGridAtestado($listaAtestados, false);
        $resultadoConsulta .= "</div>";
        $resultadoConsulta .= "<b>".somaAcompanhamentoFamiliarPorAno($listaAtestados)." dias de afastamento no ano de ".date("Y")."</b><br>";
        $resultadoConsulta .= "</fieldset>";

        //CONCEDIDOS
        $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $matricula, "concedido" => '1'));
        $listaAtestados = $atestadoBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);
        $resultadoConsulta .= "<fieldset>";
        $resultadoConsulta .= "<legend><b>ATESTADOS CONCEDIDOS<img id='addSubConcedidos' src='include/img/icon/remove.png' onclick='toogle(3);' /></b></legend><br>";

        $resultadoConsulta .= "<div id='gridConcedidos' style='display: block;'>";
        $resultadoConsulta .= OperacaoGrid::montaGridAtestado($listaAtestados, false);
        $resultadoConsulta .= "</div>";
        $resultadoConsulta .= "</fieldset>";

        //LICENÇA MATERNIDADE
        $filtro = new FiltroSQL(FiltroSQL::CONECTOR_E, FiltroSQL::OPERADOR_IGUAL, array("matricula" => $matricula, "licenca_maternidade" => '1'));
        $listaAtestados = $atestadoBC->consultar($_SESSION[BANCO_SESSAO], null, $filtro);
        $resultadoConsulta .= "<fieldset>";
        $resultadoConsulta .= "<legend><b>ATESTADOS COM LICENÇA MATERNIDADE<img id='addSubLicMaternidade' src='include/img/icon/remove.png' onclick='toogle(4);' /></b></legend><br>";

        $resultadoConsulta .= "<div id='gridLicMaternidade' style='display: block;'>";
        $resultadoConsulta .= OperacaoGrid::montaGridAtestado($listaAtestados, false);
        $resultadoConsulta .= "</div>";
        $resultadoConsulta .= "</fieldset>";

        echo($resultadoConsulta);
    }









