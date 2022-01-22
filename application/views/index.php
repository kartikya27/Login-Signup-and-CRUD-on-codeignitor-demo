
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Test Login & Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
</head>
<body>


		<form class="form-signin" action="Home/login" method="POST">
      		
      		<h1 class="h3 mb-3 font-weight-normal">Please Login</h1>
      		<label for="inputEmail" class="sr-only">Email Address</label>
      		<input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus><br>
			<label for="inputEmail" class="sr-only">Email Password</label>
      		<input type="password" name="Password" id="inputEmail" class="form-control" placeholder="Email Password" required autofocus><br>
    
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
	

</body>
</html>