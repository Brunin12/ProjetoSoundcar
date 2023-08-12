<?php $foto = $this->session_m->userdata('user')['foto'];
?>
<!-- Preloader -->

<div id="preloader" class="preloader flex-column justify-content-center align-items-center">
  <img class="img-circle animation__shake"
    src="<?= !is_null($this->session_m->flashdata('foto')) ? $foto : base_url('assets/android-chrome-512x512.png') ?>"
    title="Sound'car" alt="Sound'car Logo" height="80" width="80">
  <br>
  <p class="animation__shake h3">Sound'car</p>
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light ">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= base_url() ?>" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="wa.me/+5575988766035" target="_blank" rel="noopener noreferrer" class="nav-link">Contato</a>
    </li>
    <li class="nav-item pointer">
      <a class="nav-link" id="theme_mode" mode="light" onclick="trocarTema()"><i id="theme_icon"
          class="fas fa-moon"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#tela_cheia" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>" class="brand-link">
    <img src="<?= base_url('assets/') ?>favicon-32x32.png" alt="Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">
      Sound'Car
      <?= ucfirst($this->auth->permitido(['cliente'], true)) ?>
    </span>

  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex pointer">
      <div class="image">
        <a href="<?= base_url("usuarios/alterar_perfil") ?>">
          <img src="<?= $foto ?>" class="img-circle elevation-2" alt='Sua Foto'>
        </a>
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <?= $this->session_m->get_db()['nome'] ?>
        </a>
      </div>
    </div>




    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item" class="nav">
          <a href="<?= base_url() ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Home

            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Visualizar
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <div class="admin" <?= !$this->auth->permitido(['admin', 'funcionario']) ? 'style="display:none;"' : '' ?>>
              <li class="nav-item" <?= !$this->auth->permitido(['admin']) ? 'style="display:none;"' : '' ?>>
                <a href="<?= base_url("funcionarios") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Funcionarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("fornecedores") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fornecedores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("clientes") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("produtos") ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produtos</p>
                </a>
              </li>
            </div>
            <li class="nav-item" <?= !$this->auth->permitido(['cliente']) ? 'style="display:none;"' : '' ?>>
              <a href="<?= base_url("home/meus_aparelhos") ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Meus Aparelhos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url("home/faq") ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Quem Somos? FAQ</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= base_url("home/sair") ?>" class="nav-link">
            <i class="nav-icon fas fa-columns"></i>
            <p>
              Sair
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
