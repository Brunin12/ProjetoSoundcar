<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fornecedores extends CI_Controller
{

	var $data = array();
	var $page = array();

	function __construct()
	{
		parent::__construct();
		$this->auth->se_autenticado();
		$this->auth->permitidos(['admin', 'funcionario']);

		date_default_timezone_set("America/Bahia");
	}
	public function index()
	{
		$this->page['css'] = $this->load->view("fornecedores/css", null, true);
		$this->data['titulo'] = "Soundcar | Fornecedores";
		$this->page['content'] = $this->load->view("fornecedores/fornecedores", null, true);
		$this->page['js'] = $this->load->view("fornecedores/js", null, true);
		$this->load->view('default/template', $this->page);
	}
	public function novo_fornecedor()
	{
		$this->page['css'] = $this->load->view("fornecedores/css", null, true);
		$this->data['titulo'] = "Soundcar | Fornecedores";
		$this->data['protocolo'] = "Adicionar Fornecedor";
		$this->page['content'] = $this->load->view("fornecedores/form_fornecedor", $this->data, true);
		$this->page['js'] = $this->load->view("fornecedores/js", null, true);
		$this->load->view('default/template', $this->page);
	}



	public function salvar_fornecedor()
	{

		$cpf_len = mb_strlen($this->get_input("cpf"));
		if ($cpf_len > 10) {
			$nome = $this->get_input('nome');


			$data = array(
				'nome' => $nome,
				'cpf_cnpj' => $this->get_input('cpf'),
				'logradouro' => $this->get_input('logradouro'),
				'numero' => $this->get_input('numero'),
				'bairro' => $this->get_input('bairro'),
				'cidade' => $this->get_input('cidade'),
				'uf' => $this->get_input('uf'),
				'cep' => $this->get_input('cep'),
				'telefone' => $this->get_input('telefone'),
				'fornecedor' => 1
			);

			$this->db->insert('pessoa', $data);
			$email = $this->get_input('email');
			$senha = $this->get_input('senha');
			$id = $this->auth->search_id($data);
			if (isset($email)) {
				$user = [
					'nome' => $nome,
					'perfil' => 'fornecedor',
					'senha' => sha1($senha),
					'flag' => 'ATIVO',
					'email' => $email,
					'id_pessoa' => $id
				];
				$existe = $this->auth->existe_db('usuario', $user);
				if (!$existe)
					$this->db->insert('usuario', $user);
				else
					$this->db->update('usuario', $user);

			}

			$this->session_m->set_flashdata("msg", "Usuario $nome inserido");


		} else {
			$this->session_m->set_flashdata("erro", "Numero de CPF tem $cpf_len, o minimo é 10");
		}
		redirect(base_url());
	}

	public function buscar_fornecedores()
	{


		$this->db->select('*');
		$this->db->from('pessoa');
		$this->db->where('fornecedor', 1);
		$this->db->where('flag', 'ATIVO');
		$this->db->like('nome', $this->get_input('buscar'));
		$this->db->or_like('cpf_cnpj', $this->get_input('buscar'));
		$pessoas = $this->db->get()->result();

		$content = '';
		if (sizeof($pessoas) > 0) {
			$this->data['titulo'] = "Soundcar | Fornecedores";
			$this->data['pessoas'] = $pessoas;
			$content = $this->load->view("fornecedores/lista_fornecedores", $this->data, true);

		}

		echo $content;
	}

	public function deletar_fornecedor()
	{
		$id = $this->input->post('id');
		if (isset($id)) {
			$data = array(
				'flag' => 'DELETADO'
			);
			$this->db->where("id_pessoa", $id);
			$this->db->update('pessoa', $data);
			echo 'Fornecedor deletado com sucesso';
		} else {
			echo 'Não foi possivel deletar o fornecedor';
		}
	}

	public function editar_fornecedor($id)
	{
		$this->auth->acesso_id($id);
		$this->data['fornecedor'] = $this->db->get_where("pessoa", array("id_pessoa" => $id))->row();

		$this->page['css'] = $this->load->view("fornecedores/css", null, true);
		$this->data['titulo'] = "Soundcar | Fornecedores";
		$this->data['protocolo'] = "Editar Fornecedor";
		$this->page['content'] = $this->load->view("fornecedores/form_fornecedor", $this->data, true);

		$this->page['js'] = $this->load->view("fornecedores/js", null, true);
		$this->load->view('default/template', $this->page);
	}

	public function update_fornecedor($id)
	{
		$this->auth->acesso_id($id);
		$this->form_validation->set_rules('nome', 'Nome', 'required');

		if ($this->form_validation->run() == true) {
			$nome = $this->get_input('nome');

			$data = array(
				'nome' => $nome,
				'cpf_cnpj' => $this->get_input('cpf'),
				'logradouro' => $this->get_input('logradouro'),
				'numero' => $this->get_input('numero'),
				'bairro' => $this->get_input('bairro'),
				'cidade' => $this->get_input('cidade'),
				'uf' => $this->get_input('uf'),
				'cep' => $this->get_input('cep'),
				'id_pessoa' => $id,
				'telefone' => $this->get_input('telefone'),
				'fornecedor' => 1
			);
			$this->db->where(array('id_pessoa' => $id));
			$this->db->update('pessoa', $data);
			$this->session_m->set_flashdata("msg", "Fornecedor $nome editado");
			redirect(base_url());
		} else {
			$this->session_m->set_flashdata("erro", validation_errors());
			redirect(base_url('fornecedores/editar_fornecedor/' . $id));
		}
	}


	private function get_input($name)
	{
		$input = $this->input->post($name);
		$input = isset($input) ? $input : '';
		return addslashes($input);
	}

}
