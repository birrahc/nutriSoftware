<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Local_Atendimento
 *
 * @author Birra
 */
class Local_Atendimento extends Select {
    private $id_local;
    private $Local;
    
    function getId_local() {
        return $this->id_local;
    }

    function getLocal() {
        return $this->Local;
    }

    function setId_local($id_local) {
        $this->id_local = $id_local;
    }

    function setLocal($Local) {
        $this->Local = $Local;
    }
    
    public function listaLocal() {
        
        $coluna6=[
            'id_local'=>'id_local',
            'nome'=>'nome',
        ];
        $Termos6="";
        $ColumTable6=[];
        $this->ExRead("local_atendimento", $coluna6, $Termos6, $ColumTable6);
    }

    public function Syntax() {
        
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
             
            $this->id_local = $col['id_local'];
            $this->Local = $col['nome'];
            
            echo"<option value='{$this->getId_local()}'>{$this->getLocal()}</option>";
        endwhile;
        
    }

}
