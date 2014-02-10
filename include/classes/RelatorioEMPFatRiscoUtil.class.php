<?php



class RelatorioEMPFatRiscoUtil {

    private function total($lista) {
        return count($lista);
    }

    private function tabaco($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->tabaco == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function alcool($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->alcool == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function atividadeFisica($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->atividadeFisica == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function drogas($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->drogas == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function hipertensaoArterial($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->hipertensaoArterial == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function pesoIdeal($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->pesoIdeal == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    public function grid($lista) {
        $htmlRetorno = "";

        $total = $this->total($lista);

        $htmlRetorno .= "<strong>ITEM 3 - FATORES DE RISCO PARA A SAÚDE</strong><br>";
        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th></th>";
        $htmlRetorno .= "       <th>NÃO</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Até 10/Dia</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>11 a 20/dia</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>+de 20/dia</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";
        $htmlRetorno .= "<tr class='normal'>";
        $htmlRetorno .= "   <td>Cigarro</td>";
        $htmlRetorno .= "   <td>" . $this->tabaco($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->tabaco($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->tabaco($lista, '2') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->tabaco($lista, '2') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->tabaco($lista, '3') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->tabaco($lista, '3') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->tabaco($lista, '4') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->tabaco($lista, '4') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";

        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th></th>";
        $htmlRetorno .= "       <th>NÃO</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Até 1x/Semana</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Até 2x/Semana</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>+ de 2x/Semana</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";
        $htmlRetorno .= "<tr class='alt'>";
        $htmlRetorno .= "   <td>Álcool</td>";
        $htmlRetorno .= "   <td>" . $this->alcool($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->alcool($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->alcool($lista, '2') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->alcool($lista, '2') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->alcool($lista, '3') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->alcool($lista, '3') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->alcool($lista, '4') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->alcool($lista, '4') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";

        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th></th>";
        $htmlRetorno .= "       <th>SIM</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>NÃO</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";
        $htmlRetorno .= "<tr class='normal'>";
        $htmlRetorno .= "   <td>Atividade Física</td>";
        $htmlRetorno .= "   <td>" . $this->atividadeFisica($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->atividadeFisica($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->atividadeFisica($lista, '0') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->atividadeFisica($lista, '0') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= "<tr class='alt'>";
        $htmlRetorno .= "   <td>Drogas</td>";
        $htmlRetorno .= "   <td>" . $this->drogas($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->drogas($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->drogas($lista, '0') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->drogas($lista, '0') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= "<tr class='normal'>";
        $htmlRetorno .= "   <td>Hipertensão Arterial</td>";
        $htmlRetorno .= "   <td>" . $this->hipertensaoArterial($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->hipertensaoArterial($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->hipertensaoArterial($lista, '0') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->hipertensaoArterial($lista, '0') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";

        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th></th>";
        $htmlRetorno .= "       <th>Muito abaixo do peso</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Abaixo do peso</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Peso normal</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Sobrepeso</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Obesidade I</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Obesidade II</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Obesidade III</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";
        $htmlRetorno .= "<tr class='alt'>";
        $htmlRetorno .= "   <td>Peso</td>";
        $htmlRetorno .= "   <td>" . $this->pesoIdeal($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->pesoIdeal($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->pesoIdeal($lista, '2') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->pesoIdeal($lista, '2') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->pesoIdeal($lista, '3') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->pesoIdeal($lista, '3') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->pesoIdeal($lista, '4') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->pesoIdeal($lista, '4') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->pesoIdeal($lista, '5') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->pesoIdeal($lista, '5') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->pesoIdeal($lista, '6') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->pesoIdeal($lista, '6') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->pesoIdeal($lista, '7') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->pesoIdeal($lista, '7') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";

        return $htmlRetorno;
    }

}
