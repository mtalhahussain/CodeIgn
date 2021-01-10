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
    <link href="<?php echo base_url()?>assets/css/breadcrumbs.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />
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
            background-color: #DADADA;
            background-size: cover !important;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            filter: blur(1px);
            -webkit-filter: blur(1px);
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
                  <li><a href="<?php echo base_url(); ?>dash.htm">Dashboard</a></li>
                  <li><a href="<?php echo base_url(); ?>classes.htm">Add Class & Group</a></li>
                  <li>View Groups</li>
                </ul>
            </div>
            <div class="row">
              <div class="col-md-12 sm-12 col-12">
              <div class="alert-danger">
            <?php
            if (!empty($this->session->flashdata("grp_msg"))) {
              
              echo $this->session->flashdata("grp_msg");
            }
            ?>
          </div>
          
              
            <?php
            if (!empty($this->session->flashdata("msg"))) {
              
              echo $this->session->flashdata("msg");
            }
            ?>
        
                <div class="widget-body">
                        <div class="widget-main no-padding">
                            <table id="example" class=" display table table-striped table-bordered table-hover">
                                <thead class="thin-border-bottom">
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
                                        <i>$</i>
                                        Fees Amount
                                    </th>
                                    <th class="hidden-480">Group Name</th>
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
                                    <tr id="<?php echo $row->grp_id ?>">
                                        <td><?php echo $i++; ?></td>   
                                        <!-- <td><?php echo $row->cls_id ; ?></td> -->
                                        <td><?php echo $row->cls_name; ?></td>
                                        <td><?php echo $row->cls_fees; ?></td>
                                        <td><?php echo $row->grp_name; ?></td>
                                      <?php echo "<td><a href='".base_url()."group_edit/".$row->grp_id."' class='btn btn-sm btn-info' role='button'>Edit</a>
                                       <span> <i>       </i> <input type='submit' value='Delete' class='btn btn-sm btn-danger remove'></span></td>" ?>
                                        
                                    </tr>
                                    <?php endforeach; 
                                } else{
                                     echo "<div class='alert-warning' role='alert' align='center'>";
                                     echo "<h5><span><b>Data not found! please add group ! or assign any class to group .</b></span></h5>";
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

  $(document).ready(function() {
    $('#example').DataTable();
    $('#successMessage').fadeOut(5000);
} );
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
             url: '<?php base_url();?>Dashboard_controller/delete_class_with_group/'+id,
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
</script>