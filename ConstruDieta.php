<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    require('./_app/config.inc.php');
    $conexao = new Conexao();

    $horario = new HoraDieta();
    
    $alimentos = new Alimentos();
    
    $bebidas = new Bebidas();
    
    $qtdMedida = new QuantidadeMedida();
    
    $qtdMedidaSub = new QuantidadeMedida();
    
    $qtdAl = new QuantidadeMedida();
    
    $qtdAlSub = new QuantidadeMedida();
    
    $qtdIntervalo = new QuantidadeMedida();
    
    $qtdintervlist = new QuantidadeMedida();
    
    $dieta = new Dietas();
    
    $cadastrarDieta = new Cadastro();
    
    //$qtd->Especifico(1, 1);

    $linha=0;
    if(!isset($_GET["linha"])):
        $linha=$_GET["linha"]=4;
    endif;
    $numero=4;

   

    
    
     session_start();
    
if(isset($_GET['pacienteId'])){
        $_SESSION['paciente']= $_GET['pacienteId'];
}


echo " Paciente {$_SESSION['paciente']} <br>";


$_SESSION['dataDieta']=date('d/m/Y');

echo"DATA {$_SESSION['dataDieta']}";
 //SESSAO HORARIO
if(!isset($_SESSION['horarios'])):
    $_SESSION['horarios']= array();
endif;

if(isset($_GET['acao_horario'])):
    if($_GET['acao_horario']=='add'):
        $linha_hora = intval($_GET['linha_hora']);
        $cont_hora = intval($_GET['cont_hora']);
        $_SESSION['horarios'][$linha_hora][$cont_hora]=0;
    elseif($_GET['acao_horario']=='del'):
        $selectlinha=intval($_GET['removlin']);
        if(isset($_GET['removitem'])){
        $selectitem=intval($_GET['removitem']);
        }
        unset($_SESSION['horarios'][$selectlinha]);
    elseif($_GET['acao_horario']=='deltudo'):
        unset($_SESSION['horarios']);
    endif;
endif;

//SESSAO ALIMENTOS//
// Verifica se a sessao alimentos nao existe				
if(!isset ($_SESSION['alimentos']) ):					
    $_SESSION['alimentos']= array(array());
endif;
																				
//Adiciona o alimento										
if(isset ($_GET['acao']) ):								
    //Adicionar Carrinho									
    if($_GET['acao']=='add'):							
        $linhacont = intval($_GET['linhacont']);
        $ind_conteudo = $_GET['ind_conteudo'];
        
        if(!isset($_SESSION['alimentos'][$linhacont])):
            $_SESSION['alimentos'][$linhacont][$ind_conteudo]="";
        else:
            $_SESSION['alimentos'][$linhacont][$ind_conteudo]="";
        endif;
    elseif($_GET['acao'] =='del'):								//
        $selectlinha=intval($_GET['removlin']);
        $selectitem=intval($_GET['removitem']);
        if(isset ($_SESSION['alimentos'] [$selectlinha]) ):		
            unset ($_SESSION['alimentos'] [$selectlinha][$selectitem]);
        endif;
    elseif($_GET['acao'] =='deltudo'):
        if(isset ($_SESSION['alimentos'])):
             unset ($_SESSION['alimentos']);
        endif;
   // Alterar quantidade
    elseif($_GET['acao'] == 'up'):
        if(is_array($_POST['descri'])):
            foreach($_POST['descri'] as $id => $lin):
                $linhacont = intval($id);
                echo"id {$id}";
                if(is_array($lin)):
                    foreach($lin as $campo => $decricao):
                    $ind_conteudo =intval($campo);
                    $descricao=$decricao;
                    if(!empty ($descricao)):
                        $_SESSION['alimentos'][$id][$campo]=$descricao;
                    else:
                        $_SESSION['alimentos'][$id][$campo]="";
                    endif;
                    endforeach;
                endif;
            endforeach;
	endif;
   
    endif;
endif;

//SESSAO SUBSTITUIÇÃO
if(!isset ($_SESSION['substituicao']) ):					
    $_SESSION['substituicao']= array(array());
endif;
																				
