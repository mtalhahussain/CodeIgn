<?php
include_once('Template/dash_index.php');
 include_once('Template/nav.php');
 if (empty($this->session->userdata("logged_in")) == true) {
     
     redirect("login.htm");
 }

if (($result1) == null) {
              echo "<input type='hidden' name='id_prev' value=' ---'/>";
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
                  <li><a href="<?php echo base_url(); ?>fees.htm">Search Student</a></li>
                  <li>Take Fee</li>
                </ul>
            </div>
    <div class="row">
        <div class=" col-sm-4 col-md-12 col-xs-offset-0 col-xs-pull-0" style="margin-bottom: 10%; margin: auto 0px; z-index: 1; ">
            <?php if (!empty($msg)) {
                        echo '<div class="alert alert-danger" role="alert">';
                        echo $msg;
                        echo '</div>';

                    } ?>
                
            <br/>
            <div class="col-md-4 col-sm-4 col-xs-offset-1">
                
                    
                <form method="post"  action="<?php echo base_url()?>fee_paid.htm">
                    <div class="form-group">
               <input type='hidden' name='id_prev' value=' $result1[0]->fp_month'/>
                <input type='hidden' name='id_update' value='<?php echo $result[0]->st_id ?>' class='form-control'/>
                <input type='hidden' name='class_id' value='<?php echo $result[0]->cls_id ?>' class='form-control'/>
                <input type='hidden' name='grup_id' value='<?php echo $result[0]->grp_id ?>' class='form-control'/>
                <!-- <input type='hidden' name='id_update' value='<?php echo $result[0]->cls_fees ?>' class='form-control'/>  -->
                <label class="label-text">Student Name</label>
                <input type="text" name="stdname" title="Student Name" readonly="" value="<?php echo $result[0]->st_name ?>" class="form-control">
            </div>
            <div class="form-group">
                <label class="label-text">Student Class</label>
                <input type="text" name="stdclass" title="Class" readonly="" value="<?php echo $result[0]->cls_name ?>" class="form-control">
                        <div class="alert-danger" id="all1">
                                <?php echo form_error('stdclass'); ?>
                            </div>
                    </div>
             <div class="form-group">
                <label class="label-text">Student Group</label>
                <input type="text" name="stdgroup" title="Group" readonly="" value="<?php echo $result[0]->grp_name ?>" class="form-control">
                        <div class="alert-danger" id="all1">
                                <?php echo form_error('stdgroup'); ?>
                            </div>
                    </div>
           
            <div class="form-group">
                <label class="label-text">Date</label>
                    <select  class="form-control" name="month">
                        <option value=""> --Select Month-- </option>
                <script type="text/javascript">
                        var m = new Array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
                    for(i=1; i<=m.length-1; i++)
                    {
                        document.write("<option value='"+m[i]+"'>" + m[i] + "</option>");
                    }   
                </script>
                    </select>
                    <div class="alert-danger" id="all1">
                                <?php echo form_error('month'); ?>
                            </div>
                    </div>
                    <div class="form-group">
                    <select class="form-control" name="year" >
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
                    <div class="alert-danger" id="all1">
                                <?php echo form_error('year'); ?>
                            </div>
                </div>
                                                
         </div>
        <div class="col-md-4 col-sm-4 col-xs-offset-0">
      
             <div class="form-group">
                <label class="label-text">Class Fee</label>
                <input type="text" maxlength="4" minlength="2" readonly="" id="class_fee_id" name="stdclassfee" placeholder="Fee Amount" value="<?php echo $result[0]->cls_fees ?>" title="Fee amount" class="form-control">
                        <div class="alert-danger" id="all1">
                                <?php echo form_error('classes'); ?>
                            </div>
                    </div>
                <div class="form-group">
                <label class="label-text">Paid Amount</label>
                        <input type="text" maxlength="4" minlength="2" autocomplete="off" value="<?php echo set_value('pay_amount'); ?>" title="Pay Amount" id="pay_amount" name="pay_amount"  class="form-control">
                        <div class="alert-danger" id="all1" >
                            <p id="fee_error" style="display: none;"></p>
                            <div class="alert-danger" id="all1" >
                                <?php echo form_error('pay_amount'); ?>
                            </div>
                        </div>
                </div>
            <div class="form-group">
                <label id="partial_lel" class="label-text">Balane Amount</label>
                        <input type="text" readonly="" name="partial_val" autocomplete="off" id="partial_val" maxlength="4" minlength="2" title="Balane Amount"  class="form-control">
                        <div class="alert-danger" id="all1">
                                <?php echo form_error('dates'); ?>
                            </div>
                </div>
            <div class="form-group">
                <label id="status_lel" class="label-text">Status</label>
                            <select title="Status" class="form-control" id="status_id" name="status">
                                    <!-- <option value=""> --Select Status-- </option> -->
                                    <!-- <option value="0">Unpaid</option> -->
                                    
                                </select>
                                <div style="display: none;" class="alert-danger" id="all1">
                                <?php echo form_error('status');?>
                            </div>
                            </div>
                    <input type="submit" name="paid_btn" class="btn btn-success btn-block" value="Save"/>
          </div>
      </form>
  </div>
</div>
</div>
</div>
</div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){

        $('#partial_val').hide();
        $("#partial_lel").hide();
        $("#status_lel").hide();
        $("#status_id").hide();

    $('#pay_amount').on('keyup',function(){

        var cls_amount = $('#class_fee_id').val();
        var pay_amt = +$(this).val();
        if (pay_amt != 0 ) {
            if (pay_amt <= cls_amount) {

               var res = (cls_amount - pay_amt);
               $('#partial_val').val(res);
               $("#partial_lel").show();
               $('#partial_val').show();
               $("#fee_error").hide();
               document.getElementById("pay_amount").style.borderColor  = "#fff";
                var option;
               if ($('#partial_val').val() == 0) {
                option = "<option value=''>--Select Status--</option>";
                $("#status_lel").show();
                $("#status_id").show();
                $("#status_id").html(option);
                option = "<option value='1'>Paid Full</option>";
                 $("#status_id").html(option);

               }
               else{
                   $("#status_lel").show();
                     $("#status_id").show();
                     $("#status_id").html("<option value=''>--Select Status--</option>");
                    var option = "<option value='0'>Paid Balance</option>";
                     $("#status_id").html(option);
               }
            }
            else{

                var a = "invalid amount";
                $("#fee_error").show();
                document.getElementById("pay_amount").style.borderColor  = "red";
                $("#fee_error").html(a);
                
                $(this).val("");
                $("#partial_lel").hide();
               $('#partial_val').hide();
               $("#status_lel").hide();
                $("#status_id").hide();
            }
            
        }
        else{

            $("#partial_lel").hide();
               $('#partial_val').hide();
            $("#status_lel").hide();
                $("#status_id").hide();
                var a = "Please enter fees > 0 ! not 0 amount accepted";
                //$("#pay_amount").color('red');
                $("#fee_error").show();
                document.getElementById("pay_amount").style.borderColor  = "red";
                $("#fee_error").html(a);
                //setTimeOut(1000);
                
             
             $(this).val("");
        }
        
    });
    

    });
    
</script>