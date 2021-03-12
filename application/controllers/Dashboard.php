<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        if(!isset($_SESSION['userDetail'])) {
            redirect('welcome/login');
        }
    }

    function employee_dashboard() {
        $data['quotes'] = $this->curl_quotes();
		$this->load->view('header');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
    }

    public function curl_quotes() {
		$cURLConnection = curl_init('https://financialmodelingprep.com/api/v3/quote/AAPL?apikey=demo');
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

    public function company_profile() {
        $data['company'] = $this->curl_company();
		$this->load->view('header');
		$this->load->view('company', $data);
		$this->load->view('footer');
    }

    public function curl_company() {
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

    public function register() {
		$this->load->view('header');
		$this->load->view('register');
		$this->load->view('footer');
	}

}
