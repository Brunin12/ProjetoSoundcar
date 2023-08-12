<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	var $data = array();
	var $page = array();

	function __construct()
	{
		parent::__construct();
		$this->auth->se_autenticado();

		date_default_timezone_set("America/Bahia");
	}
	public function index()
	{
		$this->auth->permitidos(['funcionarios', 'admin'], base_url('home/clientes'), false);

		$this->data['dados'] = $this->get_data();

		$this->page['css'] = $this->load->view("home/css", null, true);
		$this->page['content'] = $this->load->view("home/home", $this->data, true);
		$this->data['titulo'] = "Soundcar | Home";

		$this->page['js'] = $this->load->view("home/js", $this->data, true);
		$this->load->view('default/template', $this->page);

	}
	public function faq()
	{

		$this->page['css'] = $this->load->view("home/css", null, true);
		$this->page['content'] = $this->load->view("home/clientes/faq", $this->data, true);
		$this->data['titulo'] = "Soundcar | FAQ";
		$this->page['js'] = $this->load->view("home/js", $this->data, true);
		$this->load->view('default/template', $this->page);
	}

	public function clientes() {

		$this->data['aparelhos'] = $this->get_aparelhos(true);
		$this->data['aparelhos_concluidos'] = $this->get_aparelhos_concluidos(true);
		$this->page['css'] = $this->load->view("home/clientes/css", null, true);
		$this->page['content'] = $this->load->view("home/clientes/home", $this->data, true);
		$this->data['titulo'] = "Soundcar | Home";
		$this->page['js'] = $this->load->view("home/clientes/js", $this->data, true);
		$this->load->view('default/template', $this->page);
	}
	public function meus_aparelhos()
	{

		$this->data['aparelhos'] = $this->get_aparelhos();
		$this->data['quant'] = $this->get_aparelhos(true);
		$this->data['titulo'] = "Soundcar | Home";

		$this->page['js'] = $this->load->view("home/clientes/js", $this->data, true);
		$this->page['css'] = $this->load->view("home/clientes/css", null, true);

		$this->page['content'] = $this->load->view("home/clientes/aparelhos", $this->data, true);


		$this->load->view('default/template', $this->page);
	}

	public function sair() {
		$this->auth->sair();
	}

	private function get_aparelhos($num = false) {
		$id = $this->session_m->get_id();

		$aparelhos = $this->db->get_where('produto', array('id_pessoa' => $id));
		if (!$num)
			return $aparelhos->result();
		else
			return $aparelhos->num_rows();
	}

	private function get_aparelhos_concluidos($num = false)
	{

		$id = $this->session_m->get_id();
		$this->db->where(['concluido' => 1]);
		$aparelhos = $this->db->get_where('produto', array('id_pessoa' => $id));
		if (!$num)
			return $aparelhos->result();
		else
			return $aparelhos->num_rows();
	}

	private function get_data() {
		$clientes =
			($this->db->get_where(
				'pessoa',
				array('flag' => 'ATIVO', 'cliente' => 1)
			))->num_rows();

		$fornecedores =
			($this->db->get_where(
				'pessoa',
				array('flag' => 'ATIVO', 'fornecedor' => 1)
			))->num_rows();


		$produtos =
			($this->db->get_where(
				'produto',
				array('flag' => 'ATIVO')
			))->num_rows();

		$produtos_concluidos =
			($this->db->get_where(
				'produto',
				array('flag' => 'ATIVO', 'concluido' => 1)
			))->num_rows();

		$this->data = array(
			'aparelhos' => ($produtos),
			'aparelhos_concluidos' => ($produtos_concluidos),
			'clientes' => ($clientes),
			'fornecedores' => ($fornecedores)
		);
		return $this->data;
	}

}

