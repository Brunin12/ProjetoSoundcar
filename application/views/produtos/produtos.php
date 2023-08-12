<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
  <div class="col-lg-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Cadastro de produtos</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12">
            <input type="text" class="form-control mb-1" onkeyup="buscarProdutos(this)" id="buscar" placeholder="Digite o Nome do cliente, Telefone, ou Modelo do aparelho">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <a href="<?= base_url('produtos/novo_produto') ?>" class="btn btn-info btn-block">Novo
              Produto</a>
          </div>
        </div>
        <hr>

        <div id="produtos">

        </div>

      </div>
    </div>
  </div>

