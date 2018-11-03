<?php


/**
  * @author Birra
 */
class Anminese {
    private $CodPaciente;
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
    
    
    function getCodPaciente() {
        return $this->CodPaciente;
    }

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

    
    function setCodPaciente($CodPaciente) {
        $this->CodPaciente = $CodPaciente;
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


}
