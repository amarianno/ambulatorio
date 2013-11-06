<?php


class RelatorioAtestadosHomologadosPeriodoHelper {

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
        $html .= "       <td class='semCartas' colspan='5'>Nenhum atestado homologado para o período fornecido</td>";
        $html .= "   </tr>";
        $html .= "</thead>";
        $html .= "<tbody>";
        $html .= "</tbody>";
        $html .= "</table>";
        $html .= "</div>";

        return $html;
    }

    private static function formataLotacao($lotacao) {
        $lotacaoFormatada = preg_split('"/"', $lotacao, -1);
        return $lotacaoFormatada[0];
    }

    /**
     * @param $lista
     * @return int
     */
    private static function somaQtdeAtestadosHomologadosInterno($lista) {
        $total = 0;
        if(count($lista) > 0) {
            foreach ($lista as $atestado) {
                //$atestado = new Atestado();
                if($atestado->isConcedidos == '1') {
                    $total += 1;
                }
            }
        }

        return $total;
    }

    private static  function somaQtdeDIASHomologadosInterno($lista) {
        $total = 0;
        if(count($lista) > 0) {
            foreach ($lista as $atestado) {
                //$atestado = new Atestado();
                if($atestado->isConcedidos == '1') {
                    $total += $atestado->diasAfastado;
                }
            }
        }

        return $total;
    }

    private static function somaQtdeAtestadosHomologadosExterno($lista) {
        $total = 0;
        if(count($lista) > 0) {
            foreach ($lista as $atestado) {
                //$atestado = new Atestado();
                if($atestado->isHomologados == '1') {
                    $total += 1;
                }
            }
        }

        return $total;
    }

    private static  function somaQtdeDIASHomologadosExterno($lista) {
        $total = 0;
        if(count($lista) > 0) {
            foreach ($lista as $atestado) {
                if($atestado->isHomologados == '1') {
                    $total += $atestado->diasAfastado;
                }
            }
        }

        return $total;
    }

    private static function somaQtdeAtestadosAcompanhamentoFamiliar($lista) {
        $total = 0;
        if(count($lista) > 0) {
            foreach ($lista as $atestado) {
                if($atestado->isAcompanhamentoFamiliar == '1') {
                    $total += 1;
                }
            }
        }

        return $total;
    }

    private static  function somaQtdeDIASAcompanhamentoFamiliar($lista) {
        $total = 0;
        if(count($lista) > 0) {
            foreach ($lista as $atestado) {
                if($atestado->isAcompanhamentoFamiliar == '1') {
                    $total += $atestado->diasAfastado;
                }
            }
        }

        return $total;
    }

    /**
     * @param $lista
     * @return string
     */
    public static function infoAdicional($lista) {

        $somaQtdeAtestadosHomologadosInterno = static::somaQtdeAtestadosHomologadosInterno($lista);
        if($somaQtdeAtestadosHomologadosInterno > 0) {
            $htmlRetorno = "";
            $htmlRetorno .= "<div class='datagrid'>";
            $htmlRetorno .= "<table id='mainDeck'>";
            $htmlRetorno .= "   <tr class='alt'>";
            $htmlRetorno .= "       <td><b>" . $somaQtdeAtestadosHomologadosInterno . " atestados Concedidos (interno)</b></td>";
            $htmlRetorno .= '   </tr>';
            $htmlRetorno .= "</table>";
            $htmlRetorno .= "<table id='mainDeck'>";
            $htmlRetorno .= "   <tr class='alt'>";
            $htmlRetorno .= "       <td><b>" . static::somaQtdeDIASHomologadosInterno($lista) . " Dias perdidos com atestados Concedidos (interno)</b></td>";
            $htmlRetorno .= '   </tr>';
            $htmlRetorno .= "</table>";
            $htmlRetorno .= "</div>";
        }

        $somaQtdeAtestadosHomologadosExterno = static::somaQtdeAtestadosHomologadosExterno($lista);
        if($somaQtdeAtestadosHomologadosExterno > 0) {
            $htmlRetorno .= "<div class='datagrid'>";
            $htmlRetorno .= "<table id='mainDeck'>";
            $htmlRetorno .= "   <tr class='alt'>";
            $htmlRetorno .= "       <td><b>" . $somaQtdeAtestadosHomologadosExterno. " atestados Concedidos (externo)</b></td>";
            $htmlRetorno .= '   </tr>';
            $htmlRetorno .= "</table>";
            $htmlRetorno .= "<table id='mainDeck'>";
            $htmlRetorno .= "   <tr class='alt'>";
            $htmlRetorno .= "       <td><b>" . static::somaQtdeDIASHomologadosExterno($lista) . " Dias perdidos com atestados Concedidos (externo)</b></td>";
            $htmlRetorno .= '   </tr>';
            $htmlRetorno .= "</table>";
            $htmlRetorno .= "</div>";
        }

        $somaQtdeAtestadosAcompanhamentoFamiliar = static::somaQtdeAtestadosAcompanhamentoFamiliar($lista);
        if($somaQtdeAtestadosAcompanhamentoFamiliar > 0) {
            $htmlRetorno .= "<div class='datagrid'>";
            $htmlRetorno .= "<table id='mainDeck'>";
            $htmlRetorno .= "   <tr class='alt'>";
            $htmlRetorno .= "       <td><b>" . $somaQtdeAtestadosAcompanhamentoFamiliar . " atestados de Acompanhamento Familiar</b></td>";
            $htmlRetorno .= '   </tr>';
            $htmlRetorno .= "</table>";
            $htmlRetorno .= "<table id='mainDeck'>";
            $htmlRetorno .= "   <tr class='alt'>";
            $htmlRetorno .= "       <td><b>" . static::somaQtdeDIASAcompanhamentoFamiliar($lista) . " Dias perdidos com atestados de Acompanhamento Familiar</b></td>";
            $htmlRetorno .= '   </tr>';
            $htmlRetorno .= "</table>";
            $htmlRetorno .= "</div>";
        }

        return $htmlRetorno;
    }

    /**
     * Retorna o HTML para a grid da tela
     *
     * @param $atestadosAgrupadosPorLotacao
     * @return string
     */
    public static function toHtmlGrid($listaAtestadosHomologadosPeriodo) {
        $cor = false;
        $htmlRetorno = "";
        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th>Matrícula</th>";
        $htmlRetorno .= "       <th>Nome</th>";
        $htmlRetorno .= "       <th>Lotação</th>";
        $htmlRetorno .= "       <th>Qtde de dias</th>";
        $htmlRetorno .= "       <th>Data Inicial</th>";
        $htmlRetorno .= "       <th>Data Final</th>";
        $htmlRetorno .= "       <th>CID</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";

        foreach ($listaAtestadosHomologadosPeriodo as $atestado) {
            $classe = ($cor = !$cor) ? 'normal' : 'alt';
            $htmlRetorno .= "<tr class='" . $classe . "'>";
            $htmlRetorno .= "   <td>" . $atestado->empregado->matricula . "</td>";
            $htmlRetorno .= "   <td>" . $atestado->empregado->nome . "</td>";
            $htmlRetorno .= "   <td>" . self::formataLotacao($atestado->empregado->lotacao) . "</td>";
            $htmlRetorno .= "   <td>" . $atestado->diasAfastado . "</td>";
            $htmlRetorno .= "   <td>" . OperacaoGrid::formataData($atestado->dataInicialAfastamento) . "</td>";
            $htmlRetorno .= "   <td>" . OperacaoGrid::formataData($atestado->dataFinalAfastamento) . "</td>";
            $htmlRetorno .= "   <td>" . $atestado->cid . "</td>";
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
    public static function toHtmlPDF($listaAtestadosHomologadosPeriodo) {

        /**
         * Para controle do relatorio
         */
        $qtdeVezes = 0;


        $cor = false;
        $htmlRetorno = "";
        $htmlRetorno .= "<div class='datagrid'>";
        $htmlRetorno .= "<table id='mainDeck'>";
        $htmlRetorno .= "<thead>";
        $htmlRetorno .= "   <tr>";
        $htmlRetorno .= "       <th>Matrícula</th>";
        $htmlRetorno .= "       <th>Nome</th>";
        $htmlRetorno .= "       <th>Lotação</th>";
        $htmlRetorno .= "       <th>Qtde de dias</th>";
        $htmlRetorno .= "       <th>Data Inicial</th>";
        $htmlRetorno .= "       <th>Data Final</th>";
        $htmlRetorno .= "   </tr>";
        $htmlRetorno .= "</thead>";

        foreach ($listaAtestadosHomologadosPeriodo as $atestado) {
            $classe = ($cor = !$cor) ? 'normal' : 'alt';
            $htmlRetorno .= "<tr class='" . $classe . "'>";
            $htmlRetorno .= "   <td>" . $atestado->empregado->matricula . "</td>";
            $htmlRetorno .= "   <td>" . $atestado->empregado->nome . "</td>";
            $htmlRetorno .= "   <td>" . formataLotacao($atestado->empregado->lotacao) . "</td>";
            $htmlRetorno .= "   <td>" . $atestado->diasAfastado . "</td>";
            $htmlRetorno .= "   <td>" . OperacaoGrid::formataData($atestado->dataInicialAfastamento) . "</td>";
            $htmlRetorno .= "   <td>" . OperacaoGrid::formataData($atestado->dataFinalAfastamento) . "</td>";
            $htmlRetorno .= '</tr>';

            $qtdeVezes++;

        }

        $htmlRetorno .= "</table>";
        $htmlRetorno .= "</div>";

        $htmlRetorno .= '<pagefooter name="MyFooter2" content-left="{DATE j/m/Y} - Página {PAGENO} de {nbpg}" content-right="Responsável:_______________________________________________" footer-style="font-family: serif; font-size: 8pt; font-weight: bold; font-style: italic; color: #000000;"/>';
        $htmlRetorno .= '<setpagefooter name="MyFooter2" page="O" value="on" />';

        return $htmlRetorno;
    }





}
