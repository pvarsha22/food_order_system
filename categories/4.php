<?php
	session_start();
	include('../connection.php');

?>
<?php if(isset($_POST['4'])){
		$sql="SELECT * from curries";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_all($res,MYSQLI_ASSOC);
		} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rice</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div align="center" style="padding-top: 50px; background-color: OldLace;">
		<?php foreach ($row as $curry) : ?>
			<div style="display: inline-block">
			<h3><?php echo $curry['name']."<br>";
			echo $curry['price']."<br>"; ?></h3>
			<img src="<?php echo "images/curry/".$curry['c_id'].".jpg"; ?>" width="300" height="300"><br><br>
			<form method="POST" action="../cart.php">
			<button type="submit" name="add_curry" value="<?php echo $curry['c_id']; ?>">Add item</button><br><br></div>
		<?php endforeach ?>
	</div>
	
</body>
</html>