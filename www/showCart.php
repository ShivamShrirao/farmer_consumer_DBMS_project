<?php
session_start();
if(!$_SESSION['loggedin']){
	echo "<script>alert('Access Denied!');window.location.href='login.html';</script>";
	die;
}
elseif ($_SESSION['usertype']!="customer") {
	echo "<script>alert('Access Denied!');window.location.href='login.html';</script>";
	die;
}
elseif ($_SESSION['usertype']=="customer") {
	include('connection.php');
	$stmt=$conn->prepare("select cart_id,getFarmerName(farmer_id) as username,getProductName(stock_id) as product_name,quantity,getPrice(stock_id) as price from cart where customer_id=?");
	$stmt->bind_param("i",$_SESSION["typeid"]);
	$stmt->execute();
	$stmt->bind_result($cart_id,$farmer,$product,$quantity,$price);

	echo "<table>
	<tr>
	<th>Cart ID</th>
	<th>Farmer</th>
	<th>Product</th>
	<th>Quantity</th>
	<th>Price</th>
	</tr>";
	while($stmt->fetch()) {
		echo "<tr>";
		echo "<td>" . $cart_id . "</td>";
		echo "<td>" . $farmer . "</td>";
		echo "<td>" . $product . "</td>";
		echo "<td>" . $quantity . "</td>";
		echo "<td>" . $price . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($conn);
}
?>