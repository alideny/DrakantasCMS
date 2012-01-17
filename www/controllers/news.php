<?php
class News extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$title = $this->config->item('site_title');
		$this->template->title($title);
	}

	public function index()
{
	$this->load->helper("text");
	$data['news'] = $this->news_model->get_news();
	$this->template->build('index', $data);
}

	public function view($slug)
{
	$data['news_item'] = $this->news_model->get_news($slug);

	if (empty($data['news_item']))
	{
		show_404();
	}

	$data['title'] = $data['news_item']['title'];

	$this->template->build('news/view', $data);
}
	public function create()
{
	$this->load->helper('form');
	
	$data['title'] = 'Create a news item';
	
	$this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('text', 'text', 'required');
	
	if ($this->form_validation->run() === FALSE)
	{
		$this->template->build('news/create');
		
	}
	else
	{
		$this->news_model->set_news();
		$this->template->build('news/success');
	}
}
}