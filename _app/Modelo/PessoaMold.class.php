<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PessoaMold
 *
 * @author Birra
 */
class PessoaMold extends Select {
    private $Id_Pessoa;
    private $Nome;
    private $Sexo;
    private $Data_Nascimento;
    private $Idade;
    private $Altura;
    private $Cpf;
    
    function getId_Pessoa() {
        return $this->Id_Pessoa;
    }

    function getNome() {
        return $this->Nome;
    }

    function getSexo() {
        return $this->Sexo;
    }

    function getData_Nascimento() {
        return $this->Data_Nascimento;
    }

    function getIdade() {
        return $this->Idade;
    }
    
    function getAltura() {
        return $this->Altura;
    }
    
    function getCpf() {
        return $this->Cpf;
    }

            function setId_Pessoa($Id_Pessoa) {
        $this->Id_Pessoa = $Id_Pessoa;
    }

    function setNome($Nome) {
        $this->Nome = $Nome;
    }

    function setSexo($Sexo) {
        $this->Sexo = $Sexo;
    }

    function setData_Nascimento($Data_Nascimento) {
        $this->Data_Nascimento = $Data_Nascimento;
    }

    function setIdade($Nascimento){
        $Data_Nascimento = explode('-', $Nascimento);
        $Data = date('d/m/Y');
        $Data_Sist = explode('/', $Data);
        //Calculo
        $Anos= $Data_Sist[2]-$Data_Nascimento[0];
        if($Data_Nascimento[1] > $Data_Sist[1]):
             $Anos-=1; 
            //echo $Anos.'anos<br>';
        else:
            if($Data_Nascimento[1]==$Data_Sist[1]):
                if($Data_Nascimento[2] > $Data_Sist[0]):
                   $Anos-=1; 
                endif;
            endif;
         //echo $Anos.' anos// <br>';   
        endif;
       
        $this->Idade=$Anos;
    }
    
    function setAltura($Altura) {
        $this->Altura = $Altura;
    }
    
    function setCpf($Cpf) {
        $limpa = str_replace(".", "", $Cpf);
        $this->Cpf = str_replace("-","", $limpa);
    }

    
    
    public function Syntax() {
        
    }

}
