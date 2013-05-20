<?php

    require_once('Loader.class.php');
    /**
     * Regra de Negócio
     */
    abstract class BC {
        public abstract function incluir(DAOBanco $banco, $camposValores);

        public abstract function alterar(DAOBanco $banco, $camposValores, FiltroSQL $filtro = null);

        public abstract function excluir(DAOBanco $banco, FiltroSQL $filtro = null);

        public abstract function consultar(DAOBanco $banco, $campos, FiltroSQL $filtro = null);
    }