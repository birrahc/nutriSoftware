<?php
/**
 * Description of Cadastro
 *
 * @author Birra
 */
class Cadastro {
    private $UltimaId;
    
    function getUltimaId() {
        return $this->UltimaId;
    }

        //==============================================================================================
    //--------------- Cadastro de Login ----------------------
    //==============================================================================================
    public function CadastrarLogin($Login, $Senha, $Permissao){
        
        $DadosLogin=['login'=>$Login, 
                     'senha'=>$Senha, 
                     'permissao'=>$Permissao];
        
        $CadastrarLogin= new InsercaoBanco();
        $CadastrarLogin->ExecutInserir("login", $DadosLogin);
    }
    
    //==============================================================================================
    //--------------- Cadastro de Pacientes -------------------
    //==============================================================================================
    public function CadastrarPaciente(PacienteMold $paciente){
        
        $Dados=[
                'nome'=>$paciente->getNome(),
                'sexo'=>$paciente->getSexo(),
                'data_nascimento'=>$paciente->getData_Nascimento(), 
                'profissao'=>$paciente->getProfissao(), 
                'telefone'=>$paciente->getTelefone(), 
                'email'=>$paciente->getEmail()];
        
        $Cadastrar=new InsercaoBanco();
        $Cadastrar->ExecutInserir("pacientes", $Dados);
        $this->UltimaId=$Cadastrar->getResult();
        echo $Cadastrar->getMensagem();
    }
    
    
    //==============================================================================================
    //------------------- Cadastro Anminese -----------------------
    //==============================================================================================
    public function CadAnMinese(AnmineseMold $anminese) {
        
        $DadosAnMinse=['paciente'=>$anminese->getId_Pessoa(),
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
    
    //===============================================================================================
    //------------------ Cadastro Consumos ---------------------
    //===============================================================================================
    public function CadastarConsumos(ConsumosMold $consumos){
        
        $DadosConsumo=['paciente_id'=>$consumos->getId_Pessoa(),
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
    
    //=============================================================================================
    //------------------- Cadastro de Avaliação Antropometrica ---------------------
    //=============================================================================================
    public function CadAvalAntropometrica(AvaliacaoMold $Avaliacao){
       
        $DadosAvalAntro=['paciente'=>$Avaliacao->getId_Pessoa(),
                         'consulta'=>$Avaliacao->getAvaliacao(),
                         'data_avalicao'=>$Avaliacao->getDataAvalicao(),
                         'peso'=>$Avaliacao->getPeso(),
                         'c_cintura'=>$Avaliacao->getC_Cintura(), 
                         'c_abdominal'=>$Avaliacao->getC_Abdominal(), 
                         'c_quadril'=>$Avaliacao->getC_Quadril(),
                         'c_peito'=>$Avaliacao->getC_Peito(), 
                         'c_braco_d'=>$Avaliacao->getC_Braco_D(), 
                         'c_braco_e'=>$Avaliacao->getC_Braco_E(),
                         'c_coxa_d'=>$Avaliacao->getC_Coxa_D(), 
                         'c_coxa_e'=>$Avaliacao->getC_Coxa_E(), 
                         'dc_triceps'=>$Avaliacao->getDc_Triceps(),
                         'dc_escapular'=>$Avaliacao->getDc_Escapular(), 
                         'dc_supra_iliaca'=>$Avaliacao->getDc_Supra_Iliaca(),
                         'dc_abdominal'=>$Avaliacao->getDc_Abdominal(), 
                         'dc_axilar'=>$Avaliacao->getDc_Axilar(),
                         'dc_peitoral'=>$Avaliacao->getDc_Peitoral(),
                         'dc_coxa'=>$Avaliacao->getDc_Coxa()];
        
        $CadAvalAnt = new InsercaoBanco();
        $CadAvalAnt->ExecutInserir("avaliacao_antropometrica", $DadosAvalAntro);
        echo $CadAvalAnt->getMensagem();
        $this->Ultimo_id = $CadAvalAnt->getResult();
    }

}