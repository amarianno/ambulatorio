<?php


class OperacaoGrid {

    public static function simNao($data) {
        if($data == '1') {
            return 'SIM';
        } else if($data == '0') {
            return 'NÃO';
        } else {
            return '';
        }
    }

    public static function formataData($data) {

        if($data == '') {
            return "";
        }

        $returnValue = preg_split('"-"', $data, -1);
        return $returnValue[2] . "/" . $returnValue[1] . "/" . $returnValue[0];
    }

    /**
     * Monta a GRID de atestados de todas as telas
     * @param $listaAtestados
     * @return string
     */
    public static function montaGridAtestado($listaAtestados, $comEdit = true, $comDataRecebimento = true) {

        $cor = false;
        $htmlRetorno = "";

        if(count($listaAtestados) > 0) {
            $htmlRetorno .= count($listaAtestados)." atestados cadastrados";
        }
        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";

        if($comEdit) {
            $htmlRetorno .= "       <th></th>";
            $htmlRetorno .= "       <th></th>";
        }

        $htmlRetorno .= "       <th>Matrícula</th>";
        $htmlRetorno .= "       <th>Dias Afastado</th>";
        $htmlRetorno .= "       <th>Data Inicial</th>";
        $htmlRetorno .= "       <th>Data Final</th>";

        if($comDataRecebimento) {
            $htmlRetorno .= "       <th>Data Recebimento</th>";
        }
        $htmlRetorno .= "       <th>CID</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";

        if(count($listaAtestados) > 0) {
            foreach ($listaAtestados as $atestados) {

                $classe = ($cor = !$cor) ? 'normal' : 'alt';
                $htmlRetorno .= "<tr class='" . $classe . "'>";

                if($comEdit) {
                    $htmlRetorno .= "   <td><a href='#' onclick='apagarAtestado(".$atestados->codigo.");return false;'>apagar</a></td>";
                    $htmlRetorno .= "   <td><a href='#' onclick='editarAtestado(".$atestados->codigo.");return false;'><img src='include/img/mono-icons/pencilplus32.png'></a></td>";
                }

                $htmlRetorno .= "   <td>" . $atestados->empregado->matricula . "</td>";
                $htmlRetorno .= "   <td>" . $atestados->diasAfastado . "</td>";
                $htmlRetorno .= "   <td>" . self::formataData($atestados->dataInicialAfastamento) . "</td>";
                $htmlRetorno .= "   <td>" . self::formataData($atestados->dataFinalAfastamento) . "</td>";
                if($comDataRecebimento) {
                    $htmlRetorno .= "   <td>" . self::formataData($atestados->dataRecebimento) . "</td>";
                }
                $htmlRetorno .= "   <td>" . $atestados->cid . "</td>";
                $htmlRetorno .= '</tr>';


            }
        } else {
            $htmlRetorno .= "   <tr class='conteudo'>";
            $htmlRetorno .= "       <td class='semCartas' colspan='5'>Nenhum Atestado Cadastrado</td>";
            $htmlRetorno .= "   </tr>";
        }

        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";

        return $htmlRetorno;

    }

    /**
     * Monta a GRID de periódicos de todas as telas
     * @param $listaAtestados
     * @return string
     */
    public static function montaGridPeriodico($listaPeriodicos) {

        $cor = false;
        $htmlRetorno = "";

        if(count($listaPeriodicos) > 0) {
            $htmlRetorno .= count($listaPeriodicos)." Periódico(s) Previsto/Realizado(s)";
        }
        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th>Previsto para</th>";
        $htmlRetorno .= "       <th>Iniciado em</th>";
        $htmlRetorno .= "       <th>Finalizado em</th>";
        $htmlRetorno .= "       <th>Doença</th>";
        $htmlRetorno .= "       <th>Encaminhado</th>";
        $htmlRetorno .= "       <th>Atividade Desenvolvida</th>";
        $htmlRetorno .= "       <th>Volume de Trabalho</th>";
        $htmlRetorno .= "       <th>Relação com a chefia</th>";
        $htmlRetorno .= "       <th>Relação com os Colegas</th>";
        $htmlRetorno .= "       <th>Dores</th>";
        $htmlRetorno .= "       <th>Fadiga Visual</th>";
        $htmlRetorno .= "       <th>Tensão Emocional</th>";
        $htmlRetorno .= "       <th>Outros</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "<tbody>";

        if(count($listaPeriodicos) > 0) {
            foreach ($listaPeriodicos as $periodico) {

                $classe = ($cor = !$cor) ? 'normal' : 'alt';
                $htmlRetorno .= "<tr class='" . $classe . "'>";
                $htmlRetorno .= "   <td>" . self::formataData($periodico->dataPrevisao) . "</td>";
                $htmlRetorno .= "   <td>" . self::formataData($periodico->dataInicio) . "</td>";
                $htmlRetorno .= "   <td>" . self::formataData($periodico->dataFim) . "</td>";
                $htmlRetorno .= "   <td>" . $periodico->doenca->descricao . "</td>";
                $htmlRetorno .= "   <td>" . $periodico->encaminhamento->descricao . "</td>";
                $htmlRetorno .= "   <td>" . self::simNao($periodico->atividadeDesenvolvida) . "</td>";
                $htmlRetorno .= "   <td>" . self::simNao($periodico->volumeTrabalho) . "</td>";
                $htmlRetorno .= "   <td>" . self::simNao($periodico->relacaoChefia) . "</td>";
                $htmlRetorno .= "   <td>" . self::simNao($periodico->relacaoColegas) . "</td>";
                $htmlRetorno .= "   <td>" . self::simNao($periodico->dores) . "</td>";
                $htmlRetorno .= "   <td>" . self::simNao( $periodico->fadigaVisual) . "</td>";
                $htmlRetorno .= "   <td>" . self::simNao($periodico->tensaoEmocional) . "</td>";
                $htmlRetorno .= "   <td>" . self::simNao($periodico->outros) . "</td>";
                $htmlRetorno .= '</tr>';
            }
        } else {
            $htmlRetorno .= "   <tr class='conteudo'>";
            $htmlRetorno .= "       <td class='semCartas' colspan='5'>Nenhum Periódico Cadastrado</td>";
            $htmlRetorno .= "   </tr>";
        }

        $htmlRetorno .= "</tbody>";
        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";

        return $htmlRetorno;

    }

}