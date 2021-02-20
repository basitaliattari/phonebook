<!DOCTYPE html>
<html>
	<title>all view</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	  <style>
		*{
			font-family: bold	}
		td,th{
			padding-left: 20px;
			padding-right: 20px;
			padding-top: 5px;
			padding-bottom: 5px;
		}
	  </style>
</head>

<body class="bg-secondary">
	<?php 
	include "menu.php"; 
	require 'connection.php';

	$sql = "SELECT * FROM contact_detail where user_id = ".$_SESSION['id'];
	$result = $connection->query($sql);

	 ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 col-12"></div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-12 mt-5 active">
				<table class="table table-bordered px-3">
				  <thead>
				    <tr>
				      <th scope="col">S.NO</th>
				      <th scope="col">Name</th>
				      <th scope="col">Designation</th>
				      <th scope="col">Phone</th>
				      <th scope="col">Address</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				      <?php
				       if ($result->num_rows >  0) {
				        $count = 1;
				        while($row = $result->fetch_assoc()){
				        ?>
				        <tr>
				          <th><?php echo $count; ?></th>
				          <td><?php echo $row['name'] ?></td>
				          <td><?php echo $row['designation'] ?></td>
				          <td><?php echo $row['phone'] ?></td>
				          <td><?php echo $row['address'] ?></td>
				          <td> <a href="edit_user.php?editid=<?php echo $row["id"]; ?>" class="text-decoration-none text-white mr-2">Edit </a> |  <a href="delete.php?deleteid=<?php echo $row["id"]; ?>" class="text-decoration-none text-white ml-2" onclick="return confirm('Are you sure do you wan\'t to delete the user?')">Delete </a></td>  
				        </tr>
				      	<?php $count++; }
				        } else {?>
				      <tr>
				        <td colspan="6" class="text-center text-white"> No Record Found</td>
				      </tr>
				    <?php }?>
				  </tbody>
				</table>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-12"></div>
		</div>
	</div>
</body>
</html>