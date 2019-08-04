<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Status
 *
 * @author Birra
 */
class Status extends Select{
    private $Id_Status;
    private $Situacao;
    
    function getId_Status() {
        return $this->Id_Status;
    }

    function getSituacao() {
        return $this->Situacao;
    }

    function setId_Status($Id_Status) {
        $this->Id_Status = $Id_Status;
    }

    function setSituacao($Situacao) {
        $this->Situacao = $Situacao;
    }
    
    public function listaStatus() {
        
        $coluna6=[
            'id_status'=>'id_status',
            'status'=>'status',
        ];
        $Termos6="";
        $ColumTable6=[];
        $this->ExRead("status", $coluna6, $Termos6, $ColumTable6);
    }

    public function Syntax() {
        
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
             
            $this->Id_Status = $col['id_status'];
            $this->Situacao = $col['status'];
            
            echo"<option value='{$this->getId_Status()}'>{$this->getSituacao()}</option>";
        endwhile;
    }

}
