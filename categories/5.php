<?php
	session_start();
	include('../connection.php');

?>
<?php if(isset($_POST['5'])){
		$sql="SELECT * from roti";
		$res=mysqli_query($conn,$sql);
		$row=mysqli_fetch_all($res,MYSQLI_ASSOC);
		} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Roti</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div align="center" style="padding-top: 50px; background-color: OldLace;">
		<?php foreach ($row as $roti) : ?>
			<div style="display: inline-block">
			<h3><?php echo $roti['name']."<br>";
			echo $roti['price']."<br>"; ?></h3>
			<img src="<?php echo "images/roti/".$roti['ro_id'].".jpg"; ?>" width="300" height="300"><br><br>
			<form method="POST" action="../cart.php">
			<button type="submit" name="add_roti" value="<?php echo $roti['ro_id']; ?>">Add item</button><br><br></div>
		<?php endforeach ?>
	</div>
	
</body>
</html>