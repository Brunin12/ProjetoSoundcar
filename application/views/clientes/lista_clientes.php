<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
if (isset($pessoas)): ?>

  <div class="row mb-3 p-1 border rounded text-center">
    <div class="col-lg-3 col-md-3 col-sm-12 p-1">
      logradouro

    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 p-1">
      nome

    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 p-1">
      telefone

    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 p-1">
      Ações
    </div>
  </div>
  <div>
    <?php
    foreach ($pessoas as $p): ?>

      <div class="row mb-2 p-2 bg-primary rounded">
        <div class="col-lg-3 col-md-3 col-sm-12 p-1 text-center">
          <?= isset($p->logradouro) ? $p->logradouro : 'N/A' ?>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 p-1 text-center">
          <?= isset($p->nome) ? $p->nome : 'N/A' ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 p-1 text-center">
          <?= isset($p->telefone) ? $p->telefone : 'N/A' ?>
        </div>


        <div class="col-lg-3 col-md-3 col-sm-12 p-1">
          <a href="<?= base_url('clientes/editar_cliente/'. $p->id_pessoa) ?>" class="btn btn-warning shadow-sm "><i
              class="fas fa-edit"></i></a>
          <button onclick="deletarCliente(<?= $p->id_pessoa; ?>)" class="btn btn-danger "><i
              class="fas fa-trash"></i></button>

        </div>

      </div>
    <?php endforeach; ?>
  <?php endif; ?>
