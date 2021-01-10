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
            background-attachment: all;
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
                  <li>Fee Repor</li>
                </ul>
            </div>
    <div class="row">
        <div class=" col-sm-10 col-md-10 col-xs-offset-3 col-xs-pull-0" style="margin-bottom: 10%; margin: auto 0px; z-index: 1; ">
            <br/>
            <fieldset>
                    <legend>Search</legend>
            <div class="col-md-3 col-sm-3 col-xs-offset-1">
                
                     <div class="form-group">
                   
                    <input type="text" class="form-control" name="std_name" title="student name" placeholder="Enter Student Name" />
                </div>
            </div>
                <div class="col-md-3 col-sm-3 col-xs-offset-1">
                <div class="form-group">
                   
                    <input type="date" class="form-control" name="std_date" title="date" />
                </div>
                 </div>
                </fieldset>
               
                
                
 
</div>
</div>
</div>
</div>
</body>
</html>
