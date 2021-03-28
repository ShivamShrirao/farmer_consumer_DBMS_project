<?php
session_start();
if(!$_SESSION['loggedin']){
	echo "<script>alert('Access Denied!');window.location.href='login.html';</script>";
	die;
}
elseif ($_SESSION['usertype']!="farmer") {
	echo "<script>alert('Access Denied!');window.location.href='login.html';</script>";
	die;
}
elseif ($_SESSION['usertype']=="farmer") {
	include('connection.php');
	$stmt=$conn->prepare("select stock_id,product_name,available,price from stock where farmer_id=?");
	$stmt->bind_param("i",$_SESSION["typeid"]);
	$stmt->execute();
	$stmt->bind_result($stock_id,$product_name,$available,$price);

	echo "<table>
	<tr>
	<th>Stock ID</th>
	<th>Product</th>
	<th>Quantity</th>
	<th>Price</th>
	</tr>";
	while($stmt->fetch()) {
		echo "<tr>";
		echo "<td>" . $stock_id . "</td>";
		echo "<td>" . $product_name . "</td>";
		echo "<td>" . $available . "</td>";
		echo "<td>" . $price . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($conn);
}
?>