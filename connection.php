<?php 
		$conn=mysqli_connect('localhost','varsha','abc123456','order');
		if(!$conn){
		echo "Connection error".mysqli_connect_error();
		}
?>