<?php 
	session_start();
	include('connection.php');
?>
<?php 	
	$email=$password='';
	$errors=array('email'=>'','password'=>'');
	
	if(isset($_POST['login'])){
		if(empty($_POST['email'])){
			$errors['email']='Please enter your email';
		}
		else{
			$email=$_POST['email'];
		}
		if(empty($_POST['password'])){
			$errors['password']='Please enter your password';
		}
		else{
			$password=$_POST['password'];
		}
		if(array_filter($errors)){
			//has errors
			echo $errors['email']."<br>".$errors['password'];

		}
		else{
			$email=mysqli_real_escape_string($conn,$_POST['email']);
			$password=mysqli_real_escape_string($conn,$_POST['password']);
			$query_email="SELECT email FROM user WHERE email='$email'";
			$res_email=mysqli_query($conn,$query_email);
			$query_password="SELECT password FROM user WHERE password='$password'";
			$res_password=mysqli_query($conn,$query_password);
			if(mysqli_num_rows($res_email)>0 and mysqli_num_rows($res_password)>0 ){
					header("location:menu.php");
					exit();
			}
			else{
					 $errors['password']='Invalid email/password!!';
			}

		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head> 

<body>
	<center>
		<div style="border: 3px solid blue; padding: 0px 35px 70px 50px; background-image: url('images/bg_menu.gif') ;">
			<h2><p style="padding-top: 60px;"><?php echo "Login to order your food"; ?></p></h2>
			<form style="padding-top: 150px; padding-bottom: 150px;" action="login.php" method="POST">
				Email:<input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
				<div style="color: red"><?php echo $errors['email']; ?></div>	
				Password:<input type="password" name="password">
				<div style="color: red"><?php echo $errors['password']; ?></div><br>
				<button type="submit" name="login" value="login">Login</button>
			</form>
			<form method="POST" action="new_password.php">
				Forgot password<button type="submit" name="forgot">Click here</button><br><br>
			</form>
			<form method="POST" action="register.php">
				New user?<button type="submit" name="register">Click here</button><br><br>
			</form>
		</div>
	</center>

</body>
</html>