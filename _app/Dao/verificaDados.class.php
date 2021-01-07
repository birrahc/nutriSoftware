<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of verificaDados
 *
 * @author birra
 */
class verificaDados {
   
    public function checkedCpf(PacienteMold $cpf){
        $Termos=" where cpf={$cpf->getCpf()}";
        $cpf->checkedDada($Termos, "checked");
    }
    
    public function checkedEmail(PacienteMold $email){
        $Termos=" where email='{$email->getEmail()}'";
        $email->checkedDada($Termos, "checked");
    }
}
