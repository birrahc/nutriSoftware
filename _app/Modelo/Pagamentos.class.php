<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pagamentos
 *
 * @author Birra
 */
class Pagamentos extends AvaliacaoMold{
    private $Ultimo_Registro;
    private $Consulta;
    private $Id_Pagamento;
    private $Data_Consulta;
    private $Referencia;
    private $Tipos;
    private $Plano;
    private $Valor;
    private $Qtd_vezes;
    private $Valor_Parcelas;
    private $Situacao;
    private $Local_Atendimento;
    private $Observacao;

    function getUltimo_Registro() {
        return $this->Ultimo_Registro;
    }

    function getId_Pagamento() {
        return $this->Id_Pagamento;
    }

    function getData_Consulta() {
        return $this->Data_Consulta;
    }

    
    function getReferencia() {
        return $this->Referencia;
    }

    function getTipo() {
        return $this->Tipos;
    }

    function getPlano() {
        return $this->Plano;
    }

    function getValor() {
        return $this->Valor;
    }

    function getQtd_vezes() {
        return $this->Qtd_vezes;
    }

    function getValor_Parcelas() {
        return $this->Valor_Parcelas;
    }

    function getSituacao() {
        return $this->Situacao;
    }

    function getLocal_Atendimento() {
        return $this->Local_Atendimento;
    }

    function getObservacao() {
        return $this->Observacao;
    }
    
    function getConsulta() {
        return $this->Consulta;
    }

    function getTipos() {
        return $this->Tipos;
    }

    function setConsulta($Consulta) {
        $this->Consulta = $Consulta;
    }

    function setTipos($Tipos) {
        $this->Tipos = $Tipos;
    }

        
    function setUltimo_Registro($Ultimo_Registro) {
        $this->Ultimo_Registro = $Ultimo_Registro;
    }

        
    function setId_Pagamento($Id_Pagamento) {
        $this->Id_Pagamento = $Id_Pagamento;
    }

    
    function setData_Consulta($Data_Consulta) {
        $this->Data_Consulta = $Data_Consulta;
    }

    function setReferencia($Referencia) {
        $this->Referencia = $Referencia;
    }

    function setTipo($Tipos) {
        $this->Tipos = $Tipos;
    }

    function setPlano($Plano) {
        $this->Plano = $Plano;
    }

    function setValor($Valor) {
        $this->Valor = $Valor;
    }

    function setQtd_vezes($Qtd_vezes) {
        $this->Qtd_vezes = $Qtd_vezes;
    }

    function setValor_Parcelas($Valor_Parcelas) {
        $this->Valor_Parcelas = $Valor_Parcelas;
    }

    function setSituacao($Situacao) {
        $this->Situacao = $Situacao;
    }

    function setLocal_Atendimento($Local_Atendimento) {
        $this->Local_Atendimento = $Local_Atendimento;
    }

    function setObservacao($Observacao) {
        $this->Observacao = $Observacao;
    }
    
    public function listaParcialPg(Pagamentos $pagamentos, $tipo){
        $this->Tipo=$tipo;
        
        $coluna5=['id_pagamento'=>'id_pagamento',
                  'referencia'=>'referencia',
                  'p.id_paciente'=>'p.id_paciente as id_paciente',
                  'p.nome'=>'p.nome as nome',
                  'ava.consulta'=>'ava.consulta as consulta',
                  'ava.data_avalicao'=>'ava.data_avalicao as data_avalicao',
                  'tp.tipo'=>'tp.tipo as tipo',
                  'plan.planos'=>'plan.planos as planos',
                  'valor'=>'valor',
                  'qtd_vezes'=>'qtd_vezes',
                  'st.status'=>'st.status as situacao',
                  'la.nome'=>'la.nome as l_atendimento',
                  'observacao'=>'observacao'
                ];
        if($this->Tipo==1):    
        $Termos5 =" inner join avaliacao_antropometrica ava on referencia = ava.id_avalicao"
                . " inner join pacientes p on paciente= p.id_paciente "
                . " inner join tipo tp on pg.tipo = tp.id_tipo "
                . " inner join planos plan on pg.plano = plan.id_plano "
                . " inner join status st on situacao = st.id_status "
                . " inner join local_atendimento la on l_atendimento = la.id_local "
                . " where id_pagamento='{$pagamentos->getId_Pagamento()}'";
        else:
            $Termos5 =" inner join avaliacao_antropometrica ava on referencia = ava.id_avalicao"
                . " inner join pacientes p on paciente= p.id_paciente "
                . " inner join tipo tp on pg.tipo = tp.id_tipo "
                . " inner join planos plan on pg.plano = plan.id_plano "
                . " inner join status st on situacao = st.id_status "
                . " inner join local_atendimento la on l_atendimento = la.id_local "
                . " where id_paciente='{$pagamentos->getId_Pessoa()}'";
        endif;        
                $ColumTable5 = [];
                    
       $this->ExRead("pagamentos pg ", $coluna5, $Termos5, $ColumTable5, $this->Tipo);
    }

    public function Syntax() {
      
        while ($col = $this->Read->fetch(PDO::FETCH_ASSOC)):
               $this->Id_Pagamento=$col['id_pagamento'];
               $this->Referencia=$col['referencia'];
               $this->setId_Pessoa($col['id_paciente']);
               $this->setNome($col['nome']);
               $this->Consulta=$col['consulta'];
               $this->setData_Consulta($col['data_avalicao']);
               $this->Tipos = $col['tipo'];
               $this->Plano = $col['planos'];
               $this->Valor = $col['valor'];
               $this->Qtd_vezes = $col['qtd_vezes'];
               $this->Situacao = $col['situacao'];
               $this->Local_Atendimento = $col['l_atendimento'];
               $this->Observacao = $col['observacao'];
       
           
        
    if($this->Tipo==1 || $this->Tipo==3):
          
          echo"<td><b>Paciente:</b> {$this->getNome()}</td>"
            . "<td><b>Referente a consulta Nº:</b> {$this->getConsulta()}</td>"
            . "<td><b>Data :</b> {$this->getData_Consulta()}</td>";
            
    elseif($this->Tipo==2):
        
        echo"<tr>"
                . "<td><b>Paciente:</b> {$this->getNome()}</td>"
                . "<td><b>Referente a consulta Nº:</b> {$this->getConsulta()}</td>"
                . "<td><b>Data :</b> {$this->getData_Consulta()}</td>"
            . "</tr>"
                        
            . "<tr>"
                . "<td><b>Tipo :</b> {$this->getTipo()}</td>"
                . "<td><b>Plano :</b> {$this->getPlano()}</td>"
                . "<td><b>Valor :</b> {$this->getValor()}</td>"
            . "</tr>"
                        
            . "<tr>"
                . "<td><b>Parcelado em :</b> {$this->getQtd_vezes()}X</td>" 
                . "<td><b>Situação :</b> {$this->getSituacao()}</td>"
                . "<td><b>Local :</b> {$this->getLocal_Atendimento()}</td>"
            . "</tr>"
                        
            . "<tr>"
                . "<td colspan='3'><b>Observação :</b> {$this->getObservacao()}</td>"
            . "</tr>"
                        
            . "<tr>"
               . "<td colspan='3'>"
                    . "<a href='CadastrarPagamentos.php?idpg={$this->getId_Pagamento()}&idpac={$this->getId_Pessoa()}'>Editar | </a>"
                    . "<a href='dadosPacientes.php'> Sair | </a>"
                . "</td>"
            . "</tr>"
             . "<tr>"
                . "<td colspan='3'><hr></a>"
            . "</tr>";
    endif;
endwhile;
    }
        
    

}
