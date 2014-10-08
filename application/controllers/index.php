<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
	}

	public function second_view()
	{
		$this->load->view('header');		
		$this->load->view('second_view');
	}
}
