<?php


class RelatorioEMPDiagnosticos {

    public function gridDoencas($lista, $total) {
        $htmlRetorno = "";

        $htmlRetorno .= "<strong>ITEM 7  - DIAGNÓSTICOS</strong><br>";
        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th></th>";
        $htmlRetorno .= "       <th>Quantidade</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";

        foreach($lista as $roteiro) {
            $htmlRetorno .= "<tr class='normal'>";
            $htmlRetorno .= "   <td>". $roteiro->doenca->descricao ."</td>";
            $htmlRetorno .= "   <td>" .$roteiro->quantidade . "</td>";
            $htmlRetorno .= "   <td>" . number_format((($roteiro->quantidade * 100) / $total), 2, '.', '') . "</td>";
            $htmlRetorno .= '</tr>';
        }

        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";


        return $htmlRetorno;
    }

    public function gridEncaminhamento($lista, $total) {
        $htmlRetorno = "";

        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th></th>";
        $htmlRetorno .= "       <th>Quantidade</th>";
        $htmlRetorno .= "       <th>%</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";

        foreach($lista as $roteiro) {
            $htmlRetorno .= "<tr class='normal'>";
            $htmlRetorno .= "   <td>". $roteiro->encaminhamento->descricao ."</td>";
            $htmlRetorno .= "   <td>" .$roteiro->quantidade . "</td>";
            $htmlRetorno .= "   <td>" . number_format((($roteiro->quantidade * 100) / $total), 2, '.', '') . "</td>";
            $htmlRetorno .= '</tr>';
        }

        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";


        return $htmlRetorno;
    }


}
