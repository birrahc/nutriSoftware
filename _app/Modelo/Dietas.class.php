<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dietas
 *
 * @author birra
 */
class Dietas  extends Select{
    
    private $Id_dieta;
    private $Linha_campo;
    private $Dieta_numero;
    private $Plano_Alimentar;
    private $Paciente;
    private $Data_dieta;
    private $Hora_dieta;
    private $Alimento;
    private $Qtd_alimento;
    private $Substituicao;
    private $Qtd_substituicao;
    private $Intervalos;
    private $Qtd_intervalos;
    private $Anotacoes;
    
    function getId_dieta() {
        return $this->Id_dieta;
    }

    function getLinha_campo() {
        return $this->Linha_campo;
    }

    function getDieta_numero() {
        return $this->Dieta_numero;
    }

    function getPlano_Alimentar() {
        return $this->Plano_Alimentar;
    }

    function getPaciente() {
        return $this->Paciente;
    }

    function getData_dieta() {
        return $this->Data_dieta;
    }

    function getHora_dieta() {
        return $this->Hora_dieta;
    }

    function getAlimento() {
        return $this->Alimento;
    }

    function getQtd_alimento() {
        return $this->Qtd_alimento;
    }

    function getSubstituicao() {
        return $this->Substituicao;
    }

    function getQtd_substituicao() {
        return $this->Qtd_substituicao;
    }

    function getIntervalos() {
        return $this->Intervalos;
    }

    function getQtd_intervalos() {
        return $this->Qtd_intervalos;
    }

    function getAnotacoes() {
        return $this->Anotacoes;
    }

    function setId_dieta($Id_dieta) {
        $this->Id_dieta = $Id_dieta;
    }

    function setLinha_campo($Linha_campo) {
        $this->Linha_campo = $Linha_campo;
    }

    function setDieta_numero($Dieta_numero) {
        $this->Dieta_numero = $Dieta_numero;
    }

    function setPlano_Alimentar($Plano_Alimentar) {
        $this->Plano_Alimentar = $Plano_Alimentar;
    }

    function setPaciente($Paciente) {
        $this->Paciente = $Paciente;
    }

    function setData_dieta($Data_dieta) {
        $this->Data_dieta = $Data_dieta;
    }

    function setHora_dieta($Hora_dieta) {
        $this->Hora_dieta = $Hora_dieta;
    }

    function setAlimento($Alimento) {
        $this->Alimento = $Alimento;
    }

    function setQtd_alimento($Qtd_alimento) {
        $this->Qtd_alimento = $Qtd_alimento;
    }

    function setSubstituicao($Substituicao) {
        $this->Substituicao = $Substituicao;
    }

    function setQtd_substituicao($Qtd_substituicao) {
        $this->Qtd_substituicao = $Qtd_substituicao;
    }

    function setIntervalos($Intervalos) {
        $this->Intervalos = $Intervalos;
    }

    function setQtd_intervalos($Qtd_intervalos) {
        $this->Qtd_intervalos = $Qtd_intervalos;
    }

    function setAnotacoes($Anotacoes) {
        $this->Anotacoes = $Anotacoes;
    }

        public function Syntax() {
        
    }

}
