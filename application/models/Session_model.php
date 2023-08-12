<?php

class Session_model extends CI_Model {


  public function buscar_id($id)
  {
    return $this->db->get_where("pessoa", array('id' => $id))->row();
  }

  public function buscar_db()
  {
    $id = $this->session_m->get_id();
    return (array) $this->db->get_where("pessoa", array('id_pessoa' => $id))->row_array();
  }

  public function get_db()
  {
    $id = $this->session_m->get_id();
    return $this->db->get_where("usuario", array('id_usuario' => $id))->row_array();
  }

  public function set_flashdata($titulo, $data)
  {
    $this->session->set_flashdata(sha1($titulo), $data);
    return true;
  }

  public function flashdata($titulo)
  {
    return $this->session->flashdata(sha1($titulo));
  }

  public function set_userdata($titulo, $data)
  {
    $this->session->set_userdata(sha1($titulo), $data);
    return true;
  }

  public function userdata($titulo)
  {
    return $this->session->userdata(sha1($titulo));
  }

  public function get_id()
  {
    return $this->session_m->userdata('user')['id'];

  }

}
