<!DOCTYPE html>
<html lang="en">
<head>
	<style>
		#th{
			background-image: url("<?php echo base_url();?>assets/img_users/456214139225-wallpapers-grass-wallpaper.jpg");
			background-repeat: no-repeat;
		}
		.gend{
			text-align: center;
			vertical-align: bottom;
		}
	</style>
	<meta charset="UTF-8">
	<title>	talha</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery-3.3.1.min.js"></script>
</head>
<body id="th">
	<div class="container-fluid">
		<!-- <div class="row">
	<div class=" text-center ">
	<h1>Customer Information</h1>
		</div>
	</div> -->
	
	
		<div class="row" >
			<div style=" background-color: #F9F9F9; margin-bottom: 4%; margin-top: 4%; width: 420px; border: 2px solid #f4f4e4; border-radius: 2%;" class="col-md-6 col-lg-6 col-xs-offset-6 col-xs-pull-2">
				<br/>
				<div class="col-md-12 col-lg-12">
				<fieldset class="panel-info" >
					<legend class="panel-info">Create an Account!</legend>
					
					<?php 
					echo "<div class='alert-danger' align='center'>";
					echo '<i><b>';
					echo validation_errors();
					echo '</i></b>'; 
					echo "</div>"
					?>
		<form class="form-group-sm" method="post" action="<?php echo base_url();?>register.htm">
			<label class="control-label" for="name1">Customer Name</label>
			<input type="text" name="cust_name" id="name1" placeholder="Name" class="form-control" autofocus/>
			<?php
		if (!empty($this->session->flashdata('msg')))
		 {
			echo "<div id='msg1' class='alert-danger'>";
			echo $this->session->flashdata('msg');
			echo "</div>";
		}

	?>
			<div id="msg" style="display: none;"><p>Wprk</p>
			</div><br/>
			<label class="control-label" for="email">Customer Email</label>
			<input type="text" autocomplete="off" name="cust_email" placeholder="Email" id="email" class="form-control" />
			<br/>
			<label class="control-label" for="cell">Customer Cell no</label>
			<input type="text" name="cust_cell" placeholder="Cell No#" id="cell" class="form-control" />
			<br/>
			<label class="control-label" for="pwd">Customer Password</label>
			<input type="text" name="cust_password" placeholder="Password" id="pwd" class="form-control" />
			<br/>
			<label class="control-label" for="gen">Gender</label>
			<br/>
			<div class="gend">
		<label for="male"><input type="radio" name="cust_gender"  id="male" class="radio-inline" value="0"/>Male</label>
			<label for="female"><input type="radio" name="cust_gender"  id="female" class="radio-inline" value="1"/>Female</label>
			</div>
			<br/>
			<input type="submit" class="btn-success btn-block btn" name="save_tn" value="Save"/>
			<br/>
			</form>
			</fieldset>
			</div>
		</div>
		</div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(function(){

		$('#name1').on('keyup',function(){

			var username = $(this).val();
			if(username != null)
			{
				// alert('hello');
				
				$.ajax({
				url: '<?php base_url();?>details/check_users',
				dataType: "html",
				type: 'post',
				data: "usernamej=" + username,
				success : function(mssg){

					if (mssg != null) {


						//$input.css('border','solid 2px red');
						$('#msg').show();
						$('#msg').html(mssg);
						//css("color" , "purple");
						$('#msg1').hide();

					}
					else {

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