<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuantidadeMedida
 *
 * @author birra
 */
class QuantidadeMedida extends Select{
    
    private $IdQtd;
    private $DescQtd;

    function getIdQtd() {
        return $this->IdQtd;
    }

    function getDescQtd() {
        return $this->DescQtd;
    }

    function setIdQtd($IdQtd) {
        $this->IdQtd = $IdQtd;
    }

    function setDescQtd($DescQtd) {
        $this->DescQtd = $DescQtd;
    }
    
    public function Especifico($id) {
        $this->Tipo=1;
        $coluna6=[
            'id_qtd'=>'id_qtd',
            'desq_qtd'=>'desq_qtd',
        ];
        $Termos6="where id_qtd ={$id}";
        $ColumTable6=[];
        $this->ExRead("qtd_medidas", $coluna6, $Termos6, $ColumTable6, $this->Tipo);
    }      

    public function listaQtdMedida() {
        
        $coluna6=[
            'id_qtd'=>'id_qtd',
            'desq_qtd'=>'desq_qtd',
        ];
        $Termos6="";
        $ColumTable6=[];
        $this->ExRead("qtd_medidas", $coluna6, $Termos6, $ColumTable6);
    }        
    
    
    public function Syntax(){
         while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
           
            $this->IdQtd = $col['id_qtd'];
            $this->DescQtd = $col['desq_qtd'];
                if($this->Tipo < 1 || $this->Tipo==null ){
                     echo"<option value='{$this->getIdQtd()}'>{$this->getDescQtd()}</option>";
                }
                

            
            
            
        endwhile;
    }

}
