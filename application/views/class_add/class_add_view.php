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
    
    <!--  CSS for Demo Purpose, don't include it in your project     -->
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
            /*background-image: url("<?php echo base_url();?>assets/img/34.jpg");*/
            /*background-color: rgb(225, 229, 229);*/
            background-color: #dadada;
            background-size: cover !important;
            background-position: center;
            background-repeat: no-repeat;
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
                  <li>Add Class & Group</li>
                  
                </ul>
	</div>
	<div class="row">
		<div class=" col-sm-5 col-md-10 col-xs-offset-1 col-xs-pull-0" style="margin-bottom: 10%; position: absolute; z-index: 1; ">
			<div class="col-md-10 col-sm-12 col-xs-offset-0">
				<div class="col-md-6 col-sm-12 col-xs-offset-2">
			<?php if($this->session->flashdata('msgg')): ?>
			    <p><?php
			      echo $this->session->flashdata('msgg'); 
			     ?></p>
			<?php endif; ?>
		</div>
			</div>
			<br/>
			<div class="col-md-5 col-sm-12 col-xs-offset-2">
				<form method="post" action="<?php echo base_url()?>classes.htm">
					<div class="form-group">
						<input type="text" id="class1" name="class" placeholder="Enter Class Name" class="form-control">
						<div class="alert-danger" id="all1">
								<?php echo form_error('class'); ?>
							</div>
							<?php
									if (!empty($this->session->flashdata('cls_msg')))
									 {
										echo "<div id='msg1' class='alert-danger'>";
										echo $this->session->flashdata('cls_msg');
										echo "</div>";
									}

								?>
							<div id="msg" style="display: none;">
								</div>
								
					</div>
					
				
					
					<input type="submit" name="save_btn" class="btn btn-primary btn-block" value="Add Class"/>

			</form>
		</div>

	  </div>
	  
	</div>
	
	<div class="row">
		<div class=" col-sm-5 col-md-10 col-xs-offset-1" style="margin-top: 15%; margin-bottom: 5%; position: absolute; z-index: 1; ">
		<div class="col-md-5 col-sm-12 col-xs-offset-2"><hr style="border: dashed 0.5px #1D62F0; width: 100%;">
			<?php if($this->session->flashdata('msg1')): ?>
			    <p><?php
			      echo $this->session->flashdata('msg1'); 
			     ?></p>
			<?php endif; ?>
			<form method="post" action="<?php echo base_url()?>classes_grp.htm">
			<div class="form-group">
					<select class="form-control" name="class_grp">
						<option value="">-- Select Class --</option>
						<?php foreach($cls_data as $r){
						                echo '<option value="'.$r->cls_id.'">'.$r->cls_name.'</option>';
						            } ?>
					</select>
					<div class="alert-danger" id="all1">
								<?php echo form_error('class_grp'); ?>
							</div>
							 
		</div>
		<div class="form-group">
					<select class="form-control" id="grp" name="groups">
						<option value="">-- Select Group --</option>
						<option value="Computer Science">Computer Science</option>
						<option value="Commerce">Commerce</option>
						<option value="Pre-Engineering">Pre-Engineering</option>
						<option value="Pre-Medical">Pre-Medical</option>
					</select>
					<div class="alert-danger" id="all1">
								<?php echo form_error('groups'); ?>
							</div>
							<?php
									if (!empty($this->session->flashdata('msg')))
									 {
										echo "<div id='msg1' class='alert-danger'>";
										echo $this->session->flashdata('msg');
										echo "</div>";
									}
									// $i = 1;
									// $j = 0;
								?>
				</div>
				
				<div class="form-group">
						<input type="text" name="fees" autocomplete="off" maxlength="4" minlength="3" placeholder="Enter Class Fees" class="form-control">
						<div class="alert-danger" id="all1">
								<?php echo form_error('fees'); ?>
							</div>
					</div>
				
				<input type="submit" name="save_btn_group" class="btn btn-primary btn-block" value="Add Group"/>

	</form>
</div>
</div>


<div class="col-md-12" style="text-align: right; margin-top: 2%;">
		<div >
			<a class="btn btn-sm" role="button" href="<?php echo base_url()?>classes_details_only.htm">	View Class  </a>
		</div>
		<div style=" margin-top: 14%;">
			<a class="btn btn-sm" role="button" href="<?php echo base_url()?>classes_details.htm">	View Groups</a>
		</div>
		</div>
			</div>
</div>
</div>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

	$(function() {
// setTimeout() function will be fired after page is loaded
// it will wait for 5 sec. and then will fire
// $("#successMessage").hide() function
    
    $("#successMessage").fadeOut(8000);

});

	$(function(){

		$('#class1').on('keyup',function(){

			var classname = $(this).val();
			//alert(classname);
			if(classname != null)
			{
				// alert('hello');
				
				$.ajax({
				url: '<?php base_url();?>Dashboard_controller/check_class',
				dataType: "html",
				type: 'post',
				data: "name=" + classname,
				success : function(mssg){

					if (mssg == classname) {

						document.getElementById("class1").style.borderColor  = "blue";
						//$input.css('border','solid 2px red');
						$('#msg').show();
						$('#msg').html(mssg);
						//css("color" , "purple");
						//document.getElementById("class1").style.borderColor  = "red";
						$('#msg1').hide();

					}
					else {
							//document.getElementById("class1").style.borderColor  = "red";
						$('#msg').show();
						$('#msg').html(mssg);

						
						//.css("color" , "purple");;
						$('#msg1').hide();
					}
					 
		},
					error: function(jqXHR, textStatus, errorThrown) {
                        $('#msg').show();
                        $("#msg").html(textStatus + " " + errorThrown);
                    }
					//console.log(response);
				
			});
			}
			else{
				$('#msg').show();
				$("#msg").html("Username is required field.").css("color", "red");
				$('#msg').show();
			}
			
			
			
		});
	});

</script> 
