<?php
include_once('Template/dash_index.php');
 include_once('Template/nav.php');
 if (empty($this->session->userdata("logged_in")) == true) {
     
     redirect("login.htm");
 }

   //$this->load->model('dash_model','dm');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href='<?php echo base_url()?>assets/css/bootstrap.min.css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/animate.min.css">
	<link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="<?php echo base_url()?>assets/css/demo.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/css/breadcrumbs.css" rel="stylesheet" />
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
 <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />--> 
    
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
    <style>
       #vg{

            
            bottom: 5px;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            /*background-image: url("<?php echo base_url();?>assets/img/34.jpg");*/
            /*background-color: rgb(225, 229, 229);*/
            background-color: #fff;
            background-size: cover !important;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            filter: blur(1px);
            -webkit-filter: blur(1px);
        }
        table {
          font-size: 12px;
          width: 100%;
        overflow-x: auto;
        
        }
        .thd {
          color: red;
          background-color: #EEEEEE;
        
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
                  <li><a href="<?php echo base_url(); ?>classes_details_only.htm">View Class</a></li>
                  <li>View By Class</li>
                </ul>
            </div>
            <div class="row mb-5">
              <div class="col-md-12 col-sm-12 col-12">
                <?php if($this->session->flashdata('msgg')): ?>
                    <p><?php
                      echo $this->session->flashdata('msgg'); 
                     ?></p>
                <?php endif; ?>
                <div class="col-md-6 col-sm-6 col-xs-offset-1">
                <select class="form-control" id="classid" name="class">
                  <option value=""> --Load Students by Class-- </option>
                  <?php if($classdata == null){ 
                    echo '<div  class="alert alert-warning" id="successMessage" role="alert">Class not found! please add a class</div>';
                  }else{foreach($classdata as $r){
                            echo '<option value="'.$r->cls_id.'">'.$r->cls_name.' </option>';
                        }
                        } ?>
                </select>
                <div class="alert-danger" id="all1">
                <?php echo form_error('class');?>
              </div>
              </div>
                <div  class="col-md-4 col-sm-4  col-xs-offset-0">
                <h5>Total in Class : <span id="total"></span></h5>
              </div> 
            </div>
          </div>
        
          <div class="row mt-10">.
              <div class="widget-body">
                        <div class="widget-main no-padding">

                            <table id="clstb" class="table table-responsive table-striped table-bordered table-hover">
                                <thead class="thd" >
                                <tr style="border: 1px solid black;">
                                   <th>
                                        <i class="icon-user"></i>
                                        S No.
                                    </th>
                                
                                 <th>
                                        <i class="icon-user"></i>
                                        Std ID
                                    </th>
                                    
                                    <th>
                                        <i class="icon-user"></i>
                                        Std Name
                                    </th>

                                    <th>
                                        Father Name
                                    </th>
                                    <th class="hidden-480">Address</th>

                                     <th>
                                        <i class="icon-user"></i>
                                        Parents Cell
                                    </th>
                                     <th>
                                        <i class="icon-user"></i>
                                        School or College
                                    </th>
                                     <th>
                                        <i class="icon-user"></i>
                                        Student Cell
                                    </th>
                                     <th>
                                        <i class="icon-user"></i>
                                        Gender
                                    </th>
                                     
                                     <th>
                                        <i class="icon-user"></i>
                                        Religion
                                    </th>
                                    <th>
                                        <i class="icon-user"></i>
                                        Class
                                    </th>
                                    <th>
                                        <i class="icon-user"></i>
                                        Group
                                    </th>
                                    <th>
                                        <i class="icon-user"></i>
                                        Admission Date
                                    </th>
                                   <!--  <th>
                                        <i class="icon-user"></i>
                                        Edit 
                                    </th> <th>
                                        <i class="icon-user"></i>
                                        Delete 
                                    </th> -->
                                </tr>
                                </thead>
                                <tbody id="dt">

                                </tbody>      
            </div>
       </div>
    </div>
  </div>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>

<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript">
  $(document).ready(function(){

  // $('#clstb').DataTable( {
  //                "lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]]
  //            });
  
  $("#error").hide();
  
      $('#classid').on('change',function(){

      var classid_fee = $(this).val();
      if (classid_fee) {

        $.ajax({
          url: '<?php base_url();?>Dashboard_controller/load_students_by_class',
          type: 'post',
          data: 'id0='+ classid_fee,
          success: function(data){
            
            if (data) {
              $('#dt').show();
               $('#total').show();
              $('#dt').html(data);
              
            }
            
}
        });
      }
      else{
        $('#dt').hide();
        
          $('#total').hide();
        
      }
    });

      $('#classid').on('change',function(){

      var class_std = $(this).val();
      if (class_std) {

        $.ajax({
          url: '<?php base_url();?>Dashboard_controller/count_by_class',
          type: 'post',
          data: 'idst='+ class_std,
          success: function(data){
            //$('#grp_fee').html('<option value=""> --Select a Group-- </option>');
            //alert($data);
            //var dto = jQuery.parseJSON(data);
            if (data) {
              
              $('#total').html(data);
              
            }
            
}
        });
      }
      else{
        $('#total').hide();
        
      }
    });
 });  
</script>