//Adiciona o alimento										
if(isset ($_GET['acao_sub']) ):								
    //Adicionar Carrinho									
    if($_GET['acao_sub']=='add'):							
        $linhacont = intval($_GET['linhacont']);
        $conteudo = intval($_GET['ind_conteudo']);
	$_SESSION['substituicao'][$linhacont][$conteudo]="";
    elseif($_GET['acao_sub'] =='del'):								//
        $selectlinha=intval($_GET['removlin']);
        $selectitem=intval($_GET['removitem']);	//
        if(isset ($_SESSION['substituicao'] [$selectlinha]) ):		
            unset ($_SESSION['substituicao'] [$selectlinha][$selectitem]);
        endif;
    elseif($_GET['acao_sub'] =='deltudo'):
        if(isset ($_SESSION['substituicao'])):
             unset ($_SESSION['substituicao']);
        endif;
    elseif($_GET['acao_sub'] == 'up'):
        if(is_array($_POST['descri_sub'])):
            foreach($_POST['descri_sub'] as $id => $linSub):
                $linhacont = intval($id);
                echo"id {$id}";
                if(is_array($linSub)):
                    foreach($linSub as $campo => $decricao):
                    $ind_conteudo =intval($campo);
                    $descricao=$decricao;
                    if(!empty ($descricao)):
                        $_SESSION['substituicao'][$id][$campo]=$descricao;
                    else:
                        $_SESSION['substituicao'][$id][$campo]="";
                    endif;
                    endforeach;
                endif;
            endforeach;
	endif;
   
    endif;
endif;

//SESSAO INTERVALOS
if(!isset ($_SESSION['intervalos']) ):					
    $_SESSION['intervalos']= array(array());
endif;
																				
//Adiciona o alimento intervalos										
if(isset ($_GET['acao_intv']) ):								
    //Adicionar Carrinho									
    if($_GET['acao_intv']=='add'):							
        $linhaintervalo = intval($_GET['linha_intv']);
        $conteudointervalo = intval($_GET['conteudo_intv']);
	$_SESSION['intervalos'][$linhaintervalo][$conteudointervalo]="";
    elseif($_GET['acao_intv'] =='del'):								//
        $selectlinha=intval($_GET['removlin']);
        $selectitem=intval($_GET['removitem']);	//
        if(isset ($_SESSION['intervalos'] [$selectlinha]) ):		
            unset ($_SESSION['intervalos'] [$selectlinha][$selectitem]);
        endif;
    elseif($_GET['acao_intv'] =='deltudo'):
        if(isset ($_SESSION['intervalos'])):
             unset ($_SESSION['intervalos']);
        endif;
    elseif($_GET['acao_intv'] == 'up'):
        if(is_array($_POST['descri_intv'])):
            foreach($_POST['descri_intv'] as $id => $lin):
                $linhacont = intval($id);
                echo"id {$id}";
                if(is_array($lin)):
                    foreach($lin as $campo => $decricao):
                    $ind_conteudo =intval($campo);
                    $descricao=$decricao;
                    if(!empty ($descricao)):
                        $_SESSION['intervalos'][$id][$campo]=$descricao;
                    else:
                        $_SESSION['intervalos'][$id][$campo]="";
                    endif;
                    endforeach;
                endif;
            endforeach;
	endif;
   
    endif;
