<div class="container">
<div class="row">

	<div class="col-md-4">
		<h1><?php echo "Allo"; ?></h1>
	</div>
	<div class="col-md-8">
		
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div id="axcontent">a</div>
	</div>
	
</div>
</div>
<script src="<?php echo base_url()?>assets/js/jquery.3.2.1.min.js"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
ajstudents();
function ajstudents(){
 
    var base_url = "<?php echo base_url()?>Dashboard_controller/details_std";

    $.ajax({
      type: "POST",
      url: base_url,
      data: "",
      success: function(res){

        $("#axcontent").html(res);
      }
    });
  }
});
  
  

  </script>