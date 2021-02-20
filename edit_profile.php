<!DOCTYPE html>
<html>
<head>
	<title>edit user</title>
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


include "menu.php";
require 'connection.php';
$sql = "SELECT * FROM user where id = ".$_SESSION['id'];
$result = $connection->query($sql);
$row = $result->fetch_assoc();

$message = "";
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

      if($name == '' || $username == ''  || $email == ''){
        $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>'; 
      }
      else
      {
        $usernameExists = $connection->query("SELECT * FROM user WHERE id <> '".$_SESSION['id']."' AND username = '$username' ");
        $emailExists = $connection->query("SELECT * FROM user WHERE
        id <> '".$_SESSION['id']."' AND email = '$email' ");

        if ($usernameExists->num_rows == 1) {
          
          $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Username already exists</div>';
        }
        elseif ($emailExists->num_rows == 1) {
          $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Email already exists</div>';
          
        }
      else
        {
           $query = "UPDATE user SET name = '$name', username =  '$username', email =  '$email'  WHERE id ='".$_SESSION['id']."'";
            $result =$connection->query($query);
            if($result){
              header("Location:view_profile.php"); 
             } else {
               $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';   
             }
          }
  }
}
        

     

 ?>
<body class="bg-secondary">
	<div class="container-fluid text-center">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-4"></div>	
			<div class="col-lg-4 col-md-4 col-sm-4 col-4  border mt-5">
				<h4 class="mt-4 mb-4 text-info"><b>Edit Profile</b></h4>
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
				  	<?php echo $message; ?>
				  <div class="form-group row">
				    <label for="name" class="col-sm-2 col-form-label">Name<span
				    class="text-danger">*</span></label>
				    <div class="col-sm-10">
				      <input type="text"  class="form-control w-75 ml-5" name="name" value="<?php echo $row['name'] ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="username" class="col-sm-2
				    col-form-label">username<span class="text-danger">*</span></label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control w-75 ml-5" name="username" value="<?php echo $row['username'] ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="email" class="col-sm-2 col-form-label">email<span
				    class="text-danger">*</span></label>
				    <div class="col-sm-10">
				      <input type="text"  class="form-control w-75 ml-5" name="email" value="<?php echo $row['email'] ?>">
				    </div>
				  </div>
				<button type="submit" name="add" style="margin-left: 40px;" class="btn btn-info text-center mb-3 pl-5 pr-5">ADD</button>
				</form>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-4"></div>
		</div>	
	</div>
	
</body>
</html>
