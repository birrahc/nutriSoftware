<!DOCTYPE html>
<?php
session_start();
    if(!isset ($_SESSION['carrinho']) ){					
        $_SESSION['carrinho']= array();
    }						
    $id= intval($_GET['id']);						
    if(!isset ($_SESSION['carrinho'] [$id]) ){		
        $_SESSION['carrinho'] [$id]= 1;				
    }else{									
	$_SESSION['carrinho'] [$id]+= 1;	
	}									

?>
<script>
    
    
function envio() {
var r=confirm("Tem certeza que deseja enviar as informações?");
if (r==true) {
window.location="paginaenvio.html";
teste.submit();
}
}



    function funcao_b() {
  alert('Cadastrado com Sucesso');
  window.location="recebeteste.php";
}
    function confirmar() {
        $( "#dialog-confirm" ).dialog({
          resizable: false,
          height: "auto",
          width: 400,
          modal: true,
          buttons: {
            "Sim": function() {
              $( this ).dialog( "close" );
              funcao_b();
            },
            'Não': function() {
              $( this ).dialog( "close" );
              console.log('cancelado');
            }
          }
        });
       teste.submit(); 
    }
    function pergunta(){ 
   if (confirm('Tem certeza que quer enviar este formulário?')){ 
      document.teste.submit() 
   } 
}

function pergunta(){
    if (confirm('Tem certeza que quer enviar este formulário?')){
                document.teste.focus() 
     if(document.teste.nome.value!==""){
            document.teste.nome.focus();
        }
        else{
            alert("Por favor preencha o campo Nome");
            return false;
        }
    
}
}
function validacao(){
	
    }

</script>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
        <script src="Script/query/query.js"></script>
        <script src="Script/query/query2.js"></script>
        <title></title>
    </head>
    <body>
    <?php
    require('./_app/config.inc.php');
        $pessoa = new AvaliacaoMold();
        $pacmod = new PacienteMold();
        $CodName= new PacienteMold();
        $Avaliacao = new AvaliacaoMold();
        $AvalicaDao = new AvaliacaoMold();
        $Consumo = new ConsumosMold();
        $anminese = new AnmineseMold();
        
        //$anminese->setId_Pessoa(1);
        //$CodName->setId_Pessoa(6);
        //$pessoa->setId_Pessoa($CodName->getId_Pessoa());
       /* $pacmod->listaPaciente($CodName);
        $pacmod->dadosPacientes($CodName, 2);
        $Avaliacao->ListaAvaliacao($pessoa);
        $Consumo->ListaConsumos($pessoa, 1);
        $anminese->ListaAnminese($anminese);*/
        
        $Avaliacao->setId_Avaliacao(1);
        $AvalicaDao->AvalEspecifica($Avaliacao);
        echo"Nome ". $AvalicaDao->getNome()."<br/>";
        echo"Idade ". $AvalicaDao->getIdade()." Anos<br/>";
        var_dump($AvalicaDao);
        
        
        
        
    ?>
        
    </body>
</html>
