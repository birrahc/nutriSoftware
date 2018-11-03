<?php


/**
 * @author Birra
 */
 class Pessoa{
    private $idPessoa;
    private $Nome;
    private $Sexo;
    private $Data_Nascimento;
    Private $Idade;
    
    
    function getIdPessoa(){
        return $this->idPessoa;
    }
            
    function getNome() {
        return $this->Nome;
    }

    function getData_Nascimento() {
        return $this->Data_Nascimento;
    }
    
    function getIdade(){
        return $this->Idade;
    }
    
    function getSexo() {
        return $this->Sexo;
    }

        
    function setNome($Nome) {
        $this->Nome = $Nome;
    }

    function setData_Nascimento($Data_Nascimento) {
        $this->Data_Nascimento = $Data_Nascimento;
    }
    
    function setIdPessoa($IdPessoa){
        $this->idPessoa=$IdPessoa;
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
    
    function setSexo($Sexo) {
        $this->Sexo = $Sexo;
    }

    
    

}
