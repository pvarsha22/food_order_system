<?php
	session_start();
	include('connection.php');

?>
<?php
	$sql="SELECT * from food";
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_all($res,MYSQLI_ASSOC);

	if(isset($_POST['more'])){
		header("location:detail.php");
	}
		if(isset($_POST['add'])){
		header("location:cart.php");
	}
		if(isset($_POST['$i'])){
		header("location:1.php");
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Order</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1 align="center"style="padding-top: 60px;" >Order your favorite dishes here..</h1>
	<div align="center" style="padding-top: 50px; background-color: OldLace;">

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
		<?php endforeach ?><br><br>
		<?php for ($i=1; $i<=5 ; $i++): ?>
			<div style="display: inline-block">
				<form method="POST" action="<?php echo "categories/".$i.".php"; ?>">
					<img src="<?php echo "images/category/".$i.".jpg"; ?>" width="300" height="300" style="vertical-align:middle;margin:0px 50px"><br><br>		
					<button type="submit" name="<?php echo $i;?>">See more</button><br><br>
				</form>
			</div>
		<?php endfor ?>
	</div>
</body>
</html>