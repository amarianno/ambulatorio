<?php

require_once('Loader.class.php');

class Util {

    public static function mesPorExtenso($mes) {
        if($mes == '1') {
            return "JANEIRO";
        } else if($mes == '2') {
            return "FEVEREIRO";
        }  else if($mes == '3') {
            return "MARÇO";
        } else if($mes == '4') {
            return "ABRIL";
        } else if($mes == '5') {
            return "MAIO";
        } else if($mes == '6') {
            return "JUNHO";
        } else if($mes == '7') {
            return "JULHO";
        } else if($mes == '8') {
            return "AGOSTO";
        } else if($mes == '9') {
            return "SETEMBRO";
        } else if($mes == '10') {
            return "OUTUBRO";
        } else if($mes == '11') {
            return "NOVEMBRO";
        } else {
            return "DEZEMBRO";
        }
    }

    public static function formataAnoDaTelaComQuatroDigitos($ano) {
        return "20" + $ano;
    }

    public static function dataMysqlToTela($data) {

        //2012-02-12
        if(!isset($data) || $data == '') {
            return "";
        }

        $returnValue = preg_split('"-"', $data, -1);
        return $returnValue[2] . "/" . $returnValue[1] . "/" . $returnValue[0];
    }

    public static function dataTelaToMysql($data) {

        //12/02/2014
        if(!isset($data) || $data == '') {
            return "";
        }

        $returnValue = preg_split('"/"', $data, -1);
        return $returnValue[2] . "-" . $returnValue[1] . "-" . $returnValue[0];
    }


}
