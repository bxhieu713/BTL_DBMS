<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_controller extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('model_user');
		// $this->load->view('errors/html/error_genneral');
	}
	public function index()
	{

		$user = $this->input->post('username');
		$pw = $this->input->post('password');

		$result['data'] = $this->model_user->getByUsPw($user, $pw);

		if (is_null($result['data'])) {
			echo "<script type='text/javascript'>alert('Sai user hoặc password vui lòng đăng nhập lại!');</script>";
			redirect('/', 'refresh');
			return false;
		} else {
			$this->session->set_userdata($result['data']);
			redirect('/', 'refresh');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}
}
