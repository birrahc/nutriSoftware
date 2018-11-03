<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlimentosMold
 *
 * @author Birra
 */
class AlimentosMold extends Select{
     private $Cod_local;
    private $Local_Almoco;
    private $Conectar;
    private $Selecinar;
    private $conect;
            
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
    
    public function Alimentos(AlimentosMold $alimento) {
      
    
    if(!isset ($_SESSION['alimentos']) ){					
        $_SESSION['alimentos']= array();
    }						
    $id= $alimento->getCod_local();					
    if(!isset ($_SESSION['alimentos'][$id]) ){		
        $_SESSION['alimentos'][$id]=0;				
    }else{									
	$_SESSION['alimentos'][$id]+=1;	
	}
        foreach ($_SESSION['alimentos']as $id => $qtd):
            $this->Selecinar= "SELECT * FROM local_almoco WHERE id_local_alm = {$id}";
            $this->Conectar= parent::getConn();
            $this->conect = $this->Conectar->query($this->Selecinar);
            $col = $this->conect->fetch(PDO::FETCH_ASSOC);
           
            $col['id_local_alm'];
            $col['local_almoco'];
             if(!empty($col)):
            echo"<br/>Local:  {$col['local_almoco']}";
        endif;
            
            
        endforeach;
       
      
    }
    public function Syntax() {
    
        
        
            
           
    }

}
