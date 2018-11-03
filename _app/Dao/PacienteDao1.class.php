<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PacienteDao1
 *
 * @author Birra
 */
class PacienteDao1 extends Select{
    private $CodPaciente;
    private $Paciente;
    private $Sexo;
    private $Nascimento;
    private $Profissao;
    private $Email;
    private $Telefone;
            
            
    function getCodPaciente() {
        return $this->CodPaciente;
    }
    function getPaciente() {
        return $this->Paciente;
    }
    function getNascimento() {
        return $this->Nascimento;
    }

    function getProfissao() {
        return $this->Profissao;
    }

    function getEmail() {
        return $this->Email;
    }

    function getTelefone() {
        return $this->Telefone;
    }
    function getSexo() {
        return $this->Sexo;
    }

    
        
    public function listaPaciente(Paciente1 $pac){
        $this->dadosPacientes($pac,1);
    }

    public function dadosPacientes(Paciente1 $paciente, $Tipo) {
        $this->Tipo=$Tipo;
        
        if($this->Tipo==1):
            $Termos2 = " where nome like '{$paciente->getNome()}%'";
            
             $coluna2=['id_paciente'=>'id_paciente',
                  'nome'=>'nome',
                  'sexo'=>'sexo',
                  'profissao'=>'profissao', 
                  'data_nascimento'=>'data_nascimento',
                  'email'=>'email',
                  'telefone'=>'telefone'];
             
        elseif($this->Tipo==2||$this->Tipo==3):
            $Termos2 = "inner join sexo s on p.sexo=s.id_sexo "
                . "where id_paciente ={$paciente->getIdPessoa()}";
                
                $coluna2=['id_paciente'=>'id_paciente',
                  'nome'=>'nome',
                  'sexo'=>'s.sexo',
                  'profissao'=>'profissao', 
                  'data_nascimento'=>'data_nascimento',
                  'email'=>'email',
                  'telefone'=>'telefone'];
        endif;
        
       
       
       $ColumTable2=['Id',
                     'Nome',
                     'Profissão', 
                     'Nascimento', 
                     'E-Mail', 
                     'Telefone',
                     'Idade'];

        $this->ExRead('pacientes p', $coluna2, $Termos2, $ColumTable2, $this->Tipo);
    }
    public function Syntax() {
        //Lista de pacientes
            $paciente = new Paciente1();
            
            if($this->Tipo==1):
        echo"<table>"
            . "<tr>";
               while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                   $this->CodPaciente=$col['id_paciente'];
                   $this->Paciente=$col['nome'];
                    echo"<td colspan='2'>  <a href='dadosPacientes1.php?idpac={$this->getCodPaciente()}'>{$this->getPaciente()}</a>  </td>"
               . "</tr>";
               endwhile;
        echo"</table>";
        
            elseif($this->Tipo==2):
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->CodPaciente=$col['id_paciente'];
                    $this->Paciente=$col['nome'];
                    $this->Sexo=$col['sexo'];
                    $this->Profissao=$col['profissao'];
                    $this->Nascimento=$col['data_nascimento'];
                    $paciente->setIdade($col['data_nascimento']);
                    $this->Email=$col['email'];
                    $this->Telefone=$col['telefone'];
                endwhile;
                
                echo "<tr>"
                      . "<td><b>Nome:</b> {$this->getPaciente()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Profissão:</b> {$this->getProfissao()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Nascimento:</b>".date('d/m/Y',  strtotime($this->getNascimento()))."</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Idade:</b> {$paciente->getIdade()} anos</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>E-Mail:</b> {$this->getEmail()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Telefone:</b> {$this->getTelefone()}</td>"; 
                  echo"</tr>";
            elseif($this->Tipo==3):
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->CodPaciente=$col['id_paciente'];
                    $this->Paciente=$col['nome'];
                    $this->Sexo=$col['sexo'];
                    $this->Profissao=$col['profissao'];
                    $this->Nascimento=$col['data_nascimento'];
                    $paciente->setIdade($col['data_nascimento']);
                    $this->Email=$col['email'];
                    $this->Telefone=$col['telefone'];
                endwhile;
            endif;
     
    }

}
