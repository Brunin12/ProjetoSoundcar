<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Acessos extends CI_Controller
{

	var $data = array();
	var $page = array();

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set("America/Bahia");

		// require_once BASEPATH.'vendor/autoload.php';
		// require_once APPPATH . 'libraries/google/src/Client.php';
		// $this->load->library('google');
	}
	public function index()
	{
		$this->page['js'] = $this->load->view("acessos/js", $this->data, true);
		$this->load->view('acessos/acessos', $this->page);
	}

	public function esta_logado()
	{
		$this->auth->se_autenticado();
	}

	public function entrar()
	{
		$this->form_validation->set_rules('usuario', 'Email', 'required|valid_email');
		if ($this->form_validation->run() == false) {
			$this->session_m->set_flashdata('msg', validation_errors());
			redirect(base_url('acessos'));
		} else {


			$onde = [
				'email' => $this->get_input('usuario'),
				'senha' => md5($this->get_input('senha')),
				'flag' => 'ATIVO'
			];

			$this->db->select('*');
			$this->db->from('usuario');
			$this->db->where($onde);
			$existe = $this->db->get()->result();
			$this->db->select('*');
			$this->db->from('usuario');
			$this->db->where($onde);
			$dados_user = $this->db->get()->row();



			if ($dados_user->foto == "") {

				$uid = $dados_user->id_pessoa;
				$foto = base_url('assets/fotos/usuario.png');

				$this->db->set('foto', "'" . $foto . "'", FALSE);
				$this->db->where('id_pessoa', $uid);
				$this->db->update('usuario');
			}

			if (sizeof($existe) > 0) {
				$user = array(
					'id' => $dados_user->id_pessoa,
					'nome' => $dados_user->nome,
					'email' => $dados_user->email,
					'foto' => $dados_user->foto
				);
				$this->session_m->set_flashdata('msg', 'Ola '.$dados_user->nome.' você foi conectado!');
				$this->session_m->set_userdata('user', $user);
				$this->session_m->set_flashdata('logado', "Swal.fire(
					'Olá',
					'Bem vindo! Você fez o login agora pode utilizar o site!',
					'success'
					)");

				redirect(base_url());
			} else {
				$this->session_m->set_flashdata('erro', 'Nenhum usuario existente possui estas informações.');
				redirect(base_url('acessos'));
			}


		}
	}

	// public function login_google()
	// {
	// 	// Configurações do Google
	// 	$client_id = '533097446234-1b59aq6due1ivmmih35sf5puek3k7iqj.apps.googleusercontent.com';
	// 	$client_secret = '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';
	// 	$redirect_uri = base_url('acessos/google_callback');
	// 	$scopes = array('email', 'profile');

	// 	// Instancia o cliente do Google
	// 	$client = new Client();
	// 	$client->setClientId($client_id);
	// 	$client->setClientSecret($client_secret);
	// 	$client->setRedirectUri($redirect_uri);
	// 	$client->setScopes($scopes);

	// 	// Redireciona para a página de autorização do Google
	// 	$auth_url = $client->createAuthUrl();
	// 	redirect($auth_url);
	// 	exit();
	// }

	// public function google_callback()
	// {

	// 	// Configurações do Google
	// 	$client_id = '533097446234-1b59aq6due1ivmmih35sf5puek3k7iqj.apps.googleusercontent.com';
	// 	$client_secret = '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';
	// 	$redirect_uri = base_url('home');

	// 	// Instancia o cliente do Google
	// 	$client = new Google_Client();
	// 	$client->setClientId($client_id);
	// 	$client->setClientSecret($client_secret);
	// 	$client->setRedirectUri($redirect_uri);

	// 	// Processa a resposta do Google
	// 	if (isset($_GET['code'])) {
	// 		$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
	// 		$client->setAccessToken($token);

	// 		// Obtém os dados do usuário
	// 		$oauth2 = new Google_Service_Oauth2($client);
	// 		$user_info = $oauth2->userinfo->get();

	// 		// Verifica se o usuário já está cadastrado no sistema
	// 		// Se sim, faz o login. Se não, cria uma nova conta.
	// 		// Aqui você pode integrar com seu banco de dados para fazer a verificação.
	// 		// Por simplicidade, vamos apenas exibir os dados do usuário.
	// 		echo '<pre>';
	// 		print_r($user_info);
	// 		echo '</pre>';
	// 	}
	// }

	private function get_input($name)
	{
		$input = $this->input->post($name);
		$input = isset($input) ? $input : '';
		return addslashes($input);
	}
}
