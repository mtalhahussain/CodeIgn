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
                  <li><a href="<?php echo base_url(); ?>classes.htm">Add Class & Group</a></li>
                  <li><a href="<?php echo base_url(); ?>classes_details.htm">View Group</a></li>
                  <li>Edit Group</li>
                </ul>
            </div>
	<div class="row">
		<div class=" col-sm-4 col-md-5 col-xs-offset-3 col-xs-pull-0" style="margin-bottom: 10%; position: absolute; z-index: 1; ">
			<br/>
			<div class="col-md-10 col-sm-12 col-xs-offset-1">
				<form method="post" action="<?php echo base_url()?>group_update.htm">
					<!-- <?php echo form_hidden('id',$id); ?> -->
					<input type='hidden' name='id_update' value="<?php echo $result[0]->grp_id ?>" >
					<div class="form-group">
						<label>Class</label>
				 <input type="text" name="classtxt" disabled="true" value="<?php echo $result[0]->cls_name ?>" class="form-control"/>
					</div>
					<div class="form-group">
						<label>Group</label>
				 <div class="form-group">
				<input type="text" autocomplete="off" name="grptxt" value="<?php echo $result[0]->grp_name ?>" class="form-control"/>
			</div>
			<div class="form-group">
				<label>Fee</label>
				<input type="text" name="feetxt" maxlength="4" minlength="2" value="<?php echo $result[0]->cls_fees ?>" class="form-control">
					</div>
			
					<input type="submit" name="update_btn" class="btn btn-success btn-block " value="Update Record"/>

			</form>
		</div>

	  </div>
	  
	</div>
</body>
</html>