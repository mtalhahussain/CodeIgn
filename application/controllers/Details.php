<?php
class Details extends CI_Controller{
	
	
	public function __construct(){
		
		parent:: __construct();
		//$this->load->helper('url');

		$this->load->model('Details_model','dta');
		$this->load->model('dash_model','dm');
		$this->load->library('form_validation');
		
	}
	public function students()
	{
		header("Access-Control-Allow-Origin: *");
		$data = $this->dm->getclasslist();
		$this->output
				->set_content_type("application/json")
				->set_output(json_encode($data));
	}

	public function index()
	{
		
		$this->load->view('details_view');
	}
	public function	check_users()
	{
		//$this->session->post('username');
		$name = $this->input->post('usernamej');
		//$account = $name['username'];
		$res = $this->dta->check_user_exists($name);
		if (empty($res)) {
			
			echo '<div style="color:red;">';
			echo "Sorry! Username already exists";
			echo '</div>';
			//echo json_encode(['msg' => 'success']);
		}
		else{
			echo "<div style='color:green;'>";
			echo "Success! Username Valid";
			echo "</div>";
			//echo json_encode(['msg' => 'error']);
		}
	}
	public function	user_registration()
	{
		if ($this->input->post('sign_up') == null) {
			
		$this->form_validation->set_rules('cust_name','Customer Name','trim|required');
		$this->form_validation->set_rules('cust_email','Customer Email','trim|required');
		$this->form_validation->set_rules('cust_cell',' Cell no','trim|required');
		$this->form_validation->set_rules('cust_password','Customer Password','trim|required');
		$this->form_validation->set_rules('cust_gender','Customer Gender Choose','trim|required');
			
			if ($this->form_validation->run() == false)
			{
				$this->load->view('details_view');
			}
			else{

			$date= date("Y-m-d");
			$time=date("H:m");
			$datetime=$date."T".$time;

			$data1 = array(
			'us_name' 		 => $this->input->post('cust_name'),
			'us_email'		 => $this->input->post('cust_email'),
			'us_cell'	 	 => $this->input->post('cust_cell'),
			'us_password'	 => $this->input->post('cust_password'),
			'us_gender'		 => $this->input->post('cust_gender'),
			'us_status'		 => '0',
			'us_registered' => $datetime
		);
			
			$name = $this->input->post('cust_name');
			$name_result = $this->dta->check_user_exists_in_php($name);
			 
			if ($name_result)
			{
				$this->dta->insert_data($data1);
			redirect("login.htm");
				
			}
			else
			{

			/*$data['message_display'] = 'Username already exist!';
			$this->load->view('welcome_message',$data);*/
			//header('Location:'.base_url().'index.php/welcome');
			$this->session->set_flashdata('msg','Username already exists!');
				redirect('register.htm');
			
			}
		
		}
	}
		else{
			redirect("register.htm");
		}
	}
}

?>
