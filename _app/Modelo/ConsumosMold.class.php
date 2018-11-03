<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConsumosMold
 *
 * @author Birra
 */
class ConsumosMold extends PessoaMold{
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
    
    public function ListaConsumos(ConsumosMold $pessoa,$Tipo){
        $this->Tipo=$Tipo;
        $coluna8=['id_consumo'=>'id_consumo',
                  'paciente_id'=>'paciente_id',
                  'p.nome'=>'p.nome',
                  'agua.afirmacao'=>'agua.afirmacao as agua', 
                  'obs_agua'=>'obs_agua', 
                  'sucos.afirmacao'=>'sucos.afirmacao as sucos',
                  'obs_sucos'=>'obs_sucos', 
                  'refeicao.afirmacao'=>'refeicao.afirmacao as durante_refeicoes', 
                  'obs_refeicoes'=>'obs_refeicoes',
                  'acucares.afirmacao'=>'acucares.afirmacao as acucares', 
                  'obs_acucares'=>'obs_acucares', 
                  'sodio.afirmacao'=>'sodio.afirmacao as sodio',
                  'obs_sodio'=>'obs_sodio', 
                  'refri.afirmacao'=>'refri.afirmacao as refrigerantes',
                  'obs_refri'=>'obs_refri', 
                  'cereais.afirmacao'=>'cereais.afirmacao as cereais',
                  'obs_cereais'=>'obs_cereais', 
                  'frutas.afirmacao'=>'frutas.afirmacao as frutas', 
                  'obs_frutas'=>'obs_frutas',
                  'verduras.afirmacao'=>'verduras.afirmacao as verduras', 
                  'obs_verduras'=>'obs_verduras',
                  'l.local_almoco'=>'l.local_almoco', 
                  'preferencias'=>'preferencias',
                  'aversoes'=>'aversoes'
            ];
        
        $ColumTable6=[
            'Agua',
            'Sucos',
            'Durante as Refeições',
            'Açucares',
            'Sódio',
            'Refrigerantes',
            'Cereais',
            'Frutas',
            'Verduras',
            'Local de Almoço',
            'Preferências',
            'Aversões'
        ];
        
            
        $Termos6="inner join consumos c on paciente_id=p.id_paciente
                  inner join afirmacao agua on agua= agua.id_afirmacao
                  inner join afirmacao sucos on sucos= sucos.id_afirmacao
                  inner join afirmacao refeicao on durante_refeicoes= refeicao.id_afirmacao
                  inner join afirmacao acucares on acucares= acucares.id_afirmacao
                  inner join afirmacao sodio on sodio= sodio.id_afirmacao
                  inner join afirmacao refri on refrigerantes= refri.id_afirmacao
                  inner join afirmacao cereais on cereais= cereais.id_afirmacao
                  inner join afirmacao frutas on frutas= frutas.id_afirmacao
                  inner join afirmacao verduras on verduras= verduras.id_afirmacao
                  inner join local_almoco l on c.local_almoco= l.id_local_alm where id_paciente='{$pessoa->getId_Pessoa()}'";   
        
        
        
        $this->ExRead("pacientes p", $coluna8, $Termos6, $ColumTable6, $this->Tipo);
    }
    
    public function Syntax() {
         while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->setId_Pessoa($col['paciente_id']);
                    $this->setNome($col['nome']);
                    $this->Id_Consumos = $col['id_consumo'];
                    $this->Agua = $col['agua'];
                    $this->Obs_Agua = $col['obs_agua']; 
                    $this->Sucos = $col['sucos'];
                    $this->Obs_Sucos = $col['obs_sucos'];
                    $this->Durante_Refeicoes = $col['durante_refeicoes'];
                    $this->Obs_d_Refeicoes = $col['obs_refeicoes'];
                    $this->acucares = $col['acucares'];
                    $this->Obs_Acucares = $col['obs_acucares'];
                    $this->Sodio = $col['sodio'];
                    $this->Obs_Sodio = $col['obs_sodio'];
                    $this->Refrigerantes = $col['refrigerantes'];
                    $this->Obs_Refrigerantes = $col['obs_refri'];
                    $this->Cereais = $col['cereais'];
                    $this->Obs_Cereais = $col['obs_cereais'];
                    $this->Frutas = $col['frutas'];
                    $this->Obs_Frutas = $col['obs_frutas'];
                    $this->Verduras = $col['verduras'];
                    $this->Obs_Verduras = $col['obs_verduras'];
                    $this->Local_Amoco = $col['local_almoco'];
                    $this->Preferencias = $col['preferencias'];
                    $this->Aversao = $col['aversoes']; 
                endwhile;
                
            if($this->Tipo==1):
                 echo"<tr>"
                        . "<td colspan ='2'><b>Paciente:</b> {$this->getNome()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Agua:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td> {$this->getAgua()}</td>"
                      . "<td> {$this->getObs_Agua()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Sucos:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td>{$this->getSucos()}</td>"
                      . "<td>{$this->getObs_Sucos()}</td>"
                    . "</tr>"
                    
                    . "<tr>"
                      . "<td colspan='2'><b>Durante as Refeições:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td>{$this->getDurante_Refeicoes()}</td>"
                      . "<td>{$this->getObs_d_Refeicoes()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Açucares:</b></td>"
                    . "</tr>"
                    . "<tr> "
                      . "<td>{$this->getAcucares()}</td>"
                      . "<td>{$this->getObs_Acucares()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Sódio:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td> {$this->getSodio()}</td>"
                      . "<td> {$this->getObs_Sucos()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Refrigerantes:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td> {$this->getRefrigerantes()}</td>"
                      . "<td> {$this->getObs_Refrigerantes()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Cereais:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td>{$this->getCereais()}</td>"
                      . "<td>{$this->getObs_Cereais()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Frutas:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td>{$this->getFrutas()}</td>"
                      . "<td>{$this->getObs_Frutas()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Verduras:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td> {$this->getVerduras()}</td>"
                      . "<td> {$this->getObs_Verduras()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Local de Almoço:</b> {$this->getLocal_Amoco()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Preferências:</b> {$this->getPreferencias()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Aversões:</b> {$this->getAversao()}</td>"; 
                   echo"</tr>";
            endif;
    }
}
