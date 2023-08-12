<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="row">
  <div class="col-lg-12">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Alterar Perfil</h3>
      </div>
      <?php echo form_open_multipart('usuarios/salvar_perfil'); ?>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome"
              value="<?= isset($usuario->nome) ? $usuario->nome : '' ?>" id="nome" maxlenght="60" required>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
              <label for="foto">Foto de perfil</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="foto" name="foto">
                  <label class="custom-file-label" id="label-file" for="foto">Escolher Foto</label>
                </div>


              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-6 foto text-center">
          </div>
        </div>
      </div>
      <div class="card-footer" style="text-align: right;">
        <button type="submit" class="btn btn-primary" id="btn_salvar_dados">Salvar</button>
        <a href="<?= base_url('usuarios') ?>" class="btn btn-danger">Cancelar</a>
      </div>
      <?= form_close() ?>
    </div>
  </div>
