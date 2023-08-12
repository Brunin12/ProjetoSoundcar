<?php
defined('BASEPATH') or exit('No direct script access allowed');
$foto = $this->session_m->userdata('user')['foto'];

// echo $foto_perfil.'<br>';
// echo base_url('assets/foto/4/');
// die();
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
  <!-- Sweet Alert -->
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
  <!-- Google OAuth 2.0 -->
  <script src="https://accounts.google.com/gsi/client" async defer></script>
  <script src="https://accounts.google.com/gsi/client?hl=br" async defer></script>


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

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">



    <?php $this->load->view('default/nav');?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"></h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
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
          <?= isset($content) ? $content : ''; ?>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2023-2023 <a href="https://adminlte.io">BrunoSoft</a>.</strong>
      Todos os direitos reservados.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.2.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- Materialize -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url('assets/') ?>plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url('assets/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url('assets/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url('assets/') ?>plugins/moment/moment.min.js"></script>
  <script src="<?= base_url('assets/') ?>plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url('assets/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
  </script>

  <!-- Summernote -->
  <script src="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>

  <!-- AdminLTE for demo purposes
  <script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
  AdminLTE dashboard demo (This is only for demo purposes)
  <script src="<?= base_url('assets/') ?>dist/js/pages/dashboard.js"></script> -->
  <?= isset($js) ? $js : ''; ?>
  <?php $this->load->view('default/js') ?>
</body>

</html>
