<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AvaliacaoAntrometrica
 *
 * @author Birra
 */
class AvaliacaoAntrometrica {
    private $Id_Avaliacao;
    private $Id_Paciente;
    private $Avaliacao;
    private $DataAvalicao;
    private $Peso;
    private $C_Cintura;
    private $C_Abdominal;
    private $C_Quadril;
    private $C_Peito;
    private $C_Braco_D;
    private $C_Braco_E;
    private $C_Coxa_D;
    private $C_Coxa_E;
    private $Dc_Triceps;
    private $Dc_Escapular;
    private $Dc_Supra_Iliaca;
    private $Dc_Abdominal;
    private $Dc_Axilar;
    private $Dc_Peitoral;
    private $Dc_Coxa;
    private $Percentual_Gordura;
    private $M_Muscular;
    private $Gordura;
    
    function getId_Avaliacao() {
        return $this->Id_Avaliacao;
    }

                
    function getId_Paciente() {
        return $this->Id_Paciente;
    }
    
    function getAvaliacao() {
        return $this->Avaliacao;
    }

    
    function getDataAvalicao() {
        return $this->DataAvalicao;
    }

    function getPeso() {
        return $this->Peso;
    }

    function getC_Cintura() {
        return $this->C_Cintura;
    }

    function getC_Abdominal() {
        return $this->C_Abdominal;
    }

    function getC_Quadril() {
        return $this->C_Quadril;
    }

    function getC_Peito() {
        return $this->C_Peito;
    }

    function getC_Braco_D() {
        return $this->C_Braco_D;
    }

    function getC_Braco_E() {
        return $this->C_Braco_E;
    }

    function getC_Coxa_D() {
        return $this->C_Coxa_D;
    }

    function getC_Coxa_E() {
        return $this->C_Coxa_E;
    }

    function getDc_Triceps() {
        return $this->Dc_Triceps;
    }

    function getDc_Escapular() {
        return $this->Dc_Escapular;
    }

    function getDc_Supra_Iliaca() {
        return $this->Dc_Supra_Iliaca;
    }

    function getDc_Abdominal() {
        return $this->Dc_Abdominal;
    }

    function getDc_Axilar() {
        return $this->Dc_Axilar;
    }

    function getDc_Peitoral() {
        return $this->Dc_Peitoral;
    }

    function getDc_Coxa() {
        return $this->Dc_Coxa;
    }

    function getPercentual_Gordura() {
        return $this->Percentual_Gordura;
    }

    function getM_Muscular() {
        return $this->M_Muscular;
    }

    function getGordura() {
        return $this->Gordura;
    }
    
    function setId_Avaliacao($Id_Avaliacao) {
        $this->Id_Avaliacao = $Id_Avaliacao;
    }

    
    function setId_Paciente($Id_Paciente) {
        $this->Id_Paciente =((int) $Id_Paciente ? $Id_Paciente:'Somente Numeros');
    }
    
    function setAvaliacao($Avaliacao) {
        $this->Avaliacao = ((int) $Avaliacao ? $Avaliacao:'Somente Numeros');
    }

    
    function setDataAvalicao($DataAvalicao) {
        $this->DataAvalicao = $DataAvalicao;
    }

    function setPeso($Peso) {
        $this->Peso = ((float) $Peso ? $Peso:'Somente Numeros');
    }

    function setC_Cintura($C_Cintura) {
        $this->C_Cintura = ((float) $C_Cintura ? $C_Cintura:'Somente Numeros');
    }

    function setC_Abdominal($C_Abdominal) {
        $this->C_Abdominal = ((float) $C_Abdominal ? $C_Abdominal:'Somente Numeros');
    }

    function setC_Quadril($C_Quadril) {
        $this->C_Quadril = ((float) $C_Quadril ? $C_Quadril:'Somente Numeros');
    }

    function setC_Peito($C_Peito) {
        $this->C_Peito = ((float) $C_Peito ? $C_Peito:'Somente Numeros');
    }

    function setC_Braco_D($C_Braco_D) {
        $this->C_Braco_D = ((float) $C_Braco_D ? $C_Braco_D:'Somente Numeros');
    }

    function setC_Braco_E($C_Braco_E) {
        $this->C_Braco_E = ((float) $C_Braco_E ? $C_Braco_E:'Somente Numeros');
    }

    function setC_Coxa_D($C_Coxa_D) {
        $this->C_Coxa_D = ((float) $C_Coxa_D ? $C_Coxa_D:'Somente Numeros');
    }

    function setC_Coxa_E($C_Coxa_E) {
        $this->C_Coxa_E = ((float) $C_Coxa_E ? $C_Coxa_E:'Somente Numeros');
    }

    function setDc_Triceps($Dc_Triceps) {
        $this->Dc_Triceps = ((float) $Dc_Triceps ? $Dc_Triceps:'Somente Numeros');
    }

    function setDc_Escapular($Dc_Escapular) {
        $this->Dc_Escapular = ((float) $Dc_Escapular ? $Dc_Escapular:'Somente Numeros');
    }

    function setDc_Supra_Iliaca($Dc_Supra_Iliaca) {
        $this->Dc_Supra_Iliaca = ((float) $Dc_Supra_Iliaca ? $Dc_Supra_Iliaca:'Somente Numeros');
    }

    function setDc_Abdominal($Dc_Abdominal) {
        $this->Dc_Abdominal = ((float) $Dc_Abdominal ? $Dc_Abdominal:'Somente Numeros');
    }

    function setDc_Axilar($Dc_Axilar) {
        $this->Dc_Axilar = ((float) $Dc_Axilar ? $Dc_Axilar:'Somente Numeros');
    }

    function setDc_Peitoral($Dc_Peitoral) {
        $this->Dc_Peitoral = ((float) $Dc_Peitoral ? $Dc_Peitoral:'Somente Numeros');
    }

    function setDc_Coxa($Dc_Coxa) {
        $this->Dc_Coxa = ((float) $Dc_Coxa ? $Dc_Coxa:'Somente Numeros');
    }

    function setPercentual_Gordura($Percentual_Gordura) {
        $this->Percentual_Gordura = ((float) $Percentual_Gordura ? $Percentual_Gordura:'Somente Numeros');
    }

    function setM_Muscular($M_Muscular) {
        $this->M_Muscular = ((float) $M_Muscular ? $M_Muscular:'Somente Numeros');
    }

    function setGordura($Gordura) {
        $this->Gordura = ((float) $Gordura ? $Gordura:'Somente Numeros');
    }


}
