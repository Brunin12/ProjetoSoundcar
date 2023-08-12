<?php

class Auth_model extends CI_Model {

  public function se_autenticado() {
    $user = $this->session_m->userdata('user');
    if (!isset($user)) {

      redirect(base_url('acessos'));
    }
  }

  public function existe_db($table, $data)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($data);
    $result = $this->db->get();
    if ($result->num_rows() > 1) {
      return true;
    } else {
      return false;
    }
  }

  public function acesso_id($id) {
    $uid = $this->session_m->get_id();
    if ($uid == $id) {
      return true;
    } else {
      return false;
    }
  }



  public function permitidos($lista, $url_redirect = null, $alert = true) {
    if (!$this->permitido($lista)) {
      if ($alert) {
        $this->session_m->set_flashdata('erro', 'Você não tem permissão para acessar esta categoria!');
      }
      if (!isset($url_redirect)) {
        redirect(base_url('Erros'));
      } else {
        redirect($url_redirect);
      }
    }
  }

  public function super_encript($data) {
    return sha1('2'.md5('2' .base64_encode('1'.sha1('4' .sha1('-5' .md5('99'.base64_encode('48'.sha1('12'.$data))))))));

  }

  public function permitido($lista, $return = false) {
    $id = $this->session_m->get_id();
    $cargo = $this->db->get_where('usuario', array('id_pessoa' => $id))->row()->perfil;
    if ($return)
      return $cargo;

    if (!in_array($cargo, $lista))
      return false;

    return true;
  }
  public function search_id($campos) {
    $this->db->select('id_pessoa');
    $this->db->from('pessoa');
    $this->db->where($campos);
    return $this->db->get();
  }

  public function sair() {
    unset($_SESSION['user']);
    $this->session->unset_userdata(sha1('user'));
    $this->session->sess_destroy();
    if (isset($_SESSION[sha1('user')])) {
      $this->session_m->set_flashdata('erro', 'Um erro aconteceu, Usuario não fez o logoff. Tente novamente mais tarde.');
      redirect(base_url());
    }
    $this->se_autenticado();
  }
}
