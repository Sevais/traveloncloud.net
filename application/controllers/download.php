<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download extends CI_Controller {

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
		
		//$this->load->library('zip');
		$path = './'.$_GET['f'];
		$this->load->helper('download');
		//$this->zip->read_dir($path);
		$data = file_get_contents($path); // Read the file's contents
		$name = $_GET['n'];

		force_download($name, $data);

// Download the file to your desktop. Name it "my_backup.zip"
		//$this->zip->download('travel_on_cloud.zip'); 
		$this->load->view('download');
	}
	
		public function zip()
	{
		
		$this->load->library('zip');
		$this->load->helper('download');
		
		$folder = $_GET['n'];
		$folder_in_zip = $folder; //root directory of the new zip file

		$path = './'.$_GET['f'].'/';

		$this->zip->add_dir($folder_in_zip);  // Create folder in zip 
		$this->zip->get_files_from_folder($path, $folder_in_zip);
		
		$this->zip->download($folder.'.zip'); 

// Download the file to your desktop. Name it "my_backup.zip"
		//$this->zip->download('travel_on_cloud.zip'); 
		echo $path;
		//$this->load->view('download');
	}
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */