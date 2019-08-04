<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoConsulta
 *
 * @author Birra
 */
class TipoConsulta extends Select{
    private $Id_Tipo;
    private $TipoConsulta;
    
    
    function getId_Tipo() {
        return $this->Id_Tipo;
    }

    function getTipo() {
        return $this->TipoConsulta;
    }

    function setId_Tipo($Id_Tipo) {
        $this->Id_Tipo = $Id_Tipo;
    }

    function setTipo($Tipo) {
        $this->TipoConsulta = $Tipo;
    }
    
    public function listaTipo() {
        
        $coluna6=[
            'id_tipo'=>'id_tipo',
            'tipo'=>'tipo',
        ];
        $Termos6="";
        $ColumTable6=[];
        $this->ExRead("tipo", $coluna6, $Termos6, $ColumTable6);
    }

    public function Syntax() {
        
       while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
             
            $this->Id_Tipo = $col['id_tipo'];
            $this->TipoConsulta = $col['tipo'];
            
            echo"<option value='{$this->getId_Tipo()}'>{$this->getTipo()}</option>";
        endwhile; 
    }

}
