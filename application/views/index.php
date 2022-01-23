
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Test Login & Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
</head>
<body>

hello2

		<form class="form-signin" action="<?php echo base_url() ?>Home/login" method="POST">
      		
      		<h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
      		<label for="inputEmail" class="sr-only">Email Address</label>
      		<input type="email" name="Email" id="inputEmail" class="form-control" value="kartik@gmail.com" placeholder="Email address" required autofocus><br>
			<label for="inputEmail" class="sr-only">Email Password</label>
      		<input type="password" name="Password" id="inputEmail" class="form-control" placeholder="Email Password" required autofocus><br>
    
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
     <a href="<?php echo base_url()?>Home/register">Register</a>
	  <p>
			<?php $msg = $this->session->flashdata('msg');
	         if ($msg != '')
			 {
	             echo  '<span style="color:red">'.$msg.'</span>';
	         }
	
			?>
</p> 
    </form>
	

</body>
</html>
