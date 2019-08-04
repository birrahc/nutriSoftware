<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bebidas
 *
 * @author Birra
 */
class Bebidas extends Select{
   private $Id_Bebida;
   private $Bebida;
   
   function getId_Bebida() {
       return $this->Id_Bebida;
   }

   function getBebida() {
       return $this->Bebida;
   }

   function setId_Bebida($Id_Bebida) {
       $this->Id_Bebida = $Id_Bebida;
   }

   function setBebida($Bebida) {
       $this->Bebida = $Bebida;
   }
   
   public function listaBebidas() {
        
        $coluna6=[
            'id_bebida'=>'id_bebida',
            'bebida'=>'bebida',
        ];
        $Termos6="";
        $ColumTable6=[];
        $this->ExRead("bebidas", $coluna6, $Termos6, $ColumTable6);
    }

    public function Syntax() {
        
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
             
            $this->Id_Bebida = $col['id_bebida'];
            $this->Bebida = $col['bebida'];
            
            echo"<option value='{$this->getId_Bebida()}'>{$this->getBebida()}</option>";
        endwhile;
    }

}
