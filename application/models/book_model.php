<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_book($book_name, $book_isbn)
	{
		$data = array(
			'book_name' => $book_name ,
			'book_isbn' => $book_isbn
			);

		$this->db->insert('book', $data); 
	}

	public function get_all_book()
	{
		$query = $this->db->get('book');

		if($query->num_rows() > 0)
			return $query;
		else
			return FALSE;
	}

}
