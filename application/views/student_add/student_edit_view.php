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
	<title></title>
	<link rel="stylesheet" type="text/css" href='<?php echo base_url()?>assets/css/bootstrap.min.css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/animate.min.css">
	<link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
   
    <link href="<?php echo base_url()?>assets/css/demo.css" rel="stylesheet" />
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
            /*background-image: url("<?php echo base_url();?>assets/img/12.jpg");*/
            /*background-color: rgb(225, 229, 229);*/
            background-color: #dadada;
            background-size: cover !important;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            filter: blur(50px);
            -webkit-filter: blur(5px);
            }
            #all1>p{
            	font-size: 13px;
            	text-align: center;
            	font-family: sans-serif;
            	color: #fff;
            }
       #msg1{
            	font-size: 13px;
            	text-align: center;
            	font-family: sans-serif;
            	color: #fff;
            }

         #msg{
            	font-size: 13px;
            	text-align: center;
            	font-family: sans-serif;
            	color: #fff;
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
                  <li><a href="<?php echo base_url(); ?>students.htm">Add Student</a></li>
                  <li><a href="<?php echo base_url(); ?>student_details.htm">View Student</a></li>
                  <li>Edit Student</li>
                </ul>
            </div>
	<div class="row">
		<div class=" col-sm-4 col-md-11 col-xs-offset-1" style="margin-bottom: 0%; position: absolute; z-index: 1; ">
			
				<form method="post" action="<?php echo base_url()?>updated.htm">
				
                    <div class="col-md-4 col-sm-12">
					<div class="form-group">
                        <label>Student Name</label>
				 <input type='hidden' name='id_update' value="<?php echo $result[0]->st_id ?>" >
				<input type="text" name="stname" value="<?php echo $result[0]->st_name ?>" class="form-control">
						<div class="alert-danger" id="all1">
								<?php echo form_error('stname'); ?>
							</div>
					</div>
                    <div class="form-group">
                        <label>Father Name</label>
            <input type="text" name="stfathername" value="<?php echo $result[0]->st_father_name ?>" class="form-control">
                        <div class="alert-danger" id="all1">
                                <?php echo form_error('stfathername'); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
            <input type="text" name="staddress" value="<?php echo $result[0]->st_address ?>" class="form-control">
                        <div class="alert-danger" id="all1">
                                <?php echo form_error('staddress'); ?>
                            </div>
                    </div>
					<div class="form-group">
                        <label> Parents Cell</label>
            <input type="text" name="stpcell" value="<?php echo $result[0]->st_parents_phone_no ?>" class="form-control">
                        <div class="alert-danger" id="all1">
                                <?php echo form_error('stpcell'); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label>School & College</label>
            <input type="text" name="stcollege" value="<?php echo $result[0]->st_school_college ?>" class="form-control">
                        <div class="alert-danger" id="all1">
                                <?php echo form_error('stcollege'); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label>Student Cell</label>
            <input type="text" name="stcell" value="<?php echo $result[0]->st_student_phone_no ?>" class="form-control">
                        <div class="alert-danger" id="all1">
                                <?php echo form_error('stcell'); ?>
                            </div>
                    </div>
				</div>
					<div class="col-md-4 col-sm-12">
                        <div class="form-group">
                        <label>Gender</label>
            <input type="text" name="stgender" value="<?php echo $result[0]->st_gender ?>" class="form-control">
                        <div class="alert-danger" id="all1">
                                <?php echo form_error('stgender'); ?>
                            </div>
                    </div>
                     <div class="form-group">
                        <label>Religion</label>
                        <select class="form-control" name="streligion">
                        
                            <option value="<?php echo $result[0]->st_religion ?>"><?php echo $result[0]->st_religion ?></option>
                            <option value=""> --Select Other-- </option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Christian">Christian</option>
                        </select>
            
                        <div class="alert-danger" id="all1">
                                <?php echo form_error('stgender'); ?>
                            </div>
                    </div>
                    <div class="form-group">
                        <label>Class</label>
                                <select class="form-control" id="classid" name="class">
                                    <option value="<?php echo $result[0]->st_class_id ?>"><?php echo $result[0]->cls_name ?></option>
                                    <option value=""> --Select Other-- </option>
                                    <?php foreach($classdata as $r){
                                        echo '<option value="'.$r->cls_id.'">'.$r->cls_name.' </option>';
                                    } ?>
                                </select>
                                <div class="alert-danger" id="all1">
                                <?php echo form_error('class');?>
                            </div>
                            </div>
                        <div class="form-group">
                        <label>Group</label>
                        <select class="form-control" id="groupid" name="group">
                       
                     <option value="<?php echo $result[0]->st_group ?>"><?php echo $result[0]->grp_name ?></option>
                            
                        </select>
            
                        <div class="alert-danger" id="all1">
                                <?php echo form_error('stgroup'); ?>
                            </div>
                    </div>
                <div class="form-group">
                    <label>Admission Date</label>
                        <input type="date" name="dates" value="<?php echo $result[0]->st_admission_date ?>" class="form-control">
                        <div class="alert-danger" id="all1">
                                <?php echo form_error('dates'); ?>
                            </div>
                    </div>
                    <br/>
					<input type="submit" name="update_btn" class="btn btn-success btn-block" value="Update Student"/>

			</form>
        </div>
		</div>
	  </div>
	  
	</div>
     </div>
      
    </div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
 $("#successMessage").fadeOut(7000);
        $('#classid').on('change',function(){
            
            var classid = $(this).val();
            if (classid) {

                $.ajax({
                    url: '<?php echo site_url();?>Dashboard_controller/load_groups1',
                    type: 'post',
                    data: 'id4='+ classid,
                    success: function(data){
                        $('#groupid').html('<option value=""> --Select Group-- </option>');
                        
                        // var dto = jQuery.parseJSON(data);
                        if (data) {
                            // $(dto).each(function(){
                            $('#groupid').html(data);
                            //  var option = $('<option>');
                            //  option.attr('value',this.id).text(this.name);
                            //  $('#groupid').append(option);
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


</script>