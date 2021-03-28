<!DOCTYPE html>
<html>
<head>
<style>
table {
	width: 100%;
	border-collapse: collapse;
}

table, td, th {
	border: 1px solid black;
	padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
include('connection.php');
session_start();
$pcf = $_GET["q"];
if($pcf=="conf"){
	$pc="confirmed";
}
elseif ($pcf=="pend") {
	$pc="pending";
}
else{
	die;
}
$stmt=$conn->prepare("select order_id,getCustomerName(customer_id) as username,getProductName(stock_id) as product_name,quantity,getPrice(stock_id) as price from orders where status=? and farmer_id=?");
$stmt->bind_param("si",$pc,$_SESSION["typeid"]);
$stmt->execute();
$stmt->bind_result($order_id,$username,$product_name,$quantity,$price);

echo "<table>
<tr>
<th>Order ID</th>
<th>Customer</th>
<th>Product</th>
<th>Quantity</th>
<th>Cost</th>
</tr>";
while($stmt->fetch()) {
	echo "<tr>";
	echo "<td>" . $order_id . "</td>";
	echo "<td>" . $username . "</td>";
	echo "<td>" . $product_name . "</td>";
	echo "<td>" . $quantity . "</td>";
	echo "<td>" . $price . "</td>";
	echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>
</body>
</html>