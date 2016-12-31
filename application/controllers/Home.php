<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		echo '<pre>'; print_r($_POST); echo '</pre>'; //var_dump indentado
		$data = array(
			'view' => 'home',
			'text' => 'test!'
		);
		$this->load->view('templates/default', $data);
	}
}
