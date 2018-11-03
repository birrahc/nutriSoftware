<?php


/**
 * Description of ConsumoDao
 *
 * @author Birra
 */
class ConsumoDao extends Select{
    private $Ultimo_Id;
    
    private $Cod_paciente;
    private $Id_Consumos;
    private $Agua;
    private $Sucos;
    private $Durante_refeicoes;
    private $Acucares;
    private $Sodio;
    private $Refrigerantes;
    private $Cereais;
    private $Frutas;
    private $Verduras;
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

    
        
    

    public function CadastarConsumos(Consumos $consumos){
        
        $DadosConsumo=['paciente_id'=>$consumos->getCodPaciente(),
                       'agua'=>$consumos->getAgua(), 
                       'sucos'=>$consumos->getSucos(),
                       'durante_refeicoes'=>$consumos->getDurante_Refeicoes(), 
                       'acucares'=>$consumos->getAcucares(),
                       'sodio'=>$consumos->getSodio(), 
                       'refrigerantes'=>$consumos->getRefrigerantes(),
                       'cereais'=>$consumos->getCereais(), 
                       'frutas'=>$consumos->getFrutas(), 
                       'verduras'=>$consumos->getVerduras(),
                       'local_almoco'=>$consumos->getLocal_Amoco(),
                       'preferencias'=>$consumos->getPreferencias(), 
                       'aversoes'=>$consumos->getAversao()];
        
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
                       'sucos'=>$consumos->getSucos(),
                       'durante_refeicoes'=>$consumos->getDurante_Refeicoes(), 
                       'acucares'=>$consumos->getAcucares(),
                       'sodio'=>$consumos->getSodio(), 
                       'refrigerantes'=>$consumos->getRefrigerantes(),
                       'cereais'=>$consumos->getCereais(), 
                       'frutas'=>$consumos->getFrutas(), 
                       'verduras'=>$consumos->getVerduras(),
                       'local_almoco'=>$consumos->getLocal_Amoco(),
                       'preferencias'=>$consumos->getPreferencias(), 
                       'aversoes'=>$consumos->getAversao()];
        
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
            'nome'=>'nome',
            'agua'=>'agua',
            'sucos'=>'sucos',
            'durante_refeicoes'=>'durante_refeicoes',
            'acucares'=>'acucares',
            'sodio'=>'sodio',
            'refrigerantes'=>'refrigerantes',
            'cereais'=>'cereais',
            'frutas'=>'frutas',
            'verduras'=>'verduras',
            'local_almoco'=>'local_almoco',
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
        if($this->Tipo==3):
            $Termos6="inner join consumos c on p.id_paciente = c.paciente_id where id_consumo='{$idPac}'";
            else:
             $Termos6="inner join consumos c on p.id_paciente = c.paciente_id where id_paciente='{$idPac}'";   
        endif;
        
        
        $this->ExRead("pacientes p", $coluna6, $Termos6, $ColumTable6, $this->Tipo);
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
        
         if($this->Tipo==2):
                $paciente = new Paciente();
                
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->Cod_paciente = $col['paciente_id'];
                    $this->Id_Consumos = $col['id_consumo'];
                    $this->Agua = $col['agua'];
                    $this->Sucos = $col['sucos'];
                    $this->Durante_refeicoes = $col['durante_refeicoes'];
                    $this->Acucares = $col['acucares'];
                    $this->Sodio = $col['sodio'];
                    $this->Refrigerantes = $col['refrigerantes'];
                    $this->Cereais = $col['cereais'];
                    $this->Frutas = $col['frutas'];
                    $this->Verduras = $col['verduras'];
                    $this->Local_Almoco = $col['local_almoco'];
                    $this->Preferencias = $col['preferencias'];
                    $this->Aversoes = $col['aversoes']; 
                  
                 echo"<tr>"
                      . "<td><b>Paciente:</b> {$col['nome']}</td>"
                    . "</tr>"
                      . "<td><b>Agua:</b> {$col['agua']}</td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td><b>Sucos:</b> {$col['sucos']}</td>"
                    . "</tr>"
                    
                    . "<tr>"
                      . "<td><b>Durante as Refeições:</b> {$col['durante_refeicoes']}</td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td><b>Açucares:</b> {$col['acucares']}</td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td><b>Sódio:</b> {$col['sodio']}</td>"
                    . "</tr>"          
                    . "<tr>"
                      . "<td><b>Refrigerantes:</b> {$col['refrigerantes']}</td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td><b>Cereais:</b> {$col['cereais']}</td>"
                    . "<tr>"
                      . "<td><b>Frutas:</b> {$col['frutas']}</td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td><b>Verduras:</b> {$col['verduras']}</td>"
                    . "<tr>"
                      . "<td><b>Local de Almoço:</b> {$col['local_almoco']}</td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td><b>Preferências:</b> {$col['preferencias']}</td>"
                    . "<tr>"
                      . "<td><b>Aversões:</b> {$col['aversoes']}</td>"; 
                endwhile;
                   echo"</tr>";
                      
            
             elseif($this->Tipo==3):
               
                
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->Cod_paciente = $col['paciente_id'];
                    $this->Id_Consumos = $col['id_consumo'];
                    $this->Agua = $col['agua'];
                    $this->Sucos = $col['sucos'];
                    $this->Durante_refeicoes = $col['durante_refeicoes'];
                    $this->Acucares = $col['acucares'];
                    $this->Sodio = $col['sodio'];
                    $this->Refrigerantes = $col['refrigerantes'];
                    $this->Cereais = $col['cereais'];
                    $this->Frutas = $col['frutas'];
                    $this->Verduras = $col['verduras'];
                    $this->Local_Almoco = $col['local_almoco'];
                    $this->Preferencias = $col['preferencias'];
                    $this->Aversoes = $col['aversoes']; 
                    endwhile;
        
        endif;
    }

}
