<?php

/**
  * @author Birra
 */
class LoginUsuario extends Pessoa{
    private $Senha;
    private $Nivel_Acesso;
    
         
    function getSenha() {
        return $this->Senha;
    }

    function getNivel_Acesso() {
        return $this->Nivel_Acesso;
    }

    function setSenha($Senha) {
        $this->Senha = md5($Senha) ;
    }

    function setNivel_Acesso($Nivel_Acesso) {
        $this->Nivel_Acesso = $Nivel_Acesso;
    }


}
