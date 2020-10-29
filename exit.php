<?php session_start(); 
include('connection.php'); ?>

	<?php if(isset($_POST['pay'])){
			$query="DELETE FROM cart";
			mysqli_query($conn,$query);
		}
	?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Exit</title>
 </head>
 <body>
 	<center>
 		<div style="padding-top: 150px">
	 		<div style="border: 3px solid green; padding: 35px 70px 50px;background-color: LightGreen;">
	 			<h3><?php echo "Your order has been successfully placed..."."<br>"."Thank you!!...Please visit again."; ?></h3>
	 		</div>
 		</div>
 	</center>
 
 </body>
 </html>