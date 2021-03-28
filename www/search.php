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
	$pname = $_GET["q"]."%";
	$stmt=$conn->prepare("select s.stock_id,s.product_name,s.available,u.username,s.price from stock s,users u where product_name like ? and u.uid=(select uid from farmer where farmer_id=s.farmer_id) ORDER BY s.price");
	$stmt->bind_param("s",$pname);
	$stmt->execute();
	$stmt->bind_result($stock_id,$product_name,$available,$farmer,$price);

	echo "<table>
	<tr>
	<th>Stock ID</th>
	<th>Product</th>
	<th>Available</th>
	<th>Farmer</th>
	<th>Price</th>
	</tr>";
	while($stmt->fetch()) {
		echo "<tr>";
		echo "<td>" . $stock_id . "</td>";
		echo "<td>" . $product_name . "</td>";
		echo "<td>" . $available . "</td>";
		echo "<td>" . $farmer . "</td>";
		echo "<td>" . $price . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($conn);
}
?>