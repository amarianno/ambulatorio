<?php

require_once ('Loader.class.php');

class PeriodicoUtil {

    /**
     * @param $listaPeriodicos
     * @param $mes
     * @return string
     */
    public static function GRID_Periodico($listaPeriodicos, $mes) {

        $cor = false;
        $htmlRetorno = "";

        if(count($listaPeriodicos) > 0) {
            $htmlRetorno .= count($listaPeriodicos)." EMPs para o Mês de <b>". Util::mesPorExtenso($mes) ."</b><br>";
        }
        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th></th>";
        $htmlRetorno .= "       <th>Nome</th>";
        $htmlRetorno .= "       <th>Matrícula</th>";
        $htmlRetorno .= "       <th>Lotação</th>";
        $htmlRetorno .= "       <th>Idade</th>";
        $htmlRetorno .= "       <th>Último Periódico</th>";
        $htmlRetorno .= "       <th>Data Inicio</th>";
        $htmlRetorno .= "       <th>Data Fim</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";

        if(count($listaPeriodicos) > 0) {
            foreach ($listaPeriodicos as $periodico) {

                $anoNascimento = preg_split('"-"', $periodico->empregado->dataNascimento, -1);

                $classe = ($cor = !$cor) ? 'normal' : 'alt';
                $htmlRetorno .= "<tr class='" . $classe . "'>";
                $htmlRetorno .= "   <td>" . "<input type='checkbox' class='chkPeriodico' value='".$periodico->empregado->matricula."'>" . "</td>";
                $htmlRetorno .= "   <td>" . $periodico->empregado->nome . "</td>";
                $htmlRetorno .= "   <td>" . $periodico->empregado->matricula . "</td>";
                $htmlRetorno .= "   <td nowrap>" . $periodico->empregado->lotacao ."</td>";
                $htmlRetorno .= "   <td nowrap>" . (date('Y') - $anoNascimento[0]) . " anos</td>";
                $htmlRetorno .= "   <td>" . Util::dataMysqlToTela($periodico->dataUltimo) . "</td>";
                $htmlRetorno .= "   <td>" . Util::dataMysqlToTela($periodico->dataInicio) . "</td>";
                $htmlRetorno .= "   <td>" . Util::dataMysqlToTela($periodico->dataFim) . "</td>";
                $htmlRetorno .= '</tr>';
            }
        } else {
            $htmlRetorno .= "   <tr class='conteudo'>";
            $htmlRetorno .= "       <td class='semCartas' colspan='5'>Nenhum EMP Cadastrado</td>";
            $htmlRetorno .= "   </tr>";
        }

        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";
        $htmlRetorno .= "<table>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th><input type='button' value='Iniciar' class='button black' onclick='marcarPeriodico(1)'></th>";
        $htmlRetorno .= "       <th><input type='button' value='Finalizar' class='button black' onclick='marcarPeriodico(2)'></th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "</table>";

        return $htmlRetorno;
    }

