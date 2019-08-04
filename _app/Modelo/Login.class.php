<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Birra
 */
class Login extends PessoaMold{
    private $Senha;
    private $RepeteSenha;
    private $Pemissao;
    
    function getSenha() {
        return $this->Senha;
    }
    
    function getRepeteSenha() {
        return $this->RepeteSenha;
    }

    function getPemissao() {
        return $this->Pemissao;
    }

    function setSenha($Senha) {
        $this->Senha = md5($Senha);
    }
    function setRepeteSenha($RepeteSenha) {
        $this->RepeteSenha = md5($RepeteSenha);
    }

    function setPemissao($Pemissao) {
        $this->Pemissao = ((int) $Pemissao ? $Pemissao:'Favor preencher com nuneros');
    }


}
