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
 --> <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>

    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
    <style>
       #vg{

            position: absolute;
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
          padding: 0%;
          width: 100%;
        overflow-x: auto;
        
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
                  <li>View Class</li>
                </ul>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-12">
                <?php if($this->session->flashdata('msgg')): ?>
                    <p><?php
                      echo $this->session->flashdata('msgg'); 
                     ?></p>
                <?php endif; ?>

                <div class="widget-body">
                        <div class="widget-main no-padding">
                            <table id="example" class="display table table-striped table-bordered table-hover">
                                <thead >
                                <tr>
                                 <th>
                                     <i class="icon-no"></i>
                                     Serial No
                                 </th>   
                                <!--  <th>
                                        <i class="icon-user"></i>
                                        Class ID
                                    </th> -->
                                    
                                    <th>
                                        <i class="icon-user"></i>
                                        Class Name
                                    </th>
                                    <th>
                                        <i class="icon-update"></i>
                                        Control
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                     if ($query != null) {
                                       $i = 1;
                                     foreach($query as $row): ?>
                                    <tr id="<?php echo $row->cls_id; ?>">
                                        <td><?php echo $i++; ?></td>   
                                        <!-- <td><?php echo $row->cls_id ; ?></td> -->
                                        <td><?php echo $row->cls_name; ?></td>
                                        <!-- <td><?php echo $row->cls_fees; ?></td>
                                        <td><?php echo $row->grp_name; ?></td> -->
                                      <?php echo "<td><a href='".base_url()."classes_edit.htm/".$row->cls_id."' class='btn btn-sm btn-info' role='button'>Edit</a>
                                       <span><input type='submit' value='Delete' class='btn btn-sm btn-danger remove'></span>
                                       <a href='".base_url()."by_class.htm' class='btn btn-primary btn-sm'>View</a></td>"; ?>
                                        
                                    </tr>
                                    <?php endforeach; 
                                } else{
                                    echo "<div class='alert-warning' align='center'>";
                                     echo "Data not found! please add class.";
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
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
   // alert("$$$$$");
     $('#example').DataTable();
 
  

// setTimeout() function will be fired after page is loaded
// it will wait for 5 sec. and then will fire
// $("#successMessage").hide() function
    
    $("#successMessage").fadeOut(8000);

   $(".remove").click(function(){
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
             url: '<?php base_url();?>Dashboard_controller/delete_class_only/'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Deleted!", "Your data has been deleted.", "success");
             }
          });
        } else {
          swal("Cancelled", "Your data is safe :)", "error");
        }
      });
     
    });
     });
</script>