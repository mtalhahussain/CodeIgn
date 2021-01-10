<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <script src="<?php echo base_url(); ?>assets/js/blur.js"></script>
    <title><?= $title ?></title>
    
	<style>
		body{

			background-image: url("<?php echo base_url();?>assets/img/0.jpg");
			
			
		}
		#bg{
			position: absolute;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		    z-index: -2;
		   	background-image: url("<?php echo base_url();?>assets/img/0.jpg");
		    background-size: cover !important;
		    background-attachment: fixed;
			background-position: center;
	        background-repeat: no-repeat;
	        background-attachment: fixed;
	        filter: blur(1px);
  			-webkit-filter: blur(0px);
		}

	</style>
</head>
<body>
	<div id="bg"></div>
	<div class="container-fluid">
		<div class="row">
		<div class="mx-auto" style=" margin-top: 8%; ">
			<div class="mx-auto" style="background-color:#E6E6FA; border-radius: 2%; opacity: 100%; width:350px; z-index: -1;">	
			<h3 style="font-family: Trebuchet MS; font-weight: 550; font-size:24px; text-align: center; padding-top: 10%;  color: #000; ">Reset Password</h3>	
				<div class="mx-auto" style=" padding: 8%; z-index: 2; ">
				<form method="post" action="<?php echo base_url();?>reset.htm">
  <fieldset>
    <!-- <legend class="text-center"></legend> -->
    <div class="alert-danger" style="text-align: center;">
    	<i><b>
   <?php  validation_errors();
	if (!empty($this->session->flashdata('msg'))) {
			 echo $this->session->flashdata('msg');
		}
		 
    ?> </b></i></div>
    <div class="form-group">
     <p> <input type="text" class="form-control" name="yrname" value="<?php echo set_value('yrname') ?>"  placeholder="Enter Current Username" >
     	<div class="alert-danger" style="text-align: center;"> 
     	<?php echo form_error('yrname');?>
     </div></p>
      
    </div>
    <div class="form-group">
     <p> <input type="password" class="form-control" name="crpass" value="<?php echo set_value('crpass') ?>"  placeholder="Enter Current Password" >
     	<div class="alert-danger" style="text-align: center;"> 
     	<?php echo form_error('crpass');?>
     </div></p>
      
    </div>
    <div class="form-group">
      <p><input type="password" minlength="6" class="form-control" name="pass" placeholder="Create New Password">
     <div class="alert-danger" style="text-align: center;"> 
     	<?php echo form_error('pass');?>
     </div>
 		</p>
    </div>
   
	
    <button type="submit" name="reset_btn" class="btn-success btn-block btn-sm">Create New</button>
	 <hr/>
	  <div style="text-align: center;">
	  	
		 <p>Back to! <a class=" btn btn-primary btn-sm" role="button" href="<?= base_url()?>login.htm"><i>Login</i></a></p>
		  
	 
	  </div>
  </fieldset>
</form>
	</div>
	</div>
	</div>
	</div>	
    </div>
	</div>
</body>
</html>