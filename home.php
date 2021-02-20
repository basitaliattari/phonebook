<!DOCTYPE html> 
<html>
 <head>
	<title>home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head> 
<body class="bg-secondary">
	<?php 
	 include "menu.php";
	 require 'connection.php';
	 $sql = 'SELECT * FROM contact_detail WHERE user_id = '.$_SESSION['id'];
	 $result = $connection->query($sql);
	 if ($result->num_rows > 0) {
	 	$count = $result->num_rows;
	 }
	 else
	 {
	 	$count = 0;
	 }

	 	if (!$_SESSION) {
	 	  header("Location: login.php");
	 	}

	 ?>	  
	<div class="container-fluid mr-0 ml-0">  
		
		<div class="row"> 
			<div class="col-lg-4 col-md-4 col-sm-4"></div> 
			<div class="col-lg-4 col-md-4 col-sm-4 text-center">
				<p class="mt-5 mb-5"><b>loggin as <?php echo $_SESSION['username']; ?></b></p>
				<p style="font-size:25px; font-family: bold;">Total users in your contacts<br><span class="bg-light p-2" style="font-size: 30px;
				border-radius: 7px;  " class="text-danger"><?php echo $count ?></span></p> 
			</div> 
			<div class="col-lg-4 col-md-4 col-sm-4"></div> 
		</div> 
	</div> 
</body> 
</html>