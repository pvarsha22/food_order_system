<?php 
	session_start();
	include('connection.php');
?>
<?php
	$email=$password='';
	$errors=array('email'=>'','password'=>'');
	if(isset($_POST['signin'])){
		if(empty($_POST['email'])){
			$errors['email'] = 'email is required <br>';
		}	
		else{
			$email=$_POST['email'];
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$errors['email'] = 'Email must be a valid email <br>';
			}
		}
		if(empty($_POST['password'])){
			$errors['password']='Passsword is empty <br>';
		}
		else{
			$password=$_POST['password'];
			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number    = preg_match('@[0-9]@', $password);

			if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
			  $errors['password']='Enter a valid password';
			}
		}

	if(array_filter($errors)){
		// echo 'The form has errors';
	}
	else{
		// echo 'The form is valid';
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		$password=mysqli_real_escape_string($conn,$_POST['password']);

		$sql = "INSERT INTO user(email,password) VALUES('$email','$password')";

		
		if(mysqli_query($conn,$sql)){
			header('location:menu.php');
		}
		else{
			echo 'query error' ."<br>". mysqli_error($conn);
		}
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign in</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<center>
		<div style="border: 3px solid blue; padding: 0px 35px 70px 50px;background-image: url('images/bg_menu.gif') ;">
			<h2><p style="padding-top: 60px;"><?php echo "Register here"; ?></p></h2>
			<form style="padding-top: 150px; padding-bottom: 150px;" action="register.php" method="POST">
				Email:<input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
				<div style="color: red"><?php echo $errors['email']; ?></div>	
				Password:<input type="password" name="password">
				<div style="color: red"><?php echo $errors['password']; ?></div><br>
				<button type="submit" name="signin" >Sign in</button>
			</form>
		</div>
	</center>>

</body>
</html>