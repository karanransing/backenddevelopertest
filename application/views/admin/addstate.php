<div class="container">
  <div class="row">
    <div class="col-md-12">
      <a href="<?php echo site_url('admin/dashboard');?>" class="btn btn-warning btn-sm pull-right">Back</a>
    </div>
  </div>
  <br>
  <div class="row">
  <?php if(!empty($state_data)){?>
  <form method="post" name="add_state"  id="add_state" action="<?php echo site_url('admin/updatestate/'.$state_data['id']);?>">
  <?php } else { ?>
  <form method="post" name="add_state"  id="add_state" action="<?php echo site_url('admin/savestate');?>">
  <?php } ?>
  	<div class="row">
     <div class="col-md-12">
       <div class="col-md-offset-4 col-md-4">
         <span class="text-center heading_text"><b><u><?php if(!empty($state_data)){ echo "Update State";}else { echo "Add New State";}?></u></b>
         </span>
       </div>
     </div>
   </div>
   <br>
   <div class="row level_2_no">
    <div class="col-md-12">
      <div class="col-md-offset-4 col-md-4">
        <span class="text-center question_text"><b>State</b></span>
      </div>
      <div class="col-md-offset-4 col-md-4">
        <input type="text" name="state" id="state" placeholder="Enter State Name" class="form-control" value="<?php if(set_value('state')) {echo set_value('state');} else if(!empty($state_data) && !set_value('state')) { echo $state_data['state'];}?>">
      </div>
    </div>
  </div>
  <br>
  <div class="row level_2_no">
   <div class="col-md-12">
    <div class="col-md-offset-4 col-md-4">
      <center>
        <button type="button" class="form-control btn btn-success submit_new"><?php if(!empty($state_data)){ echo "Update";}else { echo "Add";}?></button>
     </center>
   </div>
 </div>
</div>
</form>
</div>	
<script>
  $(document).ready(function(){
  });

  $("#add_state").validate({
    rules: 
    {
     state:"required"
   },
   messages: 
   {  
     state:"Enter State Name"
   }
  });
  
  $('.submit_new').click(function(){ 
    if($("#add_state").valid())
    { 
      var dataString = $("#add_state").serialize();
      var url = $('#add_state').attr('action');
        $.ajax({
          type:"POST",
          url:url,
          data:dataString,
          datatype:"json",
          success:function (result) {
            result  = JSON.parse(result);
            if(result.status)
            {
              toastr.success(result.msg, 'State', { "progressBar": true });
            }
            else
            { 
              toastr.error(result.msg, 'State', { "progressBar": true });
            }
          },
          error:function()
          {
            toastr.error('Ajax Call Error', 'State', { "progressBar": true });
          }
        });  
    }
  });
</script>
</body>
</html>