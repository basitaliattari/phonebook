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
$message = '';
  if(isset($_POST['update'])){

      $id = $_POST['id'];
      $name = $_POST['name'];
      $designation = $_POST['designation'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];

      if($name == ''  || $phone ==''  ){
         $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> Fields marked with * are required</div>';  

      }
      else
      {
         $query = "UPDATE contact_detail SET name = '$name', designation =  '$designation', phone =  '$phone', address = '$address'WHERE id ='$id'";
          $result =$connection->query($query);
          if($result){
            header("Location:view_all.php"); 
           } else {
             $message = '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Error!</strong> '.$connection->error.'</div>';   
           }
      }
   }

$editid = $_GET['editid'];
$sql = "SELECT * FROM contact_detail where id = ".$editid." AND user_id = ".$_SESSION['id'];
$result = $connection->query($sql);
if ($result->num_rows == 1) {
	
	$row = $result->fetch_assoc();
}
else
{
	header('Location: view_all.php');
}

?>
<body class="bg-secondary">
	<div class="container-fluid text-center">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-4"></div>	
			<div class="col-lg-4 col-md-4 col-sm-4 col-4  border mt-5">
				<h4 class="mt-4 mb-4 text-info"><b>Update User</b></h4>
				<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
					<?php echo $message; ?>
				  <div class="form-group row">
				    <label for="name" class="col-sm-2 col-form-label">Name<span
				    class="text-danger">*</span></label>
				    <div class="col-sm-10">
				      <input type="text"  class="form-control w-75 ml-5" name="name" value="<?php echo $row['name']; ?>">
				      <input type="hidden" class="form-control w-75 ml-5" name="id" value="<?php echo $row['id']; ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="designation" class="col-sm-2
				    col-form-label">Designation</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control w-75 ml-5" id="designation" name="designation" value="<?php echo $row['designation']; ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="phone" class="col-sm-2 col-form-label">Phone<span
				    class="text-danger">*</span></label>
				    <div class="col-sm-10">
				      <input type="text"  class="form-control w-75 ml-5" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="address" class="col-sm-2 col-form-label">Address</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control w-75 ml-5" id="address" name="address" value="<?php echo $row['address']; ?>">
				    </div>
				  </div>
					<button type="submit" name="update" style="margin-left: 40px;" class="btn btn-info text-center mb-3 px-3">UPDATE</button>
				</form>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-4"></div>
		</div>	
	</div>
	
</body>
</html>
