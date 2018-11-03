<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConsumoDao1
 *
 * @author Birra
 */
class ConsumoDao1 extends Select{
     private $Ultimo_Id;
    
    private $Cod_paciente;
    private $Paciente;
    private $Id_Consumos;
    private $Agua;
    private $Obs_agua;
    private $Sucos;
    private $Obs_sucos;
    private $Durante_refeicoes;
    private $Obs_refeicoes;
    private $Acucares;
    private $Obs_acucares;
    private $Sodio;
    private $Obs_sodio;
    private $Refrigerantes;
    Private $Obs_refri;
    private $Cereais;
    private $Obs_cereais;
    private $Frutas;
    private $Obs_frutas;
    private $Verduras;
    private $obs_verduras;
    private $Local_Almoco;
    private $Preferencias;
    private $Aversoes;
            
    function getUltimo_Id() {
        return $this->Ultimo_Id;
    }
    
    function getId_Consumos() {
        return $this->Id_Consumos;
    }

    function getAgua() {
        return $this->Agua;
    }

    function getSucos() {
        return $this->Sucos;
    }

    function getDurante_refeicoes() {
        return $this->Durante_refeicoes;
    }

    function getAcucares() {
        return $this->Acucares;
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

    function getVerduras() {
        return $this->Verduras;
    }

    function getLocal_Almoco() {
        return $this->Local_Almoco;
    }

    function getPreferencias() {
        return $this->Preferencias;
    }

    function getAversoes() {
        return $this->Aversoes;
    }
    
    function getCod_paciente() {
        return $this->Cod_paciente;
    }
    
    function getObs_agua() {
        return $this->Obs_agua;
    }

    function getObs_sucos() {
        return $this->Obs_sucos;
    }

    function getObs_refeicoes() {
        return $this->Obs_refeicoes;
    }

    function getObs_acucares() {
        return $this->Obs_acucares;
    }

    function getObs_sodio() {
        return $this->Obs_sodio;
    }

    function getObs_refri() {
        return $this->Obs_refri;
    }

    function getObs_cereais() {
        return $this->Obs_cereais;
    }

    function getObs_frutas() {
        return $this->Obs_frutas;
    }

    function getObs_verduras() {
        return $this->obs_verduras;
    }

    function getPaciente() {
        return $this->Paciente;
    }

        
        
    

    public function CadastarConsumos(Consumos $consumos){
        
        $DadosConsumo=['paciente_id'=>$consumos->getCodPaciente(),
                       'agua'=>$consumos->getAgua(),
                       'obs_agua'=>$consumos->getObs_Agua(),
                       'sucos'=>$consumos->getSucos(),
                       'obs_sucos'=>$consumos->getObs_Sucos(),
                       'durante_refeicoes'=>$consumos->getDurante_Refeicoes(),
                       'obs_refeicoes'=>$consumos->getObs_d_Refeicoes(),
                       'acucares'=>$consumos->getAcucares(),
                       'obs_acucares'=>$consumos->getObs_Acucares(),
                       'sodio'=>$consumos->getSodio(),
                       'obs_sodio'=>$consumos->getObs_Sodio(),
                       'refrigerantes'=>$consumos->getRefrigerantes(),
                       'obs_refri'=>$consumos->getObs_Refrigerantes(),
                       'cereais'=>$consumos->getCereais(),
                       'obs_cereais'=>$consumos->getObs_Cereais(),
                       'frutas'=>$consumos->getFrutas(),
                       'obs_frutas'=>$consumos->getObs_Frutas(),
                       'verduras'=>$consumos->getVerduras(),
                       'obs_verduras'=>$consumos->getObs_Verduras(),
                       'local_almoco'=>$consumos->getLocal_Amoco(),
                       'preferencias'=>$consumos->getPreferencias(), 
                       'aversoes'=>$consumos->getAversao()
                ];
        
        $CadConsumo=new InsercaoBanco();
        $CadConsumo->ExecutInserir("consumos", $DadosConsumo);
        $this->Ultimo_Id= $CadConsumo->getResult();
        echo $CadConsumo->getMensagem();
    }
    
    //===============================================================================================
    //-------------------- ATUALIZAR DADOS CONSUMOS ----------------------
    //===============================================================================================
    public function AtualizarConsumos(Consumos $consumos){
        
        $DadosConsumo=[
                       'agua'=>$consumos->getAgua(),
                       'obs_agua'=>$consumos->getObs_Agua(),
                       'sucos'=>$consumos->getSucos(),
                       'obs_sucos'=>$consumos->getObs_Sucos(),
                       'durante_refeicoes'=>$consumos->getDurante_Refeicoes(),
                       'obs_refeicoes'=>$consumos->getObs_d_Refeicoes(),
                       'acucares'=>$consumos->getAcucares(),
                       'obs_acucares'=>$consumos->getObs_Acucares(),
                       'sodio'=>$consumos->getSodio(),
                       'obs_sodio'=>$consumos->getObs_Sodio(),
                       'refrigerantes'=>$consumos->getRefrigerantes(),
                       'obs_refri'=>$consumos->getObs_Refrigerantes(),
                       'cereais'=>$consumos->getCereais(),
                       'obs_cereais'=>$consumos->getObs_Cereais(),
                       'frutas'=>$consumos->getFrutas(),
                       'obs_frutas'=>$consumos->getObs_Frutas(),
                       'verduras'=>$consumos->getVerduras(),
                       'obs_verduras'=>$consumos->getObs_Verduras(),
                       'local_almoco'=>$consumos->getLocal_Amoco(),
                       'preferencias'=>$consumos->getPreferencias(), 
                       'aversoes'=>$consumos->getAversao()
                    ];
        
        $AtualCons=new Update();
        $AtualCons->ExUpdate('consumos', $DadosConsumo, "WHERE id_consumo =:id", 'id='.$consumos->getId_Consumos());
        
        if($AtualCons->getResult()):
            echo"{$AtualCons->getRunCount()} dados Atualizados <br>";
        endif;
    }
    
    public function ListaConsumos($idPac,$Tipo){
        $this->Tipo=$Tipo;
        $coluna6=[
            'id_consumo'=>'id_consumo',
            'paciente_id'=>'paciente_id',
            'nome'=>'p.nome',
            
            'agua.afirmacao'=>'agua',
            'obs_agua'=>'obs_agua',
            'sucos'=>'sucos',
            'afirmacao'=>'sucos.afirmacao',
            'obs_sucos'=>'obs_sucos',
            'durante_refeicoes'=>'durante_refeicoes',
            'afirmacao'=>'refeicao.afirmacao',
            'obs_refeicoes'=>'obs_refeicoes',
            'acucares'=>'acucares',
            'afirmacao'=>'acucares.afirmacao',
            'obs_acucares'=>'obs_acucares',
            'sodio'=>'sodio',
            'afirmacao'=>'sodio.afirmacao',
            'obs_sodio'=>'obs_sodio',
            'refrigerantes'=>'refrigerantes',
            'refrigerantes'=>'refri.afirmacao',
            'obs_refri'=>'obs_refri',
            
            'cereais'=>'cereais.afirmacao',
            'obs_cereais'=>'obs_cereais',
            'frutas'=>'frutas',
            'frutas'=>'frutas.afirmacao',
            'obs_frutas'=>'obs_frutas',
            'verduras'=>'verduras',
            'verduras'=>'verduras.afirmacao',
            'obs_verduras'=>'obs_verduras',
            'local_almoco'=>'l.local_almoco',
            'preferencias'=>'preferencias',
            'aversoes'=>'aversoes'
        ];
        
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
                        inner join local_almoco l on c.local_almoco= l.id_local_alm where id_paciente='{$idPac}'";   
        
        
        
        $this->ExRead("pacientes p", $coluna8, $Termos6, $ColumTable6, $this->Tipo);
    }
    
     //=================================================================================================
    //----------------- DELETA CONSUMOS -------------------
    //=================================================================================================
    public function DeletaConsumos(Consumos $consumos){
        
        $DeletaConsumos = new Delete();
        $DeletaConsumos->ExeDelete('consumos', "WHERE id_consumo = :id", 'id='.$consumos->getId_Consumos());
        
        if($DeletaConsumos->getResult()):
            echo"{$DeletaConsumos->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
    }

    public function Syntax() {
        
         
                $paciente = new Paciente();
                
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->Cod_paciente = $col['paciente_id'];
                    $this->Paciente = $col['nome'];
                    $this->Id_Consumos = $col['id_consumo'];
                    $this->Agua = $col['agua'];
                    $this->Obs_agua = $col['obs_agua']; 
                    $this->Sucos = $col['sucos'];
                    $this->Obs_sucos = $col['obs_sucos'];
                    $this->Durante_refeicoes = $col['durante_refeicoes'];
                    $this->Obs_refeicoes = $col['obs_refeicoes'];
                    $this->Acucares = $col['acucares'];
                    $this->Obs_acucares = $col['obs_acucares'];
                    $this->Sodio = $col['sodio'];
                    $this->Obs_sodio = $col['obs_sodio'];
                    $this->Refrigerantes = $col['refrigerantes'];
                    $this->Obs_refri = $col['obs_refri'];
                    $this->Cereais = $col['cereais'];
                    $this->Obs_cereais = $col['obs_cereais'];
                    $this->Frutas = $col['frutas'];
                    $this->Obs_frutas = $col['obs_frutas'];
                    $this->Verduras = $col['verduras'];
                    $this->obs_verduras = $col['obs_verduras'];
                    $this->Local_Almoco = $col['local_almoco'];
                    $this->Preferencias = $col['preferencias'];
                    $this->Aversoes = $col['aversoes']; 
                endwhile;
                
            if($this->Tipo==1):
                 echo"<tr>"
                        . "<td colspan ='2'><b>Paciente:</b> {$this->getPaciente()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Agua:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td> {$this->getAgua()}</td>"
                      . "<td> {$this->getObs_agua()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Sucos:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td>{$this->getSucos()}</td>"
                      . "<td>{$this->getObs_sucos()}</td>"
                    . "</tr>"
                    
                    . "<tr>"
                      . "<td colspan='2'><b>Durante as Refeições:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td>{$this->getDurante_refeicoes()}</td>"
                      . "<td>{$this->getObs_refeicoes()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Açucares:</b></td>"
                    . "</tr>"
                    . "<tr> "
                      . "<td>{$this->getAcucares()}</td>"
                      . "<td>{$this->getObs_acucares()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Sódio:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td> {$this->getSodio()}</td>"
                      . "<td> {$this->getObs_sucos()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Refrigerantes:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td> {$this->getRefrigerantes()}</td>"
                      . "<td> {$this->getObs_refri()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Cereais:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td>{$this->getCereais()}</td>"
                      . "<td>{$this->getObs_cereais()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Frutas:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td>{$this->getFrutas()}</td>"
                      . "<td>{$this->getObs_frutas()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Verduras:</b></td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td> {$this->getVerduras()}</td>"
                      . "<td> {$this->getObs_verduras()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Local de Almoço:</b> {$this->getLocal_Almoco()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Preferências:</b> {$this->getPreferencias()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td colspan='2'><b>Aversões:</b> {$this->getAversoes()}</td>"; 
                   echo"</tr>";
            endif;
    }

}
