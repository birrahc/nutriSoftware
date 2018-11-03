<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AtualizaDados
 *
 * @author Birra
 */
class AtualizaDados {
    
    //================================================================================================
    //---------------- ATUALIZAR LOGIN -----------------------
    //================================================================================================
    public function AtualizarLogin($Login,$senha,$Id_login){
        
        $Dados = ['login' => $Login, 
                  'senha' => $senha];
        
        $update = new Update();
        $update->ExUpdate('login', $Dados, "WHERE id_login = :id", 'id='.$Id_login);
        
        if($update->getResult()):
            echo"{$update->getRunCount()} dados Atualizados <br>";
        endif;
    }
    
    //================================================================================================
    //--------------- ATUALIZAR DADOS PACIENTE -------------------
    //================================================================================================
    public function AtualizarPaciente(PacienteMold $paciente){
        
        $DadosPacientes=['nome' => $paciente->getNome(),
                        'sexo'=>$paciente->getSexo(),
                        'data_nascimento' => $paciente->getData_Nascimento(), 
                        'profissao' => $paciente->getProfissao(), 
                        'telefone' => $paciente->getTelefone(), 
                        'email' => $paciente->getEmail()
                         ];
        
        $AtulPac=new Update();
        $AtulPac->ExUpdate('pacientes', $DadosPacientes, "WHERE id_paciente = :id", 'id='.$paciente->getId_Pessoa());
        
        if($AtulPac->getResult()):
            echo"{$AtulPac->getRunCount()} dados Atualizados <br>";
        endif;
    }
    
    //================================================================================================
    //-------------- ATUALIZAR ANMINESE --------------------------------------------------------------
    //================================================================================================
    public function AtualizarAnminese(AnmineseMold $anminese){
        
        $DadosAnMinse=[
                      'paciente'=>$anminese->getId_Pessoa(),
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
    
    
    //===============================================================================================
    //-------------------- ATUALIZAR DADOS CONSUMOS ----------------------
    //===============================================================================================
    public function AtualizarConsumos(ConsumosMold $consumos){
        
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
    
    //==============================================================================================
    //--------------------- ATUALIZAR AVALIAÇÃO ANTROMETRICA --------------------------
    //==============================================================================================
    public function AtualizarAvaliacao(AvaliacaoMold $Aval) {

        $DadosAvalAntro = ['consulta' => $Aval->getAvaliacao(),
            'data_avalicao' => $Aval->getDataAvalicao(),
            'peso' => $Aval->getPeso(),
            'c_cintura' => $Aval->getC_Cintura(),
            'c_abdominal' => $Aval->getC_Abdominal(),
            'c_quadril' => $Aval->getC_Quadril(),
            'c_peito' => $Aval->getC_Peito(),
            'c_braco_d' => $Aval->getC_Braco_D(),
            'c_braco_e' => $Aval->getC_Braco_E(),
            'c_coxa_d' => $Aval->getC_Coxa_D(),
            'c_coxa_e' => $Aval->getC_Coxa_E(),
            'dc_triceps' => $Aval->getDc_Triceps(),
            'dc_escapular' => $Aval->getDc_Escapular(),
            'dc_supra_iliaca' => $Aval->getDc_Supra_Iliaca(),
            'dc_abdominal' => $Aval->getDc_Abdominal(),
            'dc_axilar' => $Aval->getDc_Axilar(),
            'dc_peitoral' => $Aval->getDc_Peitoral(),
            'dc_coxa' => $Aval->getDc_Coxa(),
            ];

        $AtualAval = new Update();
        $AtualAval->ExUpdate('avaliacao_antropometrica', $DadosAvalAntro, "WHERE id_avalicao =:id", 'id=' . $Aval->getId_Avaliacao());

        if ($AtualAval->getResult()):
            echo"{$AtualAval->getRunCount()} dados Atualizados <br>";
        endif;
    }
        
            
}  

