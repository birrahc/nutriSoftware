<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HoraDieta
 *
 * @author birra
 */
class HoraDieta extends Select{
    private $id_hora;
    private $hora;
    
    function getId_hora() {
        return $this->id_hora;
    }

    function getHora() {
        return $this->hora;
    }

    public function listaHora() {
        
        $coluna6=[
            'id_horarios'=>'id_horarios',
            'hora'=>'hora',
        ];
        $Termos6="";
        $ColumTable6=[];
        $this->ExRead("horarios", $coluna6, $Termos6, $ColumTable6);
    }        
    
    
    public function Syntax(){
         while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
             
            $this->id_hora = $col['id_horarios'];
            $this->hora = $col['hora'];
            
            echo"<option value='{$this->getId_hora()}'>".$this->getHora()."</option>";
        endwhile;
    }

}
