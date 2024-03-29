<?php
class News_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	public function get_news($Id = NULL)
	{
		if ($Id === NULL)
		{
			$query = $this->db->query("SELECT * FROM `drak_news` ORDER BY `id` DESC");
			return $query->result_array();
		}
		else
		{
			$query = $this->db->get_where('drak_news', array('id' => $Id));
			return $query->row_array();
		}
	
	}
	public function set_news()
	{
		$this->load->helper('url');
		
		$slug = url_title($this->input->post('title'), 'dash', TRUE);
		
		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text')
		);
		
		return $this->db->insert('drak_news', $data);
	}
	
	public function get_total_comments($Id = NULL)
	{
		if($Id === NULL)
		{
			return FALSE;
		}
		else
		{
			$query = $this->db->get_where('drak_news_comments', array('id_news' => $Id));
			return $query->num_rows();
		}
	}
	
	public function get_comments($Id)
	{
		if($Id === NULL)
		{
			return FALSE;
		}
		else
		{
			$query = $this->db->where('id_news', $Id);
			$query = $this->db->get('drak_news_comments');
			return $query->result_array();
		}
	}
	public function set_comments($Id)
	{
	if($Id === NULL)
		{
			return FALSE;
		}
		else
		{
	$datestring = "%d-%m-%Y | %h:%i %a";
	$time = time();
	$set_date = mdate($datestring, $time);
	$data = array(
			'id_news' => $Id,
			'user' => $this->session->userdata('username'),
			'date' => $set_date,
			'comment' => $this->input->post('comment')
		);
	return $this->db->insert('drak_news_comments', $data);
		}
	}
}
