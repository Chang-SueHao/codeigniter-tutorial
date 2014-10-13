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

	public function delete_book($id)
	{
		$this->book_model->delete_book($id);

		$this->session->set_flashdata('message_data', 
					array('type' => 'success', 'message' => '刪除書本成功'));
			redirect(site_url('book'));
	}


	/*
		預設id為空字串，搭配以下判斷，若沒有此本書籍或是沒有帶入書本id的時候則導向書本列表
		並且顯示書本沒有在資料庫內的訊息
	*/
	public function edit_book($id = '')
	{
		// 該id必須存在才可以編輯
		if($this->book_model->get_book($id)) {
			$this->form_validation->set_rules('book_name', '書名', 'required|max_length[30]');
			$this->form_validation->set_rules('book_isbn', 'ISBN', 'required|max_length[30]');

			$this->form_validation->set_message('required', '你的 %s 欄位必須填寫');
			$this->form_validation->set_message('max_length', '你的 %s 欄位必須小於 %s 字元');

			if ($this->form_validation->run() == FALSE) {

				$query = $this->book_model->get_book($id);

				$this->load->view('header');
				$this->load->view('edit_book', array('book_data'=> $query));		
			}
			else {

			// Update to db.
				$this->book_model->update_book($id, $this->input->post('book_name')
												, $this->input->post('book_isbn'));

				$this->session->set_flashdata('message_data', 
					array('type' => 'success', 'message' => '修改書本成功'));
				redirect(site_url('book'));
			}
		}
		else {
			// 該id不存在DB內，所以回傳錯誤訊息到 book頁面
			$this->session->set_flashdata('message_data', 
					array('type' => 'danger', 'message' => '書本沒有在資料庫內'));
			redirect(site_url('book'));
		}
	}
}
