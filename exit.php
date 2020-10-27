<?php session_start(); ?>
<?php 
		$conn=mysqli_connect('localhost','varsha','abc123456','order');
		if(!$conn){
		echo "Connection error".mysqli_connect_error();
		}
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Exit</title>
 </head>
 <body>
 	<center>
 		<div style="border: 3px solid green; padding: 35px 70px 50px;background-color: LightGreen;">
 	<?php echo "Your order has been successfully placed..."."<br>"."Thank you!!...Please visit again."; ?>
 		</div>
 	</center>
 
 </body>
 </html>