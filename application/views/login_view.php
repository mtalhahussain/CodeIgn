<?php  

	if (isset($this->session->userdata['logged_in'])) {
	
	$username = ($this->session->userdata['logged_in']['us_name']);
	$username['us_email'];

	redirect('dash.htm');

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <script src="<?php echo base_url(); ?>assets/js/blur.js"></script>
    <title>Welcome User</title>
    <script>
    	$(document).ready(
    		$('.overlay,.ov').click(function(){
    $('#background').addClass('covered');
}
    		);
    </script>
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
					<h2><?php if (!empty($this->session->flashdata('log_msg'))) {
			 echo $this->session->flashdata('log_msg');
		} 
		?></h2>
		
		<div class="mx-auto mb-4" style=" margin-top: 8%; ">
			<?php if (!empty($this->session->flashdata('msg'))) {
			 echo $this->session->flashdata('msg');
		} ?>
			<div class="mx-auto mb-4" style="background-color:#E6E6FA; border-radius: 2%; opacity: 100%; width:350px; z-index: -1;">	
			<h3 style="font-family: Trebuchet MS; font-weight: 550; font-size:24px; text-align: center; padding-top: 10%;  color: #000; ">Log In to Continue</h3>	
				<div class="mx-auto mb-4" style=" padding: 12%; z-index: 2; ">
				<form method="post" class="form-group-md" action="<?php echo base_url();?>login.htm">
  <fieldset>
    <!-- <legend class="text-center"></legend> -->
    <div class="alert-danger" style="text-align: center;">
    	<i><b>
   <?php  validation_errors();
			
	 if(isset($error_message))
    {
    	echo $error_message;
    }
    ?> </b></i></div>
    <div class="form-group">
     <!--  <label for="exampleInputEmail1">Email address</label> -->
     <p> <input type="text" maxlength="20" autocomplete="on" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo set_value('email') ?>"  placeholder="Username" >
     	<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
     	<div class="alert-danger" style="text-align: center;"> 
     	<?php echo form_error('email');?>
     </div></p>
      
    </div>
    <div class="form-group">
      <!-- <label for="exampleInputPassword1">Password</label> -->
      <p><input type="password" class="form-control" name="pass" minlength="1" id="exampleInputPassword1" placeholder="Password">
     <div class="alert-danger" style="text-align: center;"> 
     	<?php echo form_error('pass');?>
     </div>
 		</p>
    </div>
	
    <button type="submit" name="login_btn" class="btn-primary btn-block btn-sm">Log In</button>
	 
	  <!-- <div class="alert-link">
		  <b> <a href="#">Forgot password?</a> </b>
		  
	  </div> --> <hr/>
	  
	  	<div style="text-align: left;">
		  <a href="<?= base_url()?>reset.htm">Reset Password!</a>
		  
	  </div>
	  <!-- <strong >Don't have an account!</strong>
	  	<a href="<?php echo base_url()?>register.htm"><strong>
	  	Sign up
	  	</strong></a> -->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	 $("#successMessage").fadeOut(7000);
</script>