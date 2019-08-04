<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <script type="text/javascript" src="Script/validaCamposCadLogin.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/personalizacao.css" rel="stylesheet"/>
        <title></title>
    </head>
    <body>
        <div class="divPaginaLog">
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
            
        <div class="divContSimb">
            <img src="imagens/logo atual.jpg"/>
            <h2>Cadastro de Usuário</h2>
        </div>
                    
        <div class="divcadLogin">
        <form name="formcadlogin" action="dadosLogin.php" method="POST" onsubmit="return validacadlogin();">
        <table border="0">                          
        <tr>
            <td><h3>Login:</h3><br><input type="text" name="login"/></td>
        </tr>
        
        <tr>
            <td><h3>Senha:</h3><br><input type="password" name="senha"/></td>
        </tr>
            
        <tr>
            <td><h3>Repetir Senha:</h3><br><input type="password" name="repsenha"/></td>
        </tr>
                            
        <tr>
            <td><h3>Autorização:</h3><br><input type="password" name="autorizacao"/></td>
        </tr>
               
        <tr>
            <td></td>
        </tr>
                            
        <tr>
            <td><button type="submit"> <b>Cadastrar</b> </button></td>
        </tr>
               
        <tr>
            <td><p align="center"><a href="login.php">Cancelar</a></p></td>
        </tr>
        
        </table> 
        </form>   
        </div>
            
        </div>
        
    </body>
</html>
