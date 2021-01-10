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
            background-color: #fff;
            background-size: cover !important;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: all;
            filter: blur(50px);
            -webkit-filter: blur(5px);
            }
            div>#all1{
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

        table{
                font-size: 13px;
                text-align: center;
                font-family: sans-serif;
                color: #002;
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
                  <li>Fee Report</li>
                </ul>
            </div>
    <div class="row">
        <div class=" col-sm-12 col-md-12 col-xs-offset-0 col-xs-pull-0" style="margin-bottom: 10%; margin: auto 0px; z-index: 1; ">
         
            <div class="col-md-2 col-sm-2 col-xs-offset-1">
                <div class="form-group">
                
                    <select  class="form-control" id="month" name="month">
                        <option value=""> --Select Month-- </option>
                <script type="text/javascript">
                        var m = new Array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                    for(i=1; i<=m.length-1; i++)
                    {
                        document.write("<option value='"+m[i]+"'>" + m[i] + "</option>");
                    }   
                </script>
                    </select>
                    <div style="display: none;" class="alert-danger" id="errorsm">
                                 <p id="all1">Please Select Month..</p>
                            </div>
                    </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-offset-0">
                    <div class="form-group">
                    <select class="form-control" id="year" name="year" >
                    <option value=""> --Select Year-- </option>
                    
                    <script type="text/javascript">
                    var d = new Date();
                    var dt = d.getFullYear();
                        for(i=2019;i<= dt;i++)
                        {
                            document.write("<option value='"+i+"'>" + i + "</option>");
                        }
                    
                    </script>
                    
                    </select>
                    <div style="display: none;" class="alert-danger" id="errorsy">
                                <p id="all1"> Please Select Year..</p>
                            </div>
                </div>
                         </div>                       
        <div class="col-md-2 col-sm-2 col-xs-offset-0">
                     <div class="form-group">
                   
                    <input type="text" class="form-control" autocomplete="off" maxlength="5" name="std_name" id="std_name_id" title="student name" placeholder="Type only student id.." />
                     <div id="errors1" style="display: none;" class="alert-danger">
                           <p id="all1">Please Enter Valid Student ID..</p>
           </div>
                </div>
               
            
             </div>
              <div class="col-md-4 col-sm-2 col-xs-offset-0">
        <input type="submit" name="fee_details_btn" class="btn btn-primary" id="search_std" value="Find One">
             &nbsp &nbsp &nbsp
                <input type="submit" name="fee_details_btn" class="btn btn-warning" id="search_all_std" value="Find All">
                </div>
</div></div>
                <div class="row">
                <div class="widget-body">
                        <div class="widget-main no-padding">
                            <table style="border: 1px solid black;" class="table table-responsive table-striped table-bordered table-hover">
                                <thead style="border-bottom: 1px solid black;" class="thead-dark">
                                 <th>
                                        <i class="icon-user"></i>
                                        Serial No
                                    </th>
                                    
                                    <th>
                                        <i class="icon-user"></i>
                                        Student Name
                                    </th>

                                    <th>
                                       Student Class
                                    </th>
                                   
                                     <th>
                                        <i class="icon-user"></i>
                                        Class Group
                                    </th>
                                    
                                     <th>
                                        <i class="icon-user"></i>
                                      Class Fee
                                    </th>
                                    
                                     <th>
                                        <i class="icon-user"></i>
                                        Status
                                    </th>
                                    <th>
                                        <i class="icon-user"></i>
                                        Paid Amount
                                    </th>
                                    <th>
                                        <i class="icon-user"></i>
                                        Balance Amount
                                    </th>
                                    <th>
                                        <i class="icon-user"></i>
                                        Paid Date
                                    </th>
                                   <th>
                                        <i class="icon-user"></i>
                                        Report  
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
</div>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.3.2.1.min.js"></script>
<script type="text/javascript">
    
    $(document).ready(function(){

        $("#std_name_id").css("color","black");
        $("#std_name_id").css("border-color","gray");
        $("#month").css("color","black");
        $("#month").css("border-color","gray");
        $("#year").css("color","black");
        $("#year").css("border-color","gray");

        $("#search_std").on('click',function(){
            var search_val = $("#std_name_id").val();
            var search_month = $("#month").val();
            var search_year = $("#year").val();
           // var my = search_month+"-"+search_year;
           
            if (search_val != null && search_month != null && search_year != null) {
                 
                $("#errorsm").hide();
                $("#errorsy").hide();
                $("#errors1").hide();

                $.ajax({
                    url: '<?php base_url();?>Dashboard_controller/search_on_btn_fee_rec',
                    type: 'post',
                    data: 'stud_id='+search_val+'&stud_my='+search_month+'&stud_yr='+search_year,
                    success: function(data){
                      
                        if (data) {
                            $('#std_id').html(data);
                           
                        }   
                    }
            });
    }
    else{

                $("#errorsm").show();
                $("#errorsy").show();
                $("#errors1").show();
            }

        });


    $("#search_all_std").on('click',function(){

            var search_val = $("#std_name_id").val();
           
           var search_year = $("#year").val();
           //svar my = search_month+"-"+search_year;
            if (search_val) {
                // alert(search_val); alert(my);
               
                $("#errors1").hide();

                $.ajax({
                    url: '<?php base_url();?>Dashboard_controller/search_on_btn_all_fee_rec',
                    type: 'post',
                    data: 'stud_id='+search_val+'&year='+search_year,
                    success: function(data){
                      
                        if (data) {
                            $('#std_id').html(data);
                           
                        }   
                    }
            });
    }
    else{

               
                $("#errors1").show();
            }

        });


        });
</script>