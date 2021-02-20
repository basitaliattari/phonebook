<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	  <style>
		*{
			font-family: bold;
		}
	  </style>
</head>
<?php 

session_start();

if (isset($_SESSION["username"])){
	header('Location:  home.php');
}
$message = "";
require 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$username = $_POST['username'];	
	$password = $_POST['password'];	
	// echo $username." ". $password;
	 // exit;
	if ($username == "" || $password == ""){
	$message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>ERROR! All the fields are require</strong></div>'; 
	}
	else{
	$query = "SELECT * FROM `user` WHERE username = '".$username."' AND Password = '".$password."'";
	$result = $connection->query($query);
	$row=$result->num_rows;

		if ($row == 1){
			// var_dump($result);exit();
		$member = $result->fetch_assoc(); 

		$_SESSION['username'] = $username;
		$_SESSION['id'] = $member['id'];

		header('Location: home.php');
		}
		else
		{
	  	$message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Invalid username or password</div>';  

		}


	}
}

 ?>
<body class="bg-secondary"> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-12"></div>	
			<div class="col-lg-4 col-md-4 col-sm-4 col-12 text-center border mt-5">
				<h3 class="mt-4 mb-4 text-info"><b>Login</b></h3>
				<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
					<?php echo $message; ?>
				  <div class="form-group row">
				    <label for="username" class="col-sm-4 col-form-label mt-2">Username<span
				    class="text-danger">*</span></label>
				    <div class="col-sm-8">
				      <input type="username"  class="form-control  mt-2" id="password" placeholder="Username" name="username">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="password" class="col-sm-4
				    col-form-label mt-2">Password<span class="text-danger">*</span></label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control mt-2" id="password" placeholder=" Password" name="password">
				    </div>
				  </div>
				<button type="submit" name="submit" style="margin-left: 60px;" class="btn btn-primary text-center mb-3 pl-4 pr-4">LOGIN</button>
				</form>
				<p  style="font-size: 14px;">Not a member yet?Register <a class="text-white" href="registration_form.php">Here</a></p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-12"></div>
		</div>	
	</div>
</body>
</html>