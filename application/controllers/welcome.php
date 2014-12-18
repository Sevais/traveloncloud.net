<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$this->load->helper('url');
		//$this->load->helper('directory');
		//$regions = directory_map('./cloud/hotels');
		//$data['regions'] = $regions;
		$this->load->view('includes/header');
		$this->load->view('home');
		$this->load->view('includes/footer');
	}
	/* FILE SYSTEM */
	public function file_system()
	{
		$this->load->helper('url');
		$this->load->helper('directory');
		$this->load->helper('file');
		
		$dir = isset($_GET['dir'])?'./'.$_GET['dir'].'/':'./cloud/';
		$_dir_map = directory_map('./cloud/hotels');
		$data['dir_map'] = $_dir_map;
		$data['dir'] = $dir;
		$data['info'] = get_dir_file_info($dir);
		
		$this->load->view('includes/header');
		$this->load->view('cloud',$data);
		$this->load->view('includes/footer');
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */