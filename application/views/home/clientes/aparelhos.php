<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>

<div id="content">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Meus Aparelhos</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <?php
          if ($quant < 1): ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Você ainda não tem nenhum aparelho cadastrado!</h5>
              Entre em <a href="wa.me/+5575988766035" target="_blank" rel="noopener noreferrer">Contato</a> com a Soundcar
              &copy; para cadastrar um aparelho.
            </div>

          <?php endif;
          foreach ($aparelhos as $aparelho): ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas mr-2 fa-music"></i>
                  <?= $aparelho->nome ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <p class="col-sm-4">Orçamento</p>
                  <p class="col-sm-8">R$
                    <?= $aparelho->orcamento ?>
                    </dd>
                </div>
                <hr>
                <div class="row">
                  <p class="col-sm-4">Progresso</p>
                  <div class="col-sm-8">
                    <div class="progress">
                      <div class="progress-bar bg-green progress-bar-striped" role="progressbar"
                        aria-valuenow="<?= $aparelho->progresso ?>" aria-valuemin="0" aria-valuemax="100"
                        style="width: 40%">
                        <br>
                        <span class="sr-only">
                          <?= $aparelho->progresso ?>% Completo
                        </span>
                      </div>
                    </div>
                    <small>
                      <?= $aparelho->progreco ?>% Completo
                    </small>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <p class="col-sm-4">Status</p>
                  <p class="col-sm-8">Em Reparo
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            <?php endforeach ?>

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
