<?php


class DeletarDados {
    
    //=================================================================================================
    //----------------- DELETAR LOGIN ---------------------------
    //=================================================================================================
    public function DeletaLogin($IdLogin){
        
        $DeletaLogin = new Delete();
        $DeletaLogin->ExeDelete('login', "WHERE id_login = :id", 'id='.$IdLogin);
        
        if($DeletaLogin->getResult()):
            echo"{$DeletaLogin->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
    }
    
    //=================================================================================================
    //----------------- DELETAR PACIENTE ---------------------
    //=================================================================================================
    public function DeletarPaciente(PacienteMold $paciente){
        $DeletarPagamentos = new Delete();
        $DeletaAvaliacao =new Delete();
        $DeletaConsumos = new Delete();
        $DeletaAnminese = new Delete();
        $DeletaPaciente = new Delete();
        
        //$DeletarPagamentos->ExeDelete('pagamentos', "WHERE paciente = :id", 'id='.$paciente->getId_Pessoa());
        $DeletaAvaliacao->ExeDelete('avaliacao_antropometrica', "WHERE paciente = :id", 'id='.$paciente->getId_Pessoa());
        $DeletaConsumos->ExeDelete('consumos', "WHERE paciente_id = :id", 'id='.$paciente->getId_Pessoa());
        $DeletaAnminese->ExeDelete('anaminese', "WHERE paciente = :id", 'id='.$paciente->getId_Pessoa());
        $DeletaPaciente->ExeDelete('pacientes', "WHERE id_paciente = :id", 'id='.$paciente->getId_Pessoa());
        
        
        if($DeletaPaciente->getResult()):
            echo"{$DeletaPaciente->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
    }
    
    //=================================================================================================
    //------------------ DELETA ANMINESE -----------------------
    //=================================================================================================
    public function DeletaAmnise(AnmineseMold $anminese){
        
        $DeletaAnminse = new Delete();
        $DeletaAnminse->ExeDelete('anaminese', "WHERE id_anaminese = :id", 'id='.$anminese->getId_Anminese());
        
        if($DeletaAnminse->getResult()):
            echo"{$DeletaAnminse->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
        
    }
    
    //=================================================================================================
    //----------------- DELETA CONSUMOS -------------------
    //=================================================================================================
    public function DeletaConsumos(ConsumosMold $consumos){
        
        $DeletaConsumos = new Delete();
        $DeletaConsumos->ExeDelete('consumos', "WHERE id_consumo = :id", 'id='.$consumos->getId_Consumos());
        
        if($DeletaConsumos->getResult()):
            echo"{$DeletaConsumos->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
    }
    
    //==================================================================================================
    //---------------------- DELETA AVALIAÇÃO ----------------------
    //==================================================================================================
     public function DeletaAvaliacao(AvaliacaoMold $aval){
         
        $DeletaPagamento=new Delete();
        $DeletaPagamento->ExeDelete("pagamentos", "WHERE referencia = :id", 'id='.$aval->getId_Avaliacao());
         
        $DeletaAvaliacao = new Delete();
        $DeletaAvaliacao->ExeDelete('avaliacao_antropometrica', "WHERE id_avalicao = :id", 'id='.$aval->getId_Avaliacao());
        
       
        if($DeletaAvaliacao->getResult()):
            echo"{$DeletaAvaliacao->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
    }
    
    //==================================================================================================
    //---------------------- DELETA Bioimpedancia ----------------------
    //==================================================================================================
     public function DeletaBioimpedancia(BioImpedancia $bio){
        
        $DeletaBio = new Delete();
        $DeletaBio->ExeDelete('bioimp', "WHERE id_bio = :id", 'id='.$bio->getId_bio());
        
       
        if($DeletaBio->getResult()):
            echo"{$DeletaBio->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
    }
    
   
}