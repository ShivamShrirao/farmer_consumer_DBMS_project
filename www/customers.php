<?php
session_start();
if(!$_SESSION['loggedin'] or $_SESSION['usertype']!="customer"){
	echo "<script>alert('Access Denied!');window.location.href='login.html';</script>";
	die;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>FARMER PAGE</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
		<!--jQuery library--> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!--Latest compiled and minified JavaScript--> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="cas.css">
</head>
<script>
function dosearch() {
	var query=document.getElementById("search_quer").value;
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("search_res").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","search.php?q="+query,true);
	xmlhttp.send();
}
function showCart() {
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("cart").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","showCart.php",true);
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
				<a href="#search_quer"><button class="btn">Search</button></a>
				<a href="#cart"><button class="btn">VIEW Cart</button></a>
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
		<h2>Search  <input id="search_quer" type="text" placeholder="Search.."></h2>
		<div id="search_res"><b>Search Results...</b></div>
		<br>
		<br>
		<h2>Cart</h2>
		<div id="cart"><b>Cart...</b></div>
		<br><br>
	<script type="text/javascript">
		document.getElementById('search_quer').onkeypress=function(e){
			if(e.keyCode==13){
				dosearch();
			}
		}
		showCart();
	</script>
	<br>
	<br>
	<br>
	</div>
	</div>
</div>
</body>
</html>