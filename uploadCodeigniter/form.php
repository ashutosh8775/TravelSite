<!DOCTYPE html> 
<html lang = "en"> 

   <head> 
      <meta charset = "utf-8"> 
      <title>CodeIgniter Form Example</title> 
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
	  
   <style>
	#form1{
		padding:20px;
	}
   </style>
   
   </head>
	
   <body> 
   <div class="container">
   <form method="post" id="form1">
		<div class="form-group">
			<label for="exampleInputUsername">Username:</label>
			<input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
		</div>
		<div class="form-group">
			<label for="exampleInputCompany">Company:</label>
			<input type="text" name="company" id="company" class="form-control" placeholder="Enter your company name">
		</div>
		<button type="button" class="btn btn-primary" name="submit" id="submit" onclick="add_record()">Add</button>
    </form>
	  
	  <table class="table table-bordered" id="myTable">
		<thead>
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Username</th>
				<th scope="col">Company</th>
				<th scope="col">Delete</th>
				<th scope="col">Update</th>
			</tr>
		</thead>
		<!--<tbody>
		<?php 
		 //foreach($records as $value){
			 ?>
			 
				<tr>
					<td scope="row"><?=$value['id']?></td>
					<td><?=$value['username']?></td>
					<td><?=$value['company']?></td>
					<td><input type="button" class="btn btn-primary" name="delete" value="delete" id="delete_btn" onclick="delete_record(<?=$value['id']?>)"></td>
					<td><input type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateMember" name="update" value="update" id="update_btn" onclick="get_record(<?=$value['id']?>)"></td>
				</tr>
			 
		<?php // } ?>
		</tbody>-->
	  </table>
	</div>
	
	<!-- Update members-->
	<div class="modal" tabindex="-1" role="dialog" id="updateMember">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="form2">
					<div class="modal-body">
					 
						<div class="form-group">
							<label for="exampleInputUsername">Username:</label>
							<input type="text" name="username" id="username1" class="form-control" placeholder="Enter username">
						</div>
						<div class="form-group">
							<label for="exampleInputCompany">Company:</label>
							<input type="text" name="company" id="company1" class="form-control" placeholder="Enter your company name">
						</div>

				</div>
					<div class="modal-footer">
					
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					
					<button type="button" class="btn btn-primary" id="update-btn">Save changes</button>
					
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<input type="hidden" id="base_url" value="<?=base_url()?>">
	<script>
		var datatable1;
		$(document).ready(function(){
			var base_url = $('#base_url').val();
			datatable1 = $('#myTable').DataTable({
				 ajax:base_url+'ajaxDisplay'
			});
		});
		
		function add_record()
		{
			var username = $('#username').val();
			var company = $('#company').val();	
			if(username != 0 && company != 0){
				var base_url = '<?php echo base_url();?>'+'modelTest';
				$.ajax({
					type:'POST',
					async:false,
					url:base_url,
					data:$('#form1').serialize(),
					context:this,
					success:function(res){
						//location.reload();
						datatable1.ajax.reload(null,false);

					}
				});
			}
			else{
				alert('enter values');
			}
			
			
		}
		
		function delete_record(id)
		{ 
			var base_url = '<?php echo base_url();?>'+'deleteRow/'+id;
			$.ajax({
					type:'POST',
					async:false,
					url:base_url,
					data:$('#form1').serialize(),
					context:this,
					success:function(res){
						
					datatable1.ajax.reload(null,false);
					}
				});
		}
		
		function get_record(id)
		{ 
				var base_url = '<?php echo base_url();?>'+'fetchData/'+id;
				$.ajax({
						type:'POST',
						async:false,
						url:base_url,
						data:$('#form1').serialize(),
						context:this,
						dataType:'json',
						success:function(res){
							$('#username1').val(res.username);
							$('#company1').val(res.company);
							//setValue(res.username,res.company);
							$('#update-btn').on('click',function(){
								var base_url = '<?php echo base_url();?>'+'updateRow/'+id;
								$.ajax({
										type:'POST',
										async:false,
										url:base_url,
										data:$('#form2').serialize(),
										context:this,
										success:function(res){
											$('#updateMember').modal('hide');
											datatable1.ajax.reload(null,false);
											
										}
								});
							});
							
							
							
							
						}
					});
			
		}
		function setValue(userName,companyName){
			$('#username1').val(userName);
			$('#company1').val(companyName);
		}
		
	
	</script>
	  
	  
   </body>
	
</html>