<?php
include_once('Template/dash_index.php');
 include_once('Template/nav.php');
 if (empty($this->session->userdata("logged_in")) == true) {
     
     redirect("login.htm");
 }

   
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href='<?php echo base_url()?>assets/css/bootstrap.min.css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/animate.min.css">
	<link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
	<script src="<?php echo base_url()?>assets/js/dist/jquery.min.js">
		</script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src='<?php echo base_url()?>assets/js/bootstrap-datepicker.min.js'></script>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <!-- <link href="<?php echo base_url()?>bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />  -->
	<link href="<?php echo base_url()?>assets/css/breadcrumbs.css" rel="stylesheet" />
	<style>
	
       #vg{
            position: absolute;
            bottom: 5px;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            /*background-image: url("<?php echo base_url();?>assets/img/34.jpg");*/
           /* background-color: rgb(212, 304, 319);*/
            background-color: #DADADA;
            background-size: cover !important;
            background-position: center;
            background-repeat: repeat;
            background-attachment: fixed;
            filter: blur(1px);
            -webkit-filter: blur(1px);
            }
            #all1>p{
            	font-size: 13px;
            	text-align: center;
            	font-family: sans-serif;
            	color: #fff;
            }
	}
       
       
</style>
</head>
<body>
	<div id="vg"></div>
	<div class="page-content">
