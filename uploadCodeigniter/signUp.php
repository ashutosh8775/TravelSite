<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

	<div class="container">
		<form action='<?php echo base_url();?>userForm/submitData' method="post" id="form1">
			<div class="form-group">
				<label for="exampleInputUsername">Username:</label>
				<input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword">Password:</label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail">Email:</label>
				<input type="email" name="email" id="email" class="form-control" placeholder="Enter your password">
			</div>
			<input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">
			<a href='<?php echo base_url ('userForm'); ?>'>
				<button type="button" class="btn btn-primary" name="submit" id="submit2">Back</button>
			</a>
		</form>
    </div>

	
	
	<script>
			/* function addToDatabase() */
	/* 	{
			var username = $('#username').val();
			var password = $('#password').val();	
			var email = $('#email').val();	
			
				var base_url = '<?php echo base_url();?>'+'userForm/submitData';
				$.ajax({
					type:'POST',
					async:false,
					url:base_url,
					data:$('#form1').serialize(),
					context:this,
					success:function(res){
						//location.reload();
						

					}
				});
			
			
			
			
		} */
			
		
	</script>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>