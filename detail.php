<?php session_start(); ?>
<?php 
	$conn=mysqli_connect('localhost','varsha','abc123456','order');
	if(!$conn){
		echo "Connection error".mysqli_connect_error();
	}
		$food_id=mysqli_real_escape_string($conn,$_POST['more']);
		$query="SELECT  * FROM food WHERE f_id='$food_id'";
		$result=mysqli_query($conn,$query);
		$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);

		if(isset($_POST['add'])){
			header("location:cart.php");
		}
		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body><center>
	<div style="display: inline-block; padding-top: 300px;">
		<?php foreach ($rows as $food): ?>
			<h4>Name: <?php echo $food['name']."<br>"; ?>
			Price: <?php echo $food['price']."<br>"; ?>
			Description: <?php echo $food['description']."<br>"; ?>
			R_Id: <?php echo $food['r_id']."<br>"; ?>
			Options: <?php echo $food['options']."<br><br>"; ?></h4>
		<?php endforeach ?>
		<form method="POST" action="cart.php">
			<button type="submit" name="add" value="<?php echo $food['f_id']; ?>">Add item</button><br><br>
		</form>
	</div></center>
</body>
</html>
