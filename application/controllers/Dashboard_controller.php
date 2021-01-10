<?php
class Dashboard_controller extends CI_Controller{
	
	
	public function __construct(){
		
		parent::__construct();
		$this->load->model('dash_model','dm');
		$this->load->library(array('form_validation','session','Pdf_print','pagination'));
		$this->load->helper(array('url','form','security'));
		$this->load->model('Pak_model','md');
		
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['count_std'] = $this->dm->count_all_std();
		$data['count_cls'] = $this->dm->count_all_cls();
		$this->load->view('dash_view',$data);
	}

	public function add_std()
	{
		if ($this->input->post('save_btn') != null) 
		{	
		
		$this->form_validation->set_rules('fullname','Student name','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('fathername','Father name','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('address','Address','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('parentsphone','Parents Phone no','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('college','School or College ','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('personalcell','Personal Cell no','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('gender','Gender','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		// $this->form_validation->set_rules('status','Status','trim|required',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('religion','Religion','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('class','Class','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('group','Group','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('dates','Date','trim|required|xss_clean',array('required' => 'You must provide a %s.'));

		if ($this->form_validation->run() == false) {

			 $data['classdata'] = $this->dm->getclassonly();
			 $data['title'] = "Add new student admission";
			 $this->load->view('student_add/students_view',$data);
			
			
		}
		else {
			$posts = $this->input->post();

			// $date = date("Y-m-d");
			// $time = date("H:m");
			// $datetime = $date."T".$time;
			$name = trim(xss_clean($this->input->post("fullname")));
			$fathername = trim(xss_clean($this->input->post("fathername")));
			$address = trim(xss_clean($this->input->post("address")));
			$parentsphone = trim(xss_clean($this->input->post("parentsphone")));
			$school_college = trim(xss_clean($this->input->post("college")));
			$studentphone = trim(xss_clean($this->input->post("personalcell")));
			$gender = trim(xss_clean($this->input->post("gender")));
			//$status = trim(xss_clean($this->input->post("status")));
			$religion = trim(xss_clean($this->input->post("religion")));
			$classid = trim(xss_clean($this->input->post("class")));
			$group = trim(xss_clean($this->input->post("group")));
			$admissiondate = trim(xss_clean($this->input->post("dates")));
			
			$data = array(

			"st_name" => $name,
			"st_father_name" => $fathername,
			"st_address" => $address,
			"st_parents_phone_no" => $parentsphone,
			"st_school_college" => $school_college,
			"st_student_phone_no" => $studentphone,
			"st_gender" => $gender,
			"st_religion" => $religion,
			"st_class_id" => $classid,
			"st_group" => $group,
			"st_admission_date" => $admissiondate

			);
			
			//  $cell = $this->input->post('usercell');
			// $cell_result = $this->dm->check_student_phone_exists($cell);
			 
			// if ($cell_result)
			// {
				$this->dm->insert_student_data($data);
				$this->session->set_flashdata('msg', '<div  class="alert alert-info" id="successMessage" role="alert">Student added successfully!</div>');
			   redirect("students.htm");
				
			// }
			// else
			// {

			// /*$data['message_display'] = 'Username already exist!';
			// $this->load->view('welcome_message',$data);*/
			// //header('Location:'.base_url().'index.php/welcome');
			// $this->session->set_flashdata('msg','Student already exists!');
			// 	redirect('students.htm');
			
			// }
			
		 }
			
		}
	
		else{
			//redirect('students.htm');
			//$data['status_res'] = $this->dm->getstatus();
			 $data['classdata'] = $this->dm->getclassonly();
			 $data['title'] = "Add new student admission";
			 //$data1['class_id'] = $this->dm->getgroup_viaclass($cls_id);
			 $this->load->view("student_add/students_view",$data);
		}
	}


	public function delete_student_only($id){

		$this->dm->del_std_only($id);
		echo("Delete successfuly!");
		redirect("student_details.htm");
	}
	// public function load_status_in_std_view(){

	// 	$id = $this->input->post('idgrp');
	// 	$result = $this->dm->getstatus_name($id);
	// 	$option = "";
	// 	if (!empty($result)) {
		 
	// 	 	 echo "<option value=''>--Select Status--</option>";
 //       foreach ($result as $row){
 //       	if ($row->grp_status == 1) {

 //       		$option .= "<option value='".$row->grp_status."'>Active</option>";     
 //       	}
 //       	else{
 //       		$option .= "<option value='".$row->grp_status."'>Inactive</option>";     
 //       	}
                   
	// 	  }
	// 	  echo $option; //echo json_encode($option);
	// 	 // print_r( $row->st_status);
	// 	 // exit();
	// 	 } else{
	// 	        echo $option = "<option value=''>--Select another Option--</option>";
	// 	  }
		
	// }

	public function	check_users()
	{
		//$this->session->post('username');
		$st_no = $this->input->post('usercell');
		//$account = $name['username'];
		$res = $this->dm->check_student_phone_exists($st_no);
		if (empty($res)) {
			
			echo '<div style="color:red;">';
			echo "Sorry! Student already exists";
			echo '</div>';
			//echo json_encode(['msg' => 'success']);
		}
		else{
			echo "<div style='color:green;'>";
			echo "Success! Student valid";
			echo "</div>";
			//echo json_encode(['msg' => 'error']);
		}
	}


	public function details_std()
	{
		
		$data["st_query"] = $this->dm->getstudentlist1();
		$data['title'] = "All student view list";
		$this->load->view('student_add/students_details_view',$data);
	}
	public function details_cls()
	{

		$data['query'] = $this->dm->getclasslist();
		$data['title'] = "View group details";
		$this->load->view('class_add/class_details_view',$data);
	}

	public function details_only_cls()
	{

		$data['query'] = $this->dm->getclasslist_only();
		$data['title'] = "View class details only";
		$this->load->view('class_add/class_details_only_view',$data);
	}

	public function load_std_by_classes()
	{

		$data['classdata'] = $this->dm->getclassonly();
		$data['title'] = "View studens by class.";
		$this->load->view('class_add/load_by_classes',$data);
	}

	public function add_cls()
	{
		if ($this->input->post('save_btn') != null) 
		{	
			$this->form_validation->set_rules('class','Class','trim|required',array('required' => 'You must provide a %s.'));
			

			if ($this->form_validation->run() == false) {
				
				$data['title'] = "Add class & groups";
				$this->load->view('class_add/class_add_view',$data);
			}
			else{

			$post = $this->input->post();
			
			$data = array(
			"cls_name" => $this->input->post("class")
			
			);
			
			
			 //$grp = $this->input->post('groups');
			 $cls = $this->input->post('class');

			 $cls_result = $this->dm->check_class_exists_in_php($cls);
			 
			if (empty($cls_result))
			{
				// echo($cls_result);
				// exit();

				$this->session->set_flashdata('cls_msg','Class already exists! try to add a new class');
				redirect("classes.htm");
				
			}
			else
			{
				
			   $this->dm->insert_class_data($data);
			   $this->session->set_flashdata('msgg', '<div  class="alert alert-info" id="successMessage" role="alert">Class added successfully!</div>');
				  redirect("classes.htm");
			}
				
			}

		  
		}
		else{
			//redirect('students.htm');
			$data['title'] = "Add class & groups";
			$data["cls_data"] = $this->dm->getclasslistonlyview();
			$this->load->view("class_add/class_add_view",$data);
		}
	}

	public function update_student_view($ids)
	{

			$ids = $this->uri->segment(2);
			  if ($ids > 0) {
			  	$data['title'] = "Update student record";
			  	$data['result'] = $this->dm->get_student_edit($ids);
			  	$data['classdata'] = $this->dm->getclassonly();
			$this->load->view("student_add/student_edit_view",$data);
			  }else{
			  	redirect("student_details.htm");
			  }
	}


	public function update_student_data(){

		$id = $this->input->post("id_update");

		$this->form_validation->set_rules('stname','Student name','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('stfathername','Father name','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('staddress','Address','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('stpcell','Parents Phone no','numeric|trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('stcollege','School or College ','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('stcell','Personal Cell no','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('stgender','Gender','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		// $this->form_validation->set_rules('status','Status','trim|required',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('streligion','Religion','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('class','Class','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('group','Group','trim|required|xss_clean',array('required' => 'You must provide a %s.'));
		$this->form_validation->set_rules('dates','Date','trim|required|xss_clean',array('required' => 'You must provide a %s.'));

		if ($this->form_validation->run() == false) {

			 $data['classdata'] = $this->dm->getclassonly();
			 $data['result'] = $this->dm->get_student_edit($id);
			 $data['title'] = "Update student admission record";
			 $this->load->view('student_add/student_edit_view',$data);
			
			
		}
		else {
			$posts = $this->input->post();

			// $date = date("Y-m-d");
			// $time = date("H:m");
			// $datetime = $date."T".$time;
			$name = trim(xss_clean($this->input->post("stname")));
			$fathername = trim(xss_clean($this->input->post("stfathername")));
			$address = trim(xss_clean($this->input->post("staddress")));
			$parentsphone = trim(xss_clean($this->input->post("stpcell")));
			$school_college = trim(xss_clean($this->input->post("stcollege")));
			$studentphone = trim(xss_clean($this->input->post("stcell")));
			$gender = trim(xss_clean($this->input->post("stgender")));
			//$status = trim(xss_clean($this->input->post("status")));
			$religion = trim(xss_clean($this->input->post("streligion")));
			$classid = trim(xss_clean($this->input->post("class")));
			$group = trim(xss_clean($this->input->post("group")));
			$admissiondate = trim(xss_clean($this->input->post("dates")));
			
			$data = array(

			"st_name" => $name,
			"st_father_name" => $fathername,
			"st_address" => $address,
			"st_parents_phone_no" => $parentsphone,
			"st_school_college" => $school_college,
			"st_student_phone_no" => $studentphone,
			"st_gender" => $gender,
			"st_religion" => $religion,
			"st_class_id" => $classid,
			"st_group" => $group,
			"st_admission_date" => $admissiondate

			);
			
			//  $cell = $this->input->post('usercell');
			// $cell_result = $this->dm->check_student_phone_exists($cell);
			 
			// if ($cell_result)
			// {
				$this->dm->update_student($data,$id);
				$this->session->set_flashdata('msg', '<div  class="alert alert-info alert-dismissable" id="successMessage" role="alert">Student updated successfully!</div>');
			   redirect("student_details.htm");
				
	}

}
public function add_grp()
	{
		if ($this->input->post('save_btn_group') != null) 
		{
			$this->form_validation->set_rules('class_grp','Class','trim|required',array('required' => 'You must provide a %s.'));
			$this->form_validation->set_rules('groups','Group','trim|required',array('required' => 'You must provide a %s.'));
			$this->form_validation->set_rules('fees','Fees','numeric|trim|required',array('required' => 'You must provide a %s.'));

			if ($this->form_validation->run() == false) {
				
				$data['title'] = "Add class & groups..";
				$data["cls_data"] = $this->dm->getclasslistonlyview();
				$this->load->view("class_add/class_add_view",$data);
				
			}
			else{

			$data1 = array(
			"cls_id" => $this->input->post("class_grp"),
			"grp_name" => $this->input->post("groups"),
			"cls_fees" => $this->input->post("fees")
			
			);
			$cls = $this->input->post("class_grp");
			$grp = $this->input->post("groups");

			$grp_result = $this->dm->check_group_in_php($cls,$grp);
			 
			if ($grp_result)
			{
				$this->session->set_flashdata('msg','Group already assign to this Class! try to add a new class');
				redirect('classes_grp.htm');
				
				
			}
			else
			{
								
			  // echo 'Hellooooo';
			  
			  	$this->dm->insert_group($data1);
			  	$this->session->set_flashdata('msg1', '<div  class="alert alert-info" id="successMessage" role="alert">Group added successfully!</div>');
			  	redirect('classes.htm');
				
			}
		}
	}

		else{
			//redirect('students.htm');
			$data['title'] = "Add class & groups./";
			$data["cls_data"] = $this->dm->getclasslistonlyview();
			$this->load->view("class_add/class_add_view",$data);
		}
	}

	public function update_class_view($ids)
	{

			//$ids = $this->uri->segment(3);
			  $this->db->select('*');
    	     $this->db->from('class');
		    // $this->db->join("class_fees","class.cls_id = $id");
		    // $que = $this->db->get();*/
			 //$this->db->join('class', 'class_fees.cls_id = class.cls_id');
             
              $this->db->where('cls_id',$ids);
		     $que = $this->db->get();
			//$que = $this->db->get('class');

			if ($que->num_rows() == 0) {
				redirect("classes_details_only.htm");
			}
			$data['title'] = "Update classes record";
			$data['result'] = $que->result();
			//$id = $this->uri->segment(3);
			$this->load->view("class_add/class_edit_view",$data);
	}

	public function update_class_data()
	{
		$id = $this->input->post('id_update');
			

// 		$this->form_validation->set_rules('classes','Class','trim|required|',array('required' => 'Please update class %s.'));
// 		if ($this->form_validation->run() == false) {
// // echo "error";
// // exit();
// 			$this->load->view("class_add/class_edit_view");
			
// 		}
// 		else{

			$data = array(

				'cls_name' => $this->input->post('classes')
				//'grp_name' => $this->input->post('groups')

			);

			if ($id > 0) {
				
				$this->dm->update_class($data,$id);
				$this->session->set_flashdata('msgg', '<div  class="alert alert-info" id="successMessage" role="alert">Class updated successfully!</div>');
				redirect('classes_details_only.htm');
			}
			else{
				$this->session->set_flashdata('cls_msg','Error! try again');
				redirect('classes_details_only.htm');
			}
		// }
	}

	public function delete_class_only($id){

		$this->dm->del_classes_only($id);
		echo("Delete successfuly!");
		redirect("classes_only.htm");
	}

	public function delete_class_with_group($id){

		//$id = $this->uri->segment("3");
		$this->dm->del_classes_grp($id);
		echo("Delete successfuly!");
		redirect("classes_details.htm");
	}

	public function update_group_view()
	{

			$id = $this->uri->segment(2);
			  $this->db->select('*');
    	     $this->db->from('class_fees');
		    // $this->db->join("class_fees","class.cls_id = $id");
		    // $que = $this->db->get();*/
			 $this->db->join('class', 'class_fees.cls_id = class.cls_id');
             //$this->db->join('class_fees','class.cls_id = class_fees.cls_id');
              $this->db->where('grp_id',$id);
		     $que = $this->db->get();
			//$que = $this->db->get('class');

			if ($que->num_rows() == 0) {
				redirect("classes_details.htm");
			}
			$data['title'] = "Update group record";
			$data['result'] = $que->result();
			//$id = $this->uri->segment(3);
			$this->load->view("class_add/group_edit_view",$data);
	}

	public function update_group_data(){

		$id = $this->input->post("id_update");

		$data = array(
		'grp_name' => xss_clean($this->input->post("grptxt")),
		'cls_fees' => xss_clean($this->input->post("feetxt"))
		);
		if ($id > 0) {
			
			$this->dm->update_group($data,$id);
			$this->session->set_flashdata('msg', '<div  class="alert alert-info" id="successMessage" role="alert">Group updated successfully!</div>');
			redirect("classes_details.htm");
		}
		else{
			$this->session->set_flashdata("grp_msg","Something wrong try again!");
			redirect("classes_details.htm");
		}
	}

	
	public function load_groups1(){

		//$grpname = array();
		$classid = $this->input->post('id4');
		// print_r($classid);
		// exit();
		$result = $this->dm->getgroup_viaclass($classid);
		$option = "";
		 if (!empty($result)) {
		 
		 	 echo "<option value=''>--Select Group--</option>";
       foreach ($result as $row){

           $option .= "<option value='".$row->grp_id."'>".$row->grp_name."</option>";             
		  }
		  echo $option; //echo json_encode($option);
		 } else{
		        echo $option = "<option value=''>--This Class Don't have Group--</option>";
		  }
		 	 //echo $this->output->json_encode($grpname);
		 
	}

	public function load_groups(){

		//$grpname = array();
		$classid = $this->input->post('id');
		$result = $this->dm->getgroup_viaclass($classid);
		$option = "";
		 if (!empty($result)) {
		 
		 	 echo "<option value=''>--Select Group--</option>";
       foreach ($result as $row){

           $option .= "<option value='".$row->grp_id."'>".$row->grp_name."</option>";             
		  }
		  echo $option; //echo json_encode($option);
		 } else{
		        echo $option = "<option value=''>--This Class Don't have Group--</option>";
		  }
		 	 //echo $this->output->json_encode($grpname);
		 
	}

	public function load_status_std_fee(){

		$grpid = $this->input->post('id1');
		$result = $this->dm->getstatus_viagroup($grpid);
		$option = "";
		 if (!empty($result)) {
		 
		 	 echo "<option value=''>--Select Status--</option>";
       foreach ($result as $row){
       	if ($row->st_status == 0) {

       		$option .= "<option value='".$row->st_status."'>Inactive</option>";     
       	}
       	else{
       		$option .= "<option value='".$row->st_status."'>Active</option>";     
       	}
                   
		  }
		  echo $option; //echo json_encode($option);
		 // print_r( $row->st_status);
		 // exit();
		 } else{
		        echo $option = "<option value=''>--Select another Option--</option>";
		  }

	}
		  
	

	public function	check_class()
	{
		//$this->session->post('username');
		$cls = $this->input->post('name');
		$grp_result = $this->dm->check_class_exists_in_php($cls);
		if (empty($grp_result)) {
			
			echo '<div style="color:red;">';
			echo "Sorry! Class already exists";
			echo '</div>';
			//echo json_encode(['msg' => 'success']);
		}
		else{
			echo "<div style='color:green;'>";
			echo "Success! Class Valid";
			echo "</div>";
			//echo json_encode(['msg' => 'error']);
			// $this->load->view('fees_add/fee_std_view',$data);
		   		// redirect('fee_details.htm');
		   	 // echo "<option value=''>--Select Student--</option>";
       // foreach ($result as $row){

       //     $option .= "<option value='".$row->st_id."'>".$row->st_name."</option>";             
		  
		  //echo $option; 
		  //echo json_encode($option);
		}
	}

   public function load_class_in_fees(){

		   	$clsid = $this->input->post('id0');
		   	$result = $this->dm->getgroup_viaclass($clsid);
		   	$option = "";
		   	if (!empty($result)) {

		   	 echo "<option value=''>--Select Group--</option>";
       foreach ($result as $row){

           $option .= "<option value='".$row->grp_id."'>".$row->grp_name."</option>";             
		  }
		  echo $option; //echo json_encode($option);
		 } else{
		        echo $option = "<option value=''>--Class Don't assign Group--</option>";
		  }

   }
	// 
   public function load_students_in_fee(){

   	
   	$statusid = $this->input->post('id2');
   	$grpsid = $this->input->post('id3');
   	//$statusid = $this->input->post('id2');
   	
//  print_r( $grpsid);
// exit();
		   	if ($statusid != null) {
		   		

		   		$data = $this->dm->search_students_by_cls_grp($statusid,$grpsid);
                               
                                $i = 0;
                                     foreach($data as $row): 
                                        $i++;
                                     echo '<table  class="table table-responsive table-striped table-bordered table-hover"> 
                                    <tr>   
                                        <td> '.$i.' </td>
                                        <td> '.$row->st_name.'</td>
                                        <td> '.$row->st_father_name.'</td>
                                        
                                        <td> '.$row->st_school_college.' </td>
                                        
                                        <td> '.$row->st_gender.'</td>
                                       ';
                                        $convertDate = date("d-M-Y", strtotime($row->st_admission_date)); 
                                        echo '<td> '.$row->st_religion.'</td>
                                        <td> '.$row->cls_name.' </td>
                                        <td> '.$row->grp_name.'</td>
                                        <td> '.$convertDate.' </td>';
                                         echo "<td> <a href='".base_url()."fee_taken/".$row->st_id."' class='btn btn-sm btn-warning' role='button'>$ Take Fee</a> </td>"
                                         ?>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
		   		
		<?php } 
		 else{
		 	echo '<table  class="table table-responsive table-striped table-bordered table-hover"> 
                                    <tr id="std_id">   
                                       <div class="alert-warning">   
                                        <td> Data Not Found </td>
                                        <div>
                                        </tr>
                                      </table>';
		       
		  }
   }

 public function load_students_by_class(){

   	
   	$clsid = $this->input->post('id0');
  
		   	if ($clsid !== 0) {
		   		

		   		$data = $this->dm->search_allstudents_cls_grp($clsid);
                               
                                $i = 0;
                                if ($data == null) {
                  echo '<div  class="alert alert-warning" id="successMessage" role="alert">Class dont have a group!Please assign group..</div>';
			  	
                                	
                                }else{
                                     foreach($data as $row): 
                                        $i++;
                                     echo '<table  class="table table-responsive table-striped table-bordered table-hover"> 
                                    <tr>
                                    	 <td> '.$i.' </td>
                                        <td> '.$row->st_id.' </td>
                                        <td> '.$row->st_name.'</td>
                                        <td> '.$row->st_father_name.'</td>
                                        <td> '.$row->st_address.'</td>
                                        <td> '.$row->st_parents_phone_no.'</td>
                                        <td> '.$row->st_school_college.' </td>
                                        <td> '.$row->st_student_phone_no.' </td>
                                        
                                        <td> '.$row->st_gender.'</td>
                                       ';
                                        $convertDate = date("d-M-Y", strtotime($row->st_admission_date)); 
                                        echo '<td> '.$row->st_religion.'</td>
                                        <td> '.$row->cls_name.' </td>
                                        <td> '.$row->grp_name.'</td>
                                        <td> '.$convertDate.' </td>';
                                        
                                         ?>
                                    </tr>
                                    <?php endforeach;} ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
		   		
		<?php } 
		 else{
		 	echo '<table  class="table table-responsive table-striped table-bordered table-hover"> 
                                    <tr id="std_id">   
                                       <div class="alert-warning">   
                                        <td> Data Not Found </td>
                                        <div>
                                        </tr>
                                      </table>';
		       
		  }
   }

public function count_by_class(){

	$clsid = $this->input->post('idst');
  
		   	if ($clsid !== 0) {
		   		$data = $this->dm->count_allstudents_cls($clsid);
		   		echo "<b>($data)</b>";
		   	}
		   	else{
		   		echo '<div class="alert-warning">   
                                         Data Not Found
                                        <div>';
		   	}

}


	public function add_fees()
	{

		$id = $this->input->post('classid');
		if ($this->input->post('fees_btn') != null) {
			# code...
		}
		else{
			
			$data['res'] = $this->dm->getclass_fees();
			// $data['res1'] = $this->dm->search_students_by_cls_grp();
			$data['title'] = "Search students pay for fee";
			$this->load->view("fees_add/fee_add_view",$data);
		}
	}

	public function search_on_key(){
		$id = $this->input->post("srch_id");
		if ($id != null) {
			
			$data = $this->dm->search_students_on_key($id);
			if ($data != null) {
				
			 $i = 0;
                                     foreach($data as $row): 
                                        $i++;
                                     echo '<table  class="table table-responsive table-striped table-bordered table-hover"> 
                                    <tr>   
                                        <td> '.$i.' </td>
                                         <td> '.$row->st_id.' </td>
                                        <td> '.$row->st_name.'</td>
                                        <td> '.$row->st_father_name.'</td>
                                        
                                       
                                        
                                        <td> '.$row->st_gender.'</td>
                                       ';
                                        $convertDate = date("d-M-Y", strtotime($row->st_admission_date)); 
                                        echo '<td> '.$row->st_religion.'</td>
                                        <td> '.$row->cls_name.' </td>
                                        <td> '.$row->grp_name.'</td>
                                        <td> '.$convertDate.' </td>';?>
                                        <?php
                                         echo "<td> <a target='_blank' href='".base_url()."fee_taken/".$row->st_id."' class='btn btn-sm btn-warning' role='button'>$ Take Fee</a> </td>"; ?>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
		   		
		<?php } 
		 else{
		 	echo '<table  class="table table-responsive table-striped table-bordered table-hover"> 
                                    <tr id="std_id">
                                    
                                       
                                        <div class="alert-warning">   
                                        Data Not Found ! type to search by valid student name.
                                        <div>
                                       
                                        </tr>
                                      </table>';
		       
		  }

		}

		 else{
		 	echo '<table  class="table table-responsive table-striped table-bordered table-hover"> 
                                    <tr id="std_id">
                                    
                                       
                                        <div class="alert-warning">   
                                        Data Not Found ! type to search students.
                                        <div>
                                       
                                        </tr>
                                      </table>';
		       
		  }
		

	}

	public function paying_std_fee_view()
	{

			$id = trim($this->uri->segment(2));
			$this->db->join("class","students.st_class_id = class.cls_id");
    		$this->db->join("class_fees","students.st_group = class_fees.grp_id");
			$que = $this->db->get_where('students', array('st_id' => $id));
			if ($que->num_rows() == 0) {
				redirect("fees.htm");
			}
			$data['result'] = $que->result();
			$dat = $this->dm->get_prev_month_fee($id);
			
			$data['result1'] = $dat;
			$data['title'] = "Even students paying class & group fee";
			$this->load->view("fees_add/fee_std_view",$data);
	}

	public function paid_std_fee_data(){

		$std_id = $this->input->post("id_update");
		$this->form_validation->set_rules('stdname', 'Studennt', 'trim|required',array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('stdclass', 'Class', 'trim|required',array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('stdgroup', 'Group', 'trim|required',array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('month', 'Month', 'trim|required',array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('year', 'Year', 'trim|required',array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('stdclassfee', 'Fee', 'trim|required',array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('pay_amount', 'Amount', 'trim|required',array('required' => 'You must provide a %s.'));
        
        if($this->form_validation->run() == FALSE) {
            $this->db->join("class","students.st_class_id = class.cls_id");
    		$this->db->join("class_fees","students.st_group = class_fees.grp_id");
			$que = $this->db->get_where('students', array('st_id' => $std_id));

			
			$data['result'] = $que->result();
			$data['result1'] = $this->dm->get_prev_month_fee($std_id);
			$data['title'] = "Even students take fee";
			$this->load->view("fees_add/fee_std_view",$data);
		
        }

        else{

		$std_name = trim(xss_clean($this->input->post('stdname')));
		$std_class = trim(xss_clean($this->input->post('class_id')));
		$std_group = trim(xss_clean($this->input->post('grup_id')));
		$std_paid_month = trim(xss_clean($this->input->post('month')));
		$std_paid_year = trim(xss_clean($this->input->post('year')));
		$std_class_fee = trim(xss_clean($this->input->post('stdclassfee')));
		$std_paid_amount = trim(xss_clean($this->input->post('pay_amount')));
		$std_balance_amount = trim(xss_clean($this->input->post('partial_val')));
		$datem = $std_paid_month;
		$datey = $std_paid_year;
		$std_fee_status = trim(xss_clean($this->input->post('status')));
		$res = $this->dm->check_month_year($std_id,$datem,$datey);

		if (!empty($res)) {

			
			
			$data['result'] = $res;
			$data['result1'] = $this->dm->get_prev_month_fee($std_id);
			$data['title'] = "Even students take fee";
			$data['msg'] = 'This month fee already paid..! Try to change month or year..';
			$this->load->view("fees_add/fee_std_view",$data);
			// $this->session->set_flashdata('msg','This month fee already paid!try to change');
			// 	redirect('fee_paid.htm');
		}
		else{
		
		$data2 = array(
			'fp_std_id' => $std_id,
			'fp_cls_id' => $std_class,
			'fp_grp_id' => $std_group,
			'fp_month' => $datem,
			'fp_year' => $datey,
			'fp_cls_grp_fee' => $std_class_fee,
			'fp_paid_amount' => $std_paid_amount,
			'fp_balance_amount' => $std_balance_amount,
			'fp_status' => $std_fee_status
		);
			$dat = $this->dm->get_prev_month_fee($std_id);

			$data['result1'] = $dat;
			print_r($data['result1']); 
			$this->dm->insert_fee_data($data2);
			 $id = $this->db->insert_id();
			 //
			$data["std_result"] = $this->dm->pdf_report_model($id);
			$this->load->view("fees_add/pdf_report_view",$data);
		
	  }
	}
	
}


	public function search_on_btn_fee_rec(){
		$id1 = $this->input->post("stud_id");
		$id2 = $this->input->post("stud_my");
		$id3 = $this->input->post("stud_yr");
		
		if (!empty($id1) && !empty($id2) && !empty($id3)) {
			
			$data1 = $this->dm->search_students_fee_rec($id1,$id2,$id3);
			

			if ($data1) {
				  
			 $i = 0;
                                     foreach($data1 as $row): 
                                        $i++;
                                     echo '<table  class="table table-responsive table-striped table-bordered table-hover"> 
                                     	<tbody id="std_id">
                                    <tr>   

                                        <td> '.$i.' </td>
                                        <td> '.$row->st_name.'</td>
                                        <td> '.$row->cls_name.'</td>
                                        
                                        <td> '.$row->grp_name.' </td>
                                        <td> '.$row->cls_fees.' </td>';
                                        if ($row->fp_status == 1)  echo "<td class='alert-success'><div> Paid Full </div></td>";
                                        else echo "<td class='alert-danger'><div> Balance </div></td>";
                                        echo'<td> '.$row->fp_paid_amount.'</td>';
									echo "<td><div> ".$row->fp_balance_amount." </div></td>";
                                       
                                       echo' <td> '.$row->fp_month.'-'.$row->fp_year.'</td>';
                                        echo "<td> <a target='_blank' href='".base_url()."fee_report_print/".$row->fp_id."' class='btn btn-sm btn-warning' role='button'>Print</a> </td>"; ?>
                                        
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
		   		
		<?php } 
		 else{
		 	echo '<table  class="table table-responsive table-striped table-bordered table-hover"> 
                                    <tr id="std_id">
                                        <div class="alert-warning">   
                                        Data Not Found ! The Student not exists to in this Month or Year.. Type to search by valid Student ID.
                                        <div>
                                        </tr>
                                      </table>';
		       
		  }

		}

		 else{
		 	echo '<table  class="table table-responsive table-striped table-bordered table-hover"> 
                                    <tr id="std_id">
                                    
                                       
                                        <div class="alert-warning">   
                                        Data Not Found ! Type ID Select month & year by search student info.
                                        <div>
                                       
                                        </tr>
                                      </table>';
		       
		  }
		

	}

	public function search_on_btn_all_fee_rec(){
		$id1 = $this->input->post("stud_id");
		$year = $this->input->post("year");
		
		if (!empty($id1) && !empty($year) ) {
			
			$data1 = $this->dm->search_students_fee_rec_all($id1,$year);
			

			if ($data1) {
				  
			 $i = 0;
                                     foreach($data1 as $row): 
                                        $i++;
                                     echo '<table  class="table table-responsive table-striped table-bordered table-hover"> 
                                     	<tbody id="std_id">
                                    <tr>   

                                        <td> '.$i.' </td>
                                        <td> '.$row->st_name.'</td>
                                        <td> '.$row->cls_name.'</td>
                                        
                                        <td> '.$row->grp_name.' </td>
                                        <td> '.$row->cls_fees.' </td>';
                                        if ($row->fp_status == 1)  echo "<td class='alert-success'><div> Paid Full </div></td>";
                                        else echo "<td class='alert-danger'><div> Balance </div></td>";
                                        echo'<td> '.$row->fp_paid_amount.'</td>';
									echo "<td><div> ".$row->fp_balance_amount." </div></td>";
                                      echo' <td> '.$row->fp_month.'-'.$row->fp_year.'</td>';
                                      echo "<td> <a target='_blank' href='".base_url()."fee_report_print/".$row->fp_id."' class='btn btn-sm btn-warning' role='button'>Print</a> </td>"; ?>
                                        
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
		   		
		<?php } 
		 else{
		 	echo '<table  class="table table-responsive table-striped table-bordered table-hover"> 
                                    <tr id="std_id">
                                        <div class="alert-warning">   
                                        Data Not Found ! The Student not exists to in this Month or Year.. type to search by valid Student ID.
                                        <div>
                                        </tr>
                                      </table>';
		       
		  }

		}

		 else{
		 	echo '<table  class="table table-responsive table-striped table-bordered table-hover"> 
                                    <tr id="std_id">
                                    
                                       
                                        <div class="alert-warning">   
                                        Data Not Found ! type to search students.
                                        <div>
                                       
                                        </tr>
                                      </table>';
		       
		  }
		

	}


	public function fee_report_student(){

	$data['title'] = "Even students paid fee details";
		$this->load->view("fee_report/report_view",$data);
	}

	public function fee_report_even_print(){

		$id = $this->uri->segment(2);
		// $data['std'] = $this->input->post("id_prev");
		//$data['result1'] = $this->dm->get_prev_month_fee2($id);
			$data["std_result"] = $this->dm->pdf_report_model($id);
			$this->load->view("fees_add/pdf_report_view",$data);
	}


	

}