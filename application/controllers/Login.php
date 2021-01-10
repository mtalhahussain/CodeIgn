<?php
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation','session','pdf_print','pagination'));
		$this->load->helper(array('url','form','security'));
		$this->load->model('Pak_model','md');
		$this->load->model('dash_model','dm');

	}

   public function generate_report(){

   	$this->load->view('fees_add/pdf_report_view');
   }
	public function index()
	{
		if ($this->input->post('login_btn') == null) 
		{	
		
		$this->form_validation->set_rules('email','Username','required|trim',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('pass','Password','trim|required',array('required' => 'You must provide a %s.'));

		if ($this->form_validation->run() == false) {

			$this->load->view('login_view');
			
		}
		else {

			$email = $this->input->post('email');
			$pass = $this->input->post('pass');
			//$data = array('email' => $email,'password' => $pass);

			 $check   = $this->md->login($email,$pass);
			 if ($check == true) 
			 {
			 	$sess_data = array(

			 		'us_id' => $check[0]->us_id,
			 		'us_name' => $check[0]->us_name,
			 		'us_email' => $check[0]->us_email
			 	);
				$data['sess1'] = $this->session->set_userdata('logged_in',$sess_data);
				$data['title'] = "Dashboard";
				$data['count_std'] = $this->dm->count_all_std();
				$data['count_cls'] = $this->dm->count_all_cls();
				$this->load->view('dash_view',$data);
// 			 
			 }
			 else
			 {

			 	$error_data = array(
				'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('login_view', $error_data);

			 }
			
		}
	}
		else{
			$this->load->view('login_view');
		}
	}

	public function logout()
	{
		$sess_array = array(
				'us_id' => "",
			 	'us_name' => "",
			 	'us_email' => "",
			 	'us_cell' => ""
		);
		$this->session->unset_userdata('logged_in',$sess_array);
		//$this->session->set_flashdata('log_msg','Successfully Logout');
		redirect('login.htm');
	}

	public function reset_pass()
	{
		if ($this->input->post('reset_btn') == null) 
		{	
		
		$this->form_validation->set_rules('yrname','Current Username','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('crpass','Current Password','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('pass','New Password','trim|required|xss_clean',array('required' => 'You must provide a %s.'));

		if ($this->form_validation->run() == false) {

			 $data['title'] = "Admin password resetting";
			 
			 $this->load->view("resetpassword",$data);
			
		}
		else {
			
			$name = $this->input->post("yrname");
			$crpass = trim(xss_clean($this->input->post("crpass")));
			$npass = trim(xss_clean($this->input->post("pass")));
			
			$updateDate = date("d-m-Y");
			
			$data = array(

			"us_password" => $npass,
			"us_registered" => $updateDate

			);
			
			 
			$result = $this->dm->get_useronly($name,$crpass);
			 
			if ($result[0]->us_name == $name && $result[0]->us_password == $crpass)
			{
				$this->dm->reset_pass_update($name,$crpass,$data);
				$this->session->set_flashdata('msg', '<div  class="alert alert-success" id="successMessage" role="alert">Password changed successfully!</div>');
			   redirect("login.htm");
				
			}
			else
			{

			
			$this->session->set_flashdata('msg','<div  class="alert alert-danger alert-dismissable" id="successMessage" role="alert">Current Username or Password does not exists!</div>');
				redirect("reset.htm");
			
			}
			
		 }
			
		}
	
		else{
			
			 
			 $data['title'] = "Admin password reset";
			 //$data['res'] = $this->dm->get_useronly();
			 $this->load->view("resetpassword",$data);
		}
	}

}