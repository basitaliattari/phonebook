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
    include "menu.php";
	require "connection.php";
    $message= '';
        if(isset($_POST['update']))
        {
          $old_password = $_POST['old_password'];
          $new_password = $_POST['new_password'];
          $confirm_password = $_POST['confirm_password'];
          if($old_password == ''  || $new_password ==''  || $confirm_password ==''  ){
             $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  
          } 
          else 
          {
             $sql = "SELECT * FROM user WHERE id = ".$_SESSION['id']." AND password = '".$old_password."'";
              $result = $connection->query($sql);
              if ($result->num_rows == 1) {
                if ($new_password == $confirm_password) {
                  $query = "UPDATE user SET password='".$new_password."' WHERE id =".$_SESSION['id'];
     
                   $result= $connection->query($query);
                   if($result){
                      $message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Password Changed successfully.</div>';
                   }else {
                      $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> There was error while adding record.</div>';  
                   } 
                } else {
                  $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Confirm Password does not match.</div>';  
               } 
              }else {
                  $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Old Password does not match.</div>';  
               }  


             
          }
        }
?>
<body class="bg-secondary">
	<div class="container-fluid text-center">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-12"></div>	
			<div class="col-lg-4 col-md-4 col-sm-4 col-12  border mt-5">
				<h4 class="mt-4 mb-3">Change Password</h4>
				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
					<?php echo $message; ?>
				  <div class="form-group row">
				    <label for="Old Password" class="col-sm-4 col-form-label mt-2">Old Password<span
				    class="text-danger">*</span></label>
				    <div class="col-sm-8">
				      <input type="password"  class="form-control mt-4 mb-2" name="old_password" placeholder="Password">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="new_password" class="col-sm-4 col-form-label mt-2">New Password<span class="text-danger">*</span></label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control mt-4"  name="new_password" placeholder="New Password">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="create new pwd" class="col-sm-4 col-form-label mt-2">Confirm Password<span
				    class="text-danger">*</span></label>
				    <div class="col-sm-8">
				      <input type="password"  class="form-control mt-4"  name="confirm_password" placeholder="confirm_Password">
				    </div>
				  </div>
				<button type="submit" name="update" style="margin-left: 60px;" class="btn btn-primary text-center mb-3 pl-4 pr-4">CHANGE</button>
				</form>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-12"></div>
		</div>	
	</div>	
</body>
</html>
