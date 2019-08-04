<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Doencas
 *
 * @author Birra
 */
class Doencas extends Select{
    private $Id_Doenca;
    private $Doenca;
    
    function getId_Doenca() {
        return $this->Id_Doenca;
    }

    function getDoenca() {
        return $this->Doenca;
    }

    function setId_Doenca($Id_Doenca) {
        $this->Id_Doenca = $Id_Doenca;
    }

    function setDoenca($Doenca) {
        $this->Doenca = $Doenca;
    }
    
    public function listaDoencas() {
        
        $coluna6=[
            'id_doenca'=>'id_doenca',
            'doenca'=>'doenca',
        ];
        $Termos6="";
        $ColumTable6=[];
        $this->ExRead("doencas", $coluna6, $Termos6, $ColumTable6);
    }

    public function Syntax() {
            
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
             
            $this->Id_Doenca = $col['id_doenca'];
            $this->Doenca = $col['doenca'];
            
            echo"<option value='{$this->getId_Doenca()}'>{$this->getDoenca()}</option>";
        endwhile;
    }

}
