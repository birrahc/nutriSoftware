<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <script type="text/javascript" src="Script/validaCamaposLogin.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/personalizacao.css" rel="stylesheet"/>
        <title></title>
    </head>
    <body>
       <div class="divPaginaLog">
        <?php
        if(isset($_GET['cad'])):
            if($_GET['cad'] == 'ok'):
                echo"<script> alert('Login Cadastrado com Sucesso !')</script>";
            endif;
        endif;
        ?>
        
        <div class="divContSimb">
            <img src="imagens/logo atual.jpg"/>
            <h2>Acesso ao Sistema</h2>
        </div>
                    
        <div class="pagContLog">
        <form name="formlogin" action="login.php" method="POST" onsubmit="return validaLogin();">
        <table border="0">                            
        <tr>
            <td><h3>Login:</h3></td>
            <td><input type="text" name="login"/></td>
        </tr>
                            
        <tr>
            <td colspan="2"></td>
        </tr>
                           
        <tr>
            <td><h3>Senha:</h3></td>
            <td><input type="password" name="senha"/></td>
        </tr>
                            
        <tr>
            <td colspan="2"></td>
        </tr>             
                            
        <tr>
            <td colspan="2"></td>
        </tr>
                            
        <tr>
            <td><h3><p align="center"><img src="imagens/login.png" width="25" height="25"/></p></h3></td>
            <td><button type="submit"> <b>Logar</b> </button></td>
        </tr>
        
        <tr>
            <td colspan="2"><p align="center"><a href="cadastrarLogin.php">Cadastrar Login</a></p></td>
        </tr>
        </table>     
        </form> 
        </div>
           
        </div>
        
        <div class="divimgLogo"> 
            <img src="imagens/logoLogin.png"/>
        </div>
     
    </body>
</html>
