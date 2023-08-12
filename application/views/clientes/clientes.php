<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
  <div class="col-lg-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Pesquisa de clientes</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <input type="text" class="form-control mb-1" onkeyup="buscarClientes(this)" id="buscar"
              placeholder="Digite o Nome, Telefone, ou endereço">
          </div>

        </div>
        <hr>

        <div id="clientes">
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Aviso Importante!</h5>
            <p>Para criar um cliente você deve criar um <a href="<?= base_url('produtos') ?>"
                class="text-decoration-none text-info">produto</a> e escrever os dados do cliente nos campos.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
