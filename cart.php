<?php session_start(); ?>
<?php 
		$conn=mysqli_connect('localhost','varsha','abc123456','order');
		if(!$conn){
		echo "Connection error".mysqli_connect_error();
		}
		$food_id=mysqli_real_escape_string($conn,$_POST['add']);
		$query="SELECT  * FROM food WHERE f_id='$food_id'";
		$result=mysqli_query($conn,$query);
		$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
</head>
<body>
	<?php foreach ($rows as $food): ?>
		Your orders : <?php echo $food['name']."<br>"; ?>
		Your price : <?php echo $food['price']."<br>"; ?>
	<?php endforeach ?>
	<form action="menu.php" method="POST" >
		<button type="submit" name="remove" value="<?php echo $food['f_id']; ?>">Remove item</button><br><br>
	</form>

</body>
</html>