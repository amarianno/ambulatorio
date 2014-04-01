{if $smarty.session.perfil_usuario == '1'}
    <!-- MENU -->
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
                            <li>
                                <a href="senha.php"><span>Senhas</span></a>
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
                                <a href="empregado_por_nome.php"><span>Matrícula Por Nome</span></a>
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
                                <a href="dados_emp.php"><span>Consolidação dos dados</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">ENFERMAGEM <img src="include/img/icon/arrowdown-icon.png"/></a>
                        <ul>
                            <li>
                                <a href="proc_medicos.php"><span>Procedimentos de Enfermagem</span></a>
                            </li>
                            <li>
                                <a href="proc_medicos_periodo.php"><span>Relatório Procedimentos Por Período</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
{/if}
{if $smarty.session.perfil_usuario == '2'}
    <!-- MENU -->
    <div id="menu">
        <!-- menu-holder -->
        <div id="menu-holder">
            <!-- wrapper-menu -->
            <div class="wrapper">
                <!-- Navigation -->
                <ul id="nav" class="sf-menu">
                    <li>
                        <a href="#">CONSULTAS <img src="include/img/icon/arrowdown-icon.png"/></a>
                        <ul>
                            <li>
                                <a href="empregado_por_nome.php"><span>Matrícula Por Nome</span></a>
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
                                <a href="dados_emp.php"><span>Consolidação dos dados</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
{/if}
{if $smarty.session.perfil_usuario == '3'}
    <!-- MENU -->
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
                                <a href="empregadoCAD.php"><span>Empregado</span></a>
                            </li>
                            <li>
                                <a href="cid.php"><span>CID</span></a>
                            </li>
                            <li>
                                <a href="procedimento.php"><span>Procedimento e Exames</span></a>
                            </li>
                            <li>
                                <a href="senha.php"><span>Senhas</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">CONSULTAS <img src="include/img/icon/arrowdown-icon.png"/></a>
                        <ul>
                            <li>
                                <a href="empregado_por_nome.php"><span>Matrícula Por Nome</span></a>
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
                                <a href="dados_emp.php"><span>Consolidação dos dados</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">ENFERMAGEM <img src="include/img/icon/arrowdown-icon.png"/></a>
                        <ul>
                            <li>
                                <a href="proc_medicos.php"><span>Procedimentos de Enfermagem</span></a>
                            </li>
                            <li>
                                <a href="proc_medicos_periodo.php"><span>Relatório Procedimentos Por Período</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
{/if}

Usuário:<strong> {$smarty.session.nome_usuario} </strong>
<!-- MAIN -->
<div id="main">
<!-- wrapper-main -->
<div class="wrapper">

<br>
<!-- content -->
<div id="content">