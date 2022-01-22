
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Test Login & Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   
</head>
<body>
<div class="container" >
<div class="row" >
   <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Insurance</button>
   <a href="<?php echo base_url(); ?>Home/logout">
</div>
</div>
<br>
<div class="container" >
<div class="row" >
<table class="table table-striped" >
<tr>
    <td>InsuranceId</td>
    <td>Insurance Amount</td>
    <td>Insurance Type</td>
    <td>Insurance Duration</td>
    <td>Action</td>
</tr>
<?php 
foreach($allService as $service){
    ?>
<tr>
    <td><?php echo $service->insuranceID; ?></td>
    <td><?php echo $service->insuranceAmount;?></td>
    <td><?php echo $service->insuranceType;?></td>
    <td><?php echo $service->duration;?></td>
    <td>
    <a  data-toggle="modal" data-target="#edit<?php   echo $service->id; ?>" class="btn btn-primary btn-xs"> Edit </a>
    <button class="btn btn-danger btn-xs" onclick="deleteSingle(<?php echo $service->id;?>,'insurance')">Delete</button>    
</td>
</tr>
<div class="modal fade " id="edit<?php echo $service->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           <div class="modal-dialog" role="document">
            <div class="modal-content p-2">
                <form action="editservice" method="POST" enctype='multipart/form-data'>
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Service</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <div class="modal-body"> 
                  
                      
                    <div class="form-group">
                        <label>Amount</label>
                          <input type="hidden" name="id" value="<?php echo $service->id;?>">
                       <input name="insuranceAmount" type="text" class="form-control" value="<?php echo $service->insuranceAmount;;?>" />
                    </div>
                    
                    <div class="form-group">
                        <label>Type</label>
                        <select name="" class="form-control" disabled>
                        <option value="<?php  echo $service->insuranceType;?>"><?php  echo $service->insuranceType;?></option>
                        <option value="Bike Insurance">Bike Insurance</option>
                        <option value="Car Insurance">Car Insurance</option>
                        <option value="Life Insurance">Life Insurance</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Duration</label>
                       <input  name="duration" value="<?php echo $service->duration; ?>" type="text" class="form-control" >
                    </div>
                  
                       <button type="submit" name="" class="btn btn-primary w-25" id="editSlidersave">Save</button>
                    </div>
                   
                                </form>
            </div>
        </div>
    </div> 
<?php
}


?>
</table>
</div>
</div>

<!-- MODEL HERE -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url();?>Home/addInsurance" method="POST" >
       <input class="form-control" type="text" placeholder="Insurance Amount" name="InsuranceAmount">
       <br>
       <select class="form-control" name="InsuranceType">
            <option value="Life Insurance">Life Insurance</option>
            <option value="Bike Insurance">Bike Insurance</option>
            <option value="Car Insurance">Car Insurance</option>
        </select>
       <br>
        <input class="form-control" type="text" placeholder="Insurance Duration" name="duration">
        <br>
       <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function deleteSingle(id,tablename){
        
        $.ajax({
                url:"<?php echo base_url()?>Home/deleteSingle",
                method:"POST",
                data:{id:id,tablename:tablename},
                success:function(data){
                    // alert(data);
                alert('deleted!');
           
            window.location.reload();
        }
    })
    }
</script>




</body>