<div class="container-fluid">
	<div class="row">
		<ul class="breadcrumb">
                  <li><a href="<?php echo base_url(); ?>dash.htm">Dashboard</a></li>
                  <li>Add Student</li>
                  
                </ul>
	</div>
	<div class="row">
		<div class="col-md-12 mb-4 col-xs-offset-0" style=" margin: auto 0; margin-bottom: 0%; z-index: 1; ">
			
			<?php if($this->session->flashdata('msg')): ?>
			    <p><?php
			      echo $this->session->flashdata('msg'); 
			     ?></p>
			<?php endif; ?>
		
				<br/>
			<div class="col-md-4 mb-4 col-xs-offset-1">
				<form method="post" class="form-group-md" action="<?php echo base_url()?>students.htm">
					<fieldset>
					 <!-- <legend>Add Students</legend>  -->
						<div class="form-group">
						<!-- <div id="msg"><p>Student ID : <span><?php $today = date("dy");
							$rand = strtoupper(substr(uniqid(sha1(time())),0,2));
									echo $unique = $today . $rand++; ?></span></p>
														
								</div> -->
								<input type="text" autocomplete="off" name="fullname" placeholder="Enter Student Name" class="form-control"/>
								<div class="alert-danger" id="all1">
									<?php echo form_error('fullname');?>
								</div>
							</div>
							<div class="form-group">
								<input type="text" name="fathername" placeholder="Enter Father Name" class="form-control"/>
								<div class="alert-danger" id="all1">
								<?php echo form_error('fathername'); ?>
							</div>
							</div>
							<div class="form-group">
								<input type="text" name="address" placeholder="Enter Residence Address" class="form-control"/>
								<div class="alert-danger" id="all1">
									<?php echo form_error('address');?>
								</div>
							</div>
							<div class="form-group">
								<input type="text" name="parentsphone" maxlength="12" placeholder="Enter Parents Phone No" class="form-control"/>
								<div class="alert-danger" id="all1">
									<?php echo form_error('parentsphone');?>
								</div>
							</div>
								<div class="form-group">
									<input type="text" name="college" placeholder="Enter School/College Name" class="form-control"/>
								<div class="alert-danger" id="all1">
								<?php echo form_error('college');?>
							</div>
								</div>
								<div class="form-group">
								<input type="text" id="cell" maxlength="12" name="personalcell" placeholder="Enter personal cell no" class="form-control"/>
								<div class="alert-danger" id="all1">
									<?php echo form_error('personalcell');
									if (!empty($this->session->flashdata('msgn')))
									 {
										echo "<div id='all1' class='alert-info'>";
										echo  $this->session->flashdata('msgn');
										echo "</div>";
									}
									?>

								</div>
							</div>
							</div>
							<div class="col-md-4 mb-4 col-xs-offset-1">
							<div class="form-group">
								
								<select class="form-control" name="gender">
									<option value=""> --Select Gender-- </option>
									<option value="F">Female</option>
									<option value="M">Male</option>
								</select>
								<div class="alert-danger" id="all1">
								<?php echo form_error('gender');?>
							</div>
							</div>
							
							<div class="form-group">
								<select class="form-control" name="religion">
									<option value=""> --Select Religion-- </option>
									<option value="Islam">Islam</option>
									<option value="Hindu">Hindu</option>
									<option value="Christian">Christian</option>
								</select>
								<div class="alert-danger" id="all1">
								<?php echo form_error('religion');?>
							</div>
							</div>
							<div class="form-group">
								<select class="form-control" id="classid" name="class">
									<option value=""> --Select Class-- </option>
									<?php foreach($classdata as $r){
						                echo '<option value="'.$r->cls_id.'">'.$r->cls_name.' </option>';
						            } ?>
								</select>
								<div class="alert-danger" id="all1">
								<?php echo form_error('class');?>
							</div>
							</div>
						<div class="form-group">
								<select class="form-control" id="groupid" name="group">
								<option value=""> --First Select Class-- </option>
								</select>
								<div class="alert-danger" id="all1">
								<?php echo form_error('group');?>
							</div>
							</div>	
							<!-- div class="form-group">
							<select class="form-control" id="status" name="status">
									<option value=""> --Select Status-- </option>
									<option value="0"> Inactive </option>
									<option value="1"> Active </option>
								</select>
								<div class="alert-danger" id="all1">
								<?php echo form_error('status');?>
							</div>
							</div> -->
						
					




						<div class="form-group">
						<input type="date" name="dates"  class="form-control">
						<div class="alert-danger" id="all1">
								<?php echo form_error('dates'); ?>
							</div>
					</div>
							<input type="submit" name="save_btn" class="btn btn-primary btn-block" value="Save"/>
							</div>
						<!-- <div class="row">
							<div class="col-md-5 col-xs-offset-4">
							
						</div>
							</div> -->  <div class="col-md-2 " style="text-align: right; margin-top: 0%;">
							<a class="dropdown-toggle toggle btn btn-sm" role="button" href="<?php echo base_url()?>student_details.htm">	View Students</a>
						</div>
				 
					</fieldset>
				</form>
			</div>
			
		</div>
		
		
				</div>	
				</div>
				</div>		
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<script type="text/javascript">

     
	$(document).ready(function(){

 $("#successMessage").fadeOut(7000);
		$('#classid').on('change',function(){

			var classid = $(this).val();
			if (classid) {

				$.ajax({
					url: '<?php base_url();?>Dashboard_controller/load_groups',
					type: 'post',
					data: 'id='+ classid,
					success: function(data){
						$('#groupid').html('<option value=""> --Select Group-- </option>');
						
						// var dto = jQuery.parseJSON(data);
						if (data) {
							// $(dto).each(function(){
							$('#groupid').html(data);
							// 	var option = $('<option>');
							// 	option.attr('value',this.id).text(this.name);
							// 	$('#groupid').append(option);
							// });
						}
						else{
							$('#groupid').html('<option value=""> --Select not Avail -- </option>');
						}	
					}
				});
			}
			else{

				//$('#classid').html('<option value=""> --Select Class-- </option>');
				$('#groupid').html('<option value=""> --Select First Class-- </option>');
			}
		});

		

	});

	// $(function(){

	// 	$('#groupid').on('change', function(){

	// 		var groupid = $(this).val();
	// 		if (groupid) {
	// 			$.ajax({
	// 				url: '<?php base_url();?>Dashboard_controller/load_status_in_std_view',
	// 				type: 'post',
	// 				data: 'idgrp='+ groupid,
	// 				success: function(res){
	// 					$('#status').html('<option value=""> --Select Status-- </option>');
	// 					if (res) {
	// 						$('#status').html(res);
	// 					}

	// 				}
	// 			});
	// 		}
	// 	});

	// });

	
	// $(function(){

	// 	$('#cell').on('keyup',function(){

	// 		var cell_no = $(this).val();
	// 		if(cell_no != null)
	// 		{
	// 			// alert('hello');
	// 			$.ajax({
	// 			url: '<?php base_url();?>Dashboard_controller/check_users',
	// 			dataType: "html",
	// 			type: 'post',
	// 			data: "usercell=" + cell_no,
	// 			success : function(mssg){

	// 				if (mssg != null) {


	// 					//$input.css('border','solid 2px red');
	// 					$('#msg').show();
	// 					$('#msg').html(mssg);
	// 					//css("color" , "purple");
	// 					$('#msg1').hide();

	// 				}
	// 				else {

	// 					$('#msg').show();
	// 					$('#msg').html(mssg);
	// 					//.css("color" , "purple");;
	// 					$('#msg1').hide();
	// 				}
					 
	// 	},
	// 				error: function(jqXHR, textStatus, errorThrown) {
 //                        $('#msg').show();
 //                        $("#msg").html(textStatus + " " + errorThrown);
 //                    }
	// 				//console.log(response);
				
	// 		});
	// 		}
	// 		else{
	// 			$('#msg').show();
	// 			$("#msg").html("Username is required field.").css("color", "red");
	// 			$('#msg').show();
	// 		}
			
			
			
	// 	});
	//});

</script> 

</body>
</html>