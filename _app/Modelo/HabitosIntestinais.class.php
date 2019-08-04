<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HabitosIntestinais
 *
 * @author Birra
 */
class HabitosIntestinais extends Select{
    private $Id_Hab;
    private $Qtd;
    
    function getId_Hab() {
        return $this->Id_Hab;
    }

    function getQtd() {
        return $this->Qtd;
    }

    function setId_Hab($Id_Hab) {
        $this->Id_Hab = $Id_Hab;
    }

    function setQtd($Qtd) {
        $this->Qtd = $Qtd;
    }
    
    public function listaHabitos() {
        
        $coluna6=[
            'id_habito'=>'id_habito',
            'quantidade'=>'quantidade',
        ];
        $Termos6="";
        $ColumTable6=[];
        $this->ExRead("habitos", $coluna6, $Termos6, $ColumTable6);
    }

    public function Syntax() {
            
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
             
            $this->Id_Hab = $col['id_habito'];
            $this->Qtd = $col['quantidade'];
            
            echo"<option value='{$this->getId_Hab()}'>{$this->getQtd()}</option>";
        endwhile;
    }

}
