<!DOCTYPE html>

<?php
    if(isset($_GET['cad'])):
        if($_GET['cad'] == 'auto'):
            echo "<script>alert('Autorização nula ou não valida')</script>";
                
        elseif($_GET['cad'] == 'lognull'):
            echo "<script>alert('O campo Login esta Vazio ou nulo!')</script>";
                
        elseif($_GET['cad'] == 'passnull'):
            echo "<script>alert('O campo senha esta Vazio ou nulo!')</script>";
                
        elseif($_GET['cad'] == 'dif'):
            echo "<script>alert('O campo senha esta diferente do campo Repete Senha!')</script>";
                
        elseif($_GET['cad'] == 'reppassnull'):
            echo "<script>alert('O campo Repete Senha está nulo ou vazio!')</script>";
        endif;
    endif;
?>

<html lang="pt-br">
    <head>
        <script type="text/javascript" src="Script/validaCamposCadLogin.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/stylo_large.css">
        <title></title>
    </head>
    <body>
         <div id="geral">
             
             <h1 class="h1-cad-log">Cadastro de Login</h1>
            
            <div class="centro-login">
                
                <form name="formcadlogin" action="dadosLogin.php" method="POST" onsubmit="return validacadlogin();">
                    
                <div class="input-inteiro">
                    <h5>Login:</h5>
                    <input type="text" name="login" placeholder="Login de Acesso">
                </div>
                <div class="input-inteiro">
                    <h5>Senha:</h5>
                    <input type="password" name="senha" placeholder="Senha de Acesso">
                </div>
                <div class="input-inteiro">
                    <h5>Senha:</h5>
                    <input type="password" name="repsenha" placeholder="Repita a Senha">
                </div>
                <div class="input-inteiro">
                    <h5>Autorização:</h5>
                    <input type="password" name="autorizacao" placeholder="Autorização de cadastro">
                </div>
                    <div id="botao-login"><button>Cadastrar</button></div>
                </form>
            </div>
            
        </div>
    </body>
</html>
