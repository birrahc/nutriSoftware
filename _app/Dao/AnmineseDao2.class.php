<?php


/**
 * Description of AnmineseDao
 *
 * @author Birra
 */


class AnmineseDao2 extends Select {
    Private $Ultimo_id;
    private $Consulta;
    
    private $Id_Paciente;
    private $Id_Anminese;
    private $Paciente;
    private $Objetivo;
    private $Diag_medico;
    private $Exames;
    private $Medicamentos;
    private $Suplementos;
    private $Hist_familiar;
    private $Sinais_sintomas;
    private $Habito_intestinal;
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
    
    function getId_Paciente() {
        return $this->Id_Paciente;
    }

    function getPaciente() {
        return $this->Paciente;
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
        return $this->Suplementos;
    }

    function getHist_familiar() {
        return $this->Hist_familiar;
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

    
    
    

    
   

    
        
    //==============================================================================================
    //-------------- Cadastro Anminese -----------------------
    //==============================================================================================
    public function CadAnMinese(Anminese2 $anminese) {
        
        $DadosAnMinse=['paciente'=>$anminese->getIdPessoa(),
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
    public function AtualizarAnminese(Anminese2 $anminese){
        
        $DadosAnMinse=[
                      'paciente'=>$anminese->getIdPessoa(),
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
    
    public function ListaAnminese(Anminese2 $anminese,$Tipo){
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
             
            if($this->Tipo==1):
            
                $Termos5 ="inner join anaminese a on id_paciente = a.paciente where id_paciente='{$anminese->getIdPessoa()}'";
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
        $this->ExRead("avalicao_antropometrica a", $Coluna, $Termos, $ColumTable5, 2);
    }
    
     //=================================================================================================
    //------------------ DELETA ANMINESE -----------------------
    //=================================================================================================
    public function DeletaAmnise(Anminese2 $anminese){
        
        $DeletaAnminse = new Delete();
        $DeletaAnminse->ExeDelete('anaminese', "WHERE id_anaminese = :id", 'id='.$anminese->getId_Anminese());
        
        if($DeletaAnminse->getResult()):
            echo"{$DeletaAnminse->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
        
    }
    
    public function Syntax() {
           $anminese= new Anminese2;
           while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
               $this->Id_Anminese=$col['id_anaminese'];
               $this->Id_Paciente=$col['id_paciente'];
               $this->Paciente=$col['nome'];
               $this->Objetivo=$col['objetivo'];
               $this->Diag_medico=$col['diagnostico_medico'];
               $this->Exames=$col['exames'];
               $this->Medicamentos=$col['medicamentos'];
               $this->Suplementos=$col['suplementos'];
               $this->Hist_familiar=$col['historico_familiar'];
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
           
                $paciente = new Paciente();
                echo"<tr>"      
                        . "<td><b>Paciente:</b> {$this->getPaciente()}</td>"
                    . "</tr>"
                                
                    . "<tr>"
                      . "<td><b>Objetivo:</b> {$this->getObjetivo()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Diagnostico Médico:</b> {$this->getDiag_medico()}</td>"
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
                      . "<td><b>Histórico Familiar:</b> {$this->getHist_familiar()}</td>"
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
                
                
                ///Verifica Consulta no banco///
                elseif($this->Tipo==2):
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
