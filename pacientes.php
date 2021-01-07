<!DOCTYPE html>
<?php
    require_once './controle.php';
    require('./_app/config.inc.php');

    $paciente= new PacienteMold();
    $pacDao= new PacienteMold();
    
    $Obs_paciente= new Observacao();
    $Observacao= new Observacao();
    $Obsespecifica = new Observacao();
    
    if(isset($_GET['idpac'])):
        isset($_GET['idpac']);
        $paciente->setId_Pessoa($_GET['idpac']);
        $Obs_paciente->setId_Pessoa($_GET['idpac']);
    endif;
    
    if(isset($_POST['ObsEsp'])):
        $Obs_paciente->setSearch($_POST['ObsEsp']);
    endif;
    
if(isset($_POST['pesquisar'])):
    isset($_POST['pesquisar']);
    $paciente->setNome($_POST['pesquisar']);
endif;
date_default_timezone_set('America/Sao_Paulo');
$data_Sistema = date('Y-m-d');
?>

<html>
    <head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" href="css/stylo.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css.map">
        <link rel="stylesheet" href="css/sweetalert2.min.css">
        
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/sweetalert2.min.js"></script>
        <script src="js/jquery.mask.min.js"></script>
        <script src="js/validacao.js"></script>
        <script src="js/validaUpadte.js"></script>
        
        
        <title>Pacientes</title>
    </head>
    <body>
        <div class="container-fluid">
        <?php
            require 'menu.php';
        ?>
        </div>
        <div class="container" style="margin-top: 64px;">
            <div class="row m-0">
                
                <div class="col-4 bcAzulMar bdr-20 bd-top-bottom-left">
                    <div class="mt-2 bg-secondary p-2">
                        <form action="#" method="POST">
                            <input class="w-75 ml-1 p-1" type="text" name="pesquisar"/>
                            <input class="btn btn-light" type="submit" value="Buscar"/>
                        </form>
                    </div>
                    <div class="height-390 overflow-auto">
                        <ul class="p-0 list-stile-None">
                           <?php
                                $pacDao->listaPaciente($paciente);
                            ?>
                        </ul>
                    </div>
                    <div class="text-right mt-2">
                        <a href="" class=" mb-4" data-toggle="modal" data-target="#modalRegisterForm">
                          <img src="icons-main/icons/file-plus.svg" alt="Cadastrar Paciente" width="25" height="25" title="Cadastrar Paciente">
                        </a>
                    </div>
                    
                    
                </div>
                <div class="col-5 bg-light height-500 bdr-20 bds-1">
                    <?php
                        if($paciente->getId_Pessoa()):
                            $pacDao->dadosPacientes($paciente, 2);
                        endif;
                    ?>
                </div>
                <div class="col-3 bg-light position-static bdr-20 bds-1" style="height: 500px;">
                     <h4 class="bg-secondary text-light text-center mt-2 p-2">Anotações</h4>
                     <?php
                     if($Obs_paciente->getId_Pessoa()):
                     ?>
                     <div class="overflow-auto bg-light height-80">
                         <?php
                            $Observacao->listaObservacao($Obs_paciente);
                         ?>
                     </div>
                     <div class="text-right mt-2">
                        <a href="" class=" mb-4" data-toggle="modal" data-target="#modalRegisterObs">
                          <img src="icons-main/icons/file-plus.svg" alt="Cadastrar Paciente" width="25" height="25" title="Cadastrar Paciente">
                        </a>
                    </div>
                     <?php
                     endif;
                     ?>
                </div>
            </div>
            <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h4 class="modal-title w-100 font-weight-bold">Cadastro de Paciente</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                      <form id="cadastraPaciente" method="POST" action="dadosPaciente.php">
                    <div class="modal-body mx-3 m-0">
                        <div class="md-form">
                          <label class="m-0 fs-10 error" data-error="wrong" data-success="right" for="nome">Nome</label>
                          <input type="text" name="nome" id="nome" class="form-control">
                          
                        </div>
                      
                        <div class="md-form mb-1 w-45 d-inline-block">
                            <label class="m-0 fs-10 error" data-error="wrong" data-success="right" for="sexo">Sexo</label><br>
                            <span>Masculino</span><input name="sexo" type="radio" value="1" id="sexo" class="ml-2">
                            <span>Feminino</span><input name="sexo" type="radio" value="2" id="sexo" class="ml-2">
                        </div>
                        
                        <div class="md-form mb-1 w-45 d-inline-block ml-39">
                            <label class="m-0 fs-10 error" data-error="wrong" data-success="right" for="nascimento">Nascimento</label>
                            <input type="date" name="nascimento" id="" class="form-control">
                            
                        </div>
                        
                        <div class="md-form mb-1 w-20 d-inline-block">
                            <label class="m-0 fs-10" data-error="wrong" data-success="right" for="altura">Altura</label>
                            <input type="text" name="altura" id="altura" class="form-control">
                            
                        </div>
                        <div class="md-form mb-1 w-45 d-inline-block" style="margin-left:146px;">
                          <label class="m-0 fs-10 error" data-error="wrong" data-success="right" for="cpf">CPF</label>
                          <input type="text" name="cpf" id="cpf" class="form-control">
                        </div>
                      <div class="md-form mb-1 d-block">
                        <label class="m-0 fs-10" data-error="wrong" data-success="right" for="orangeForm-pass">Profissão</label>
                        <input type="text" name="profissao" id="orangeForm-pass" class="form-control">
                      </div>
                       <div class="md-form mb-1 d-block">
                        <label class="m-0 fs-10" data-error="wrong" data-success="right" for="orangeForm-pass">Telefone</label>
                        <input type="text" name="telefone" id="orangeForm-pass" class="form-control">
                      </div>
                      <div class="md-form mb-1 d-block">
                          <label class="m-0 fs-10 error" data-error="wrong" data-success="right" for="email">E-Mail</label>
                          <input type="email" name="email" id="email" class="form-control">
                      </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="submit" value="Cadastrar" class="btn btn-primary"/>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
          
            <div class="modal fade" id="modalEditForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h4 class="modal-title w-100 font-weight-bold">Editar Paciente</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form id="formPacUpdate" method="POST" action="dadosPaciente.php">
                        <input type="hidden" name="id_paciente" value="<?php echo $pacDao->getId_Pessoa()?>"/>
                    <div class="modal-body mx-3 m-0">
                        <div class="md-form">
                          <label class="m-0 fs-10" data-error="wrong" data-success="right" for="orangeForm-name">Nome</label>
                          <input type="text" name="nome" value="<?php echo $pacDao->getNome()?>"id="orangeForm-name" class="form-control validate">
                        </div>
                         <?php
                            $checked_M="";
                            $checked_F="";
                            if($pacDao):
                                if($pacDao->getSexo()=='M'):
                                    $checked_M="checked='true'";
                                    $checked_F="";
                                elseif($pacDao->getSexo()=='F'):
                                    $checked_F="checked='true'";
                                    $checked_M="";
                                endif;
                                    endif;
                            ?>
                      
                        <div class="md-form mb-1 w-45 d-inline-block">
                            <label class="m-0 fs-10" data-error="wrong" data-success="right" for="orangeForm-email">Sexo</label><br>
                            <span>Masculino</span><input name="sexo" <?php echo $checked_M ?> type="radio" value="1" id="orangeForm-email" class="ml-2">
                            <span>Feminino</span><input name="sexo" <?php echo $checked_F ?> type="radio" value="2" id="orangeForm-email" class="ml-2">
                        </div>
                        
                        <div class="md-form mb-1 w-45 d-inline-block ml-39">
                            <label class="m-0 fs-10" data-error="wrong" data-success="right" for="orangeForm-pass">Nascimento</label>
                            <input type="date" name="nascimento" value="<?php echo $pacDao->getData_Nascimento()?>" id="orangeForm-pass" class="form-control validate">
                        </div>
                        
                        <div class="md-form mb-1 w-20 d-inline-block">
                            <label class="m-0 fs-10" data-error="wrong" data-success="right" for="orangeForm-pass">Altura</label>
                            <input type="text" name="altura" value="<?php echo $pacDao->getAltura()?>" id="orangeForm-pass" class="form-control validate">
                        </div>
                        <div class="md-form mb-1 w-45 d-inline-block" style="margin-left:146px;">
                          <label class="m-0 fs-10" data-error="wrong" data-success="right" for="orangeForm-name">CPF</label>
                          <input type="text" name="cpf" value="<?php echo $pacDao->getCpf()?>" id="cpf" class="form-control validate">
                        </div>
                      <div class="md-form mb-1">
                        <label class="m-0 fs-10" data-error="wrong" data-success="right" for="orangeForm-pass">Profissão</label>
                        <input type="text" name="profissao" value="<?php echo $pacDao->getProfissao()?>" id="orangeForm-pass" class="form-control validate">
                      </div>
                       <div class="md-form mb-1">
                        <label class="m-0 fs-10" data-error="wrong" data-success="right" for="orangeForm-pass">Telefone</label>
                        <input type="text" name="telefone" value="<?php echo $pacDao->getTelefone()?>" id="orangeForm-pass" class="form-control validate">
                      </div>
                      <div class="md-form mb-1">
                          <label class="m-0 fs-10" data-error="wrong" data-success="right" for="orangeForm-pass">E-Mail</label>
                          <input type="email" name="email" value="<?php echo $pacDao->getEmail() ?>" id="orangeForm-pass" class="form-control validate">
                      </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                      <button class="btn btn-primary">Editar</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            
            <div class="modal fade" id="modalRegisterObs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h4 class="modal-title w-100 font-weight-bold">Registro de Observação</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                      <form id="cadastrarObs" method="POST" action="dadosObservacao.php">
                    <div class="modal-body mx-3 m-0">
                        <div class="md-form">
                            
                                <h5 class="text-center"><?php echo $pacDao->getNome() ?></h5>
                                <input id="paciente_obs" type="hidden" name="paciente_obs" value="<?php echo $Obs_paciente->getId_Pessoa() ?>"/>
                        </div>
                        
                        <div class="md-form">
                            <input type="date" name="data_obs" value="<?php echo $data_Sistema ?>" style="margin-left: 67%; border: 0;"/>
                        </div>
                        
                        <div class="md-form mb-1 w-45 d-inline-block ml-39">
                            <label class="m-0 fs-10 error" data-error="wrong" data-success="right" for="nascimento">Descrição</label>
                            <textarea id="obs_paciente" style="resize: none; width: 185%; height: 270px;" name="observacao" id="obsGeral" class="form-control validate align-content-md-start">
                                
                            </textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary">Cadastrar</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            
            <div class="modal fade" id="modalEditObs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h4 class="modal-title w-100 font-weight-bold">Editar Observação</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                      <form id="editarObs" method="POST" action="dadosObservacao.php">
                    <div class="modal-body mx-3 m-0">
                        <div class="md-form">
                            
                                <h5 class="text-center"><?php echo $pacDao->getNome() ?></h5>
                                <input type="hidden" id="paciente_obs_edit" name="paciente_obs" value="<?php echo $Observacao->getId_Pessoa() ?>"/>
                                <input type="hidden" id="id_observacao" name="id_observacao" value="<?php echo $Observacao->getId_Obs() ?>"/>
                        </div>
                        <div class="md-form">
                            <input type="date" name="data_obs" value="<?php echo $Observacao->getData_obs() ?>" style="margin-left: 67%; border: 0;"/>
                        </div>
                        
                        
                            <label class="m-0 fs-10 error" data-error="wrong" data-success="right" for="nascimento">Descrição</label>
                            <textarea id="obs_paciente_edit" style="resize: none; width: 100%; height: 270px; overflow: hidden;" name="observacao" id="obsGeral" class="form-control validate align-content-md-start">
                                <?php  echo $Observacao->getObservacao() ?>
                            </textarea>
                        
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary">Cadastrar</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

        </div>
        
        
        
    </body>
</html>
