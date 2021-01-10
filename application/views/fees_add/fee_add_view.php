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
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
     <!-- <link href="<?php echo base_url()?>bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" />  -->
	<link href="<?php echo base_url()?>assets/css/breadcrumbs.css" rel="stylesheet" />
	<style>
       #vg{

            /*background-color: lightgray;*/
            position: absolute;
            bottom: 5px;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            background-color: #DADADA;
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
        .thead-light{
        	font-size: 12px !important;
        	font-weight: 500px !important;

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
                  <li>Search Student</li>
                  <!-- <li style=" float: right; font-family: Century Gothic; "><b>OR</b>  <input type="search" placeholder="Search by name" class="search_std"></li> -->
                  
                 </ul> 
	</div>
	<!-- <div class="row">
		<div style="margin-left: 35%; margin-bottom: 1%; text-align:left; font-family: serif; font-size: 26px; color: #0075b2;">
			Search Students
		</div>
		<!-- <hr style="border: 0.5px solid gray; " /> -->
	<!-- </div> -->
	<div class="row">
		<div class=" col-sm-10 col-md-12 col-xs-offset-0 col-xs-pull-0" style="margin-top: 0%; z-index: 1; ">
		<div class="col-md-6 col-sm-3 col-xs-offset-2">

			<input type="search" placeholder="Search by ID or Name.." class="search_std1 form-control"/>
		</div>
			<div class="col-md-2 col-sm-3 col-xs-offset-0">
			<div class="form-group">
               
                 <input type="submit" name="fee_details_btn" class="btn btn-primary" id="search_std" value="Search">
               
            </div>
			<!-- <div class="form-group">
					<select class="form-control" id="classid" name="classid">
						<option value="">-- Select Class --</option>
						<?php foreach($res as $r){
						     echo '<option value="'.$r->cls_id.'">'.$r->cls_name.'</option>';
						 } ?>
					</select>
					
					</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-offset-0">

					<div class="form-group">
					<select class="form-control" id="group_ids" name="group_id">
						<option value="">-- First Select a Class --</option>
						
					</select>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-xs-offset-0">
				<div class="form-group">
				 <select class="form-control" id="status_id" name="std_id">
						<option value=""> First Select a Group -</option>
					
				</select>
			</div>
		</div> -->



</div>
</div>
		</div>    		<!-- <input type="submit" name="fees_btn" value="Save" class="btn btn-block btn-primary"> -->
			 <div class="row">
                <div class="widget-body">
                        <div class="widget-main no-padding">
                            <table id="yt" style="border: 1px solid black;" class="display table table-responsive table-striped table-bordered table-hover">
                                <thead style="border-bottom: 1px solid black;" class="thead-dark">
                                 <th>
                                        <i class="icon-user"></i>
                                        Serial No
                                    </th>
                                    <th>
                                        <i class="icon-user"></i>
                                        Student ID
                                    </th>
                                    <th>
                                        <i class="icon-user"></i>
                                        Student Name
                                    </th>

                                    <th>
                                        Father Name
                                    </th>
                                    
                                     <th>
                                        <i class="icon-user"></i>
                                        Gender
                                    </th>
                                    
                                     <th>
                                        <i class="icon-user"></i>
                                        Religion
                                    </th>
                                    <th>
                                        <i class="icon-user"></i>
                                        Class
                                    </th>
                                    <th>
                                        <i class="icon-user"></i>
                                        Group
                                    </th>
                                    <th>
                                        <i class="icon-user"></i>
                                        Admission Date
                                    </th>
                                    <th>
                                        <i class="icon-user"></i>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody id="std_id">
                                 
                              </tbody>
                          </table>
                      </div>
                   </div>
                </div>  

</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	
	$(document).ready(function()
		{
			 
			$("#error").hide();
			$('#classid').on('change',function(){

			var classid_fee = $(this).val();
			if (classid_fee) {

				$.ajax({
					url: '<?php base_url();?>Dashboard_controller/load_class_in_fees',
					type: 'post',
					data: 'id0='+ classid_fee,
					success: function(data){
						//$('#grp_fee').html('<option value=""> --Select a Group-- </option>');
						//alert($data);
						//var dto = jQuery.parseJSON(data);
						if (data) {
							$('#group_ids').html(data);
							//  $(dto).each(function(){
							
							// 	var option = $('<option>');
							// 	option.attr('value',this.id).text(this.name);
							// 	$('#grp_fee').append(option);
							// });
						}
						
}
				});
			}
			else{

				$('#classid').html('<option value=""> --Select Class-- </option>');
				$('#grp_fee').html('<option value=""> --Select First Class-- </option>');
			}
		});

			$("#group_ids").on('change',function(){

				// var clsid_fee = $("#classid").val();
				var grpid_fee = $(this).val();
				//alert(grpid_fee);
			if (grpid_fee != null) {

				$.ajax({
					url: '<?php base_url();?>Dashboard_controller/load_status_std_fee',
					type: 'post',
					data: 'id1='+ grpid_fee,
					success: function(data){
						//$('#grp_fee').html('<option value=""> --Select a Group-- </option>');
						//alert($data);
						//var dto = jQuery.parseJSON(data);
						if (data) {
							$('#status_id').html(data);
							//  $(dto).each(function(){
							
							// 	var option = $('<option>');
							// 	option.attr('value',this.id).text(this.name);
							// 	$('#grp_fee').append(option);
							// });
						}	
					}
			});


	}
	else{

				$('#classid').html('<option value=""> --Select Class-- </option>');
				$('#group_ids').html('<option value=""> --Select First Group-- </option>');
			}

	});

			$("#status_id").on("change",function()
			{
				var statid = $(this).val();
				var gpid = $('#group_ids').val();
				//alert(gpid);

			if (statid != null) {

				$.ajax({
					url: '<?php base_url();?>Dashboard_controller/load_students_in_fee',
					type: 'post',
					data: 'id2='+statid+'&id3='+gpid,
					success: function(data){
						//$('#grp_fee').html('<option value=""> --Select a Group-- </option>');
						//alert($data);
						//var dto = jQuery.parseJSON(data);
						if (data) {
							$('#std_id').html(data);
							//  $(dto).each(function(){
							
							// 	var option = $('<option>');
							// 	option.attr('value',this.id).text(this.name);
							// 	$('#grp_fee').append(option);
							// });
						}	
					}
			});


	}
	else{

				$('#classid').html('<option value=""> --Select Class-- </option>');
				$('#group_fee').html('<option value=""> --Select First Group-- </option>');
			}
			});

		$("#search_std").on('click',function(){

			var search_val = $(".search_std1").val();
			// alert(search_val);
			if (search_val != null) {

				$.ajax({
					url: '<?php base_url();?>Dashboard_controller/search_on_key',
					type: 'post',
					data: 'srch_id='+search_val,
					success: function(data){
						//$('#grp_fee').html('<option value=""> --Select a Group-- </option>');
						//alert($data);
						//var dto = jQuery.parseJSON(data);
						if (data) {
							$('#std_id').html(data);
							//  $(dto).each(function(){
							
							// 	var option = $('<option>');
							// 	option.attr('value',this.id).text(this.name);
							// 	$('#grp_fee').append(option);
							// });
						}	
					}
			});


	}
	else{

				$("#error").show();
			}

		});

		});


</script>
