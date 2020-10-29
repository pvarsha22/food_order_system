<?php session_start();
	include('connection.php'); ?>
<?php 
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
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body><center>
	<div style="border: 3px solid blue; padding: 35px 70px 50px;background-color: OldLace;">
		<?php foreach ($rows as $food): ?>
			<h3>Name: <?php echo $food['name']."<br>"; ?>
			Price: <?php echo $food['price']."<br>"; ?>
			Description: <?php echo $food['description']."<br>"; ?></h3>
		<?php endforeach ?>
		<form method="POST" action="cart.php">
			<button type="submit" name="add" value="<?php echo $food['f_id']; ?>">Add item</button><br><br>
		</form>
	</div></center>
</body>
</html>
