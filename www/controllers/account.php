<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('account_model');
		$this->load->model('encryption_model');
		$title = $this->config->item('site_title');
		$this->template->title($title);
	}
	public function index()
	{
	$username = $this->session->userdata('username');
	$info = array(
	'username' => $this->account_model->get_info('username', $username),
	'email' => $this->account_model->get_info('email', $username),
	'joindate' => $this->account_model->get_info('joindate', $username),
	'expansion' => $this->account_model->get_info('expansion', $username),
	'banned' => $this->account_model->get_info('locked', $username),
	'coins' => $this->account_model->get_drakinfo('coins', $username),
	'points' => $this->account_model->get_drakinfo('points', $username),
	);
	if($this->session->userdata('logged_in') == TRUE)
	{
	$this->template->build('account', $info);
	}
	else {
	redirect('account/login', 'refresh');
	}
	}
	public function register()
	{
	$this->load->helper(array('form', 'url'));

		$this->form_validation->set_rules('username', 'Username', 'is_unique[account.username]|trim|required|min_length[5]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[repeat_password]|xss_clean');
		$this->form_validation->set_rules('repeat_password', 'Password Confirmation', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'is_unique[account.email]|trim|required|matches[repeat_email]|valid_email|xss_clean');
		$this->form_validation->set_rules('repeat_email', 'Email Confirmation', 'trim|required|valid_email|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->build('account/register');
		}
		else
		{
			$this->account_model->register_account();
			$this->template->build('account/register_sucess');
		}
	}
	public function login($idioma=null)
   {
      if(!isset($_POST['username'])){  
      $this->template->build('account/login');
      }
      else{
         $this->form_validation->set_rules('username','Username','required');
         $this->form_validation->set_rules('password','Password','required');
         if(($this->form_validation->run() == FALSE)){
            $this->template->build('account/login');
         }
         else{
            $this->load->model('account_model');
			$password = $this->encryption_model->sha_password($this->input->post('username'), $this->input->post('password'));
            $Load_data = $this->account_model->login($this->input->post('username'), $password);
            if($Load_data){
			   $login_data = array(
                   'username'  => $this->input->post('username'),
                   'logged_in' => TRUE
               );
			   $this->session->set_userdata($login_data);
               $this->template->build('account/login_success');
            }
            else{
               $data['error']="E-mail o password incorrecta, por favor vuelva a intentar";
			   $this->template->build('account/login', $data);
            }
         }
      }
   }
	public function logout()
	{
	if($this->session->userdata('logged_in') == TRUE)
	{
	$this->session->sess_destroy();
	$this->template->build('account/logout');
	}
	else {
	redirect('/', 'refresh');
	}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */