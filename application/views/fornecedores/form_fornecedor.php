

  <?php
  defined('BASEPATH') or exit('No direct script access allowed');
  ?>
  <div class="row">
    <div class="col-lg-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?= $protocolo ?></h3>
        </div>
        <form action="<?= $protocolo == 'Adicionar Fornecedor' ? base_url('fornecedores/salvar_fornecedor') : base_url('fornecedores/update_fornecedor/' . $fornecedor->id_pessoa); ?>   " method='post'>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-12">

                <label for="nome">Nome</label>
                <input type="text" class="form-control"
                name="nome"
                value="<?= isset($fornecedor->nome) ? $fornecedor->nome : ''; ?>"
                id="nome" maxlenght="60">

              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">

                <label for="cpf">CPF</label>
                <input type="text" class="form-control"
                name="cpf"
                value="<?= isset($fornecedor->cpf) ? $fornecedor->cpf : ''; ?>"
                id="cpf" maxlenght="14">

              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">

                <label for="logradouro">Logradouro </label>
                <input type="text" class="form-control"
                name="logradouro"
                value="<?= isset($fornecedor->logradouro) ? $fornecedor->logradouro : ''; ?>"
                id="logadouro" maxlenght="60">

              </div>
              <div class="col-lg-2 col-md-2 col-sm-12">

                <label for="bairro">Numero</label>
                <input type="text" class="form-control"
                name="numero"
                value="<?= isset($fornecedor->numero) ? $fornecedor->numero : ''; ?>"
                id="numero" maxlenght="10">

              </div>
              <div class="col-lg-4 col-md-4 col-sm-12">

                <label for="bairro">Bairro</label>
                <input type="text" class="form-control"
                name="bairro"
                value="<?= isset($fornecedor->bairro) ? $fornecedor->bairro : ''; ?>"
                id="cpf" maxlenght="60">

              </div>

              <div class="col-lg-6 col-md-6 col-sm-12">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control"
                name="cidade"
                value="<?= isset($fornecedor->cidade) ? $fornecedor->cidade : ''; ?>"                name="cidade"
                id="cidade" maxlenght="60">
              </div>
              <div class="col-lg-2 col-md-2 col-sm-12">
                <label for="uf">UF</label>
                <input type="text" class="form-control"
                name="uf"
                value="<?= isset($fornecedor->uf) ? $fornecedor->uf : ''; ?>"
                id="uf" maxlenght="2">
              </div>
              <div class="col-lg-2 col-md-2 col-sm-12">
                <label for="cep">CEP</label>
                <input type="text" class="form-control"
                name="cep"
                value="<?= isset($fornecedor->cep) ? $fornecedor->cep : ''; ?>"
                id="cep" maxlenght="8">
              </div>
              <div class="col-lg-2 col-md-2 col-sm-12">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control"
                name="telefone"
                value="<?= isset($fornecedor->telefone) ? $fornecedor->telefone : ''; ?>"
                id="telefone" maxlenght="20">
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">


                <label for="nome">Email</label>
                <input type="email" class="form-control"
                name="email"
                value="<?= isset($fornecedor->email) ? $fornecedor->email : '' ?>"
                id="email" maxlenght="60" required>

              </div>
              <div class="col-lg-6 col-md-6 col-sm-12">


                <label for="nome">Senha</label>
                <input type="password"  class="form-control"
                name="senha"
                value="<?= isset($fornecedor->senha) ? $fornecedor->senha : '' ?>"
                id="senha" maxlenght="60" required>

              </div>
            </div>
          </div>
          <div class="card-footer" style="text-align: right;">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="<?= base_url('fornecedores') ?>" class="btn btn-danger">Cancelar</a>

          </div>
        </form>
      </div>
    </div>
