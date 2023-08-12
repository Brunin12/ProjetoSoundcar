<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<?php
if (isset($produtos)): ?>

  <div class="row mb-3 p-1 border rounded">
    <div class="col-lg-4
    col-md-4 col-sm-12 p-1">
      Modelo

    </div>
    <div class="col-lg-4
    col-md-4 col-sm-12 p-1">
      Nome Do Cliente

    </div>
    <div class="col-lg-4
    col-md-4 col-sm-12 p-1">
      Aparelho

    </div>
    <div class="col-lg-4
    col-md-4 col-sm-12 p-1">
      Telefone

    </div>
    <div class="col-lg-4
    col-md-4 col-sm-12 p-1">
      Orçamento
    </div>
    <div class="col-lg-4
    col-md-4 col-sm-12 p-1">
      Ações
    </div>
    <div class="col-lg-12
    col-md-12 col-sm-12 p-1 ">
      Progresso
    </div>
    <div class="col-lg-12
    col-md-12 col-sm-12 p-1 ">
      Componentes para entrega
    </div>
  </div>
  <div class="table table-striped">
    <?php foreach ($produtos as $p): ?>

      <div class="row mb-2 p-2 bg-primary rounded">
        <div class="col-lg-4 border col-md-4 col-sm-12 p-1">
          <?= $p->modelo ?>
        </div>
        <div class="col-lg-4 border col-md-4 col-sm-12 p-1">
          <?= $p->nome ?>
        </div>
        <div class="col-lg-4 border col-md-4 col-sm-12 p-1">
          <?= $p->aparelho ?>
        </div>
        <div class="col-lg-4 border col-md-4 col-sm-12 p-1">
          <?= $p->telefone ?>
        </div>
        <div class="col-lg-4 border col-md-4 col-sm-12 p-1">
          <?= $p->orcamento ?>
        </div>


        <div class="col-lg-4
            col-md-6 border col-sm-12 p-1">
          <a href="<?= base_url('produtos/editar_produto/' . $p->id_produto) ?>"
            class="btn btn-primary shadow-sm border "><i class="fas fa-edit"></i></a>
          <button onclick="deletarCliente(<?= $p->id_produto; ?>)" class="btn btn-danger "><i
              class="fas fa-trash"></i></button>

        </div>
        <div class="col-lg-12 border col-md-12 col-sm-12 p-1">
          <div class="progress">
            <div class="progress-bar bg-green progress-bar-striped" role="progressbar" aria-valuenow="<?= $p->progresso ?>"
              aria-valuemin="0" aria-valuemax="100" style="width: 40%">
              <br>
              <span class="sr-only">
                <?= $p->progresso ?>% Completo
              </span>
            </div>
          </div>

        </div>
        <div class="col-lg-12 border col-md-12 col-sm-12 p-1">
          <p>
            <?= isset($p->componentes) ? str_replace(';', '<br>', $p->componentes) : '' ?>
          </p>
        </div>

      </div>

    </div>
  <?php endforeach; ?>
<?php endif; ?>

