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
    
    private $Checked;
            
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
    
    function getChecked() {
        return $this->Checked;
    }

        public function listaPaciente(PacienteMold $id){
        $this->dadosPacientes($id,1);
    }
    public function checkedDada($Termos,$Tipo){
        $this->Tipo=$Tipo;
        
        $coluna=['id_paciente'=>'id_paciente',
                  'nome'=>'nome',
                  'cpf'=>'cpf',
                  'sexo'=>'sexo',
                  'profissao'=>'profissao', 
                  'data_nascimento'=>'data_nascimento',
                  'altura'=>'altura',
                  'email'=>'email',
                  'telefone'=>'telefone'];
         $ColumTable2=[];
              $this->ExRead('pacientes', $coluna, $Termos, $ColumTable2, $this->Tipo);
    }

    public function dadosPacientes(PacienteMold $pac, $Tipo) {
        $this->Tipo=$Tipo;
        
        if($this->Tipo==1):
            $Termos2 = " where nome like '{$pac->getNome()}%' "
            . "ORDER BY nome ";
            
             $coluna2=['id_paciente'=>'id_paciente',
                  'nome'=>'nome',
                  'cpf'=>'cpf',
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
                  'cpf'=>'cpf',
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
               while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                   $this->setId_Pessoa($col['id_paciente']);
                   $this->setNome($col['nome']);
                    echo"<li class='bg-light mt-1 d-block'><a class='ml-2 text-secondary text-decoration-none' href='pacientes.php?idpac={$this->getId_Pessoa()}'>{$this->getNome()}</a></li>";
             
               endwhile;
        
            elseif($this->Tipo==2):
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->setId_Pessoa($col['id_paciente']);
                    $this->setNome($col['nome']);
                    $this->setCpf($col['cpf']);
                    $this->setSexo($col['sexo']);
                    $this->Profissao=$col['profissao'];
                    $this->setData_Nascimento($col['data_nascimento']);
                    $this->setIdade($col['data_nascimento']);
                    $this->setAltura($col['altura']);
                    $this->Email=$col['email'];
                    $this->Telefone=$col['telefone'];
                endwhile;
                
                    echo"<h3 class='text-center bg-secondary mt-2 text-light p-2'>{$this->getNome()}</h3>
                    <p class='bcAzulMar pl-5 ftsinze-18 p-2'><b class='ml-2 text-secondary'>CPF:</b><span id='dadosCpf' class='ml-2'>{$this->getCpf()}</span></p>
                    <p class='bcAzulMar pl-5 ftsinze-18 p-2'><b class='ml-2 text-secondary'>Profissão:</b><span class='ml-2'>{$this->getProfissao()}</span></p>
                    <p class='bcAzulMar pl-5 ftsinze-18 p-2'><b class='ml-2 text-secondary'>Nascimento:</b><span class='pl-2'>".date('d/m/Y',  strtotime($this->getData_Nascimento()))."</span> </p>
                    <p class='bcAzulMar pl-5 ftsinze-18 p-2'>
                        <b class='ml-2 text-secondary'>Idade:</b><span class='ml-1'>{$this->getIdade()} anos</span>
                        <b class='ml-2 text-secondary'>Altura:</b><span class='ml-1'>{$this->getAltura()}</span>
                    </p>
                    <p class='bcAzulMar pl-5 ftsinze-18 p-2'><b class='ml-2 text-secondary'>E-Mail:</b><span class='ml-2'>{$this->getEmail()}</span></p>
                    <p class='bcAzulMar pl-5 ftsinze-18 p-2'><b class='ml-2 text-secondary'>Telefone:</b><span class='pl-2'>{$this->getTelefone()}</span> </p>
                    <nav>
                        <ul class='list-stile-None'>
                            <li class='d-inline-block m-2'><a href='#' data-toggle='modal' data-target='#modalEditForm'><img src='icons-main/icons/pencil-square.svg' alt='Editar' width='25' height='25' title='Editar'></a></li>
                            <li class='d-inline-block m-2'><a href='Anamnese.php?idpac={$this->getId_Pessoa()}'><img src='icons-main/icons/clipboard.svg' alt='Anminese' width='25' height='25' title='Anminese'></a></li>
                            <li class='d-inline-block m-2'><a href='consumos.php?idpac={$this->getId_Pessoa()}'><img src='icons-main/icons/basket2.svg' alt='Consumos' width='25' height='25' title='Consumos'></a></li>
                            <li class='d-inline-block m-2'><a href='Avaliacoes.php?idpac={$this->getId_Pessoa()}'><img src='icons-main/icons/table.svg' alt='Avaliações' width='25' height='25' title='Avaliações'></a></li>
                            <li class='d-inline-block m-2'><a href='BioImpedancia.php?idpac={$this->getId_Pessoa()}'><img src='icons-main/icons/tablet-landscape.svg' alt='Bioimpedância' width='25' height='25' title='BioImpedância'></a></li>
                            <li class='d-inline-block m-2'><a href='#'><img src='icons-main/icons/journals.svg' alt='Anotações' width='25' height='25' title='Anotações'></a></li>
                            <li class='d-inline-block m-2'><a href='ListPagamentos.php?idpac={$this->getId_Pessoa()}'><img src='icons-main/icons/cash-stack.svg' alt='Pagamentos' width='25' height='25' title='Pagamentos'></a></li>
                            <li class='d-inline-block m-2'>
                            <form method='POST' action='excluirdados.php'>
                                <input type='hidden' name='tipoexc' value='1'>
                                <input type='hidden' name='ex_idpac' value='{$this->getId_Pessoa()}'>
                                <button style='border:0; color:none;'><img src='icons-main/icons/trash.svg' alt='Excluir' width='25' height='25' title='Excluir'></button>
                            </form>
                            </li>
                        </ul>
                    </nav>";
                
                  
            elseif($this->Tipo==3):
                while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
                    $this->setId_Pessoa($col['id_paciente']);
                    $this->setNome($col['nome']);
                    $this->setCpf($col['cpf']);
                    $this->setSexo($col['sexo']);
                    $this->Profissao=$col['profissao'];
                    $this->setData_Nascimento($col['data_nascimento']);
                    $this->setAltura($col['altura']);
                    $this->setIdade($col['data_nascimento']);
                    $this->Email=$col['email'];
                    $this->Telefone=$col['telefone'];
                endwhile;
            elseif($this->Tipo=="checked"):
                $col = $this->Read_1->fetch(PDO::FETCH_ASSOC);
                if($this->Read_1->rowCount()>0){
                    $this->Checked= $this->Read_1->rowCount();
                }else{
                    $this->Checked=0;
                }
                
                echo $this->getChecked();
                    
            endif;
     
    
    }
    
}
