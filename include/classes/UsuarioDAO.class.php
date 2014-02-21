<?php

require_once('Loader.class.php');

class UsuarioDAO extends DAOPersistivel {

    const NOME_TABELA = "usuario";

    public function __construct() {
        parent::__construct(UsuarioDAO::NOME_TABELA);
    }

    public function incluir(DAOBanco $banco, $camposValores) {
        return parent::incluir($banco, $camposValores);
    }

    public function alterar(DAOBanco $banco, $camposValores, FiltroSQL $filtro = null) {
        return parent::alterar($banco, $camposValores, $filtro);
    }

    public function excluir(DAOBanco $banco, FiltroSQL $filtro = null) {
        return parent::excluir($banco, $filtro);
    }

    public function consultar(DAOBanco $banco, $campos, FiltroSQL $filtro = null) {
        $resultados = parent::consultar($banco, $campos, $filtro, "nome ASC");
        if(!is_null($resultados)) {
            return $this->criaObjetos($resultados);
        } else {
            return array();
        }

    }

    public function criaObjetos($resultados) {
        $resultsets = array();
        foreach ($resultados as $linha) {
            $user = new Usuario();
            foreach ($linha as $campo => $valor) {
                if (strcasecmp($campo, "codigo") == 0) {
                    $user->codigo = $valor;
                } else if (strcasecmp($campo, "nome") == 0) {
                    $user->nome = $valor;
                } else if (strcasecmp($campo, "email") == 0) {
                    $user->email = $valor;
                } else if (strcasecmp($campo, "cpf") == 0) {
                    $user->telefone = $valor;
                } else if (strcasecmp($campo, "perfil") == 0) {
                    $user->perfil = $valor;
                } else if (strcasecmp($campo, "empresa") == 0) {
                    $user->empresa = $valor;
                }
            }
            $resultsets[] = $user;
        }

        return $resultsets;
    }

}

?>
