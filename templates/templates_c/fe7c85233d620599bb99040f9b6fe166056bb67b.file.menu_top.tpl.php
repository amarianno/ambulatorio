<?php /* Smarty version Smarty-3.1.13, created on 2014-02-07 22:47:22
         compiled from "templates/menu_top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:247225102513e393fbc0d59-06006437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe7c85233d620599bb99040f9b6fe166056bb67b' => 
    array (
      0 => 'templates/menu_top.tpl',
      1 => 1391820425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '247225102513e393fbc0d59-06006437',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_513e393fc0d733_25231271',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_513e393fc0d733_25231271')) {function content_513e393fc0d733_25231271($_smarty_tpl) {?><!-- MENU -->
<div id="menu">
    <!-- menu-holder -->
    <div id="menu-holder">
        <!-- wrapper-menu -->
        <div class="wrapper">
            <!-- Navigation -->
            <ul id="nav" class="sf-menu">
                <li>
                    <a href="#">CADASTROS <img src="include/img/icon/arrowdown-icon.png"/></a>
                    <ul>
                        <li>
                            <a href="atestados.php"><span>Atestado</span></a>
                        </li>
                        <li>
                            <a href="empregadoCAD.php"><span>Empregado</span></a>
                        </li>
                        <li>
                            <a href="cid.php"><span>CID</span></a>
                        </li>
                        <li>
                            <a href="procedimento.php"><span>Procedimento e Exames</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">CONSULTAS <img src="include/img/icon/arrowdown-icon.png"/></a>
                    <ul>
                        <li>
                            <a href="consulta_matricula.php"><span>Atestados do Funcionário pela Matrícula</span></a>
                        </li>
                        <li>
                            <a href="cid_por_matricula.php"><span>CID Por Matrícula</span></a>
                        </li>
                        <li>
                            <a href="empregadoCAD.php?op=listar"><span>Matrícula Por Nome</span></a>
                        </li>
                        <li>
                            <a href="consulta_inss.php"><span>Licença INSS</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">RELATÓRIOS <img src="include/img/icon/arrowdown-icon.png"/></a>
                    <ul>
                        <li>
                            <a href="relatorio_cid_mensal.php"><span>CID Por Período</span></a>
                        </li>
                        <li>
                            <a href="relatorio_dia_atestados.php"><span>Atestados cadastrados por data</span></a>
                        </li>
                        <li>
                            <a href="relatorio_atest_homol_periodo.php"><span>Atestados Homologados por Período</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">GUIA <img src="include/img/icon/arrowdown-icon.png"/></a>
                    <ul>
                        <li>
                            <a href="guias_cassi.php"><span>Cassi</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">EMP <img src="include/img/icon/arrowdown-icon.png"/></a>
                    <ul>
                        <li>
                            <a href="planejamento_periodicos.php"><span>Planejamento</span></a>
                        </li>
                        <li>
                            <a href="periodico_por_mes.php"><span>Por Mês</span></a>
                        </li>
                        <li>
                            <a href="periodico_atraso.php"><span>Em atraso</span></a>
                        </li>
                        <li>
                            <a href="doenca_encaminhamento.php"><span>Doença/Encaminhamento</span></a>
                        </li>
                        <li>
                            <a href="avaliacao_ocupacional.php"><span>Avaliação Ocupacional</span></a>
                        </li>
                        <li>
                            <a href="#"><span>Relatório Anual</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- MAIN -->
<div id="main">
<!-- wrapper-main -->
<div class="wrapper">

<br>
<!-- content -->
<div id="content"><?php }} ?>