<?php 
session_start();
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
 ?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="font-size: 14px;">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
		<a class="navbar-brand" href="#">PHONEBOOK DIRECTORY</a>
	  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item"> 
	      	<a class="nav-link  active" href="home.php">HOME</a> 
	      </li> 
	      <li class="nav-item"> 
	      	<a class="nav-link" href="add_new.php">ADD NEW</a> 
	      </li> 
	      <li class="nav-item"> 
	      	<a class="nav-link" href="view_all.php">VIEW ALL <span class="bg-light pl-1 pr-2 text-dark" style="border-radius: 4px;"><?php echo $count ?></span></a> 
	      </li> 
	      <li class="nav-item"> 
	      	<a class="nav-link" href="view_profile.php">VIEW PROFILE</a> 
	      </li> 
	      <li class="nav-item"> 
	      	<a class="nav-link" href="change_pwd.php">CHANGE PASSWORD</a> 
	      </li> 
	      <li class="nav-item"> 
	      	<a class="nav-link" href="logout.php">LOG OUT</a> 
	      </li>
	  	</ul>
	  </div>
	</nav>
