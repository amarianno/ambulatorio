<?php


class RelatorioEMPExamComp {

    private function hemograma($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->hemograma == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function creatinina($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->creatinina == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function colesterolTotal($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->colesterolTotal == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function glicemia($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->glicemia == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function trigliceris($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->triglicerideos == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function psa($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->psa == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function eas($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->eas == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function oftalmico($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->exameOftalmico == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    public function grid($lista) {
        $htmlRetorno = "";

        $total = count($lista);

        $htmlRetorno .= "<strong>ITEM 6 - EXAMES COMPLEMENTARES</strong><br>";
        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th></th>";
        $htmlRetorno .= "       <th>Normal</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Anemia</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Leucocitose</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Leucopenia</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Outros</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";
        $htmlRetorno .= "<tr class='normal'>";
        $htmlRetorno .= "   <td>Hemograma</td>";
        $htmlRetorno .= "   <td>" . $this->hemograma($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->hemograma($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->hemograma($lista, '2') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->hemograma($lista, '2') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->hemograma($lista, '3') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->hemograma($lista, '3') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->hemograma($lista, '4') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->hemograma($lista, '4') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->hemograma($lista, '5') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->hemograma($lista, '5') * 100) / $total), 2, '.', '') . "</td>";
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
        $htmlRetorno .= "       <th>Normal</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Elevado</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Diminuido</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";
        $htmlRetorno .= "<tr class='alt'>";
        $htmlRetorno .= "   <td>Creatinina</td>";
        $htmlRetorno .= "   <td>" . $this->creatinina($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->creatinina($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->creatinina($lista, '2') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->creatinina($lista, '2') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->creatinina($lista, '3') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->creatinina($lista, '3') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= "<tr class='normal'>";
        $htmlRetorno .= "   <td>Glicemia</td>";
        $htmlRetorno .= "   <td>" . $this->glicemia($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->glicemia($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->glicemia($lista, '2') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->glicemia($lista, '2') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->glicemia($lista, '3') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->glicemia($lista, '3') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= "<tr class='alt'>";
        $htmlRetorno .= "   <td>Colesterol</td>";
        $htmlRetorno .= "   <td>" . $this->colesterolTotal($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->colesterolTotal($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->colesterolTotal($lista, '2') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->colesterolTotal($lista, '2') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->colesterolTotal($lista, '3') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->colesterolTotal($lista, '3') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= "<tr class='normal'>";
        $htmlRetorno .= "   <td>Triglicéris</td>";
        $htmlRetorno .= "   <td>" . $this->trigliceris($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->trigliceris($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->trigliceris($lista, '2') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->trigliceris($lista, '2') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->trigliceris($lista, '3') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->trigliceris($lista, '3') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= "<tr class='alt'>";
        $htmlRetorno .= "   <td>PSA</td>";
        $htmlRetorno .= "   <td>" . $this->psa($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->psa($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->psa($lista, '2') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->psa($lista, '2') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->psa($lista, '3') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->psa($lista, '3') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";

        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th></th>";
        $htmlRetorno .= "       <th>Normal</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Hematúria</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Piúria</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Proteinúria</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Outros</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";
        $htmlRetorno .= "<tr class='normal'>";
        $htmlRetorno .= "   <td>EAS</td>";
        $htmlRetorno .= "   <td>" . $this->eas($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->eas($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->eas($lista, '2') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->eas($lista, '2') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->eas($lista, '3') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->eas($lista, '3') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->eas($lista, '4') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->eas($lista, '4') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->eas($lista, '5') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->eas($lista, '5') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";

        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th></th>";
        $htmlRetorno .= "       <th>Normal</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "       <th>Alterado</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";
        $htmlRetorno .= "<tr class='normal'>";
        $htmlRetorno .= "   <td>Oftalmologico</td>";
        $htmlRetorno .= "   <td>" . $this->oftalmico($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->oftalmico($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->oftalmico($lista, '2') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->oftalmico($lista, '2') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';
        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";

        return $htmlRetorno;
    }


}
