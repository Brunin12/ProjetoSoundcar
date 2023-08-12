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
          <h1 class="m-0">Home</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
                <?= $aparelhos ?>
              </h3>
              <p>Aparelhos Cadastrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?= base_url('produtos/') ?>" class="small-box-footer">Ver Todos <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>
                <?= $aparelhos_concluidos ?>
              </h3>
              <p>Aparelhos Concluidos</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?= base_url('produtos/') ?>" class="small-box-footer">Ver Todos <i
                class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <hr>
          <h4 class="text-center mb-5">Tecnicos da Equipe Sound'car</h4>
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <!-- Widget: user widget style 1 -->
              <div class="card card-widget widget-user shadow-lg bg-purple">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white"
                  style="background-image: url('../assets/som2.png') no-repeat center center;">
                  <h3 class="widget-user-username text-right">Jurandir da Silva</h3>
                  <h5 class="widget-user-desc text-right">Empreendedor e Dono da marca Sound'car</h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle" src="<?= base_url('assets/jurandir.jpg') ?>" alt="Criador">
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">+10.000,00</h5>
                        <hr>
                        <span class="description-text">APARELHOS CONSERTADOS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">+100</h5>
                        <hr>
                        <span class="description-text">CLIENTES FIÉIS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">+30</h5>
                        <hr>
                        <span class="description-text">ANOS DE EXPERIENCIA</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <hr>
                  <div class="row mb-5">
                    <blockquote class="blockquote">
                      <p class="mb-0 text-dark"><i class="fa fa-quote-left"></i><br>O impossivel só é impossivel ate alguem ir lá e fazer.</p>
                      <footer class="blockquote-footer">Jurandir da Silva Nascimento, <cite title="Soundcar">Sound'car</cite>
                      </footer>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-6">
              <!-- Widget: user widget style 1 -->
              <div class="card card-widget widget-user shadow-lg bg-orange">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header text-white"
                  style="background: url('../assets/som2.png') center center;">
                  <h3 class="widget-user-username text-right">Alisson (Latinha Som)</h3>
                  <h5 class="widget-user-desc text-right">Funcionario Expecializado em Instalação</h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle" src="<?= base_url('assets/alisson.jpg') ?>" alt="Funcionario">
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">+200</h5>
                        <hr>
                        <span class="description-text">SONS INSTALADOS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">PRECINHO CALIBRADO</h5>
                        <hr>
                        <span class="description-text">PREÇOS ACECIVEIS PARA TODOS</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">+7</h5>
                        <hr>
                        <span class="description-text">ANOS DE EXPERIENCIA</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <hr>
                  <div class="row">

                    <blockquote class="blockquote">
                      <p class="mb-0 text-dark">
                        <i class="fa fa-quote-left"></i><br>O sucesso é ir de fracasso em fracasso sem perder o entusiasmo.</p>
                      <footer class="blockquote-footer">Alissom, <cite title="Soundcar">Sound'car</cite>
                      </footer>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<script>
  <?php

  if (!is_null($this->session->flashdata('logado'))) {
    echo $this->session->flashdata('logado');
  } ?>
</script>
