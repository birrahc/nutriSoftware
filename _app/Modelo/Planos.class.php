<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Planos
 *
 * @author Birra
 */
class Planos extends Select{
    private $Id_planos;
    private $Plano;
    
    function getId_planos() {
        return $this->Id_planos;
    }

    function getPlano() {
        return $this->Plano;
    }

    function setId_planos($Id_planos) {
        $this->Id_planos = $Id_planos;
    }

    function setPlano($Plano) {
        $this->Plano = $Plano;
    }
    
    public function listaPlanos() {
        
        $coluna6=[
            'id_plano'=>'id_plano',
            'planos'=>'planos',
        ];
        $Termos6="";
        $ColumTable6=[];
        $this->ExRead("planos", $coluna6, $Termos6, $ColumTable6);
    }

    public function Syntax() {
        
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
             
            $this->Id_planos = $col['id_plano'];
            $this->Plano = $col['planos'];
            
            echo"<option value='{$this->getId_planos()}'>{$this->getPlano()}</option>";
        endwhile;
    }

}
