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
	$pname = $_POST["pname"];
	$quantity = $_POST["quantity"];
	$cost = $_POST["cost"];

	$stmt=$conn->prepare("select * from stock where farmer_id=? and product_name=?");
	$stmt->bind_param("is",$_SESSION["typeid"],$pname);
	$stmt->execute();
	$stmt->bind_result($stock_id,$product_name,$available,$farmer_id,$price);
	if($stmt->fetch()){
		$stmt->close();
		$stmt=$conn->prepare("update stock set available=available+? where stock_id=?");
		$stmt->bind_param("ii",$quantity,$stock_id);
		$stmt->execute();
		echo "<script>alert('Product Updated.');window.location.href='farmers.php';</script>";
	}
	else{
		$stmt->close();
		$stmt=$conn->prepare("insert into stock(product_name,available,farmer_id,price) values(?,?,?,?)");
		$stmt->bind_param("siii",$pname,$quantity,$_SESSION["typeid"],$cost);
		$stmt->execute();
		echo "<script>alert('Product Added.');window.location.href='farmers.php';</script>";
	}
	mysqli_close($conn);
}
?>