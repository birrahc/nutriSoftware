<?php


/**
 * Description of AnmineseDao
 *
 * @author Birra
 */


class AnmineseDao extends Select {
    Private $Ultimo_id;
    private $Consulta;
    
    private $Id_Paciente;
    private $Id_Anminese;
    private $Objetivo;
    private $Diag_medico;
    private $Exames;
    private $Medicamentos;
    private $suplementos;
    private $Hist_familiar;
    private $Sinais_Sintomas;
    private $Hab_intestinais;
    private $Tabagismo;
    private $Etilismo;
    private $Atividades_fisicas;
    
            
            
    function getUltimo_id() {
        return $this->Ultimo_id;
    }
    
    function getConsulta() {
        return $this->Consulta;
    }
    
    function getId_Anminese() {
        return $this->Id_Anminese;
    }

    function getObjetivo() {
        return $this->Objetivo;
    }

    function getDiag_medico() {
        return $this->Diag_medico;
    }

    function getExames() {
        return $this->Exames;
    }

    function getMedicamentos() {
        return $this->Medicamentos;
    }

    function getSuplementos() {
        return $this->suplementos;
    }

    function getHist_familiar() {
        return $this->Hist_familiar;
    }

    function getSinais_Sintomas() {
        return $this->Sinais_Sintomas;
    }

