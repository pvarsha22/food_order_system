<?php
	session_start();
?>
<?php
	$conn=mysqli_connect('localhost','varsha','abc123456','order');
	if(!$conn){
		echo "Connection error".mysqli_connect_error();
	}

	$sql="SELECT * from food";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_all($res,MYSQLI_ASSOC);

	if(isset($_POST['more'])){
		header("location:detail.php");
	}
		if(isset($_POST['add'])){
		header("location:cart.php");
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	<script>
		
	</script>
</head>
<body>
	<h1 align="center"style="padding-top: 60px" >Order your favorite dishes here..</h1>
	<div align="center" style="padding-top: 50px">
		<?php foreach ($row as $food): ?>
		<div style="display: inline-block">
			<h4>Name: <?php echo $food['name']."<br>"; ?>
			Price: <?php echo $food['price']."<br>"; ?></h4>
			<form method="POST" action="detail.php">
			<img src="<?php echo "images/".$food['r_id'].".jpg"; ?>" width="300" height="300" style="vertical-align:middle;margin:0px 50px"><br><br>
			<button type="submit" name="more" value="<?php echo $food['f_id']; ?>">More details</button><br><br></form>
			<form method="POST" action="cart.php">
			<button type="submit" name="add" value="<?php echo $food['f_id']; ?>">Add item</button><br><br>
			</form>
		</div>
		<?php endforeach ?><br>
	</div>
</body>
</html>