<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BioImpedancia
 *
 * @author Birra
 */
class BioImpedancia extends PessoaMold{
    
    private $Id_bio;
    Private $Consulta_bio;
    private $Data_bio;
    private $Peso_bio;
    private $Imc;
    private $Perc_gord_corp;
    private $Perc_musc_esq;
    private $Metabolismo_basal;
    private $Idade_corporal;
    private $Gordura_viceral;
    
    function __construct() {
        $this->Coluna = ['id_bio' => 'id_bio',
            'id_paciente' => 'id_paciente',
            'paciente_bio'=>'paciente_bio',
            'nome' => 'p.nome',
            'data_nascimento'=>'p.data_nascimento',
            'altura'=>'p.altura',
            's.sexo'=>'s.sexo as sexo',
            'consulta_bio' => 'consulta_bio',
            'data_bio' => 'data_bio',
            'peso_bio' => 'peso_bio',
            'imc_bio' => 'imc_bio',
            'perc_gord_corp' => 'perc_gord_corp',
            'perc_musc_esq' => 'perc_musc_esq',
            'met_basal' => 'met_basal',
            'idade_corpoaral' => 'idade_corpoaral',
            'gord_viceral' => 'gord_viceral'
            
            ];
        
            $this->Table = [];
    }
    
    function getId_bio() {
        return $this->Id_bio;
    }
    
    function getConsulta_bio() {
        return $this->Consulta_bio;
    }

    function getData_bio() {
        return $this->Data_bio;
    }
    
        
    function getPeso_bio() {
        return $this->Peso_bio;
    }

    function getImc() {
        return $this->Imc;
    }

    function getPerc_gord_corp() {
        return $this->Perc_gord_corp;
    }

    function getPerc_musc_esq() {
        return $this->Perc_musc_esq;
    }

    function getMetabolismo_basal() {
        return $this->Metabolismo_basal;
    }

    function getIdade_corporal() {
        return $this->Idade_corporal;
    }

    function getGordura_viceral() {
        return $this->Gordura_viceral;
    }
    
    function setId_bio($Id_bio) {
        $this->Id_bio = $Id_bio;
    }
    
    function setConsulta_bio($Consulta_bio) {
        $this->Consulta_bio = $Consulta_bio;
    }

    function setData_bio($Data_bio) {
        $this->Data_bio = $Data_bio;
    }

        
    function setPeso_bio($Peso_bio) {
        $this->Peso_bio = $Peso_bio;
    }

    function setImc($Imc) {
        $this->Imc = $Imc;
    }

    function setPerc_gord_corp($Perc_gord_corp) {
        $this->Perc_gord_corp = $Perc_gord_corp;
    }

    function setPerc_musc_esq($Perc_musc_esq) {
        $this->Perc_musc_esq = $Perc_musc_esq;
    }

    function setMetabolismo_basal($Metabolismo_basal) {
        $this->Metabolismo_basal = $Metabolismo_basal;
    }

    function setIdade_corporal($Idade_corporal) {
        $this->Idade_corporal = $Idade_corporal;
    }

    function setGordura_viceral($Gordura_viceral) {
        $this->Gordura_viceral = $Gordura_viceral;
    }
    
    public function VerificaConsultaBio(BioImpedancia $paciente) {
        
        $Termos = "inner join pacientes p on b.paciente_bio = p.id_paciente "
                . "inner join sexo s on p.sexo= s.id_sexo where paciente='{$paciente->getId_Pessoa()}'";
        $this->ExRead("bioimp b", $this->Coluna, $Termos, $this->Table,8);
    }
    
    public function ListaBioImpedancia(BioImpedancia $paciente,$tipo) {
        $this->Tipo=$tipo;
        $Termos = "inner join bioimp b on p.id_paciente=b.paciente_bio
                    inner join sexo s on p.sexo= s.id_sexo 
                    where id_paciente='{$paciente->getId_Pessoa()}'
					ORDER BY data_bio ASC";
                    
        $this->ExRead("pacientes p", $this->Coluna, $Termos, $this->Table, $this->Tipo);
    }
    
