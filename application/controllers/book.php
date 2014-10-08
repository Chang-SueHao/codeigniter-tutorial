<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('book_model');
	}

	public function index()
	{
		$query = $this->book_model->get_all_book();

		$this->load->view('header');
		$this->load->view('book', array('book_data' => $query));
	}

	public function add_book()
	{
		$this->form_validation->set_rules('book_name', '書名', 'required|max_length[30]');
		$this->form_validation->set_rules('book_isbn', 'ISBN', 'required|max_length[30]|is_unique[book.book_isbn]');

		$this->form_validation->set_message('required', '你的 %s 欄位必須填寫');
		$this->form_validation->set_message('max_length', '你的 %s 欄位必須小於 %s 字元');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('add_book');		
		}
		else {

			// Insert to db.
			$this->book_model->insert_book($this->input->post('book_name'),
											 $this->input->post('book_isbn'));

			$this->session->set_flashdata('message_data', 
					array('type' => 'success', 'message' => '插入書本成功'));
			redirect(site_url('book/add_book'));
		}
	}
}
