 <?php 

require 'connection.php';

$sql = "CREATE DATABASE developer";

if ($connection->query($sql) === TRUE){
	echo "create database successfully";
}
else{
	echo "Error creating database" . $connection->error;
}


 ?>