    function getHab_intestinais() {
        return $this->Hab_intestinais;
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

    
   

    
        
    //==============================================================================================
    //-------------- Cadastro Anminese -----------------------
    //==============================================================================================
    public function CadAnMinese(Anminese $anminese) {
        
        $DadosAnMinse=['paciente'=>$anminese->getCodPaciente(),
                      'objetivo'=>$anminese->getObjetivo(),
                      'diagnostico_medico'=>$anminese->getDiagnostico_medico(),
                      'exames'=>$anminese->getExames(),
                      'medicamentos'=>$anminese->getMedicamentos(),
                      'suplementos'=>$anminese->getSuplementos(),
                      'historico_familiar'=>$anminese->getHistorico_familiar(),
                      'sinais_sintomas'=>$anminese->getSinais_sintomas(),
                      'habito_intestinal'=>$anminese->getHabito_intestinal(),
                      'tabagismo'=>$anminese->getTabagismo(),
                      'etilismo'=>$anminese->getEtilismo(),
                      'Atividades_fisicas'=>$anminese->getAtividades_fisicas()
                    ];
        
        $CadastrarAn= new InsercaoBanco();
        $CadastrarAn->ExecutInserir("anaminese", $DadosAnMinse);
        echo $CadastrarAn->getMensagem();
        
    }
    
    //================================================================================================
    //-------------- ATUALIZAR ANMINESE --------------------------------------------------------------
    //================================================================================================
    public function AtualizarAnminese(Anminese $anminese){
        
        $DadosAnMinse=[
                      'objetivo'=>$anminese->getObjetivo(),
                      'diagnostico_medico'=>$anminese->getDiagnostico_medico(),
                      'exames'=>$anminese->getExames(),
                      'medicamentos'=>$anminese->getMedicamentos(),
                      'suplementos'=>$anminese->getSuplementos(),
                      'historico_familiar'=>$anminese->getHistorico_familiar(),
                      'sinais_sintomas'=>$anminese->getSinais_sintomas(),
                      'habito_intestinal'=>$anminese->getHabito_intestinal(),
                      'tabagismo'=>$anminese->getTabagismo(),
                      'etilismo'=>$anminese->getEtilismo(),
                      'Atividades_fisicas'=>$anminese->getAtividades_fisicas()
                    ];
        
        $AtualAnm= new Update();
        $AtualAnm->ExUpdate('anaminese', $DadosAnMinse, "WHERE id_anaminese = :id", 'id='.$anminese->getId_Anminese());
        
        if($AtualAnm->getResult()):
            echo"{$AtualAnm->getRunCount()} dados Atualizados <br>";
        endif;
        
    }
    
    public function ListaAnminese($idPac,$Tipo){
        $this->Tipo=$Tipo;
        
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
        if($this->Tipo==3):
            $Termos5 ="inner join anaminese a on id_paciente = a.paciente where id_anaminese='{$idPac}'";
            else:
            $Termos5 ="inner join anaminese a on id_paciente = a.paciente where id_paciente='{$idPac}'";
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
    
     public function ListaPacAn($idPac){
        $this->VerificaConsulta($idPac);
       
        $coluna=['id_paciente'=>'id_paciente',
                  'nome'=>'nome',
                ];
        $Termos3 =" where id_paciente='{$idPac}'";
        $ColumTable5 = [
                        'id_paciente' ,
                        'nome',
                        ];
        
       $this->ExRead("pacientes p", $coluna, $Termos3, $ColumTable5,1);
    }
    
    public function VerificaConsulta($CodPaciente) {
        
        $Coluna = ['id_avalicao' => 'id_avalicao',
            'paciente' => 'paciente',
            'nome' => 'nome',
            'consulta' => 'consulta',
            'data_avalicao' => 'data_avalicao'
            ];
        $Termos = "inner join pacientes p on a.paciente = p.id_paciente where paciente='{$CodPaciente}'";
        $ColumTable5 = [];
        $this->ExRead("avalicao_antropometrica a", $Coluna, $Termos, $ColumTable5, 6);
    }
    
     //=================================================================================================
    //------------------ DELETA ANMINESE -----------------------
    //=================================================================================================
    public function DeletaAmnise(Anminese $anminese){
        
        $DeletaAnminse = new Delete();
        $DeletaAnminse->ExeDelete('anaminese', "WHERE id_anaminese = :id", 'id='.$anminese->getId_Anminese());
        
        if($DeletaAnminse->getResult()):
            echo"{$DeletaAnminse->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
        
    }
    
    public function Syntax() {
        if($this->Tipo==1):
           while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
        echo"
                <input type='hidden' name='id_paciente' value='{$col['id_paciente']}'/>"
                . "<h3>{$col['nome']}</h3>";   
           endwhile; 
        
        elseif($this->Tipo==2):
                $paciente = new Paciente();
                
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    
                $this->Id_Anminese = $col['id_anaminese'];  
                $this->Id_Paciente = $col['id_paciente'];
                 
                  echo"<tr>"
                        . "<td><b>Paciente:</b> {$col['nome']}</td>"
                    . "</tr>"
                                
                    . "<tr>"
                      . "<td><b>Objetivo:</b> {$col['objetivo']}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Diagnostico Médico:</b> {$col['diagnostico_medico']}</td>"
                    . "</tr>"
                    
                    . "<tr>"
                      . "<td><b>Exames:</b> {$col['exames']}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Medicamentos:</b> {$col['medicamentos']}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Suplementos:</b> {$col['suplementos']}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Histórico Familiar:</b> {$col['historico_familiar']}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Sinais e Sintomas:</b> {$col['sinais_sintomas']}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Habitos Intestinais:</b> {$col['habito_intestinal']}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Tabagismo:</b> {$col['tabagismo']}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Etilismo:</b> {$col['etilismo']}</td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td><b>Atividades Fisicas:</b> {$col['Atividades_fisicas']}</td>";
                    endwhile;
                echo "</tr>";
                    
                   
                   
                   elseif($this->Tipo==3):
                        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                            $this->Id_Anminese = ['id_anaminese'];
                            $this->Objetivo = $col['objetivo'];
                            $this->Diag_medico = $col['diagnostico_medico'];
                            $this->Exames = $col['exames'];
                            $this->Medicamentos = $col['medicamentos'];
                            $this->suplementos = $col['suplementos'];
                            $this->Hist_familiar = $col['historico_familiar'];
                            $this->Sinais_Sintomas = $col['sinais_sintomas'];
                            $this->Hab_intestinais = $col['habito_intestinal'];
                            $this->Tabagismo = $col['tabagismo'];
                            $this->Etilismo = $col['etilismo'];
                            $this->Atividades_fisicas = $col['Atividades_fisicas']; 
                        endwhile;
                      
                ///Verifica Consulta no banco///
                elseif($this->Tipo==6):
                    $this->Consulta=1;           
                    while ($linha = $this->Read->fetch(PDO::FETCH_ASSOC)) {
                
                        $linha['consulta'];
                        $linha['paciente'];

                        if($linha['paciente']>0){
                            $this->Consulta=$linha['consulta']+1;
                        }
        
            }
        endif;
    }

   

}
