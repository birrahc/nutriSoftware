
<?php 
    //require_once './controle.php';
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
require("./_app/config.inc.php");
$paciente =new PacienteMold();
$pacienteCad=new Cadastro();
$AtualizarPac = new AtualizaDados();
       

if(isset($_POST['nome'])):
    $paciente->setNome($_POST['nome']);
endif;

if(isset($_POST['sexo'])):
    $paciente->setSexo($_POST['sexo']);
endif;

if(isset($_POST['profissao'])):
    $paciente->setProfissao($_POST['profissao']);
endif;

if(isset($_POST['nascimento'])):
    $paciente->setData_Nascimento($_POST['nascimento']);
endif;

if(isset($_POST['email'])):
    $paciente->setEmail($_POST['email']);
endif;

if(isset($_POST['telefone'])):
    $paciente->setTelefone($_POST['telefone']);
endif;
if(isset($_POST['id_paciente'])):
    $paciente->setId_Pessoa($_POST['id_paciente']);
endif;
    if($paciente->getId_Pessoa()>=1):
        $AtualizarPac->AtualizarPaciente($paciente);
        header("Location: dadosPacientes.php?idpac={$paciente->getId_Pessoa()}");
        
    elseif($paciente->getId_Pessoa()<1):
        if(!empty($paciente->getNome())||!$paciente->getNome()==null):
            $pacienteCad->CadastrarPaciente($paciente);
            header("Location: cadastrarAnminese.php?idpac={$pacienteCad->getUltimaId()}");
        endif;
    endif;
        

?>


    




