<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">
          <?= $protocolo ?>
        </h3>
        <div id="cliente"></div>
      </div>
      <form
        action="<?= $protocolo == 'Novo Produto' ? base_url('produtos/salvar_produto') : base_url('produtos/update_produto/' . $produto->id_pessoa); ?> "
        method='post'>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">

              <label for="produto">Nome do Produto</label>
              <input type="text" class="form-control" name="aparelho"
                value="<?= isset($produto->aparelho) ? $produto->aparelho : ''; ?>" id="aparelho" maxlenght="60"
                <?= $protocolo == 'Novo Produto' ? 'required' : '' ?>>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">

              <label for="modelo">Modelo do Produto</label>
              <input type="text" class="form-control" name="modelo"
                value="<?= isset($produto->modelo) ? $produto->modelo : ''; ?>" id="modelo" maxlenght="60"
                <?= $protocolo == 'Novo Produto' ? 'required' : '' ?>>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">


              <label for="nome">Nome do cliente</label>
              <input type="text" onkeyup="getCliente(this)" class="form-control" name="nome"
                value="<?= isset($produto->nome) ? $produto->nome : '' ?>" id="nome" maxlenght="60" <?= $protocolo == 'Novo Produto' ? 'required' : '' ?>>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 <?= $protocolo != 'Novo Produto' ? 'd-none' : '' ?>">


              <label for="nome">Email do cliente</label>
              <input type="email" onkeyup="getCliente(this)" class="form-control" name="email" id="email" maxlenght="60">

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 <?= $protocolo != 'Novo Produto' ? 'd-none' : '' ?>">


              <label for="nome">Senha do cliente (caso não exista)</label>
              <input type="password" class="form-control" name="senha" id="senha" maxlenght="60">

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">

              <label for="logradouro">Endereço do cliente</label>
              <input type="text" onkeyup="getCliente(this)" class="form-control" name="logradouro"
                value="<?= isset($produto->logradouro) ? $produto->logradouro : ''; ?>" id="logradouro" maxlenght="60">

            </div>


            <div class="col-lg-6 col-md-6 col-sm-12 mb-1">

              <label for="telefone">Telefone do cliente</label>
              <input type="text"  onkeyup="getCliente(this)" class="form-control" name="telefone"
                value="<?= isset($produto->telefone) ? $produto->telefone : ''; ?>" id="telefone" maxlenght="20">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 mb-1">

              <label for="orcamento">Orçamento</label>
              <input type="text" class="form-control" name="orcamento"
                value="<?= isset($produto->orcamento) ? $produto->orcamento : ''; ?>" id="orcamento" maxlenght="20">
            </div>
          </div>
          <hr>
          <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 mb-1">

              <label for="componentes">Componentes (separado por ";")</label>
              <textarea class="form-control" name="componentes"
                value="<?= isset($produto->componentes) ? $produto->componentes : ''; ?>" id="componentes"
                maxlenght="200"></textarea>
            </div>

            <!-- select -->
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="form-group">
                <label>Etapa</label>
                <select class="form-control" name="etapa">
                  <option selected value="fila">Na fila</option>
                  <option value="analise">Em analise</option>
                  <option value="orçamento">Esperando aprovação do orçamento</option>
                  <option value="reparo">Em Reparo</option>
                  <option value="concluido">Concluido</option>
                </select>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="form-group clearfix">
                <div class="form-group">
                  <label for="progesso">Progresso do aparelho</label>
                  <input type="range" value="<?= isset($produto->progesso) ? $produto->progesso : '0'; ?>"
                    class="custom-range" id="progresso" name="progesso">
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="card-footer" style="text-align: right;">
      <button type="submit" class="btn btn-primary" id="btn_salvar_dados">Salvar</button>
      <a href="<?= base_url('produtos') ?>" class="btn btn-danger">Cancelar</a>
    </div>
    </form>
  </div>
</div>
