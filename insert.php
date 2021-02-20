<?php 


require "connection.php";




$sql = "INSERT INTO contact_detail(`name`,`designation`,`phone`,`address`)
		VALUES('basit','developer','03129444843','meharn_town')";

if ($connection->query($sql) === TRUE){
	echo "<br>new record successfully";
}
else {
	echo "error" . $connection->error;
}






 ?>