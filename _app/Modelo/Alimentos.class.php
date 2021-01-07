<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dietas
 *
 * @author Birra
 */
class Alimentos extends Select{
    private $Id_alimento;
    private $Alimento;
   
    function getId_alimento() {
        return $this->Id_alimento;
    }

    function getAlimento() {
        return $this->Alimento;
    }

    function setId_alimento($Id_alimento) {
        $this->Id_alimento = $Id_alimento;
    }

    function setAlimento($Alimento) {
        $this->Alimento = $Alimento;
    }

    public function listaAlimentos() {
        
        $coluna6=[
            'id_alimento'=>'id_alimento',
            'alimento'=>'alimento',
        ];
        $Termos6="";
        $ColumTable6=[];
        $this->ExRead("alimentos", $coluna6, $Termos6, $ColumTable6);
    }        
    
    
    public function Syntax(){
         while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
             
            $this->Id_alimento = $col['id_alimento'];
            $this->Alimento = $col['alimento'];
            
            echo"<option value='{$this->getId_alimento()}'>{$this->getAlimento()}</option>";
        endwhile;
    }

}