    /**
     * @param $listaPeriodicos
     * @param $mes
     * @return string
     */
    public static function GRID_Planejamento($listaPeriodicos, $mes) {

        $cor = false;
        $htmlRetorno = "";

        if(count($listaPeriodicos) > 0) {
            $htmlRetorno .= count($listaPeriodicos)." empregados planejados para o mês de <b>". Util::mesPorExtenso($mes) ."</b><br>";
        }
        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th></th>";
        $htmlRetorno .= "       <th>Matrícula</th>";
        $htmlRetorno .= "       <th>Nome</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";

        if(count($listaPeriodicos) > 0) {
            foreach ($listaPeriodicos as $periodico) {

                $classe = ($cor = !$cor) ? 'normal' : 'alt';
                $htmlRetorno .= "<tr class='" . $classe . "'>";
                $htmlRetorno .= "   <td>" . "<input type='checkbox' class='chkEmpregado' value='".$periodico->empregado->matricula."'>" . "</td>";
                $htmlRetorno .= "   <td>" . $periodico->empregado->matricula . "</td>";
                $htmlRetorno .= "   <td>" . $periodico->empregado->nome . "</td>";
                $htmlRetorno .= '</tr>';
            }
        } else {
            $htmlRetorno .= "   <tr class='conteudo'>";
            $htmlRetorno .= "       <td class='semCartas' colspan='5'>Nenhum Empregado planejado para o Mês</td>";
            $htmlRetorno .= "   </tr>";
        }

        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";
        $htmlRetorno .= "<table>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th>";
        $htmlRetorno .= "       Mudar para: ";
        $htmlRetorno .= "            <select id='selMesPlanejamento' name='selMesPlanejamento' tabindex='1'>";
        $htmlRetorno .= "               <option value='01'>";
        $htmlRetorno .= "                   JANEIRO";
        $htmlRetorno .= "               </option>";
        $htmlRetorno .= "               <option value='02'>";
        $htmlRetorno .= "                   FEVEREIRO";
        $htmlRetorno .= "               </option>";
        $htmlRetorno .= "               <option value='03'>";
        $htmlRetorno .= "                   MARÇO";
        $htmlRetorno .= "               </option>";
        $htmlRetorno .= "               <option value='04'>";
        $htmlRetorno .= "                   ABRIL";
        $htmlRetorno .= "               </option>";
        $htmlRetorno .= "               <option value='05'>";
        $htmlRetorno .= "                   MAIO";
        $htmlRetorno .= "               </option>";
        $htmlRetorno .= "               <option value='06'>";
        $htmlRetorno .= "                   JUNHO";
        $htmlRetorno .= "               </option>";
        $htmlRetorno .= "               <option value='07'>";
        $htmlRetorno .= "                   JULHO";
        $htmlRetorno .= "               </option>";
        $htmlRetorno .= "               <option value='08'>";
        $htmlRetorno .= "                   AGOSTO";
        $htmlRetorno .= "               </option>";
        $htmlRetorno .= "               <option value='09'>";
        $htmlRetorno .= "                   SETEMBRO";
        $htmlRetorno .= "               </option>";
        $htmlRetorno .= "               <option value='10'>";
        $htmlRetorno .= "                   OUTUBRO";
        $htmlRetorno .= "               </option>";
        $htmlRetorno .= "               <option value='11'>";
        $htmlRetorno .= "                   NOVEMBRO";
        $htmlRetorno .= "               </option>";
        $htmlRetorno .= "               <option value='12'>";
        $htmlRetorno .= "                   DEZEMBRO";
        $htmlRetorno .= "               </option>";
        $htmlRetorno .= "            </select>";
        $htmlRetorno .= "           <input type='button' value='Mudar' class='button black' onclick='planejarPeriodico()'>";
        $htmlRetorno .= "       <th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "</table>";

        return $htmlRetorno;
    }

    /**
     * @param $listaPeriodicos
     * @param $mes
     * @return string
     */
    public static function GRID_Atrasos($listaPeriodicos, $mes) {

        $cor = false;
        $htmlRetorno = "";

        if(count($listaPeriodicos) > 0) {
            $htmlRetorno .= count($listaPeriodicos)." empregados em atraso para o mês de <b>". Util::mesPorExtenso($mes) ."</b><br>";
        }
        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th></th>";
        $htmlRetorno .= "       <th>Matrícula</th>";
        $htmlRetorno .= "       <th>Nome</th>";
        $htmlRetorno .= "       <th>Data Início</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";

        if(count($listaPeriodicos) > 0) {
            foreach ($listaPeriodicos as $periodico) {

                $classe = ($cor = !$cor) ? 'normal' : 'alt';
                $htmlRetorno .= "<tr class='" . $classe . "'>";
                $htmlRetorno .= "   <td>" . "<input type='checkbox' class='chkEmpregado' value='".$periodico->empregado->matricula."'>" . "</td>";
                $htmlRetorno .= "   <td>" . $periodico->empregado->matricula . "</td>";
                $htmlRetorno .= "   <td>" . $periodico->empregado->nome . "</td>";
                $htmlRetorno .= "   <td>" . Util::dataMysqlToTela($periodico->dataInicio) . "</td>";
                $htmlRetorno .= '</tr>';
            }
        } else {
            $htmlRetorno .= "   <tr class='conteudo'>";
            $htmlRetorno .= "       <td class='semCartas' colspan='5'>Nenhum Empregado em atraso para ".Util::mesPorExtenso($mes)."</td>";
            $htmlRetorno .= "   </tr>";
        }

        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";

        return $htmlRetorno;
    }


}


