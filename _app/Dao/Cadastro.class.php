<?php
/**
 * Description of Cadastro
 *
 * @author Birra
 */
class Cadastro {
    private $UltimaId;
    private $RegistroPagamentos;
    
    function getUltimaId() {
        return $this->UltimaId;
    }
    
    function getRegistroPagamentos() {
        return $this->RegistroPagamentos;
    }

    
    //==============================================================================================
    //--------------- Cadastro de Login ----------------------
    //==============================================================================================
    public function CadastrarLogin(Login $cad_log){
        
        $DadosLogin=['login'=>$cad_log->getNome(), 
                     'senha'=>$cad_log->getSenha() 
                    ];
        
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
                'cpf'=>$paciente->getCpf(),
                'data_nascimento'=>$paciente->getData_Nascimento(),
                'altura'=>$paciente->getAltura(),
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
                      'obs_diag_medico'=>$anminese->getObs_Diag_medico(),
                      'exames'=>$anminese->getExames(),
                      'obs_exames'=>$anminese->getObs_exames(),
                      'medicamentos'=>$anminese->getMedicamentos(),
                      'obs_medicamentos'=>$anminese->getObs_medicamentos(),
                      'suplementos'=>$anminese->getSuplementos(),
                      'obs_suplementos'=>$anminese->getObs_Suplementos(),
                      'historico_familiar'=>$anminese->getHistorico_familiar(),
                      'obs_hist_familiar'=>$anminese->getObs_hist_familiar(),
                      'sinais_sintomas'=>$anminese->getSinais_sintomas(),
                      'obs_sinais_sintomas'=>$anminese->getObs_Sinais_Sintomas(),
                      'habito_intestinal'=>$anminese->getHabito_intestinal(),
                      'obs_hab_intestinal'=>$anminese->getObs_Habit_int(),
                      'tabagismo'=>$anminese->getTabagismo(),
                      'obs_tabagismo'=>$anminese->getObs_Tabagismo(),
                      'etilismo'=>$anminese->getEtilismo(),
                      'obs_etilismo'=>$anminese->getObs_Etilismo(),
                      'Atividades_fisicas'=>$anminese->getAtividades_fisicas(),
                      'obs_atividades'=>$anminese->getObs_Atividades_Fisicas()
                    ];
        
        $CadastrarAn= new InsercaoBanco();
        $CadastrarAn->ExecutInserir("anaminese", $DadosAnMinse);
        //$this->UltimaId =
        //var_dump($CadastrarAn);
        
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
        $this->UltimaId= $CadConsumo->getResult();
        //echo $CadConsumo->getMensagem();
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
                         'dc_coxa'=>$Avaliacao->getDc_Coxa()
                        ];
        
         $CadAvalAnt = new InsercaoBanco();
        $CadAvalAnt->ExecutInserir("avaliacao_antropometrica", $DadosAvalAntro);
        //echo $CadAvalAnt->getMensagem();
        $this->UltimaId = $CadAvalAnt->getResult();
        
        //var_dump($CadAvalAnt);
        $inserirPgmt= new Pagamentos();
        $inserirPgmt->setData_Consulta($Avaliacao->getDataAvalicao());
        $inserirPgmt->setReferencia($CadAvalAnt->getResult());
        
        $this->CadastrarPagamentos($inserirPgmt);
        //var_dump($this->CadastrarPagamentos($inserirPgmt));
        $this->RegistroPagamentos=$inserirPgmt->getUltimo_Registro();
      
    }
    
    //=====================================================================
    //================ Cadastro de BioImpedancia ==========================
    //=====================================================================
    public function CadBioImpedancia(BioImpedancia $bio){
        
        $DadosBio=['paciente_bio'=>$bio->getId_Pessoa(),
                         'data_bio'=>$bio->getData_bio(),
                         'peso_bio'=>$bio->getPeso_bio(),
                         'imc_bio'=>$bio->getImc(), 
                         'perc_gord_corp'=>$bio->getPerc_gord_corp(), 
                         'perc_musc_esq'=>$bio->getPerc_musc_esq(),
                         'met_basal'=>$bio->getMetabolismo_basal(), 
                         'idade_corpoaral'=>$bio->getIdade_corporal(), 
                         'gord_viceral'=>$bio->getGordura_viceral(),
                         ];
        
        $CadBio = new InsercaoBanco();
        $CadBio->ExecutInserir("bioimp", $DadosBio);
        echo $CadBio->getMensagem();
        $this->UltimaId = $CadBio->getResult();
    }


    public function CadastrarPagamentos(Pagamentos $pagamentos) {
        
        $Dados=['data_cons'=>$pagamentos->getData_Consulta(),
               'referencia'=>$pagamentos->getReferencia(),
               'tipo'=>1,
               'plano'=>1,
               'situacao'=>1,
               'l_atendimento'=>1
              ]; 
        
        $cadastrarPagamentos = new InsercaoBanco();
        $cadastrarPagamentos->ExecutInserir("pagamentos", $Dados);
        $pagamentos->setUltimo_Registro($cadastrarPagamentos->getResult());
      
        
    }
    
    public function cadatrarObservacao(Observacao $obs){
        
        $Dados=[
            'paciente_obs'=>$obs->getId_Pessoa(),
            'data_obs'=>$obs->getData_obs(),
            'obs'=>$obs->getObservacao()
        ];
        
        $cadastrarObs = new InsercaoBanco();
        $cadastrarObs->ExecutInserir("`observacao`", $Dados);
        
        $this->UltimaId = $cadastrarObs->getResult();
    }

        public function CadastrarDietas(Dietas $dieta) {
        
        $Dados=[
               'id_dieta'=>$dieta->getId_dieta(),
               'linha'=>$dieta->getLinha_campo(),
               'dieta_numero'=>$dieta->getDieta_numero(),
               'plano_alimentar'=>$dieta->getPlano_Alimentar(),
               'paciente'=>$dieta->getPaciente(),
               'data_dieta'=>$dieta->getData_dieta(),
               'horario'=>$dieta->getHora_dieta(),
               'alimento'=>$dieta->getAlimento(),
               'quantidade'=>$dieta->getQtd_alimento(),
               'substituicao'=>$dieta->getSubstituicao(),
               'qtd_substituicao'=>$dieta->getQtd_substituicao(),
               'intervalos'=>$dieta->getIntervalos(),
               'qtd_intervalo'=>$dieta->getIntervalos(),
               'anotacoes'=>$dieta->getAnotacoes()
              ]; 
        
        $inserirDietas = new InsercaoBanco();
        $inserirDietas->ExecutInserir("dietas", $Dados);
        //$cadastrarDietas->setUltimo_Registro($cadastrarDietas->getResult());
        
      
        
    }
}