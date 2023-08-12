<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>
<!-- Main content -->
<section class="content">

  <div class="row">
    <h1 class="h2 m-3 my-5 mx-auto">Sobre Nos</h1>
    <div class="col-12" id="accordion">
      <div class="card card-primary card-outline">
        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
          <div class="card-header">
            <h4 class="card-title w-100">
              1. Quem Somos
            </h4>
          </div>
        </a>
        <div id="collapseOne" class="collapse show" data-parent="#accordion">
          <div class="card-body">
            A Sound'car é uma empresa especiaizada na area de conserto de aparelhos eletronicos como: som, microfone,
            ventilador, amplificador, nebulizador de ar, etc...
          </div>
        </div>
      </div>
      <div class="card card-primary card-outline">
        <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
          <div class="card-header">
            <h4 class="card-title w-100">
              2. Qual é o diferencial da Sound'car?
            </h4>
          </div>
        </a>
        <div id="collapseTwo" class="collapse" data-parent="#accordion">
          <div class="card-body">
            A Sound'car tem seu diferencial no preço e no atendimento, pois, os preços são 70% peças 20% mão de obra e
            10% de lucro.
          </div>
        </div>
      </div>
      <div class="card card-primary card-outline">
        <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
          <div class="card-header">
            <h4 class="card-title w-100">
              3. Oque acontece quando alguem não volta depois de 90 dias para pegar o aparelho?
            </h4>
          </div>
        </a>
        <div id="collapseThree" class="collapse" data-parent="#accordion">
          <div class="card-body">
            Depois de 90 dias, sem haver procura do dono, os aparelhos são desmontados para renovar o estoque de peças.
          </div>
        </div>
      </div>
      <div class="card card-warning card-outline">
        <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
          <div class="card-header">
            <h4 class="card-title w-100">
              4. Qual é o orçamento minimo de um aparelho?
            </h4>
          </div>
        </a>
        <div id="collapseFour" class="collapse" data-parent="#accordion">
          <div class="card-body">
            O orçamento minimo é de 30 reais, pois o tempo de um tecnico em eletronica com um nivel elevado de
            experiencia no mercado vale muito dinheiro.
          </div>
        </div>
      </div>
      <div class="card card-warning card-outline">
        <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
          <div class="card-header">
            <h4 class="card-title w-100">
              5. Quando a reforma da estrutura terminará?
            </h4>
          </div>
        </a>
        <div id="collapseFive" class="collapse" data-parent="#accordion">
          <div class="card-body">
            Caso você seja um cliente frequente da Sound'car, você provavelmente ja percebeu que temos um problema com a
            parede, isto ja esta sendo resolvido, pois as condições do ponto não estão muito favoraveis no momento, mas
            em aproximadamente 40 dias ja será resolvido.
          </div>
        </div>
      </div>
      <div class="card card-warning card-outline">
        <a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
          <div class="card-header">
            <h4 class="card-title w-100">
              6. Quem são os proficionais da Sound'car
            </h4>
          </div>
        </a>
        <div id="collapseSix" class="collapse" data-parent="#accordion">
          <div class="card-body">
            São dois, Jurandir e Alissom, os dois tecnicos em eletronica com anos de experiencia.
          </div>
        </div>
      </div>
      <div class="card card-danger card-outline">
        <a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
          <div class="card-header">
            <h4 class="card-title w-100">
              7. Quais são os horarios de atuação da Sound'car?
            </h4>
          </div>
        </a>
        <div id="collapseSeven" class="collapse" data-parent="#accordion">
          <div class="card-body">
            Horas:
            sexta-feira 09:00–18:00
            sábado 09:00–13:00
            domingo Fechado
            segunda-feira 09:00–18:00
            terça-feira 09:00–18:00
            quarta-feira 09:00–18:00
            quinta-feira 09:00–18:00
          </div>
        </div>
      </div>
      <div class="card card-danger card-outline">
        <a class="d-block w-100" data-toggle="collapse" href="#collapseEight">
          <div class="card-header">
            <h4 class="card-title w-100">
              8. Onde fica a Sound'car?
            </h4>
          </div>
        </a>
        <div id="collapseEight" class="collapse" data-parent="#accordion">
          <div class="card-body">
            R. Mal Floriano Peixoto, 727 - Vila Poty, Paulo Afonso - BA, 48602-210
          </div>
        </div>
      </div>
      <div class="card card-danger card-outline">
        <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
          <div class="card-header">
            <h4 class="card-title w-100">
              9. Qual é o Slogan da Sound'car?
            </h4>
          </div>
        </a>
        <div id="collapseNine" class="collapse" data-parent="#accordion">
          <div class="card-body">
            O Slogan da Sound'car é: "O som não pode parar!"
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card mb-2 bg-gradient-dark bg-opacity-50">
    <img class="card-img-top rounded" src="<?= base_url('assets/som.jpg') ?>" alt="Paredão de som">
    <div class="card-img-overlay d-flex flex-column justify-content-start">
      <div class="lead">
        <h2 class="card-title">Sound'car</h2>
        <p class="card-text h5 pb-2 pt-1">Os melhores tecnicos em eletronica de Paulo Afonso!
        </p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 mt-3 text-center">
      <p class="lead">
        <a href="wa.me/+5575988766035" target="_blank" rel="noopener noreferrer">Fale conosco</a>,
        caso você tenha encontrado algum erro ou você tem alguma outra pergunta não citada acima, você tem total direito
        de entrar em nosso <b>Whatsapp</b>!<br />
      </p>
    </div>
  </div>
</section>
<!-- /.content -->
