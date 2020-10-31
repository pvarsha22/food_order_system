<?php
	session_start();
	include('../connection.php');

?>
<?php if(isset($_POST['1'])){
		$sql="SELECT * from starter";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_all($res,MYSQLI_ASSOC);
		} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Starters</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div align="center" style="padding-top: 50px; background-color: OldLace;">
		<?php foreach ($row as $starter) : ?>
			<div style="display: inline-block">
			<h3><?php echo $starter['name']."<br>";
			echo $starter['price']."<br>"; ?></h3>
			<img src="<?php echo "images/starters/".$starter['st_id'].".jpg"; ?>" width="300" height="300"><br><br>
			<form method="POST" action="../cart.php">
			<button type="submit" name="add_starter" value="<?php echo $starter['st_id']; ?>">Add item</button><br><br></div>
		<?php endforeach ?>
	</div>
	
</body>
</html>