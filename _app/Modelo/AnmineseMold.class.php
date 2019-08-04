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
    private $Cod_Doenca;
    Private $Cod_Atividade;
    private $Cod_Habito;
    private $Objetivo;
    private $Diagnostico_medico;
    private $Obs_Diag_medico;
    private $Exames;
    private $Obs_exames;
    private $Medicamentos;
    private $Obs_medicamentos;
    private $Suplementos;
    private $Obs_Suplementos;
    private $Historico_familiar;
    private $Obs_hist_familiar;
    private $Sinais_sintomas;
    private $Obs_Sinais_Sintomas;
    private $Habito_intestinal;
    private $Obs_Habit_int;
    private $Tabagismo;
    private $Obs_Tabagismo;
    private $Etilismo;
    private $Obs_Etilismo;
    private $Atividades_fisicas;
    private $Obs_Atividades_Fisicas;
            
    
   

    function getObjetivo() {
        return $this->Objetivo;
    }

    function getDiagnostico_medico() {
        return $this->Diagnostico_medico;
    }
    
    function getObs_Diag_medico() {
        return $this->Obs_Diag_medico;
    }

    function getExames() {
        return $this->Exames;
    }
    
    function getObs_exames() {
        return $this->Obs_exames;
    }

    
    function getMedicamentos() {
        return $this->Medicamentos;
    }
    
    function getObs_medicamentos() {
        return $this->Obs_medicamentos;
    }

    function getSuplementos() {
        return $this->Suplementos;
    }
    
    function getObs_Suplementos() {
        return $this->Obs_Suplementos;
    }
    
    function getHistorico_familiar() {
        return $this->Historico_familiar;
    }
    
    function getObs_hist_familiar() {
        return $this->Obs_hist_familiar;
    }

    function getSinais_sintomas() {
        return $this->Sinais_sintomas;
    }
    
    function getObs_Sinais_Sintomas() {
        return $this->Obs_Sinais_Sintomas;
    }

    
    function getHabito_intestinal() {
        return $this->Habito_intestinal;
    }
    
    function getObs_Habit_int() {
        return $this->Obs_Habit_int;
    }

    
    function getTabagismo() {
        return $this->Tabagismo;
    }
    
    function getObs_Tabagismo() {
        return $this->Obs_Tabagismo;
    }

    
    function getEtilismo() {
        return $this->Etilismo;
    }
    
    function getObs_Etilismo() {
        return $this->Obs_Etilismo;
    }

    
    function getAtividades_fisicas() {
        return $this->Atividades_fisicas;
    }
    
    function getObs_Atividades_Fisicas() {
        return $this->Obs_Atividades_Fisicas;
    }

    function getId_Anminese() {
        return $this->Id_Anminese;
    }
    
    function getCod_Habito() {
        return $this->Cod_Habito;
    }

    function setCod_Habito($Cod_Habito) {
        $this->Cod_Habito = $Cod_Habito;
    }

    
    function setId_Anminese($Id_Anminese) {
        $this->Id_Anminese = $Id_Anminese;
    }
    
    function getCod_Doenca() {
        return $this->Cod_Doenca;
    }

    function getCod_Atividade() {
        return $this->Cod_Atividade;
    }

    function setCod_Doenca($Cod_Doenca) {
        $this->Cod_Doenca = $Cod_Doenca;
    }

    function setCod_Atividade($Cod_Atividade) {
        $this->Cod_Atividade = $Cod_Atividade;
    }

    
    function setObjetivo($Objetivo) {
        $this->Objetivo = $Objetivo;
    }

    function setDiagnostico_medico($Diagnostico_medico) {
        $this->Diagnostico_medico = $Diagnostico_medico;
    }
    
    function setObs_Diag_medico($Obs_Diag_medico) {
        $this->Obs_Diag_medico = $Obs_Diag_medico;
    }

    
    function setExames($Exames) {
        $this->Exames = $Exames;
    }
    
    function setObs_exames($Obs_exames) {
        $this->Obs_exames = $Obs_exames;
    }

    
    function setMedicamentos($Medicamentos) {
        $this->Medicamentos = $Medicamentos;
    }
    
    function setObs_medicamentos($Obs_medicamentos) {
        $this->Obs_medicamentos = $Obs_medicamentos;
    }

    function setSuplementos($Suplementos) {
        $this->Suplementos = $Suplementos;
    }
    
    function setObs_Suplementos($Obs_Suplementos) {
        $this->Obs_Suplementos = $Obs_Suplementos;
    }

    function setHistorico_familiar($Historico_familiar) {
        $this->Historico_familiar = $Historico_familiar;
    }
    
    function setObs_hist_familiar($Obs_hist_familiar) {
        $this->Obs_hist_familiar = $Obs_hist_familiar;
    }

    function setSinais_sintomas($Sinais_sintomas) {
        $this->Sinais_sintomas = $Sinais_sintomas;
    }
    
    function setObs_Sinais_Sintomas($Obs_Sinais_Sintomas) {
        $this->Obs_Sinais_Sintomas = $Obs_Sinais_Sintomas;
    }

    function setHabito_intestinal($Habito_intestinal) {
        $this->Habito_intestinal = $Habito_intestinal;
    }
    
    function setObs_Habit_int($Obs_Habit_int) {
        $this->Obs_Habit_int = $Obs_Habit_int;
    }

    function setTabagismo($Tabagismo) {
        $this->Tabagismo = $Tabagismo;
    }
    
    function setObs_Tabagismo($Obs_Tabagismo) {
        $this->Obs_Tabagismo = $Obs_Tabagismo;
    }

    function setEtilismo($Etilismo) {
        $this->Etilismo = $Etilismo;
    }
    
    function setObs_Etilismo($Obs_Etilismo) {
        $this->Obs_Etilismo = $Obs_Etilismo;
    }

    function setAtividades_fisicas($Atividades_fisicas) {
        $this->Atividades_fisicas = $Atividades_fisicas;
    }
    
    function setObs_Atividades_Fisicas($Obs_Atividades_Fisicas) {
        $this->Obs_Atividades_Fisicas = $Obs_Atividades_Fisicas;
    }

    public function ListaAnminese(AnmineseMold $anminese,$tipo){
        $this->Tipo=$tipo;
        $coluna5=['id_paciente'=>'id_paciente',
                  'id_anaminese'=>'id_anaminese',
                  'id_doenca'=>'diagnostico.id_doenca',
                  'id_doenca'=>'historico.id_doenca',
                  'id_atividade'=>'atividades.id_atividade',
                  'id_habito'=>'habito_intestinal.id_habito',
                  'nome'=>'p.nome',
                  'objetivo'=>'objetivo',
                  'diagnostico_medico'=>'diagnostico.doenca as diagnostico_medico',
                  'obs_diag_medico'=>'obs_diag_medico',
                  'exames'=>'exames.afirmacao as exames',
                  'obs_exames'=>'obs_exames',
                  'medicamentos'=>'medicamentos.afirmacao as medicamentos',
                  'obs_medicamentos'=>'obs_medicamentos',
                  'suplementos'=>'suplementos.afirmacao as suplementos',
                  'obs_suplementos'=>'obs_suplementos',
                  'historico_familiar'=>'historico.doenca as historico_familiar',
                  'obs_hist_familiar'=>'obs_hist_familiar',
                  'sinais_sintomas'=>'sinais_sintomas.afirmacao as sinais_sintomas',
                  'obs_sinais_sintomas'=>'obs_sinais_sintomas',
                  'habito_intestinal'=>'habito_intestinal.quantidade as habito_intestinal', 
                  'obs_hab_intestinal'=>'obs_hab_intestinal',
                  'tabagismo'=>'tabagismo.afirmacao as tabagismo',
                  'obs_tabagismo'=>'obs_tabagismo',
                  'etilismo'=>'etilismo.afirmacao as etilismo',
                  'obs_etilismo'=>'obs_etilismo',
                  'Atividades_fisicas'=>'atividades.atividade as Atividades_fisicas',
                  'obs_atividades'=>'obs_atividades'
                ];
             
            if($this->Tipo==1 || $this->Tipo==0):
            
                $Termos5 ="inner join pacientes p on paciente = p.id_paciente
                        inner join doencas diagnostico on diagnostico_medico = diagnostico.id_doenca
                        inner join afirmacao exames on exames = exames.id_afirmacao
                        inner join afirmacao medicamentos on medicamentos = medicamentos.id_afirmacao
                        inner join afirmacao suplementos on suplementos = suplementos.id_afirmacao
                        inner join doencas historico on historico_familiar = historico.id_doenca
                        inner join afirmacao sinais_sintomas on sinais_sintomas = sinais_sintomas.id_afirmacao
                        inner join habitos habito_intestinal on  habito_intestinal = habito_intestinal.id_habito
                        inner join afirmacao tabagismo on tabagismo = tabagismo.id_afirmacao
                        inner join atividades_fisicas atividades on Atividades_fisicas = atividades.id_atividade
                        inner join afirmacao etilismo on etilismo = etilismo.id_afirmacao 
                        where id_paciente='{$anminese->getId_Pessoa()}'";
            else:
                $Termos5 ="inner join pacientes p on paciente = p.id_paciente
                            inner join doencas diagnostico on diagnostico_medico = diagnostico.id_doenca
                            inner join afirmacao exames on exames = exames.id_afirmacao
                            inner join afirmacao medicamentos on medicamentos = medicamentos.id_afirmacao
                            inner join afirmacao suplementos on suplementos = suplementos.id_afirmacao
                            inner join doencas historico on historico_familiar = historico.id_doenca
                            inner join afirmacao sinais_sintomas on sinais_sintomas = sinais_sintomas.id_afirmacao
                            inner join habitos habito_intestinal on  habito_intestinal = habito_intestinal.id_habito
                            inner join afirmacao tabagismo on tabagismo = tabagismo.id_afirmacao
                            inner join atividades_fisicas atividades on Atividades_fisicas = atividades.id_atividade
                            inner join afirmacao etilismo on etilismo = etilismo.id_afirmacao 
                            where id_anaminese='{$anminese->getId_Anminese()}'";
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
                    
       $this->ExRead("anaminese", $coluna5, $Termos5, $ColumTable5, $this->Tipo);
    }
    
    public function Syntax() {
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
               $this->Cod_Doenca=$col['id_doenca'];
               $this->Cod_Atividade=$col['id_atividade'];
               $this->Cod_Habito=$col['id_habito'];
               $this->Id_Anminese=$col['id_anaminese'];
               $this->setId_Pessoa($col['id_paciente']);
               $this->setNome($col['nome']);
               $this->Objetivo=$col['objetivo'];
               $this->Diagnostico_medico=$col['diagnostico_medico'];
               $this->Obs_Diag_medico=$col['obs_diag_medico'];
               $this->Exames=$col['exames'];
               $this->Obs_exames=$col['obs_exames'];
               $this->Medicamentos=$col['medicamentos'];
               $this->Obs_medicamentos=$col['obs_medicamentos'];
               $this->Suplementos=$col['suplementos'];
               $this->Obs_Suplementos=$col['obs_suplementos'];
               $this->Historico_familiar=$col['historico_familiar'];
               $this->Obs_hist_familiar=$col['obs_hist_familiar'];
               $this->Sinais_sintomas=$col['sinais_sintomas'];
               $this->Obs_Sinais_Sintomas = $col['obs_sinais_sintomas'];
               $this->Habito_intestinal=$col['habito_intestinal'];
               $this->Obs_Habit_int=$col['obs_hab_intestinal'];
               $this->Tabagismo=$col['tabagismo'];
               $this->Obs_Tabagismo=$col['obs_tabagismo'];
               $this->Etilismo=$col['etilismo'];
               $this->Obs_Etilismo=$col['obs_etilismo'];
               $this->Atividades_fisicas=$col['Atividades_fisicas'];
               $this->Obs_Atividades_Fisicas=$col['obs_atividades'];
           endwhile; 
           
        
    if($this->Tipo==1):
      echo"<tr>"      
            . "<td colspan='2'><b>Paciente:</b> {$this->getNome()}</td>"
        . "</tr>"
                                
        . "<tr>"
            . "<td colspan='2'><b>Objetivo:</b> {$this->getObjetivo()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Diagnostico Médico:</b> {$this->getDiagnostico_medico()}</td>"
            . "<td><b>Obs:</b> {$this->getObs_Diag_medico()}</td>"
        . "</tr>"
                    
        . "<tr>"
            . "<td><b>Exames:</b> {$this->getExames()}</td>"
            . "<td><b>Obs:</b> {$this->getObs_exames()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Medicamentos:</b> {$this->getMedicamentos()}</td>"
            . "<td><b>Obs:</b> {$this->getObs_medicamentos()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Suplementos:</b> {$this->getSuplementos()}</td>"
            . "<td><b>Obs:</b> {$this->getObs_Suplementos()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Histórico Familiar:</b> {$this->getHistorico_familiar()}</td>"
            . "<td><b>Obs:</b> {$this->getObs_hist_familiar()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Sinais e Sintomas:</b> {$this->getSinais_sintomas()}</td>"
            . "<td><b>Obs:</b> {$this->getObs_Sinais_Sintomas()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Habitos Intestinais:</b> {$this->getHabito_intestinal()}</td>"
            . "<td><b>Obs:</b> {$this->getObs_Habit_int()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Tabagismo:</b> {$this->getTabagismo()}</td>"
            . "<td><b>Obs:</b> {$this->getObs_Tabagismo()}</td>"
        . "</tr>"
                              
        . "<tr>"
            . "<td><b>Etilismo:</b> {$this->getEtilismo()}</td>"
            . "<td><b>Obs:</b> {$this->getObs_Etilismo()}</td>"
        . "</tr>"
                    
        . "<tr>"
            . "<td><b>Atividades Fisicas:</b> {$this->getAtividades_fisicas()}</td>"
            . "<td><b>Obs:</b> {$this->getObs_Atividades_Fisicas()}</td>"
        . "</tr>";
        endif;
    }
}
