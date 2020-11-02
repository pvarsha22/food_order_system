<?php
	session_start();
	include('../connection.php');

?>
<?php if(isset($_POST['7'])){
		$sql="SELECT * from juice";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_all($res,MYSQLI_ASSOC);
		} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Juice</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div align="center" style="padding-top: 50px;background-image: url('../images/bg_menu.gif') ;">
		<?php foreach ($row as $juice) : ?>
			<div style="display: inline-block">
			<h3><?php echo $juice['name']."<br>";
			echo $juice['price']."<br>"; ?></h3>
			<img src="<?php echo "images/juice/".$juice['j_id'].".jpg"; ?>" width="300" height="300"><br><br>
			<form method="POST" action="../cart.php">
			<button type="submit" name="add_juice" value="<?php echo $ice['j_id']; ?>">Add item</button><br><br></div>
		<?php endforeach ?>
	</div>
	
</body>
</html>