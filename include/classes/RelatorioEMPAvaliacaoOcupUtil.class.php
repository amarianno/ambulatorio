<?php




class RelatorioEMPAvaliacaoOcupUtil {


    private function total($lista) {
        return count($lista);
    }

    private function atividadeDesenvolvida($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
               if($periodico->atividadeDesenvolvida == $simNao) {
                   $cont++;
               }
        }

        return $cont;
    }

    private function volumeTrabalho($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->volumeTrabalho == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function relacaoChefia($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->relacaoChefia == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function relacaoColegas($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->relacaoColegas == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function dores($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->dores == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function fadigaVisual($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->fadigaVisual == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function tensaoEmocional($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->tensaoEmocional == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    private function outros($lista, $simNao) {
        $cont = 0;
        foreach($lista as $periodico) {
            if($periodico->outros == $simNao) {
                $cont++;
            }
        }

        return $cont;
    }

    public function grid($lista) {
        $htmlRetorno = "";

        $total = $this->total($lista);

        $htmlRetorno .= "<strong>Avaliação Ocupacional - Satisfação com o Trabalho</strong><br>";
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
        $htmlRetorno .= "   <td>Atividade desenvolvida</td>";
        $htmlRetorno .= "   <td>" . $this->atividadeDesenvolvida($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->atividadeDesenvolvida($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->atividadeDesenvolvida($lista, '0') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->atividadeDesenvolvida($lista, '0') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';

        $htmlRetorno .= "<tr class='alt'>";
        $htmlRetorno .= "   <td>Volume de trabalho</td>";
        $htmlRetorno .= "   <td>" . $this->volumeTrabalho($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->volumeTrabalho($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->volumeTrabalho($lista, '0') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->volumeTrabalho($lista, '0') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';

        $htmlRetorno .= "<tr class='normal'>";
        $htmlRetorno .= "   <td>Relacionamento Chefia</td>";
        $htmlRetorno .= "   <td>" . $this->relacaoChefia($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->relacaoChefia($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->relacaoChefia($lista, '0') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->relacaoChefia($lista, '0') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';

        $htmlRetorno .= "<tr class='alt'>";
        $htmlRetorno .= "   <td>Relação Colegas</td>";
        $htmlRetorno .= "   <td>" . $this->relacaoColegas($lista, '1') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->relacaoColegas($lista, '1') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= "   <td>" . $this->relacaoColegas($lista, '0') . "</td>";
        $htmlRetorno .= "   <td>" . number_format((($this->relacaoColegas($lista, '0') * 100) / $total), 2, '.', '') . "</td>";
        $htmlRetorno .= '</tr>';

        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";

        return $htmlRetorno;
    }


}
