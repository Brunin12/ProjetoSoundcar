

  <?php
  defined('BASEPATH') or exit('No direct script access allowed');
  ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?= $protocolo ?></h3>
        </div>
        <form action="<?= $protocolo == 'Adicionar Funcionario' ? base_url('funcionarios/salvar_funcionario') : base_url('funcionarios/update_funcionario' . $funcionario->
        id_pessoa); ?> " method='post'>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-12">

                <label for="nome">Nome</label>
                <input type="text" class="form-control"
                name="nome"
                value="<?= isset($funcionario->nome) ? $funcionario->nome : ''; ?>"
                id="nome" maxlenght="60" required>

              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">

                <label for="cpf">CPF</label>
                <input type="text" class="form-control"
                name="cpf"
                value="<?= isset($funcionario->cpf) ? $funcionario->cpf : ''; ?>"
                id="cpf" maxlenght="14" required>

              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">

                <label for="logradouro">Logradouro </label>
                <input type="text" class="form-control"
                name="logradouro"
                value="<?= isset($funcionario->logradouro) ? $funcionario->logradouro : ''; ?>"
                id="logadouro" maxlenght="60">

              </div>
              <div class="col-lg-2 col-md-2 col-sm-12">

                <label for="bairro">Numero</label>
                <input type="text" class="form-control"
                name="numero"
                value="<?= isset($funcionario->numero) ? $funcionario->numero : ''; ?>"
                id="numero" maxlenght="10">

              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control"
                name="telefone"
                value="<?= isset($funcionario->telefone) ? $funcionario->telefone : ''; ?>"
                id="telefone" maxlenght="20" required>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">


                <label for="nome">Email</label>
                <input type="email" class="form-control"
                name="email"
                value="<?= isset($funcionario->email) ? $funcionario->email : '' ?>"
                id="email" maxlenght="60" <?= $protocolo == 'Adicionar Funcionario' ? 'required' : '' ?>>

              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">


                <label for="nome">Senha</label>
                <input type="password"  class="form-control"
                name="senha"
                value="<?= isset($funcionario->senha) ? $fornecedor->senha : '' ?>"
                id="senha" maxlenght="60" <?= $protocolo == 'Adicionar Funcionario' ? 'required' : '' ?>>

              </div>
            </div>
          </div>
          <div class="card-footer" style="text-align: right;">
            <button type="submit" class="btn btn-primary" id="btn_salvar_dados">Salvar</button>
            <a href="<?= base_url('funcionarios') ?>" class="btn btn-danger">Cancelar</a>

          </div>
        </form>
      </div>
    </div>
