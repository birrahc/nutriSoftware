<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Observacao
 *
 * @author birra
 */
class Observacao extends PessoaMold{
    private $id_Obs;
    private $data_obs;
    private $search;
    private $Observacao;
    
    function getId_Obs() {
        return $this->id_Obs;
    }

    function setId_Obs($id_Obs) {
        $this->id_Obs = $id_Obs;
    }
    
    function getData_obs() {
        return $this->data_obs;
    }

    function setData_obs($data_obs) {
        $this->data_obs = $data_obs;
    }

        
    function getSearch() {
        return $this->search;
    }

    function setSearch($search) {
        $this->search = $search;
    }

    
        
    function getObservacao() {
        return $this->Observacao;
    }

    function setObservacao($Observacao) {
        $this->Observacao = $Observacao;
    }
    
    public function listaObservacao(Observacao $obs){
        $coluna = ['id_observacao'=>'id_observacao',
                   'data_obs'=>'data_obs',
                   'paciente_obs'=>'paciente_obs',
                   'obs'=>'obs'
                   ];
        $ColumTable=[];
        if($obs->getSearch()):
            $Termos = " where id_observacao like '{$obs->getSearch()}' ";
            $this->setSearch($obs->getSearch());
        else:
            $Termos = " where paciente_obs ={$obs->getId_Pessoa()} "
        . "ORDER BY  id_observacao Desc ";
        endif;
        
        
        $this->ExRead('observacao', $coluna, $Termos, $ColumTable);
        //var_dump($obs, $Termos);
    }
    
    public function obsEdit(Observacao $obs){
        $coluna = ['id_observacao'=>'id_observacao',
                   'data_obs'=>'data_obs',
                   'paciente_obs'=>'paciente_obs',
                   'obs'=>'obs'
                   ];
        $ColumTable=[];
        
        $Termos = "where id_observacao ={$obs->getId_Obs()}";
        
        $this->ExRead('observacao', $coluna, $Termos, $ColumTable);
    }

        public function Syntax() {
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                   $this->setId_Obs($col['id_observacao']);
                   $this->setId_Pessoa($col['paciente_obs']);
                   $this->setObservacao($col['obs']);
                   $this->setData_obs($col['data_obs']);
                   //$this->setObservacao($_POST['ObsEsp']);
         
                   echo"<div class='w-100 bg-white mt-1 p-1 bdr-5'>"
                   . "<p class='pl-1 fs-13'>Data: ".date('d/m/Y', strtotime($this->getData_obs()))."</p>"
                   . "<p class='pl-1 fs-13'>{$this->getObservacao()}</p>"
                        . "<div class='d-inline-block m-2 bg-none'>";
                                if($this->getSearch()):
                                    
                                   echo "<form method='POST'>"
                                        . "<input type='hidden' name='ObsEsp' value=''/>"
                                        . "<button type='submit' class='text-center w-100 delete-aval'>"
                                                . "<img src='icons-main/icons/arrow-return-left.svg' alt='Voltar' width='15' height='15' title='Voltar'>"
                                        . "</button>"
                                  . "</form>";
                                else:
                                    echo "<form method='POST'>"
                                        . "<input type='hidden' name='ObsEsp' value='{$this->getId_Obs()}'/>"
                                        . "<button type='submit' class='text-center w-100 delete-aval'>"
                                                . "<img src='icons-main/icons/eye-fill.svg' alt='Visualizar' width='20' height='20' title='Visualizar'>"
                                        . "</button>"
                                  . "</form>";
                               endif;
                               
                        echo "</div>";
                        if($this->getSearch()):
                        echo "<div class='d-inline-block m-2 bg-none'> "
                                . "<a href='pacientes.php?id_observacao={$this->getId_Obs()}' class=' text-center w-100 delete-aval' data-toggle='modal' data-target='#modalEditObs'>"
                                     . "<img src='icons-main/icons/pencil-square.svg' alt='Editar' width='15' height='15' title='Editar'>"
                                . "</a>"
                            . "</div>";
                         endif;
                        echo "<div class='d-inline-block m-2 bg-none'>"
                           . "<form name='#' action='excluirdados.php' method='POST'>"
                                ."<input type='hidden' name='ex_idobs' value='{$this->getId_Obs()}'/>"
                                ."<input type='hidden' name='tipoexc' value='6'/>"
                                ."<input type='hidden' name='pac' value='{$this->getId_Pessoa()}'/>"
                                . "<button type='submit' class='text-center w-100 delete-aval'><img src='icons-main/icons/x-circle-fill.svg' alt='Deletar' width='15' height='15' title='Deletar'></a></button>"
                            . "</form>"
                        . "</div>";
                       
                    echo "</div>";
                
        endwhile;
    }
    //put your code here
}