endif;
//////////// Finalizar Dieta ////////////////////////
if(isset($_GET['acao_final'])){
    if($_GET['acao_final']=="finalizar"){
        if(count($_SESSION['horarios'])>0){
            if(count($_SESSION['alimentos']) < 1){
                echo"Favor preencher os alimentos.";
            }else{ 
                foreach($_SESSION['horarios'] as $linhahora => $conthora){
                    if(is_array($conthora)){
                        foreach ($conthora as $hora => $val){
                            echo "hora == {$hora} <br>";
                            
                            $dietaAlimento=array();
                            
                            foreach ($_SESSION['alimentos'] as $linhacont => $ind_conteudo ){
                                if(is_array($ind_conteudo)){
                                    foreach ($ind_conteudo as $conteudo => $valor){
                                        
                                        foreach ($_SESSION['substituicao'] as $linhaSub => $ind_Sub){
                                            if(is_array($ind_Sub)){
                                                foreach ($ind_Sub as $sub => $val){
                                                    
                                                    foreach($_SESSION['intervalos'] as $linhaInt => $ind_int){
                                                        if(is_array($ind_int)){
                                                            foreach($ind_int as $intervalos => $vl){
                                                                if($hora >0 && $conteudo >0 && $sub >0 && $intervalos >0){
                                                                    
                                                                    $dieta->setLinha_campo($linhacont);
                                                                    $dieta->setDieta_numero(1);
                                                                    $dieta->setPlano_Alimentar("Dieta pra secar");
                                                                    $dieta->setPaciente(11);
                                                                    $dieta->setData_dieta($_SESSION['dataDieta']);
                                                                    $dieta->setHora_dieta($hora);
                                                                    $dieta->setAlimento($conteudo);
                                                                    $dieta->setQtd_alimento($valor);
                                                                    $dieta->setSubstituicao($sub);
                                                                    $dieta->setQtd_substituicao($val);
                                                                    $dieta->setIntervalos($intervalos);
                                                                    $dieta->setQtd_intervalos($vl);
                                                                    $dieta->setAnotacoes("Continuar Mantendo");
                                                                    
                                                                    if(!$linhacont == $linhacont && !$conteudo == $conteudo){
                                                                        $cadastrarDieta->CadastrarDietas($dieta);
                                                                    }
                                                                    echo"Campo == " .$linhacont. " Prduto == ". $conteudo. " Quantidade == {$valor}<br>";
                                                                    echo "Subtituicao: linha == {$linhaSub} Alimento == {$sub} Qtd == {$val}<br>";
                                                                    echo " Intervalos: linha == {$linhaInt} Intervalos == {$intervalos} <br>";

                                                                     /*array_push($dietaAlimento, array('linha'=>$linhacont,
                                                                         'hora'=>$hora,'alimentos'=>$conteudo,
                                                                         'quantidade'=> intval($valor),
                                                                         'Substituicao'=>$sub, 'qtd'=> intval($val),
                                                                         'intervalo'=>$intervalos,'qtdInt'=> intval($vl) ));

                                                                    echo '<pre>';
                                                                    var_dump($dietaAlimento);
                                                                    echo'</pre>';*/
                                                                }
                                                            }
                                                        }
                                                    }
                                                   
                                                }
                                            }
                                        }
                                        
                                            
                                        
                                    }///
                                }

                            }
                            
                            
                        }
                    }
                }//final
            }
        } else {
            echo"E preciso preenchaer a hora";
        }
        
    }
}

 $_SESSION['linhas']+=$linha;

?>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
    <body>
        
        <table border="1" width="1000" height="600" align="center">
        <tr>
            <td colspan="2">
                <b>Paciente</b><br/>
                <input type='text'/>
            </td>
            <td>
                <b>Data</b><br/>
                <input type='date'/>
            </td>
        </tr>

        <tr>
        <td colspan="3">
            <b>Plano Alimentar</b><br/>
            <input type='text'/>
        </td> 
        </tr>
        <tr>
            <td width="120">Horario:</td>
            <td width="240">Alimento:</td>
            <td width="240">Substituição:</td>
        </tr>
        <tr>
<?php 
    for ($i = 0; $i <= $_SESSION['linhas']; $i++):
        echo"<td>";
            echo"<form action='?acao=add method='GET'>";
            echo"<input type='hidden' name='linha_hora' value='{$i}'/>";
            echo"<input type='hidden' name='acao_horario' value='add'/>";
            echo"<input type='hidden' name='linha' value='{$_SESSION['linhas']}'/>";
?>
            <select name='cont_hora'>"
                <option>Selecione</option>"
                <?php $horario->listaHora()?>
            </select>
            <input type='submit' value='ok'/>
<?php           
            echo"</form>";
            
        echo"</td>";
        

        echo"<td>";
            echo"<form action='construDieta.php?acao=up method='GET'>";
            echo"<input type='hidden' name='linhacont' value='{$i}'/>";
            echo"<input type='hidden' name='acao' value='add'/>";
            echo"<input type='hidden' name='linha' value='{$_SESSION['linhas']}'/>";
?>
            <select name='ind_conteudo'>
                <option>Selecione</option>
                <?php $alimentos->listaAlimentos() ?>
            </select>
            <input type='submit' value='ok'/>
<?php
            echo"</form>";
        echo"</td>"
            
          . "<td>";
            echo"<form action='?acao=add' method='GET'>";
            echo"<input type='hidden' name='linhacont' value='{$i}'/>";
            echo"<input type='hidden' name='acao_sub' value='add'/>";
            echo"<input type='hidden' name='linha' value='{$_SESSION['linhas']}'/>";
?>
            <select name='ind_conteudo'>
                <option>Selecione</option>
                <?php $alimentos->listaAlimentos() ?>
            </select>
            <input type='submit' value='ok'/>
