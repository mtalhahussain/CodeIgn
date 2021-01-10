<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<link rel="stylesheet" type="text/css" href='<?php echo base_url()?>assets/css/bootstrap.min.css'/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/animate.min.css"/>
	<link href="<?php echo base_url()?>assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>




    <!--     Fonts and icons     -->
    <link href=<?php echo "http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" ?> rel="stylesheet"/>
    <link href=<?php echo 'http://fonts.googleapis.com/css?family=Roboto:400,700,300'?> rel='stylesheet' type='text/css'/>
    <link href="<?php echo base_url()?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="<?php echo base_url()?>assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Skytech Solution
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="<?php echo base_url()?>dash.htm">
                        <i class="pe-7s-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>students.htm">
                        
                        <i class="pe-7s-user"></i>
                        <p>Students</p>
                        
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>classes.htm">
                        <i class="pe-7s-note2"></i>
                        <p>Class</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo base_url()?>fees.htm">
                        <i class="pe-7s-news-paper"></i>
                        <p>Fee Payment</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url()?>std_report.htm">
                        <i class="pe-7s-search"></i>
                        <p>Fee Record</p>
                    </a>
                </li>
                <!-- <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li> -->
				
            </ul>
    	</div>
    </div>



</body>
</html>

<script src="<?php echo base_url()?>assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url()?>assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url()?>assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url()?>assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url()?>assets/js/demo.js"></script>
