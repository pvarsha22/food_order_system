<?php session_start(); ?>
<?php 
	$conn=mysqli_connect('localhost','varsha','abc123456','order');
	if(!$conn){
		echo "Connection error".mysqli_connect_error();
	}
		$food_id=mysqli_real_escape_string($conn,$_POST['submit']);
		$query="SELECT  * FROM food WHERE f_id='$food_id'";
		$result=mysqli_query($conn,$query);
		$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
		
?>
<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body><center>
	<div style="display: inline-block">
		<?php foreach ($rows as $food): ?>
			Name: <?php echo $food['name']."<br>"; ?>
			Price: <?php echo $food['price']."<br>"; ?>
			Description: <?php echo $food['description']."<br>"; ?>
			R_Id: <?php echo $food['r_id']."<br>"; ?>
			Options: <?php echo $food['options']."<br><br>"; ?>
		<?php endforeach ?>
	</div></center>
</body>
</html>
