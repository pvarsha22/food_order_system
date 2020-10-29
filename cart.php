<?php session_start();
	include('connection.php'); ?>

	<?php if(isset($_POST['add'])): ?>
		<?php $food_id=mysqli_real_escape_string($conn,$_POST['add']);
		$query="SELECT * FROM food WHERE f_id='$food_id'";
		$result=mysqli_query($conn,$query);
		$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);?>

		<?php foreach ($rows as $food): ?>
			<?php $f_id=mysqli_real_escape_string($conn,$food['f_id']);
			$name=mysqli_real_escape_string($conn,$food['name']);
			$price=mysqli_real_escape_string($conn,$food['price']);

			$sql = "INSERT INTO cart(f_id,name,price) VALUES('$f_id','$name','$price')";
			$res=mysqli_query($conn,$sql);?>
		<?php endforeach ?>
	<?php endif ?>
	<?php $cart="SELECT * FROM cart";
	$cart_res=mysqli_query($conn,$cart);
	$row=mysqli_fetch_all($cart_res,MYSQLI_ASSOC);?>
		
	
	<?php if(isset($_POST['remove'])): ?>
		<?php $remove_id=mysqli_real_escape_string($conn,$_POST['remove']);
		$query="DELETE FROM cart WHERE id='$remove_id' "; 
		mysqli_query($conn,$query);
		header("location:bill.php")
		?>
	<?php endif ?>


<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h3 style="padding-left: 450px;">Your orders :</h3><br>
	<center><div style="padding-top: 15px">
		<div style="border: 3px solid blue; padding: 10px 35px 70px 50px;background-color: OldLace;">
		<table> 
			<?php foreach ($row as $food): ?>
				<tr><td><h4><?php echo $food['name']."&nbsp;"."&nbsp;"."&nbsp;".":"."&nbsp;"."&nbsp;"."&nbsp;"."Rs".$food['price']; ?></h4></td>
				<td><form action="cart.php" method="POST" >
				<button type="submit" name="remove" value="<?php echo $food['id']; ?>">Remove item</button><br>
				</form></td><br></tr>
				<?php endforeach ?><br><br>
				<tr>
				<td><form action="menu.php" method="POST" >
				<button type="submit" name="add_more" value="<?php echo $food['f_id']; ?>">Add more items</button><br><br>
				</form></td>
				<td><form action="bill.php" method="POST" >
					<button type="submit" name="order" value="<?php echo $food['f_id']; ?>">Place order</button><br><br>
				</form></td>
				</tr>
		</table>
		</div>
	</div></center>

</body>
</html>