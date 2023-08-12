<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produtos extends CI_Controller
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

		$this->page['css'] = $this->load->view("produtos/css", null, true);
		$this->data['titulo'] = "Soundcar | Produtos";
		$this->page['content'] = $this->load->view("produtos/produtos", $this->data, true);
		$this->page['js'] = $this->load->view("produtos/js", null, true);
		$this->load->view('default/template', $this->page);
	}
	public function novo_produto()
	{

		$this->page['css'] = $this->load->view("produtos/css", null, true);
		$this->data['titulo'] = "Soundcar | Produtos";
		$this->data['protocolo'] = "Novo Produto";
		$this->page['content'] = $this->load->view("produtos/form_produto", $this->data, true);
		$this->page['js'] = $this->load->view("produtos/js", null, true);
		$this->load->view('default/template', $this->page);
	}



	public function salvar_produto()
	{

		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'valid_email');
		$this->form_validation->set_rules('modelo', 'Modelo', 'required');
		$this->form_validation->set_rules('aparelho', 'Nome do aparelho', 'required');

		if ($this->form_validation->run() == true) {
			$produto = $this->get_input('aparelho');
			$nome = $this->get_input('nome');
			$email = $this->get_input('email');
			$logradouro = $this->get_input('logradouro');
			$person = [
				'nome' => $nome,
				'cliente' => 1,
				'flag' => 'ATIVO',
				'logradouro' => $logradouro,
				'email' => $email
			];

			$user = [
				'nome' => $nome,
				'flag' => 'ATIVO',
				'email' => $email,
			];

			$pessoa = $this->db->get_where('pessoa', $person)->result();
			$clientes = $this->db->get_where('usuario', $user)->result();
			if (sizeof($pessoa) == 0) {
				$this->db->insert('pessoa', $person);
			} else {
				$this->db->where($person);
				$this->db->update('pessoa', $person);
			}

			if (sizeof($clientes) == 0) {
				$id = $this->db->get_where('pessoa', $person)->row()->id_pessoa;
				$user['id_pessoa'] = $id;
				unset($user['email']);
				if (isset($email)) {
					$this->db->where($user);
					$this->db->update('usuario', $user);
				}
			} else {
				$id = $clientes[0]->id;
				$this->db->insert('usuario', $user);
			}


			$data = array(
				'aparelho' => $produto,
				'nome' => $nome,
				'modelo' => $this->get_input('modelo'),
				'etapa' => $this->get_input('etapa'),
				'progresso' => $this->get_input('progresso'),
				'id_pessoa' => $id,
				'flag' => 'ATIVO'
			);

			$this->db->insert('produto', $data);


			$this->session_m->set_flashdata("msg", "Produto $produto inserido");

		} else {
			$this->session_m->set_flashdata("erro", validation_errors());
		}

		redirect(base_url('produtos/novo_produto'));
	}

	public function buscar_produtos()
	{


		$this->db->select('*');
		$this->db->from('produto');
		$this->db->where('flag', 'ATIVO');
		$this->db->like('nome', $this->get_input('buscar'));
		$this->db->or_like('telefone', $this->get_input('buscar'));
		$this->db->or_like('modelo', $this->get_input('buscar'));
		$produtos = $this->db->get()->result();



		$content = '';
		if (sizeof($produtos) > 0) {

			$this->data['produtos'] = $produtos;
			$content = $this->load->view("produtos/lista_produtos", $this->data, true);

		}

		echo $content;
	}

	public function get_cliente($return = false)
	{

		$this->db->select('*');
		$this->db->from('pessoa');
		$this->db->where('flag', 'ATIVO');
		$this->db->and_where('cliente', '1');
		$this->db->like('email', $this->get_input('buscar'));
		$this->db->or_like('nome', $this->get_input('buscar'));
		$this->db->or_like('logradouro', $this->get_input('buscar'));
		$this->db->or_like('telefone', $this->get_input('buscar'));
		$clientes = $this->db->get()->result();


		$content = '';
		if (sizeof($clientes) > 0) {
			$foto = $this->db->get_where(
				'usuarios',
				array(
					'id_pessoa'
					=>
					$clientes->id_pessoa
				)
			)->row()
				->foto;
			$foto = isset($foto) ? $foto : base_url('assets/fotos/usuario.png');


			$this->data['cliente'] = $clientes;
			$content = $this->load->view("produtos/cliente", $this->data, true);

		}
		if ($return)
			return $content;
		echo $content;
	}

	public function editar_produto($id)
	{
		$this->auth->acesso_id($id);
		$this->data['produto'] = $this->db->get_where("produto", array("id_produto" => $id))->row();

		$this->page['css'] = $this->load->view("clientes/css", null, true);
		$this->data['titulo'] = "Soundcar | clientes";
		$this->data['protocolo'] = "Editar Cliente";
		$this->page['content'] = $this->load->view("produtos/form_produto", $this->data, true);

		$this->page['js'] = $this->load->view("clientes/js", null, true);
		$this->load->view('default/template', $this->page);
	}

	public function update_produto($id)
	{
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('email', 'E-mail', 'is_unique[usuario.email]|valid_email');
		$this->form_validation->set_rules('modelo', 'Modelo', 'required');
		$this->form_validation->set_rules('aparelho', 'Nome do aparelho', 'required');

		if ($this->form_validation->run() == true) {
			$nome = $this->get_input('produto');

			$data = array(
				'nome' => $nome,
				'modelo' => $this->get_input('modelo'),
				'etapa' => $this->get_input('etapa'),
				'telefone' => $this->get_input('telefone'),
				'progresso' => $this->get_input('progresso'),
				'orcamento' => str_replace(',', '.', $this->get_input('orcamento'))
			);
			if ($this->get_input('orcamento') > 0) {
				$data['concluido'] = true;
			}
			$this->db->where(array('id_produto' => $id));
			$this->db->update('produto', $data);


			$this->session_m->set_flashdata("msg", "Usuario $nome editado");
			redirect(base_url());
		} else {
			$this->session_m->set_flashdata("erro", validation_errors());
			redirect(base_url('produtos/editar_produto/' . $id));

		}
	}

	public function deletar_produto()
	{
		$id = $this->get_input('id');
		if (isset($id)) {
			$data = array(
				'flag' => 'DELETADO'
			);
			$this->db->where("id_produto", $id);
			$this->db->update('produto', $data);
			echo 'produto deletado com sucesso';
		} else {
			echo 'Não foi possivel deletar o produto';
		}
	}

	private function get_input($name)
	{
		$input = $this->input->post($name);
		$input = isset($input) ? $input : '';
		return addslashes($input);
	}

}
