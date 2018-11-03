<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Consumos
 *
 * @author Birra
 */
class Consumos {
    private $CodPaciente;
    private $Id_Consumos;
    private $Agua;
    private $Obs_Agua;
    private $Sucos;
    private $Obs_Sucos;
    private $Durante_Refeicoes;
    private $Obs_d_Refeicoes;
    private $Sal;
    private $Obs_Sal;
    private $acucares;
    private $Obs_Acucares;
    private $Sodio;
    private $Obs_Sodio;
    private $Refrigerantes;
    private $Obs_Refrigerantes;
    private $Cereais;
    private $Obs_Cereais;
    private $Frutas;
    private $Obs_Frutas;
    private $Verduras;
    private $Obs_Verduras;
    private $Local_Amoco;
    private $Preferencias;
    private $Aversao;
    
    function getCodPaciente() {
        return $this->CodPaciente;
    }

        function getAnaminese() {
        return $this->Anaminese;
    }

    function getAgua() {
        return $this->Agua;
    }
    
    
    function getSucos() {
        return $this->Sucos;
    }

   

    function getDurante_Refeicoes() {
        return $this->Durante_Refeicoes;
    }

    

    function getSal() {
        return $this->Sal;
    }

    

    function getAcucares() {
        return $this->acucares;
    }

   

    function getSodio() {
        return $this->Sodio;
    }

   

    function getRefrigerantes() {
        return $this->Refrigerantes;
    }


    function getCereais() {
        return $this->Cereais;
    }

    function getFrutas() {
        return $this->Frutas;
    }

    function getObs_Frutas() {
        return $this->Obs_Frutas;
    }

    function getLocal_Amoco() {
        return $this->Local_Amoco;
    }

    function getPreferencias() {
        return $this->Preferencias;
    }

    function getAversao() {
        return $this->Aversao;
    }
    function getVerduras() {
        return $this->Verduras;
    }
    
    function getId_Consumos() {
        return $this->Id_Consumos;
    }

    function setId_Consumos($Id_Consumos) {
        $this->Id_Consumos = $Id_Consumos;
    }

    
    function setCodPaciente($CodPaciente) {
        $this->CodPaciente = $CodPaciente;
    }

        function setVerduras($Verduras) {
        $this->Verduras = $Verduras;
    }

    function setAnamine($Anaminese) {
        $this->Anaminese = ((int)$Anaminese ? $Anaminese : 'Somente numeros inteiro');
    }

    function setAgua($Agua) {
        $this->Agua =$Agua;
    }

    function setSucos($Sucos) {
        $this->Sucos =$Sucos;
    }


    function setDurante_Refeicoes($Durante_Refeicoes) {
        $this->Durante_Refeicoes =$Durante_Refeicoes;
    }

    function setSal($Sal) {
        $this->Sal =$Sal;
    }


    function setAcucares($acucares) {
        $this->acucares = $acucares;
    }


    function setSodio($Sodio) {
        $this->Sodio =$Sodio;
    }

    function setRefrigerantes($Refrigerantes) {
        $this->Refrigerantes =$Refrigerantes;
    }

    function setCereais($Cereais) {
        $this->Cereais =$Cereais;
    }


    function setFrutas($Frutas) {
        $this->Frutas =$Frutas;
    }

    function setLocal_Amoco($Local_Amoco) {
        $this->Local_Amoco = $Local_Amoco;
    }

    function setPreferencias($Preferencias) {
        $this->Preferencias = $Preferencias;
    }

    function setAversao($Aversao) {
        $this->Aversao = $Aversao;
    }
    
    function getObs_Agua() {
        return $this->Obs_Agua;
    }

    function getObs_Sucos() {
        return $this->Obs_Sucos;
    }

    function getObs_d_Refeicoes() {
        return $this->Obs_d_Refeicoes;
    }

    function getObs_Sal() {
        return $this->Obs_Sal;
    }

    function getObs_Acucares() {
        return $this->Obs_Acucares;
    }

    function getObs_Sodio() {
        return $this->Obs_Sodio;
    }

    function getObs_Refrigerantes() {
        return $this->Obs_Refrigerantes;
    }

    function getObs_Cereais() {
        return $this->Obs_Cereais;
    }

    function getObs_Verduras() {
        return $this->Obs_Verduras;
    }

    function setObs_Agua($Obs_Agua) {
        $this->Obs_Agua = $Obs_Agua;
    }

    function setObs_Sucos($Obs_Sucos) {
        $this->Obs_Sucos = $Obs_Sucos;
    }

    function setObs_d_Refeicoes($Obs_d_Refeicoes) {
        $this->Obs_d_Refeicoes = $Obs_d_Refeicoes;
    }

    function setObs_Sal($Obs_Sal) {
        $this->Obs_Sal = $Obs_Sal;
    }

    function setObs_Acucares($Obs_Acucares) {
        $this->Obs_Acucares = $Obs_Acucares;
    }

    function setObs_Sodio($Obs_Sodio) {
        $this->Obs_Sodio = $Obs_Sodio;
    }

    function setObs_Refrigerantes($Obs_Refrigerantes) {
        $this->Obs_Refrigerantes = $Obs_Refrigerantes;
    }

    function setObs_Cereais($Obs_Cereais) {
        $this->Obs_Cereais = $Obs_Cereais;
    }

    function setObs_Verduras($Obs_Verduras) {
        $this->Obs_Verduras = $Obs_Verduras;
    }
    
    function setObs_Frutas($Obs_Frutas) {
        $this->Obs_Frutas = $Obs_Frutas;
    }





}


