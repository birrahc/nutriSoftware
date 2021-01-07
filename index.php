<!DOCTYPE html>
<?php
    if(isset($_GET['cad'])):
        if($_GET['cad'] == 'ok'):
            echo"<script> alert('Login Cadastrado com Sucesso !')</script>";
        endif;
     endif;
?>

<html lang="pt-br">
    <head>
         <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="css/stylo.css">
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/sweetalert2.min.js"></script>
        <script src="js/validacao.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        <div id="container">
            <div class="row m-0">
                <div class="img-login">
                    <img src="imagens/logo atual.jpg">
                </div>
            </div>
            <div class="banner-login">
                <img src="imagens/banner-login1.png">
            </div>
            <div>
                <a class="text-decoration-none mb-4" data-toggle="modal" data-target="#modalRegisterForm" href="#"><h4 class="text-center text-secondary">Logar</h4></a>
                <p class="text-center text-primary"> <a href="cadastrarLogin.php"> Cadastrar Login</a> </p>
            </div>
            
 <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
     <form name="formlogin" action="login.php" method="POST" onsubmit="return validaLogin();">
        <div class="modal-content" style="width: 70%; margin: auto;">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Login</h4>
            <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-2">
              <i class="fas fa-user prefix grey-text"></i>
              <input type="text" name="login" id="orangeForm-name" class="form-control validate">
              <label data-error="wrong" data-success="right" for="orangeForm-name">Usuário</label>
            </div>

            <div class="md-form mb-3">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password" name="senha" id="orangeForm-pass" class="form-control validate">
              <label data-error="wrong" data-success="right" for="orangeForm-pass">Senha</label>
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="btn btn-outline-primary">Entrar</button>
          </div>
      </div>
    </form>
  </div>
</div>


        </div>
    </body>
</html>
