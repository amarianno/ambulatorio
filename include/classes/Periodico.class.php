<?php

require_once('Loader.class.php');

class Periodico extends Persistivel {

    public $codigo;
    public $empregado;
    public $dataPrevisao;
    public $dataInicio;
    public $dataFim;
    public $dataUltimo;
    public $isMaisQuarentaAnos;
    public $doenca;
    public $encaminhamento;

    //Avaliacao Ocupacional
    public $atividadeDesenvolvida;
    public $volumeTrabalho;
    public $relacaoChefia;
    public $relacaoColegas;
    public $dores;
    public $fadigaVisual;
    public $tensaoEmocional;
    public $outros;

    //Historia Pregressa
    public $infectoContagiosa;
    public $endocrinas;
    public $sangue;
    public $pele;
    public $respiratorio;
    public $circulatorio;
    public $digestivo;
    public $genitoUrinario;
    public $musculo;
    public $sistemaNervoso;
    public $emocionais;
    public $outras;
    public $afastamentoDoenca;
    public $portadorDeficiencia;

    //Fatores de Risco
    public $tabaco;
    public $alcool;
    public $atividadeFisica;
    public $drogas;
    public $hipertensaoArterial;
    public $pa;
    public $fc;
    public $pesoIdeal;
    public $peso;
    public $altura;
    public $imc;

    //exame clínico
    public $peleMucosas;
    public $cabeca;
    public $pescoco;
    public $torax;
    public $abdome;
    public $membrosSupInf;
    public $sistNervosoExameClinico;
    public $coluna;
    public $genitoUrinarioExameClinico;
    public $psiquismo;

    //Exames Complementares
    public $hemograma;
    public $creatinina;
    public $glicemia;
    public $colesterolTotal;
    public $hdl;
    public $ldl;
    public $vldl;
    public $triglicerideos;
    public $psa;
    public $eas;
    public $exameOftalmico;
    public $outroExamesComplementares;

    //Diagnostico
    public $cid1;
    public $cid2;
    public $cid3;
    public $cid4;
    public $cid5;
    public $cid6;
    public $proximoPeriodico;

    public $queixas;
    public $obs;

    //Relatorio
    public $quantidade;


    public function getChavePrimaria() {
        return $this->codigo;
    }


}
