function funcao_b() {
  alert('Cadastrado Com Sucesso!');
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
}

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<script type="text/javascript" src=""></script>
<script type="text/javascript" src="javascript.js"></script>

<button id="btn" onclick="confirmar();">Clica</button>
<div id="dialog-confirm" title="Confirmar ?"></div>

