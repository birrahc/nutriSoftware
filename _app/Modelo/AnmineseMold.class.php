<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AnmineseMold
 *
 * @author Birra
 */
class AnmineseMold extends PessoaMold{
    Private $Id_Anminese;
    private $Objetivo;
    private $Diagnostico_medico;
    private $Exames;
    private $Medicamentos;
    private $Suplementos;
    private $Historico_familiar;
    private $Sinais_sintomas;
    private $Habito_intestinal;
    private $Tabagismo;
    private $Etilismo;
    private $Atividades_fisicas;
    
    
   

    function getObjetivo() {
        return $this->Objetivo;
    }

    function getDiagnostico_medico() {
        return $this->Diagnostico_medico;
    }

    function getExames() {
        return $this->Exames;
    }

    function getMedicamentos() {
        return $this->Medicamentos;
    }

    function getSuplementos() {
        return $this->Suplementos;
    }

    function getHistorico_familiar() {
        return $this->Historico_familiar;
    }

    function getSinais_sintomas() {
        return $this->Sinais_sintomas;
    }

    function getHabito_intestinal() {
        return $this->Habito_intestinal;
    }

    function getTabagismo() {
        return $this->Tabagismo;
    }

    function getEtilismo() {
        return $this->Etilismo;
    }

    function getAtividades_fisicas() {
        return $this->Atividades_fisicas;
    }
    
    function getId_Anminese() {
        return $this->Id_Anminese;
    }

    function setId_Anminese($Id_Anminese) {
        $this->Id_Anminese = $Id_Anminese;
    }


    function setObjetivo($Objetivo) {
        $this->Objetivo = $Objetivo;
    }

    function setDiagnostico_medico($Diagnostico_medico) {
        $this->Diagnostico_medico = $Diagnostico_medico;
    }

    function setExames($Exames) {
        $this->Exames = $Exames;
    }

    function setMedicamentos($Medicamentos) {
        $this->Medicamentos = $Medicamentos;
    }

    function setSuplementos($Suplementos) {
        $this->Suplementos = $Suplementos;
    }

    function setHistorico_familiar($Historico_familiar) {
        $this->Historico_familiar = $Historico_familiar;
    }

    function setSinais_sintomas($Sinais_sintomas) {
        $this->Sinais_sintomas = $Sinais_sintomas;
    }

    function setHabito_intestinal($Habito_intestinal) {
        $this->Habito_intestinal = $Habito_intestinal;
    }

    function setTabagismo($Tabagismo) {
        $this->Tabagismo = $Tabagismo;
    }

    function setEtilismo($Etilismo) {
        $this->Etilismo = $Etilismo;
    }

    function setAtividades_fisicas($Atividades_fisicas) {
        $this->Atividades_fisicas = $Atividades_fisicas;
    }
    
    
    public function ListaAnminese(AnmineseMold $anminese){
        $this->Tipo=1;
        $coluna5=['id_paciente'=>'id_paciente',
                  'id_anaminese'=>'id_anaminese',
                  'nome'=>'nome',
                  'objetivo'=>'objetivo',
                  'diagnostico_medico'=>'diagnostico_medico',
                  'exames'=>'exames',
                  'medicamentos'=>'medicamentos',
                  'suplementos'=>'suplementos',
                  'historico_familiar'=>'historico_familiar',
                  'sinais_sintomas'=>'sinais_sintomas',
                  'habito_intestinal'=>'habito_intestinal', 
                  'tabagismo'=>'tabagismo',
                  'etilismo'=>'etilismo', 
                  'Atividades_fisicas'=>'Atividades_fisicas'
                ];
             
            if($this->Tipo==1):
            
                $Termos5 ="inner join anaminese a on id_paciente = a.paciente where id_paciente='{$anminese->getId_Pessoa()}'";
            else:
                $Termos5 ="inner join anaminese a on id_paciente = a.paciente where id_anaminese='{$anminese->getId_Anminese()}'";
            endif;
            
        
        
        $ColumTable5 = [
                        'Objetivo' ,
                        'Diagnóstico Médico',
                        'Exames',
                        'Medicamentos',
                        'Historico Familiar',
                        'Sinais e Sintomas',
                        'Habitos Intestinais', 
                        'Tabagismo',
                        'Etilismo', 
                        'Atividades Fisicas'
                    ];
                    
       $this->ExRead("pacientes p", $coluna5, $Termos5, $ColumTable5, $this->Tipo);
    }
    
    public function Syntax() {
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
               $this->Id_Anminese=$col['id_anaminese'];
               $this->setId_Pessoa($col['id_paciente']);
               $this->setNome($col['nome']);
               $this->Objetivo=$col['objetivo'];
               $this->Diagnostico_medico=$col['diagnostico_medico'];
               $this->Exames=$col['exames'];
               $this->Medicamentos=$col['medicamentos'];
               $this->Suplementos=$col['suplementos'];
               $this->Historico_familiar=$col['historico_familiar'];
               $this->Sinais_sintomas=$col['sinais_sintomas'];
               $this->Habito_intestinal=$col['habito_intestinal'];
               $this->Tabagismo=$col['tabagismo'];
               $this->Etilismo=$col['etilismo'];
               $this->Atividades_fisicas=$col['Atividades_fisicas'];
           endwhile; 
           
        /*if($this->Tipo==1):
           while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
        echo"
                <input type='hidden' name='id_paciente' value='{$col['id_paciente']}'/>"
                . "<h3>{$col['nome']}</h3>";   
           endwhile; 
        */
        if($this->Tipo==1):
      echo"<tr>"      
            . "<td><b>Paciente:</b> {$this->getNome()}</td>"
        . "</tr>"
                                
        . "<tr>"
            . "<td><b>Objetivo:</b> {$this->getObjetivo()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Diagnostico Médico:</b> {$this->getDiagnostico_medico()}</td>"
        . "</tr>"
                    
        . "<tr>"
            . "<td><b>Exames:</b> {$this->getExames()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Medicamentos:</b> {$this->getMedicamentos()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Suplementos:</b> {$this->getSuplementos()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Histórico Familiar:</b> {$this->getHistorico_familiar()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Sinais e Sintomas:</b> {$this->getSinais_sintomas()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Habitos Intestinais:</b> {$this->getHabito_intestinal()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Tabagismo:</b> {$this->getTabagismo()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Etilismo:</b> {$this->getEtilismo()}</td>"
        . "</tr>"
                    
        . "<tr>"
            . "<td><b>Atividades Fisicas:</b> {$this->getAtividades_fisicas()}</td>"
        . "</tr>";
        endif;
    }
}
