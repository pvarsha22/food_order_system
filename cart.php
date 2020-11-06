<?php session_start();
	include('connection.php'); ?>
	<!-- adding from menu -->
	<?php if(isset($_POST['add'])): ?>
		<?php $food_id=mysqli_real_escape_string($conn,$_POST['add']);
		$query="SELECT * FROM menu WHERE f_id='$food_id'";
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
	<!--adding from  starters  -->
	<?php if(isset($_POST['add_starter'])): ?>
		<?php $food_id=mysqli_real_escape_string($conn,$_POST['add_starter']);
		$query="SELECT * FROM starter WHERE st_id='$food_id'";
		$result=mysqli_query($conn,$query);
		$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);?>

		<?php foreach ($rows as $food): ?>
			<?php $f_id=mysqli_real_escape_string($conn,$food['st_id']);
			$name=mysqli_real_escape_string($conn,$food['name']);
			$price=mysqli_real_escape_string($conn,$food['price']);

			$sql = "INSERT INTO cart(f_id,name,price) VALUES('$f_id','$name','$price')";
			$res=mysqli_query($conn,$sql);?>
		<?php endforeach ?>
	<?php endif ?>
	<!--adding from  deserts  -->
	<?php if(isset($_POST['add_desert'])): ?>
		<?php $food_id=mysqli_real_escape_string($conn,$_POST['add_desert']);
		$query="SELECT * FROM deserts WHERE d_id='$food_id'";
		$result=mysqli_query($conn,$query);
		$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);?>

		<?php foreach ($rows as $food): ?>
			<?php $f_id=mysqli_real_escape_string($conn,$food['d_id']);
			$name=mysqli_real_escape_string($conn,$food['name']);
			$price=mysqli_real_escape_string($conn,$food['price']);

			$sql = "INSERT INTO cart(f_id,name,price) VALUES('$f_id','$name','$price')";
			$res=mysqli_query($conn,$sql);?>
		<?php endforeach ?>
	<?php endif ?>

	<!--adding from  rice  -->
	<?php if(isset($_POST['add_rice'])): ?>
		<?php $food_id=mysqli_real_escape_string($conn,$_POST['add_rice']);
		$query="SELECT * FROM rice WHERE r_id='$food_id'";
		$result=mysqli_query($conn,$query);
		$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);?>

		<?php foreach ($rows as $food): ?>
			<?php $f_id=mysqli_real_escape_string($conn,$food['r_id']);
			$name=mysqli_real_escape_string($conn,$food['name']);
			$price=mysqli_real_escape_string($conn,$food['price']);

			$sql = "INSERT INTO cart(f_id,name,price) VALUES('$f_id','$name','$price')";
			$res=mysqli_query($conn,$sql);?>
		<?php endforeach ?>
	<?php endif ?>

		<!--adding from  curries  -->
	<?php if(isset($_POST['add_curry'])): ?>
		<?php $food_id=mysqli_real_escape_string($conn,$_POST['add_curry']);
		$query="SELECT * FROM curries WHERE c_id='$food_id'";
		$result=mysqli_query($conn,$query);
		$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);?>

		<?php foreach ($rows as $food): ?>
			<?php $f_id=mysqli_real_escape_string($conn,$food['c_id']);
			$name=mysqli_real_escape_string($conn,$food['name']);
			$price=mysqli_real_escape_string($conn,$food['price']);

			$sql = "INSERT INTO cart(f_id,name,price) VALUES('$f_id','$name','$price')";
			$res=mysqli_query($conn,$sql);?>
		<?php endforeach ?>
	<?php endif ?>

		<!--adding from  roti  -->
	<?php if(isset($_POST['add_roti'])): ?>
		<?php $food_id=mysqli_real_escape_string($conn,$_POST['add_roti']);
		$query="SELECT * FROM roti WHERE ro_id='$food_id'";
		$result=mysqli_query($conn,$query);
		$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);?>

		<?php foreach ($rows as $food): ?>
			<?php $f_id=mysqli_real_escape_string($conn,$food['ro_id']);
			$name=mysqli_real_escape_string($conn,$food['name']);
			$price=mysqli_real_escape_string($conn,$food['price']);

			$sql = "INSERT INTO cart(f_id,name,price) VALUES('$f_id','$name','$price')";
			$res=mysqli_query($conn,$sql);?>
		<?php endforeach ?>
	<?php endif ?>
	<!-- adding icecreams -->
	<?php if(isset($_POST['add_icecream'])): ?>
		<?php $food_id=mysqli_real_escape_string($conn,$_POST['add_icecream']);
		$query="SELECT * FROM icecream WHERE ic_id='$food_id'";
		$result=mysqli_query($conn,$query);
		$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);?>

		<?php foreach ($rows as $food): ?>
			<?php $f_id=mysqli_real_escape_string($conn,$food['ic_id']);
			$name=mysqli_real_escape_string($conn,$food['name']);
			$price=mysqli_real_escape_string($conn,$food['price']);

			$sql = "INSERT INTO cart(f_id,name,price) VALUES('$f_id','$name','$price')";
			$res=mysqli_query($conn,$sql);?>
		<?php endforeach ?>
	<?php endif ?>

		<!-- adding juice -->
	<?php if(isset($_POST['add_juice'])): ?>
		<?php $food_id=mysqli_real_escape_string($conn,$_POST['add_juice']);
		$query="SELECT * FROM juice WHERE j_id='$food_id'";
		$result=mysqli_query($conn,$query);
		$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);?>

		<?php foreach ($rows as $food): ?>
			<?php $f_id=mysqli_real_escape_string($conn,$food['j_id']);
			$name=mysqli_real_escape_string($conn,$food['name']);
			$price=mysqli_real_escape_string($conn,$food['price']);

			$sql = "INSERT INTO cart(f_id,name,price) VALUES('$f_id','$name','$price')";
			$res=mysqli_query($conn,$sql);?>
		<?php endforeach ?>
	<?php endif ?>

	<!--adding from  cart  -->
	<?php $cart="SELECT * FROM cart";
	$cart_res=mysqli_query($conn,$cart);
	$row=mysqli_fetch_all($cart_res,MYSQLI_ASSOC);?>
		
	
	<?php if(isset($_POST['remove'])): ?>
		<?php $remove_id=mysqli_real_escape_string($conn,$_POST['remove']);
		$query="DELETE FROM cart WHERE order_id='$remove_id' "; 
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
		<div style="border: 3px solid blue; padding: 10px 35px 70px 50px;background-image: url('images/bg_menu.gif') ;">
		<table> 
			<?php foreach ($row as $food): ?>
				<tr><td><h4><?php echo $food['name']."&nbsp;"."&nbsp;"."&nbsp;".":"."&nbsp;"."&nbsp;"."&nbsp;"."Rs".$food['price']; ?></h4></td>
				<td><form action="cart.php" method="POST" >
				<button type="submit" name="remove" value="<?php echo $food['order_id']; ?>">Remove item</button><br>
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