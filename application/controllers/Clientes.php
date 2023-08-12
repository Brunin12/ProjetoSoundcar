<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Clientes extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->auth->se_autenticado();
		$this->auth->permitidos(['admin', 'funcionario']);

		date_default_timezone_set("America/Bahia");
	}

	var $data = array();
	var $page = array();
	public function index()
	{
		$this->page['css'] = $this->load->view("clientes/css", null, true);
		$this->data['titulo'] = "Soundcar | Clientes";
		$this->page['content'] = $this->load->view("clientes/clientes", $this->data, true);
		$this->page['js'] = $this->load->view("clientes/js", null, true);
		$this->load->view('default/template', $this->page);
	}

	public function salvar_cliente()
	{
		$this->form_validation->set_rules('nome', 'Nome', 'required');

		if ($this->form_validation->run() == true) {
			$nome = $this->get_input('nome');

			$data = array(
				'nome' => $nome,
				'logradouro' => $this->get_input('endereco'),
				'telefone' => $this->get_input('telefone'),
				'cliente' => 1
			);


			$exists_user = $this->db->get('pessoa', $data)->count();
				$this->db->set($data);
				if ($exists_user > 1)
					$this->db->update('pessoa');
				else
					$this->db->insert('pessoa');

			$email = $this->get_input('email');
			$senha = $this->get_input('senha');
			$id = $this->auth->search_id($data);
			if (isset($email)) {
				$user = [
					'nome' => $nome,
					'perfil' => 'cliente',
					'senha' => md5($senha),
					'flag' => 'ATIVO',
					'email' => $email,
					'id_pessoa' => $id
				];
				$exists_user = $this->db->get('usuario', $user)->count();
				$this->db->set($user);
				if ($exists_user > 1)
					$this->db->update('usuario');
				else
					$this->db->insert('usuario');
			}
			$this->session_m->set_flashdata("msg", "Usuario $nome inserido");

		} else {
			$this->session_m->set_flashdata("erro", validation_errors());
		}

		redirect(base_url('clientes/novo_cliente'));
	}

	public function buscar_clientes()
	{

		$this->db->select('*');
		$this->db->from('pessoa');
		$this->db->like('nome', $this->get_input('buscar'));
		$this->db->or_like('logradouro', $this->get_input('buscar'));
		$this->db->where(array('cliente' => 1, 'flag' => 'ATIVO'));
		$pessoas = $this->db->get()->result();
		



		$content = '';
		if (sizeof($pessoas) > 0) {
			$this->data['titulo'] = "Soundcar | Clientes";
			$this->data['pessoas'] = $pessoas;
			$content = $this->load->view("clientes/lista_clientes", $this->data, true);

		}

		echo $content;
	}

	public function deletar_cliente()
	{
		$id = $this->input->post('id');
		if (isset($id)) {
			$data = array(
				'flag' => 'DELETADO'
			);
			$this->db->where("id_pessoa", $id);
			$this->db->update('pessoa', $data);
			echo 'cliente deletado com sucesso';
		} else {
			echo 'Não foi possivel deletar o cliente';
		}
	}



	private function get_input($name)
	{
		$input = $this->input->post($name);
		$input = isset($input) ? $input : '';
		return addslashes($input);
	}

}
