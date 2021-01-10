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
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/animate.min.css"> -->
	<link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
     <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
    <link href="<?php echo base_url()?>assets/css/breadcrumbs.css" rel="stylesheet" />
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
 --><link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
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
            /*background-image: url("<?php echo base_url();?>assets/img/34.jpg");*/
            background-color: #fff;
            background-size: cover !important;
            background-position: center;
            background-repeat: repeat;
            background-attachment: fixed;
            filter: blur(10px);
            -webkit-filter: blur(5px);
        }
        table {
          font-size: 12px;
          width: 100%;
        overflow-x: auto;
        border:none;
        
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
                  <li><a href="<?php echo base_url(); ?>students.htm">Add Student</a></li>
                  <li>View Student</li>
                </ul>
            </div>
            <div id="oop" class="row">
              <div class="col-md-12 col-sm-12 col-xs-offset-0">
                <div class=" col-md-12 col-sm-6 col-xs-offset-0">
                
              <?php if($this->session->flashdata('msg')): ?>
          <p><?php
            echo $this->session->flashdata('msg'); 
           ?></p>
      <?php endif; ?>
    </div>
                <table id="terminate" style="overflow-x:auto;" class="table table-responsive table-striped table-bordered table-hover">
                                <thead  class="thead-dark">
                                <tr style="border: 1px solid black;">
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
                                        Parents Cell No
                                    </th>
                                     <th>
                                        <i class="icon-user"></i>
                                        School or College
                                    </th>
                                     <th>
                                        <i class="icon-user"></i>
                                        Student Cell No
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
                                    <th>Edit</th>
                      
                                  <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                     $i = 0;
                                     if (!empty($st_query)) {
                                        
                                     foreach($st_query as $row): 
                                        $i++;
                                                                               ?>
                                    <tr id="<?php echo $row->st_id ?>">   
                                        <td><?php echo $row->st_id; ?></td>
                                        <td><?php echo $row->st_name; ?></td>
                                        <td><?php echo $row->st_father_name; ?></td>
                                        <td class="col2"><span><?php echo $row->st_address; ?></span></td>
                                        <td><?php echo $row->st_parents_phone_no; ?></td>
                                        <td class="col2"><span><?php echo $row->st_school_college; ?></span></td>
                                        <td><?php echo $row->st_student_phone_no; ?></td>
                                        <td><?php echo $row->st_gender; ?></td>
                                        
                                        <td><?php echo $row->st_religion; ?></td>
                                        <td><?php echo $row->cls_name; ?></td>
                                        <td><?php echo $row->grp_name; ?></td>
                                        <td><?php
                                        $convertDate = date("d-M-Y", strtotime($row->st_admission_date)); 
                                        echo $convertDate  ?></td>
                                        
                                        <?php echo "<td>
                                        <a href='".base_url()."student_edit/".$row->st_id."' class='btn btn-primary btn-xs' class='edit' title='Edit' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a></td>
                                          
                            <td><a class='delete' title='Delete' data-toggle='tooltip'><button id='very' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></button></a>
                                        </td>" ?>
                                    </tr>
                                    <?php endforeach; 
                                } else{
                                    echo "<div class='alert alert-warning alert-dismissable' role='alert' align='center'>";
                                     echo "<h5><span><b>Data not found! please add student.</b></span></h5>";
                                    echo "<div/>" ;

                                }?>
                             
                           
                                    </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            
        </div>
        </div>
        </div>
       <!--  <div role="button" align="right">
        <a href="#oop">PPPPPPPPPP</a>
    </div> -->
     <!-- <?php include_once("index.php"); ?>  -->

</body>
</html>
<script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.3.2.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">


 $(document).ready(function(){

  $('#terminate').DataTable();
  $('#total').hide();
  $("#error").hide();
   $('#clstb').hide();
      $('#classid').on('change',function(){

      var classid_fee = $(this).val();
      if (classid_fee) {

        $.ajax({
          url: '<?php base_url();?>Dashboard_controller/load_students_by_class',
          type: 'post',
          data: 'id0='+ classid_fee,
          success: function(data){
            //$('#grp_fee').html('<option value=""> --Select a Group-- </option>');
            //alert($data);
            //var dto = jQuery.parseJSON(data);
            if (data) {
              $('#clstb').show();
               $('#total').show();
              $('#terminate').hide();
              $('#88').hide();
              $('#dt').html(data);
              //  $(dto).each(function(){
              
              //  var option = $('<option>');
              //  option.attr('value',this.id).text(this.name);
              //  $('#grp_fee').append(option);
              // });
            }
            
}
        });
      }
      else{
        $('#clstb').hide();
         $('#terminate').show();
         $('#88').show();
          $('#total').hide();
        //$('#classid').html('<option value=""> --Select Class-- </option>');
        $('#grp_fee').html('<option value=""> --Select First Class-- </option>');
      }
    });



      $("#error").hide();
   $('#clstb').hide();
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
$("#very2").click(function(){
        $(this).parents("tr").attr("id");
         $.ajax({
         success: function(data) {
        $("#"+id).remove();
      }
    });
      });
$("#successMessage").fadeOut(7000);
   $("#very").click(function(){
        var id = $(this).parents("tr").attr("id");
    //alert( id);
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel !",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
             url: '<?php base_url();?>Dashboard_controller/delete_student_only/'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Deleted!", "Your student data has been deleted.", "success");
             }
          });
        } else {
          swal("Cancelled", "Your student data is safe :)", "error");
        }
      });
     
    });
</script>