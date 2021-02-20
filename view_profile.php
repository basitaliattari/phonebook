<!DOCTYPE html>
<html>
<head>
	<title>view profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	  <style>
		*{
			font-family: bold;
		}
		td,th{
			padding-left: 25px;
			padding-right: 25px;
			padding-top: 5px;
			padding-bottom: 5px;
		}

	  </style>
</head>
<?php 
include "menu.php";
require 'connection.php';

$sql = "SELECT * FROM user where id = ".$_SESSION['id'];
$result = $connection->query($sql);
$row = $result->fetch_assoc();

 ?>
<body class="bg-secondary">
	<div class="container-fluid mt-5 text-center">
		<h3 class="mb-4 text-info mt-4" style="font-family: bold;"><b>VIEW PROFILE</b></h3>
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 col-12"></div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-12 mt-5">
				<table class="table table-bordered">
				  <thead>
				    <tr>
				      <th scope="col">Name</th>
				      <th scope="col">username</th>
				      <th scope="col">Email</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				        <tr>
				          <td><?php echo $row['name'] ?></td>
				          <td><?php echo $row['username'] ?></td>
				          <td><?php echo $row['email'] ?></td>
				          <td> <a href="edit_profile.php" class="text-decoration-none text-white mr-2">Edit </a></td>
				        </tr>
				  </tbody>
				</table>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-12"></div>
		</div>
	</div>
</body>
</html>