    public function BioImpedanciaEspecifica(BioImpedancia $Bio) {
        $Termos = "inner join pacientes p on b.paciente_bio= p.id_paciente "
                . "inner join sexo s on p.sexo = s.id_sexo where id_bio='{$Bio->getId_bio()}'
				ORDER BY data_bio ASC";
        $this->ExRead("bioimp b", $this->Coluna, $Termos, $this->Table);
    }

    
    public function Syntax() {
        while ($linha = $this->Read_22->fetch(PDO::FETCH_ASSOC)):
            $this->Id_bio = $linha['id_bio'];
            $this->setId_Pessoa($linha['paciente_bio']);
            $this->setNome($linha['nome']);
            $this->setData_Nascimento($linha['data_nascimento']);
            $this->setIdade($linha['data_nascimento']);
            $this->setAltura($linha['altura']);
            $this->setSexo($linha['sexo']);
            $this->Consulta_bio = $linha['consulta_bio'];
            $this->Data_bio = $linha['data_bio'];
            $this->Peso_bio = $linha['peso_bio'];
            $this->Imc = $linha['imc_bio'];
            $this->Perc_gord_corp = $linha['perc_gord_corp'];
            $this->Perc_musc_esq = $linha['perc_musc_esq'];
            $this->Metabolismo_basal = $linha['met_basal'];
            $this->Idade_corporal = $linha['idade_corpoaral'];
            $this->Gordura_viceral = $linha['gord_viceral'];
            
        endwhile;
        
       
        if($this->Tipo==1):
        echo"<table border='0'>"
            . "<tr>";
                    while ($linha = $this->Read_1->fetch(PDO::FETCH_ASSOC)) {
                        echo "<td><a href='#?co_bio={$this->getId_bio()}&idpac={$this->getId_Pessoa()}'>". date('d/m/Y', strtotime($linha['data_bio'])) ."</a></td>";
                        
                    }
                    
            echo"</tr>";
            
            
            echo"<tr>";
                    while ($linha = $this->Read_2->fetch(PDO::FETCH_ASSOC)) {
                       
                        echo "<td>{$linha['peso_bio']}</td>";
                    }
            echo"</tr>";
            
            echo"<tr>";
                    while ($linha = $this->Read_3->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$linha['imc_bio']}</td>";
                    }
            echo"</tr>";

            echo"<tr>";
                    while ($linha = $this->Read_4->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$linha['perc_gord_corp']}</td>";
                    }
            echo"</tr>";

            echo"<tr>";
                    while ($linha = $this->Read_5->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$linha['perc_musc_esq']}</td>";
                    }
            echo"</tr>";

            echo"<tr>";
                    while ($linha = $this->Read_6->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$linha['met_basal']}</td>";
                    }
            echo"</tr>";
            
            echo"<tr>";
                    while ($linha = $this->Read_7->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$linha['idade_corpoaral']}</td>";
                    }
            echo"</tr>";  

            echo"<tr>";
                    while ($linha = $this->Read_8->fetch(PDO::FETCH_ASSOC)) {
                        echo"<td>{$linha['gord_viceral']}</td>";
                    }
            echo"</tr>";
            
            echo"</table>"; 
            
        elseif($this->Tipo==8):
                       
            $this->Consulta_bio=1;           
            while ($linha = $this->Read_23->fetch(PDO::FETCH_ASSOC)) {
                
                $linha['consulta_bio'];
                $linha['paciente'];
                
                if($this->getId_Pessoa()>0):
                    $this->Consulta= $linha['consulta_bio']+1;
                else:
                      
                
                endif;
                    }
                 $this->getConsulta_bio();
       
        endif;
         
    }
    


}
