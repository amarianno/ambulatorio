<?php

require_once('Loader.class.php');

class FiltroSQL {
    public $conector;
    public $operador;
    public $camposFiltro;

    const CONECTOR_E = 'AND';
    const CONECTOR_OU = 'OR';
    const OPERADOR_ENTRE = 'BETWEEN';
    const OPERADOR_EM = 'IN';
    const OPERADOR_CONTEM = 'LIKE';
    const OPERADOR_MAIOR = '>';
    const OPERADOR_MENOR = '<';
    const OPERADOR_MAIOR_IGUAL = '>=';
    const OPERADOR_MENOR_IGUAL = '<=';
    const OPERADOR_IGUAL = '=';
    const OPERADOR_META_PIPE = '|';
    const OPERADOR_META_DOIS_PONTOS = ':';
    const OPERADOR_META_ASTERISCO = '*';

    public function __construct($conector, $operador, $camposFiltro) {
        $this->conector = $conector;
        $this->operador = $operador;
        $this->camposFiltro = $camposFiltro;
    }

    public function adicionaCampoFiltro($campo, $valor) {
        $this->camposFiltro[$campo] = $valor;
    }

    public function removeCampoFiltro($campo) {
        unset($this->camposFiltro[$campo]);
    }

    public function retornaValorCampo($campo) {
        return $this->camposFiltro[$campo];
    }
}