<?php
class iSlideshow_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	public function get_slides()
	{
			$query = $this->db->query("SELECT * FROM `drak_index_slideshow` ORDER BY `id` DESC");
			return $query->result_array();
	}
}
