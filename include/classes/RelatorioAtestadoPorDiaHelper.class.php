<?php


class RelatorioAtestadoPorDiaHelper {

    /**
     * A data da tela vem no formato XX/XX/XX
     * Retorna uma data no formato XX/XX/XXXX
     *
     * @param $data
     * @return string
     */
    public static function retornaDataFormatada($data) {
        $mesAnoSplit = preg_split('"/"', $data, -1);
        return "20".$mesAnoSplit[2]."-".$mesAnoSplit[1]."-".$mesAnoSplit[0];
    }

    /**
     * Recebe uma Lista com os atestados do dia e transforma em um MAP
     * Agrupado por Lotação
     *
     * @param $listaAtestadosDoDia
     * @return array
     */
    public static function retornaMapPorLotacao($listaAtestadosDoDia) {
        $mapLotacao = array();
        foreach($listaAtestadosDoDia as $atestadoProcurarEmpregado) {
            //$atestadoProcurarEmpregado = new Atestado();
            if(isset($mapLotacao[$atestadoProcurarEmpregado->empregado->lotacao])) {
                $posicao = count($mapLotacao[$atestadoProcurarEmpregado->empregado->lotacao]);
                $mapLotacao[$atestadoProcurarEmpregado->empregado->lotacao][$posicao] = $atestadoProcurarEmpregado;

            } else {
                $mapLotacao[$atestadoProcurarEmpregado->empregado->lotacao] = array();
                $mapLotacao[$atestadoProcurarEmpregado->empregado->lotacao][0] = $atestadoProcurarEmpregado;
            }
        }

        return $mapLotacao;
    }

    /**
     * Retorna o HTML usado quando não há registro pra uma data
     * @return string
     */
    public static function toHtmlSemRegistros() {

        $html = "<div class='datagrid'>";
        $html .= "<table id='mainDeck'>";
        $html .= "<thead>";
        $html .= "   <tr>";
        $html .= "       <th></th>";
        $html .= "   </tr>";
        $html .= "   <tr class='conteudo'>";
        $html .= "       <td class='semCartas' colspan='5'>Nenhum atestado para o dia/mês/ano fornecido</td>";
        $html .= "   </tr>";
        $html .= "</thead>";
        $html .= "<tbody>";
        $html .= "</tbody>";
        $html .= "</table>";
        $html .= "</div>";

        return $html;
    }


    /**
     * Retorna o HTML para a grid da tela
     *
     * @param $atestadosAgrupadosPorLotacao
     * @return string
     */
    public static function toHtmlGrid($atestadosAgrupadosPorLotacao) {
        $cor = false;
        $htmlRetorno = "";
        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th>Lotação</th>";
        $htmlRetorno .= "       <th>".$atestadosAgrupadosPorLotacao[0]->empregado->lotacao."</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "</table>";

        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th>Matricula</th>";
        $htmlRetorno .= "       <th>Nome</th>";
        $htmlRetorno .= "       <th>Dias Afastado</th>";
        $htmlRetorno .= "       <th>Data Inicial</th>";
        $htmlRetorno .= "       <th>Data Final</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";

        foreach ($atestadosAgrupadosPorLotacao as $atestado) {
            $classe = ($cor = !$cor) ? 'normal' : 'alt';
            $htmlRetorno .= "<tr class='" . $classe . "'>";
            $htmlRetorno .= "   <td>" . $atestado->empregado->matricula . "</td>";
            $htmlRetorno .= "   <td>" . $atestado->empregado->nome . "</td>";
            $htmlRetorno .= "   <td>" . $atestado->diasAfastado . "</td>";
            $htmlRetorno .= "   <td>" . OperacaoGrid::formataData($atestado->dataInicialAfastamento) . "</td>";
            $htmlRetorno .= "   <td>" . OperacaoGrid::formataData($atestado->dataFinalAfastamento) . "</td>";
            $htmlRetorno .= '</tr>';

        }

        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";

        return $htmlRetorno;
    }

    /**
     * Retorna o HTML para gerar o PDF para impressão
     * @param $atestadosAgrupadosPorLotacao
     * @return string
     */
    public static function toHtmlPDF($atestadosAgrupadosPorLotacao) {
        $cor = false;
        $htmlRetorno = "";
        $htmlRetorno .= '<htmlpageheader name="myHTMLHeader">';
        $htmlRetorno .= "<p style='text-align: center'>MOVIMENTO DO SESMT POR DATA DE RECEBIMENTO</p>";
        $htmlRetorno .= '</htmlpageheader>';

        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th>Lotação</th>";
        $htmlRetorno .= "       <th>".$atestadosAgrupadosPorLotacao[0]->empregado->lotacao."</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";
        $htmlRetorno .= "</table>";

        $htmlRetorno .= "<table border='0'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th>Matricula</th>";
        $htmlRetorno .= "       <th>Nome</th>";
        $htmlRetorno .= "       <th>Dias Afastado</th>";
        $htmlRetorno .= "       <th>Data Inicial</th>";
        $htmlRetorno .= "       <th>Data Final</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";

        foreach ($atestadosAgrupadosPorLotacao as $atestado) {
            $classe = ($cor = !$cor) ? 'normal' : 'alt';
            $htmlRetorno .= "<tr class='" . $classe . "'>";
            $htmlRetorno .= "   <td>" . $atestado->empregado->matricula . "</td>";
            $htmlRetorno .= "   <td>" . $atestado->empregado->nome . "</td>";
            $htmlRetorno .= "   <td>" . $atestado->diasAfastado . "</td>";
            $htmlRetorno .= "   <td>" . OperacaoGrid::formataData($atestado->dataInicialAfastamento) . "</td>";
            $htmlRetorno .= "   <td>" . OperacaoGrid::formataData($atestado->dataFinalAfastamento) . "</td>";
            $htmlRetorno .= '</tr>';

        }

        $htmlRetorno .= "</table>";

        $htmlRetorno .= "</div>";
        $htmlRetorno .= '<sethtmlpageheader name="myHTMLHeader" page="O" value="on" show-this-page="1" />';
        $htmlRetorno .= '<pagefooter name="MyFooter1" content-left="{DATE j/m/Y} - Página {PAGENO} de {nbpg}" content-right="Responsável:_______________________________________________" footer-style="font-family: serif; font-size: 8pt; font-weight: bold; font-style: italic; color: #000000;"/>';
        $htmlRetorno .= '<setpagefooter name="MyFooter1" page="O" value="on" />';
        $htmlRetorno .= "<pagebreak />";

        return $htmlRetorno;
    }





}
