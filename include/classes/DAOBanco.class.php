<?php

require_once('Loader.class.php');

abstract class DAOBanco implements DAO {
    private $emTransacao;
    private $autoCommit;

    private function __construct($emTransacao, $autoCommit) {
        $this->emTransacao = $emTransacao;
        $this->autoCommit = $autoCommit;
    }

    protected function inicializaConstrutor($emTransacao, $autoCommit) {
        $this->__construct($emTransacao, $autoCommit);
    }
}