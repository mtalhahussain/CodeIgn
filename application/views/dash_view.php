<?php include_once('Template/dash_index.php');
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
   
    <link href="<?php echo base_url()?>assets/css/breadcrumbs.css" rel="stylesheet" />
<style>
       #vg{

            /*background-color: lightgray;*/
            position: absolute;
            bottom: 5px;
            top: 0%;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            /*background-color: #D0D7E1;*/
            background-image: url("<?php echo base_url()?>assets/img/5.png");
            background-size: cover !important;
            background-position: top;
            background-repeat: repeat;
            background-attachment: fixed;
            filter: blur(1px);
            -webkit-filter: blur(1px);
            
        }

    .cver{
       
        background-color: #eeeeee;
        border: solid 1px #f5c606;
        height: 100%;
        width: 80%;
       color: #ffffff;
        
    }
    #grr{
        float: none;
    }
    h3{
        text-align: center;
    }
       
</style>

</head>
<body>
 <div id="vg"></div>
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <ul class="breadcrumb">
                      <li>Dashboard</li>
                    </ul>
             </div>
             <div class="row">
                <div class="col-md-11 col-xs-offset-1">
                    <div class="col-md-4 col-sm-4">
             <div class="cver" >
                <?php if ($count_std == null) {
                    redirect("students.htm");
                } ?>
             <a  href="<?php echo base_url()?>students.htm" role="button"><h3>Studen..
             <span>(<?php echo $count_std ?>)</span> <img id="grr" src="<?php echo base_url()?>assets/img/students-512.png" height="35"> </h3>

         </a>
         </div>
    </div>
    <div class="col-md-4 col-sm-4">
         <div class="cver" >
            <?php if ($count_cls == null) {
                    redirect("students.htm");
                } ?>
             <a  href="<?php echo base_url()?>classes.htm" role="button"><h3>Class
             <span>(<?php echo $count_cls ?>)</span> <img id="grr" src="<?php echo base_url()?>assets/img/classes.png" height="35"></h3>
         </a>
         </div>
    </div>

    <div class="col-md-4 col-sm-4">
         <div class="cver" >
             <a  href="<?php echo base_url()?>fees.htm" role="button"><h3>Fee Pay
             <img id="grr" src="<?php echo base_url()?>assets/img/paid.png" height="35"></h3>
         </a>
         </div>
    </div>
</div>
</div>
<div class="row">
<!-- <div class="col-md-10 col-xs-offset-1">
    <div class="col-md-4 col-sm-4">
             <div class="cver">
                
             <h3>Total Student</h3>
         </div>
    </div>
 <img  src="<?php echo base_url()?>assets/img/fms.jpg" height="0%" width="93.5%"> 
</div> -->
    </div>
               <!--  <div class="row">
                    <div class="col-md-4"> -->
                        <!-- <div class="card">

                            <div class="header">
                                <h4 class="title">Email Statistics</h4>
                                <p class="category">Last Campaign Performance</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                                <h2>hello</h2>
                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Bounce
                                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <!-- </div>

		</div> -->
		
</div>
</div> 
</div>
</body>
</html>

