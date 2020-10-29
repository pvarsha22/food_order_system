<?php session_start(); 
include('connection.php'); ?>

	<?php 
		$sql="SELECT * FROM cart"; 
		$res=mysqli_query($conn,$sql);
		$rows=mysqli_fetch_all($res,MYSQLI_ASSOC); 
		$sum=mysqli_query($conn,"SELECT sum(price) as total FROM cart");
		$row=mysqli_fetch_assoc($sum);
		$total=$row['total'];
	?>


<!DOCTYPE html>
<html>
<head>
	<title>Bill</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body><center>
	<div style="border: 3px solid blue; padding: 35px 70px 50px; background-color: OldLace">
	<table >
	<tr><?php foreach ($rows as $food):  ?>
		<h4><?php echo $food['name']."&nbsp;"."&nbsp;"."&nbsp;".$food['price']; ?></h4>
	<?php endforeach ?></tr>
	<tr><h3> Total :   <?php echo "Rs. ".$total; ?></h3></tr>
	<tr><td><h3><?php echo "Want to remove item.."."<br>"; ?></td></h3>
		<td><form action="cart.php" method="POST" >
			<button type="submit" name="delete">Delete item</button><br><br>
		</form></td>
	</tr>
	<tr><td><h3><?php echo "Want to add item.."."<br>"; ?></td></h3>
		<td><form action="menu.php" method="POST" >
			<button type="submit" name="add_more">Add item</button><br><br>
		</form></td>
	</tr>
	<tr><td><h3><?php echo "Make payment"."<br>"; ?></td></h3>
		<td><form action="exit.php" method="POST" >
			<button type="submit" name="pay">Pay</button><br><br>
		</form></td>
	</tr>


	</table>
	</div>
	</center>

</body>
</html>