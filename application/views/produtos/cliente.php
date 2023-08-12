<?php foreach ($cliente as $pessoa) : ?>
  <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $pessoa->nome ?></h3>

                <p><?= $pessoa->email ?></p>
                <p><?= $pessoa->telefone ?>
                  </p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
<?php endforeach ?>
