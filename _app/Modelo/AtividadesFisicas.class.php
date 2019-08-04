<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AtividadesFisicas
 *
 * @author Birra
 */
class AtividadesFisicas extends Select{
    private $Id_Atividade;
    private $Atividade;
    
    function getId_Atividade() {
        return $this->Id_Atividade;
    }

    function getAtividade() {
        return $this->Atividade;
    }

    function setId_Atividade($Id_Atividade) {
        $this->Id_Atividade = $Id_Atividade;
    }

    function setAtividade($Atividade) {
        $this->Atividade = $Atividade;
    }
    
    public function listaAtividades() {
        
        $coluna6=[
            'id_atividade'=>'id_atividade',
            'atividade'=>'atividade',
        ];
        $Termos6="";
        $ColumTable6=[];
        $this->ExRead("atividades_fisicas", $coluna6, $Termos6, $ColumTable6);
    }

    public function Syntax() {
        
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
             
            $this->Id_Atividade = $col['id_atividade'];
            $this->Atividade = $col['atividade'];
            
            echo"<option value='{$this->getId_Atividade()}'>{$this->getAtividade()}</option>";
        endwhile;
    }

}
