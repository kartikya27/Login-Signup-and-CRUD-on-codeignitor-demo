
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Test Login & Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
</head>
<body>



		<form class="form-signin" action="<?php echo base_url() ?>Home/submitRegister" method="POST">
      		
      		<h1 class="h3 mb-3 font-weight-normal">Please Signup</h1>
            <input type="text" name="PhoneNum" id="inputEmail" class="form-control" value="9876543210" placeholder="Phone" required autofocus><br>
            <input type="text" name="Occupation" id="inputEmail" class="form-control" value="job" placeholder="Occupation" required autofocus><br>
      		<input type="email" name="Email" id="inputEmail" class="form-control" value="kartik@gmail.com" placeholder="Email address" required autofocus><br>
           
              <span style="color:red"><?php echo strip_tags(form_error('Email')); ?> </span> 

            <input type="text" name="AadharPanNumber" id="inputEmail" class="form-control" value="9874511212315648" placeholder="Aadhar Number" required autofocus><br>
            <input type="text" name="AnnualIncome" id="inputEmail" class="form-control" value="1 Lac" placeholder="Annual Income" required autofocus><br>
            <input type="text" name="Address" id="inputEmail" class="form-control" value="Jaipur" placeholder="Address" required autofocus><br>
            <input type="password" name="Password" id="inputEmail" class="form-control" placeholder="Enter Password" required autofocus><br>
    
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
     <a href="<?php echo base_url()?>Home/index">Login</a>
	 
    </form>
	

</body>
</html>