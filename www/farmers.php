<?php
session_start();
if(!$_SESSION['loggedin'] or $_SESSION['usertype']!="farmer"){
	echo "<script>alert('Access Denied!');window.location.href='login.html';</script>";
	die;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>FARMER PAGE</title>
	<link rel="stylesheet" type="text/css" href="cas.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
		<!--jQuery library--> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!--Latest compiled and minified JavaScript--> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<script>
function showConfirmed() {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("confirmedOrders").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","confpend.php?q=conf",true);
	xmlhttp.send();
}
function showPending() {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("pendingOrders").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","confpend.php?q=pend",true);
	xmlhttp.send();
}
function showStock() {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("stock").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","getstock.php",true);
	xmlhttp.send();
}
</script>
<body>
	
	<div class="a1">
		
		<div a2>
		<img class="backimg" src="bggg.jpg">
	   </div>
		<div class="a1-2">
	<div style="float:left;">
		<h1>
			<img src="farmer_logo.png" width="200" height="250"> <font size="80" face="courier" style="position: relative;left:-10px;bottom: 10px;"><b>E-Market</b></font>
		</h1>
	</div>
			<div class="a1-2-1">
		
				<a href="#cls-ji"><button class="btn">ABOUT US</button></a>
				<a href="#cls-ji1"><button class="btn">ADD STOCK </button></a>
				<a href="#stock"><button class="btn">VIEW STOCK</button></a>
				<a href="logout.php"><button class="btn">LOGOUT</button></a>
			</div>
		</div>
	</div>
	
	<div class="a3">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/hWkYtZxpQUo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
	<div id="cls-ji" class="a4">
	<h2>
		<b class="cls-b">ABOUT US</b>
	</h2>
				<p>This is a portal to connect farmers directly to customers so that they can get required price for their crops.Due to all this malpractices and lack of support for farmers, we decided to design a system through which farmers can directly connect to consumers through an online portal. </p>
	</div>
	<br>
	<div class="a5">
		<h2>Pending Orders</h2>
		<div id="pendingOrders"><b>Pending Orders...</b></div>
		<br>
		<br>
		<h2>Confirmed Orders</h2>
		<div id="confirmedOrders"><b>Confirmed Orders...</b></div>
		<br><br>
		<h2>Stock</h2>
		<div id="stock"><b>Stock...</b></div>
	<script type="text/javascript">
		showPending();
		showConfirmed();
		showStock();
	</script>
	<br>
	<br>
	<br>
	<div id="cls-ji1">
	<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
		<h2>
		<b class="cls-b">ADD/REMOVE STOCK</b>
		</h2>
		<form method="POST" id="form1" action="addstock.php">
			<div class="form-group">
				<input class="form-control" placeholder="Product Name" name="pname">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Quantity" name="quantity">
			</div>
			<div class="form-group">
				<input type="text" class="form-control"  placeholder="Cost per unit" name="cost">
			</div>
			<br>
			<button type="submit" name="submit" class="btn btn-primary">Update</button>
		</form>
		</div>
	</div>
	</div>
	</div>
</div>
</body>
</html>