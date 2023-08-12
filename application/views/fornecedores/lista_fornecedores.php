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
      <?php foreach ($pessoas as $p): ?>

    <div class="row mb-2 p-2 bg-info rounded">
      <div class="col-lg-3 col-md-3 col-sm-12 p-1">
        <?=$p->logradouro . ', ' .
        $p->numero . ', '
        . $p->bairro . ', '
        . $p->cidade . '-'
        . $p->uf . ', '
        . $p->cep?>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12 p-1">
        <?= $p->nome ?>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12 p-1">
        <?=
        $p->telefone;
         ?>
      </div>

      <div class="col-lg-3 col-md-3 col-sm-12 p-1">
        <a href="<?= base_url('fornecedores/editar_fornecedor/'. $p->id_pessoa) ?>" class="btn btn-primary "><i class="fas fa-edit"></i></a>
        <button onclick="deletarFornecedor(<?= $p->id_pessoa; ?>)" class="btn btn-danger "><i class="fas fa-trash"></i></button>

      </div>

    </div>
  <?php endforeach; ?>
<?php endif; ?>
