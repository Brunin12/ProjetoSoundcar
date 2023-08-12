<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?= isset($titulo) ? $titulo : "Soundcar | Bem-vindo" ?>
  </title>

  <link rel="apple-touch-icon" href="<?= base_url("assets/apple-touch-icon.png") ?>">

  <link rel="manifest" href="<?= base_url() ?>manifest.json">

  <link rel="shortcut icon" href="<?= base_url("assets/favicon.ico") ?>" type="image/x-icon" />

  <meta name="author" content="Bruno Parreira Da Silva Nascimento | Brunin12">
  <meta name="description" content="Organize seus clientes de forma facil e rapida.">

  <!-- Materialize -->
  <!--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- jQuery -->
  <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- Toastr -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url('assets/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet"
    href="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/jqvmap/jqvmap.min.css">
  <script src="<?= base_url('assets/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/jqvmap/maps/jquery.vmap.brazil.js"></script>
  <!-- Google OAuth 2.0
  <script src="https://accounts.google.com/gsi/client" async defer></script>
  <script src="https://accounts.google.com/gsi/client?hl=br" async defer></script> -->


  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <script src="<?= base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.css">

  <?= isset($css) ? $css : ''; ?>
</head>

<body class="hold-transition login-page">
  <nav class="navbar navbar-expand mr-auto">
    <a class="nav-link text-dark" id="theme_mode" mode="light" onclick="trocarTema()"><i id="theme_icon"
        class="fas fa-moon"></i></a>
  </nav>
  <?php
  $msg = $this->session_m->flashdata('msg');
  $erro = $this->session_m->flashdata('erro');
  if (isset($msg)): ?>
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-check"></i> Parabens!</h5>
      <?= $msg ?>
    </div>
  <?php endif;
  if (isset($erro)): ?>

    <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-exclamation-triangle"></i> Erro!</h5>
      <?= $erro ?>
    </div>
  <?php endif; ?>
  <div class="login-box 300px text-center m-auto">
    <div class="login-logo">
      <a href="<?= base_url() ?>">Sound'car</a>

    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body rounded">
        <p class="login-box-msg">Entre para iniciar sua Sessão</p>


        <form action="<?= base_url('acessos/entrar') ?>" method="post">

          <div class="input-group mb-3">
            <input name="usuario" id="usuario" type="text" class="form-control" placeholder="Usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user icons"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="senha" id="senha" type="password" class="form-control" placeholder="Senha">
            <div class="input-group-append">
              <div class="input-group-text " id="toggle_senha">
                <span class="fas fa-eye icons" id="icon_senha"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <hr>
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block" id="btn_salvar_dados">Entrar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- <div class="row mt-3 mb-5">
          <div class="col-5">
            <hr>
          </div>
          <div class="col-2"><span>Ou</span></div>
          <div class="col-5">
            <hr>
          </div>
          <div class="col-lg-auto col-md-auto col-sm-auto">
            <div id="g_id_onload"
              data-client_id="533097446234-1b59aq6due1ivmmih35sf5puek3k7iqj.apps.googleusercontent.com"
              data-login_uri="<?= base_url('acessos/login_google') ?>" data-auto_prompt="false">
            </div>
            <div class="g_id_signin" data-type="standard" data-size="large" data-theme="outline"
              data-text="sign_in_with" data-shape="rectangular" data-logo_alignment="left">
            </div>
          </div>
        </div> -->

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <?= isset($js) ? $js : ''; ?>
</body>

</html>
