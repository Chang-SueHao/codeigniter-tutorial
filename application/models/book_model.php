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

	/*
		從Controller傳id到Model
		從book Table刪除id是「傳過來的id」的那筆row
	*/
	public function delete_book($id)
	{
		$this->db->delete('book', array('id' => $id));
	}

	/*
		從Controller傳id, book_name, book_isbn 到Model
		從book Table該新id是「傳過來的id」的那筆row
		要更新的內容是新的「book_name」與「book_isbn」
	*/
	public function update_book($id, $book_name, $book_isbn)
	{
		$data = array(
			'book_name' => $book_name ,
			'book_isbn' => $book_isbn
			);

		$this->db->update('book', $data, array('id' => $id));
	}

	/*
		從Controller傳id到Model
		從book Table查詢id是「傳過來的id」的那筆row
		查詢過後會是一個Codeignter query object，讀取他的第一筆row並回傳給Controller
	*/
	public function get_book($id)
	{
		$query = $this->db->get_where('book', array('id' => $id));

		if($query->num_rows() > 0)
			return $query->row();  //回傳第一筆Row給controller
		else
			return FALSE;
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
