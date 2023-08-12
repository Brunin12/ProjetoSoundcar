<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Funcionarios extends CI_Controller
{

	var $data = array();
	var $page = array();

	function __construct()
	{
		parent::__construct();
		$this->auth->se_autenticado();
		$this->auth->permitidos(['admin']);

		date_default_timezone_set("America/Bahia");
	}
	public function index()
	{
		$this->page['css'] = $this->load->view("funcionarios/css", null, true);
		$this->data['titulo'] = "Soundcar | Funcionarios";
		$this->page['content'] = $this->load->view("funcionarios/funcionarios", $this->data, true);
		$this->page['js'] = $this->load->view("funcionarios/js", null, true);
		$this->load->view('default/template', $this->page);
	}
	public function novo_funcionario()
	{
		$this->page['css'] = $this->load->view("funcionarios/css", null, true);
		$this->data['titulo'] = "Soundcar | Funcionarios";
		$this->data['protocolo'] = "Adicionar Funcionario";
		$this->page['content'] = $this->load->view("funcionarios/form_funcionarios", $this->data, true);
		$this->page['js'] = $this->load->view("funcionarios/js", null, true);
		$this->load->view('default/template', $this->page);
	}



	public function salvar_funcionario()
	{

		$cpf_len = mb_strlen($this->get_input("cpf"));
		if ($cpf_len > 10) {
			$nome = $this->get_input('nome');
			$email = $this->get_input('email');
			$senha = $this->get_input('senha');
			$data = array(
				'nome' => $nome,
				'email' => $email,
				'cpf_cnpj' => $this->get_input('cpf'),
				'logradouro' => $this->get_input('logradouro'),
				'numero' => $this->get_input('numero'),
				'telefone' => $this->get_input('telefone'),
				'funcionario' => 1
			);
			$id = $this->auth->search_id($data);
			$this->db->insert('pessoa', $data);

			if (isset($email)) {
				$user = [
					'nome' => $nome,
					'perfil' => 'funcionario',
					'senha' => md5($senha),
					'flag' => 'ATIVO',
					'email' => $email,
					'id_pessoa' => $id
				];


			}

			$this->session_m->set_flashdata("msg", "Funcionario $nome inserido");
		} else {
			$this->session_m->set_flashdata("erro", "Numero de CPF tem $cpf_len, o minimo é 10");
		}
		redirect(base_url('funcionarios/novo_funcionario'));
	}

	public function buscar_funcionarios()
	{


		$this->db->select('*');
		$this->db->from('pessoa');
		$this->db->where('funcionario', 1);
		$this->db->where('flag', 'ATIVO');
		$this->db->like('nome', $this->get_input('buscar'));
		$this->db->or_like('cpf_cnpj', $this->get_input('buscar'));
		$pessoas = $this->db->get()->result();





		$content = '';
		if (sizeof($pessoas) > 0) {
			$this->data['titulo'] = "Soundcar | Funcionarios";
			$this->data['pessoas'] = $pessoas;
			$content = $this->load->view("funcionarios/lista_funcionarios", $this->data, true);

		}

		echo $content;
	}

	public function deletar_funcionario()
	{
		$id = $this->input->post('id');
		if (isset($id)) {
			$data = array(

				'flag' => 'DELETADO'
			);
			$this->db->where("id_pessoa", $id);
			$this->db->update('pessoa', $data);
			echo 'funcionario deletado com sucesso';
		} else {
			echo 'Não foi possivel deletar o funcionario';
		}
	}

	public function editar_funcionario($id)
	{
		$this->auth->acesso_id($id);
		$this->data['funcionario'] = $this->db->get_where("pessoa", array("id_pessoa" => $id))->row();

		$this->page['css'] = $this->load->view("funcionarios/css", null, true);
		$this->data['titulo'] = "Soundcar | Funcionarios";
		$this->data['protocolo'] = "Editar Funcionario";
		$this->page['content'] = $this->load->view("funcionarios/form_funcionarios", $this->data, true);

		$this->page['js'] = $this->load->view("funcionarios/js", null, true);
		$this->load->view('default/template', $this->page);
	}

	public function update_funcionario($id)
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
				'telefone' => $this->get_input('telefone'),
				'funcionario' => 1
			);

			$this->db->where(array('id_pessoa' => $id));
			$this->db->update('pessoa', $data);
			$this->session_m->set_flashdata("msg", "funcionario $nome editado");
			redirect(base_url('funcionarios/editar_funcionario/' . $id));
		} else {
			$this->session_m->set_flashdata("erro", validation_errors());
			redirect(base_url('funcionarios/editar_funcionario/' . $id));
		}

	}


	private function get_input($name)
	{
		$input = $this->input->post($name);
		$input = isset($input) ? $input : '';
		return addslashes($input);
	}

}
