<?php
/**
 * Description of PacienteMold
 *
 * @author Birra
 */
class PacienteMold extends PessoaMold{
    private $Profissao;
    private $Email;
    private $Telefone;
    
    function getProfissao() {
        return $this->Profissao;
    }

    function getEmail() {
        return $this->Email;
    }

    function getTelefone() {
        return $this->Telefone;
    }

    function setProfissao($Profissao) {
        $this->Profissao = $Profissao;
    }

    function setEmail($Email) {
        $this->Email = $Email;
    }

    function setTelefone($Telefone) {
        $this->Telefone = $Telefone;
    }
    
    
    public function listaPaciente(PacienteMold $id){
        $this->dadosPacientes($id,1);
    }

    public function dadosPacientes(PacienteMold $pac, $Tipo) {
        $this->Tipo=$Tipo;
        
        if($this->Tipo==1):
            $Termos2 = " where nome like '{$pac->getNome()}%' "
            . "ORDER BY nome ";
            
             $coluna2=['id_paciente'=>'id_paciente',
                  'nome'=>'nome',
                  'sexo'=>'sexo',
                  'profissao'=>'profissao', 
                  'data_nascimento'=>'data_nascimento',
                  'altura'=>'altura',
                  'email'=>'email',
                  'telefone'=>'telefone'];
             
        elseif($this->Tipo == 2 || $this->Tipo == 3):
            $Termos2 = "inner join sexo s on p.sexo=s.id_sexo "
                . "where id_paciente ={$pac->getId_Pessoa()}";
                
                $coluna2=['id_paciente'=>'id_paciente',
                  'nome'=>'nome',
                  'sexo'=>'s.sexo',
                  'profissao'=>'profissao', 
                  'data_nascimento'=>'data_nascimento',
                  'altura'=>'altura',
                  'email'=>'email',
                  'telefone'=>'telefone'];
        endif;
        
       
       
       $ColumTable2=[];

        $this->ExRead('pacientes p', $coluna2, $Termos2, $ColumTable2, $this->Tipo);
    }

    public function Syntax() {
        if($this->Tipo==1):
            echo"<table>"
              . "<tr>";
               while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                   $this->setId_Pessoa($col['id_paciente']);
                   $this->setNome($col['nome']);
                    echo"<td colspan='2'>  <a href='dadosPacientes.php?idpac={$this->getId_Pessoa()}'>{$this->getNome()}</a>  </td>"
              . "</tr>";
               endwhile;
            echo"</table>";
        
            elseif($this->Tipo==2):
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->setId_Pessoa($col['id_paciente']);
                    $this->setNome($col['nome']);
                    $this->setSexo($col['sexo']);
                    $this->Profissao=$col['profissao'];
                    $this->setData_Nascimento($col['data_nascimento']);
                    $this->setIdade($col['data_nascimento']);
                    $this->setAltura($col['altura']);
                    $this->Email=$col['email'];
                    $this->Telefone=$col['telefone'];
                endwhile;
                
                echo "<tr>"
                      . "<td><b>Nome:</b> {$this->getNome()}</td>"
                    . "</tr>"
                      
                    . "<tr>"
                      . "<td><b>Profissão:</b> {$this->getProfissao()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Nascimento:</b>".date('d/m/Y',  strtotime($this->getData_Nascimento()))."</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Idade:</b> {$this->getIdade()} anos</td>"
                    . "</tr>"
                             
                    . "<tr>"
                      . "<td><b>Altura:</b> {$this->getAltura()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>E-Mail:</b> {$this->getEmail()}</td>"
                    . "</tr>"
                              
                    . "<tr>"
                      . "<td><b>Telefone:</b> {$this->getTelefone()}</td>"; 
                  echo"</tr>";
            elseif($this->Tipo==3):
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->setId_Pessoa($col['id_paciente']);
                    $this->setNome($col['nome']);
                    $this->setSexo($col['sexo']);
                    $this->Profissao=$col['profissao'];
                    $this->setData_Nascimento($col['data_nascimento']);
                    $this->setIdade($col['data_nascimento']);
                    $this->Email=$col['email'];
                    $this->Telefone=$col['telefone'];
                endwhile;
            endif;
     
    
    }
    
}