<?php
            echo"</form>";
            echo"</td>";
    echo"</tr>"
      . "<tr>";
         echo"<td>";
         
                foreach($_SESSION['horarios']as $indlin =>$val):
                   // echo"linhahora {$indlin}";
                    if($indlin==$i):
                        if(is_array($val)):
                            foreach ($val as $cont_hora =>$valorh):
                                //echo"Cont_hora {$cont_hora}";
                                $Selecinar= " SELECT * FROM horarios WHERE id_horarios ='{$cont_hora}' ";
                                $conexao->getConn();
                                $conect = $conexao->getConn()->query($Selecinar);
                                $col = $conect->fetch(PDO::FETCH_ASSOC);
                                //$col['id_local_alm'];
                            echo "<table>"
                                . "<tr>"
                                    . "<td>{$col['hora']}</td>"
                                    . "<td><input type='hidden' value='{$cont_hora}'/></td>"
                                    . "<td><a href='?acao_horario=del&removlin={$indlin}&cont_hora={$cont_hora}&linha={$_SESSION['linhas']}'>x</a></td>"
                                . "</tr>"
                              . "</table>";
                            endforeach;
                        endif;
                    endif;
                endforeach;
                
         echo"</td>"
              . "<td>";
         
        foreach($_SESSION['alimentos'] as $indlinha => $valorlinha):
            if($indlinha==$i):
                if(is_array($valorlinha)):
                        echo"<form action='construDieta.php?acao=up' method='POST'>";
                        echo "<table border='0'>";
                    foreach ($valorlinha as $id => $valor):
                        $Selecinar= " SELECT * FROM alimentos WHERE id_alimento ='{$id}' ";
                        
                            $conexao->getConn();
                            $conect = $conexao->getConn()->query($Selecinar);
                            $col = $conect->fetch(PDO::FETCH_ASSOC);
                            
                            if($valor<=0 || $valor==null){
                                $valor = 0;
                            }
                           $qtdAl->Especifico($valor);
                            echo "<tr>"
                                . "<td style='border-bottom: solid 1px;'>{$col['alimento']}</td>";
?>                      
                                <td style='border-bottom: solid 1px;'>
                                    <select name='<?php echo"descri[{$indlinha}][{$id}]" ?>'>
                                        <option value="<?php echo $valor ?>"> <?php echo $qtdAl->getDescQtd();  ?> </option>
                                        <?php echo $qtdMedida->listaQtdMedida() ?>
                                    </select>
                                </td>
<?php                       
                                //."<td><input type'text' name='descri[{$indlinha}][{$id}]' value='{$valor}'/></td>"
                                echo"<input type='hidden' name='linha' value='{$_SESSION['linhas']}'/>";
                                echo "<td><input type='submit' value='v'/></td>"
                                . "<td><a href='?acao=del&removlin={$indlinha}&removitem={$id}&linha={$_SESSION['linhas']}'>x</a></td>"
                            . "</tr>";
                            
                            //var_dump($_SESSION['alimento_dieta']);
                //print_r($_SESSION['alimentos']);
                //var_dump($_SESSION['alimentos']);
                    endforeach;
                echo"</table>";
                        echo"</form>";
                endif;
            endif; 
        endforeach;
            
        echo"</td>";
        echo"<td>";
        /// substituicao////////////////////////////////////////
           
        foreach($_SESSION['substituicao'] as $indlinha => $valorlinha):
            if($indlinha==$i):
                //echo "linha {$indlinha} <hr>";
                if(is_array($valorlinha)):
                    
                     echo"<form action='construDieta.php?acao_sub=up' method='POST'>";
                        echo "<table border='0'>";
                    foreach ($valorlinha as $id => $valor):
                        $Selecinar= " SELECT * FROM alimentos WHERE id_alimento ='{$id}' ";
                            $conexao->getConn();
                            $conect = $conexao->getConn()->query($Selecinar);
                            $col = $conect->fetch(PDO::FETCH_ASSOC);
                              if($valor <0 ||$valor==null){
                                    $valor=0;
                                }
                            $qtdAlSub->Especifico($valor);
                       
                            echo "<tr>"
                                . "<td>{$col['alimento']}</td>";
?>
                                
                                <td>
                                    <select name='<?php echo"descri_sub[{$indlinha}][{$id}]" ?>'>
                                        <option value="<?php echo $valor ?>"> <?php echo $qtdAlSub->getDescQtd();  ?> </option>
                                        <?php echo $qtdMedidaSub->listaQtdMedida() ?>
                                    </select>
                                </td>
