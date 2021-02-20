<!DOCTYPE html>
<html>
<head>
	<title>registration form</title>
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
require 'connection.php';
$message = '';
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password =$_POST['confirm_password'];

  if($name == '' || $username == ''  || $email == ''  || $password == '' || $confirm_password ==''){
    $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>'; 

  }
  else if( $password != $confirm_password){
    
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Passwords do not match.</div>'; 
  }
  else
  {
    $emailExists = $connection->query("SELECT * FROM user WHERE email = '$email' ");
    $usernameExists = $connection->query("SELECT * FROM user WHERE username = '$username' ");

    if ($usernameExists->num_rows == 1) {
      
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Username already exists</div>';
    }
    elseif ($emailExists->num_rows == 1) {
      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Email already exists</div>';
      
    }
    else
    {
        $sql = "INSERT INTO user(name, username, email, password) VALUES ('$name','$username','$email', '$password')";
        $result = $connection->query($sql);
        if($result == TRUE){
          $message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Record added successfully</div>'; 
        }
        else  
        {
          $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';  
        }
    }
  }
}

?>
<body class="bg-secondary">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-12"></div>	
			<div class="col-lg-4 col-md-4 col-sm-4 col-12 text-center border mt-5">
				<h3 class="mt-4 mb-4 text-info"><b>Registration</b></h3>
				<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
				  <div class="form-group row">
				  	<?php echo $message; ?>
				    <label for="name" class="col-sm-4 col-form-label mt-2">Name<span
				    class="text-danger">*</span></label>
				    <div class="col-sm-8">
				      <input type="text"  class="form-control mt-2 mb-2" id="name" placeholder="Name" name="name">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="username" class="col-sm-4
				    col-form-label mt-2">Username<span class="text-danger">*</span></label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control mt-2" id="username" placeholder="Username" name="username">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="email" class="col-sm-4 col-form-label mt-2">Email<span
				    class="text-danger">*</span></label>
				    <div class="col-sm-8">
				      <input type="email"  class="form-control mt-2" id="email" placeholder="Email" name="email">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="password" class="col-sm-4
				    col-form-label mt-2">Password<span class="text-danger">*</span></label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control mt-2" id="password" placeholder="Password" name="password"> 
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="confirm pwd" class="col-sm-4 col-form-label mt-2">Confirm<br>Password<span
				    class="text-danger">*</span></label>
				    <div class="col-sm-8">
				      <input type="password"  class="form-control mt-3" id="confirm pwd" placeholder="Create New Password" name="confirm_password">
				    </div>
				  </div>
				  <button type="submit" name="submit" style="margin-left: 40px;" class="btn btn-success text-center mb-3 pl-4 pr-4">REGISTER</button>
				</form>
				<p  style="font-size: 14px;">Already have an account?please login <a class="text-white" href="login.php">Here</a></p>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-12"></div>
		</div>	
	</div>
	
</body>
</html>
