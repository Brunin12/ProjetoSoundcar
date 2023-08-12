<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Cadastro de fornecedores</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12">
            <input type="text" class="form-control mb-1" onkeyup="buscarFornecedores(this)" id="buscar" placeholder="Digite o Nome, Cpf ou Cnpj">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <a href="<?= base_url('fornecedores/novo_fornecedor') ?>" class="btn btn-primary btn-block">Novo
              Fornecedor</a>
          </div>
        </div>
        <hr>

        <div id="fornecedores">

        </div>

      </div>
    </div>
  </div>
