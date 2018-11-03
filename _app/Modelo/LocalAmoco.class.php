<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LocalAmoco
 *
 * @author Birra
 */
class LocalAmoco extends Select{
    private $Cod_local;
    private $Local_Almoco;
    
    function getCod_local() {
        return $this->Cod_local;
    }

    function getLocal_Almoco() {
        return $this->Local_Almoco;
    }

    function setCod_local($Cod_local) {
        $this->Cod_local = $Cod_local;
    }

    function setLocal_Almoco($Local_Almoco) {
        $this->Local_Almoco = $Local_Almoco;
    }
    
    public function Locais() {
        
        $coluna6=[
            'id_local_alm'=>'id_local_alm',
            'local_almoco'=>'local_almoco',
        ];
        
        $Termos6="";
        $ColumTable6=[
            
        ];
        
        
       
        $this->ExRead("local_almoco", $coluna6, $Termos6, $ColumTable6);
    }
    public function Syntax() {
        
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
              $coluna6=[
            '*'=>'*'];
        
        $Termos6="";
        $ColumTable6=[
            
        ];
        
        
       
        $this->ExRead("local_almoco", $coluna6, $Termos6, $ColumTable6);
            $this->Cod_local = $col['id_local_alm'];
            $this->Local_Almoco = $col['local_almoco'];
            
            echo"<option value='{$this->getCod_local()}'>{$this->getLocal_Almoco()}</option>";
        endwhile;
    }

}
