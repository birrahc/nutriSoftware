<?php

class PacienteDao extends Select {
private $UltimaId;
private $Idade;

private $id_paciente;
private $Nome;
private $Profissao;
private $Nascimento;
private $Telefone;
private $Email;

function getId_paciente() {
    return $this->id_paciente;
}

function getTelefone() {
    return $this->Telefone;
}


function getNome() {
    return $this->Nome;
}

function getProfissao() {
    return $this->Profissao;
}

function getNascimento() {
    return $this->Nascimento;
}

function getEmail() {
    return $this->Email;
}

function setIdade($Nascimento) {
        $Data_Nascimento = explode('-', $Nascimento);
        $Data = date('d/m/Y');
        $Data_Sist = explode('/', $Data);
        //Calculo
        $Anos= $Data_Sist[2]-$Data_Nascimento[0];
        if($Data_Nascimento[1] > $Data_Sist[1]):
             $Anos-=1; 
            //echo $Anos.'anos<br>';
        else:
            if($Data_Nascimento[1]==$Data_Sist[1]):
                if($Data_Nascimento[2] > $Data_Sist[0]):
                   $Anos-=1; 
                endif;
            endif;
         //echo $Anos.' anos// <br>';   
        endif;
       
        $this->Idade=$Anos;
    }
    function getUltimaId() {
        return $this->UltimaId;
    }

        function getIdade() {
        return $this->Idade;
    }

    
    
    public function CadastrarPaciente(Paciente $paciente){
        
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
    
     //================================================================================================
    //--------------- ATUALIZAR DADOS PACIENTE -------------------
    //================================================================================================
    public function AtualizarPaciente(Paciente $paciente){
        
        $DadosPacientes=['nome' => $paciente->getNome(),
                'data_nascimento' => $paciente->getData_Nascimento(), 
                'profissao' => $paciente->getProfissao(), 
                'telefone' => $paciente->getTelefone(), 
                'email' => $paciente->getEmail()
                 ];
        
        $AtulPac=new Update();
        $AtulPac->ExUpdate('pacientes', $DadosPacientes, "WHERE id_paciente = :id", 'id='.$paciente->getIdPessoa());
        
        if($AtulPac->getResult()):
            echo"{$AtulPac->getRunCount()} dados Atualizados <br>";
        endif;
    }
    
    public function ListaPacientes(Pessoa $paciente){
        
       $Termos = " where nome like '{$paciente->getNome()}%'";
       $coluna=['id_paciente'=>'id_paciente',
                 'nome'=>'nome'];
       
       $ColumTable=['Id',
                    'Nome'];

        
        $this->ExRead('pacientes p', $coluna, $Termos, $ColumTable,1);
    }
    


    public function SelectDadosPaciente($idpac,$Tipo){
        $this->Tipo=$Tipo;
       $Termos2 = " where id_paciente ={$idpac}";
       $coluna2=['id_paciente'=>'id_paciente',
                 'nome'=>'nome',
                 'profissao'=>'profissao', 
                 'data_nascimento'=>'data_nascimento',
                 'email'=>'email',
                 'telefone'=>'telefone'];
       
       $ColumTable2=['Id',
                     'Nome',
                     'Profissão', 
                     'Nascimento', 
                     'E-Mail', 
                     'Telefone',
                     'Idade'];

        $this->ExRead('pacientes p', $coluna2, $Termos2, $ColumTable2,$Tipo);
    }
    
    //=================================================================================================
    //----------------- DELETAR PACIENTE ---------------------
    //=================================================================================================
    public function DeletarPaciente(Paciente $paciente){
        $DeletaAvaliacao =new Delete();
        $DeletaConsumos = new Delete();
        $DeletaAnminese = new Delete();
        $DeletaPaciente = new Delete();
        
        $DeletaAvaliacao->ExeDelete('avalicao_antropometrica', "WHERE paciente = :id", 'id='.$paciente->getIdPessoa());
        $DeletaConsumos->ExeDelete('consumos', "WHERE paciente_id = :id", 'id='.$paciente->getIdPessoa());
        $DeletaAnminese->ExeDelete('anaminese', "WHERE paciente = :id", 'id='.$paciente->getIdPessoa());
        $DeletaPaciente->ExeDelete('pacientes', "WHERE id_paciente = :id", 'id='.$paciente->getIdPessoa());
        
        
        if($DeletaPaciente->getResult()):
            echo"{$DeletaPaciente->getRunCount()} registro(s) deletados com sucesso: <hr>";
        endif;
    }

    //put your code here
    public function Syntax() {
        if($this->Tipo==1):
            echo'<table>';
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $col['id_paciente'];
                    echo"<tr>"
                        ."<td colspan='2'>  <a href='dadosPacientes.php?idpac={$col['id_paciente']}'>{$col['nome']}</a>  </td>"
                      . "</tr>";
                endwhile;
            echo'</table>';
                   
                
                    
        elseif($this->Tipo==2):
                $paciente = new Paciente();
               
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                   $this->id_paciente = $col['id_paciente'];
                   $this->Nome = $col['nome'];
                   $this->Profissao = $col['profissao'];
                   $this->Nascimento = $col['data_nascimento'];
                   $this->Telefone = $col['telefone'];
                   $this->Email = $col['email'];
                   $this->setIdade($col['data_nascimento']);
                    
                    echo"<tr>"
                      . "<td><b>Nome:</b> {$col['nome']}</td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td><b>Profissão:</b> {$col['profissao']}</td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td><b>Nascimento:</b>".date('d/m/Y',  strtotime($col['data_nascimento']))."</td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td><b>Idade:</b> {$this->getIdade()} anos</td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td><b>E-Mail:</b> {$col['email']}</td>"
                    . "</tr>"
                    . "<tr>"
                      . "<td><b>Telefone:</b> {$col['telefone']}</td>";
                endwhile;
                    echo"</tr>";
            elseif($this->Tipo==3):
               
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                   $this->id_paciente = $col['id_paciente'];
                   $this->Nome = $col['nome'];
                   $this->Profissao = $col['profissao'];
                   $this->Nascimento = $col['data_nascimento'];
                   $this->Telefone = $col['telefone'];
                   $this->Email = $col['email'];          
               endwhile;    
        endif;
    }

}
