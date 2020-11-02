<?php
	session_start();
	include('../connection.php');

?>
<?php if(isset($_POST['3'])){
		$sql="SELECT * from rice";
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
	<div align="center" style="padding-top: 50px;background-image: url('../images/bg_menu.gif') ;">
		<?php foreach ($row as $rice) : ?>
			<div style="display: inline-block">
			<h3><?php echo $rice['name']."<br>";
			echo $rice['price']."<br>"; ?></h3>
			<img src="<?php echo "images/rice/".$rice['r_id'].".jpg"; ?>" width="300" height="300"><br><br>
			<form method="POST" action="../cart.php">
			<button type="submit" name="add_rice" value="<?php echo $rice['r_id']; ?>">Add item</button><br><br></div>
		<?php endforeach ?>
	</div>
	
</body>
</html>