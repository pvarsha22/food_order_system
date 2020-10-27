<?php session_start(); ?>
<?php 
		$conn=mysqli_connect('localhost','varsha','abc123456','order');
		if(!$conn){
		echo "Connection error".mysqli_connect_error();
		}
?>
		<?php $sql="SELECT * FROM cart"; 
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
</head>
<body><center>
	<div style="padding-top: 90px;">
	<table >
	<tr><?php foreach ($rows as $food):  ?>
		<h4><?php echo $food['name']."&nbsp;"."&nbsp;"."&nbsp;".$food['price']; ?></h4>
	<?php endforeach ?></tr>
	<tr><h3> Total : <?php echo $total; ?></h3></tr>
	</table>
	</div>
	</center>

</body>
</html>