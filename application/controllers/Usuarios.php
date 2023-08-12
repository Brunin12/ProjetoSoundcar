<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->auth->se_autenticado();

		date_default_timezone_set("America/Bahia");
	}

	var $data = array();
	var $page = array();

	public function alterar_perfil()
	{
		$this->data['usuario'] = $this->db->get_where("usuario", array("id_pessoa" => ($this->session_m->userdata('user')['id'])))->row();

		$this->page['css'] = $this->load->view("usuarios/css", null, true);
		$this->data['titulo'] = "Soundcar | Alterar perfil";
		$this->page['content'] = $this->load->view("usuarios/form_usuario", $this->data, true);
		$this->page['js'] = $this->load->view("usuarios/js", null, true);
		$this->load->view('default/template', $this->page);
	}

	public function salvar_perfil()
	{
		// var_dump($_FILES);
		// die();
		$foto = $_FILES['foto'];
		$upload_path = ("assets/fotos");
		$uid = $this->session_m->get_id(); //creare seperate folder for each user
		$upPath = $upload_path . '/' . $uid . '/';

		$foto_perfil = $this->db->get_where('usuario', array('id_pessoa' => $uid))->row()->foto;

		if ($foto_perfil !== base_url('assets/fotos/usuario.png') || $foto_perfil == '') {
			delete_files(FCPATH . 'assets/fotos/' . $uid);
			rmdir(FCPATH . 'assets/fotos/' . $uid);

		}

		if (!file_exists($upPath)) {
			mkdir($upPath, 0777, true);
		}

		$config = array(
			'upload_path' => $upPath,
			'allowed_types' => 'gif|jpg|png',
			'encrypt_name' => true

		);


		$data = [
			'nome' => $this->get_input('nome')
		];

		$this->upload->initialize($config);
		$upload = false;
		if (!$this->upload->do_upload('foto')) {
			if (!move_uploaded_file($foto['tmp_name'], base_url('assets/fotos/' . $uid))) {

				$this->session_m->set_flashdata("erro", $this->upload->display_errors());
			} else {
				$upload = true;
			}
		} else {
			$upload = true;
		}

		$dados_upload = $this->upload->data();
		$foto_nome = $dados_upload['file_name'];

		if ($upload) {

			$this->session_m->userdata('user')['foto'] = base_url($upPath . $foto_nome);
			$this->session_m->userdata('user')['nome'] = $this->get_input('nome');
			$this->session_m->set_flashdata("foto", 'foto atualizada');
			$this->session_m->set_flashdata("msg", 'Foto salva com Sucesso!');
			$data['foto'] = base_url($upPath . $foto_nome);


		}

		$this->db->where(array('id_pessoa' => $this->session_m->userdata('user')['id']));
		$this->db->update('usuario', $data);

		$email = $this->get_input('email');

		if (isset($email)) {
			$user = [
				'nome' => $data['nome'],
				'foto' => base_url($upPath . $foto_nome)
			];

			$this->db->update('usuario', $user);
		}

		redirect(base_url());
	}

	private function get_input($name)
	{
		$input = $this->input->post($name);
		$input = isset($input) ? $input : '';
		return addslashes($input);
	}

}