<?php
                                //. "<td><input type='text' name='descri_sub[{$indlinha}][{$id}]' value='{$valor}'/></td>"
                                echo"<td><input type='submit' value='v'/></td>"
                                . "<td><a href='?acao_sub=del&removlin={$indlinha}&removitem={$id}&linha={$_SESSION['linhas']}'>x</a></td>"
                            . "</tr>";
                         
                //print_r($_SESSION['alimentos']);
                //var_dump($_SESSION['alimentos']);
                    endforeach;
                     echo "</table> "
                    . "</form>";
                       
                endif;
            endif; 
        endforeach;
        
        echo"</td>"
        . "</tr>"
        . "<tr>"
            . "<td colspan='3'> <b>Intervalos"; 
                echo"<form action='?acao=add' method='GET'>";
                echo"<input type='hidden' name='linha_intv' value='{$i}'/>";
                echo"<input type='hidden' name='acao_intv' value='add'/>";
                echo"<input type='hidden' name='linha' value='{$_SESSION['linhas']}'/>";
?>
            <select name='conteudo_intv'>
                <?php $bebidas->listaBebidas() ?>
            </select>
                <input type='submit' value='ok'/>
<?php
            echo"</form>";
        echo"</td>"
      . "</tr>";
    echo"<tr>"
            . "<td colspan='3'>";
                foreach($_SESSION['intervalos'] as $indlinha => $valorlinha):
            if($indlinha==$i):
                //echo "linha {$indlinha} <hr>";
                if(is_array($valorlinha)):
                    foreach ($valorlinha as $id => $valorintervalo):
                        $Selecinar= " SELECT * FROM bebidas WHERE id_bebida ='{$id}' ";
                            $conexao->getConn();
                            $conect = $conexao->getConn()->query($Selecinar);
                            $col = $conect->fetch(PDO::FETCH_ASSOC);
                            //$col['id_local_alm'];
                        echo"<form action='construDieta.php?acao_intv=up' method='POST'>";
                        echo "<table>"
                            . "<tr>"
                                . "<td>{$col['bebida']}</td>";
                                if($valorintervalo <=0 || $valorintervalo == null){
                                    $valorintervalo = 0;
                                }
                                
                                $qtdIntervalo->Especifico($valorintervalo);
?>
                                <td>
                                    <select name='<?php echo"descri_intv[{$indlinha}][{$id}]" ?>'>
                                     <option value="<?php echo $valorintervalo ?>"> <?php echo $qtdIntervalo->getDescQtd();  ?> </option>
                                        <?php echo $qtdintervlist->listaQtdMedida() ?>
                                    </select>
                                </td>
<?php
                                
                                //. "<td><input type='text' name='descri_intv[{$indlinha}][{$id}]' value='{$valor}'/></td>"
                                echo"<td><input type='submit' value='v'/></td>"
                                . "<td><a href='?acao_intv=del&removlin={$indlinha}&removitem={$id}&linha={$_SESSION['linhas']}'>x</a></td>"
                            . "</tr>"
                          . "</table>";
                        echo"</form>";
                //print_r($_SESSION['alimentos']);
                //var_dump($_SESSION['alimentos']);
                    endforeach;
                endif;
            endif; 
        endforeach;
          echo"</td>"
    . "</tr>";
    
   //array_push($_SESSION['dieta_finalizada'],array($_SESSION['hora_dieta'][$i]));
   //var_dump($_SESSION['dieta_finalizada']);
    endfor;
            
?>
        </table>
         <form method='GET' align="center">
            <button type="submit" name="linha" value="<?php echo $linha+1 ?>">Adicionar linha</button>
            <button type="submit" name="linha" value="<?php echo $linha-1 ?>">Diminuir linha</button>
        </form>
        
        <form action="" method="POST">
        <table>
        <tr>
        <?php
        /*for ($i = 0; $i <= $_SESSION['linhas']; $i++):
        echo"<td width='50'><input type='hidden' name='hora$i' value='{$horario[$i]}'/> </td>"
          . "<td><input type='hidden' name='alimentacao$i' value='{$alimento[$i]}'/></td>"
          . "<td><input type='hidden' name='qtd{$i}' value='{$quantidade[$i]}'/> </td>"
          . "<td><input type='hidden' name='subst$i' value='{$substituicoes[$i]}'/> </td>"
          . "<td><input type='hidden' name='interv{$i}' value='{$intervalos[$i]}'/> </td>";
        echo"</tr>";
        endfor;
         * 
         */
        ?>
        </table>
            <button type="submit">Cadastrar</button>
        </form>
        
        
        
         
    
</body>
</html>
