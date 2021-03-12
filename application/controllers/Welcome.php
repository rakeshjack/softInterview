<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
        parent::__construct();
		$this->load->model('Employee_model');
    }


	public function index() {
		$this->load->view('welcome_message');
	}

	public function login() {
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
	
	public function dashboard() {
		$data['quotes'] = $this->curl_quotes();
		$this->load->view('header');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}

	public function login_check() {
		$useremail = $this->input->post('email');
		$userpassword = md5($this->input->post('password'));
		$userCheck = $this->Employee_model->userlogin($useremail,$userpassword);
		if($userCheck) {
			$_SESSION['userDetail'] = $userCheck;
			redirect('employee-dashboard');
		} else {
			redirect('welcome/login');
		}
	}

	public function curl_profile() {
		// https://financialmodelingprep.com/api/v3/profile/AAPL?apikey=demo
		$cURLConnection = curl_init('https://financialmodelingprep.com/api/v3/profile/AAPL?apikey=demo');
		curl_setopt($cURLConnection, CURLOPT_CUSTOMREQUEST, 'GET');
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
		$apiResponse = curl_exec($cURLConnection);
		curl_close($cURLConnection);
		$jsonArrayResponse = json_decode($apiResponse);
		if ($jsonArrayResponse) {
			return $jsonArrayResponse;
		} else {
			return 0;
		}
	}
	
}
