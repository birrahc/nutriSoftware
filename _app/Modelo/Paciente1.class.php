<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paciente1
 *
 * @author Birra
 */
class Paciente1 extends Pessoa{
    
    private $Profissao;
    private $Telefone;
    private $Email;
   
    
    function getProfissao() {
        return $this->Profissao;
    }

    function getTelefone() {
        return $this->Telefone;
    }

    function getEmail() {
        return $this->Email;
    }
    
    function setProfissao($Profissao) {
        $this->Profissao = $Profissao;
    }

    function setTelefone($Telefone) {
        $this->Telefone = $Telefone;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }
    
    //Lista a Syntax
   

}
