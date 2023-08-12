<?php
class Erros extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->auth->se_autenticado();
  }

  public function index(){

    $this->output->set_status_header('404');
    $data['titulo'] = "Holdit | 404";
    $data['foto'] = $this->session_m->get_db()['foto'];
    $this->load->view('default/404', $data);

  }

}
