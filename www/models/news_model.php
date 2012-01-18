<?php
class News_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	public function get_news($Id = NULL)
	{
		if (is_null($Id))
		{
			$query = $this->db->query("SELECT * FROM `drak_news` ORDER BY `id` DESC");
			return $query->result_array();
		}
		else
		{
			$query = $this -> db -> get_where('drak_news', array('id' => $Id));
			return $query -> row_array();
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
		if(is_null($Id))
		{
			return false;
		}
		else
		{
			$query = $this -> db -> get_where('drak_news_comments', array('id_news' => $Id));
			return $query -> num_rows();
		}
	}
	
	public function get_comments($Id)
	{
		if(is_null($Id))
		{
			return false;
		}
		else
		{
			$query = $this -> db -> get_where('drak_news_comments', array('id_news' => $Id));
			return $query -> row_array();
		}
	}
}
