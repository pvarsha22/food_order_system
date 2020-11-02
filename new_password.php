<?php 
	session_start();
	include('connection.php');
?>

<?php 
		$error=array('email'=>'');
		if(isset($_POST['login'])){
			if(empty($_POST['email'])){
				$error['email']='Enter the email';
			}
			else{
				$email=$_POST['email'];
				$email=mysqli_real_escape_string($conn,$_POST['email']);
				$query_email="SELECT email FROM user WHERE email='$email'";
				$res_email=mysqli_query($conn,$query_email);
				if(mysqli_num_rows($res_email)>0){
					$new_pass=$_POST['password'];
					$sql="UPDATE user SET password='$new_pass' WHERE email='$email' ";
					if(mysqli_query($conn,$sql)){
						header('location:login.php');
					}
				}
		
			}
		}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update Password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>	<center>
		<div style="border: 3px solid blue; padding: 0px 35px 70px 50px;background-image: url('images/bg_cat.gif') ;">
			<h2><p style="padding-top: 60px;"><?php echo "Update password"; ?></p></h2>
			<form style="padding-top: 150px; padding-bottom: 150px;" action="new_password.php" method="POST">
				Email:<input type="text" name="email"><br>	
				<div style="color: red" ><?php echo $error['email']; ?></div>
				Password:<input type="password" name="password"><br><br>
				<button type="submit" name="login">Login</button>
			</form></div></center>
</body>
</html>