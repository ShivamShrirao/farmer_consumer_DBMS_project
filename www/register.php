<?php
	include('connection.php');
	$user = $_POST["name"];
	$pass = md5($_POST["pass"]);
	$num = $_POST["num"];
	$street = $_POST["street"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = $_POST["zip"];
	$date = $_POST["date"];
	$role = $_POST["role"];
	if($role=="Customer"){
		$utype="customer";
	}
	elseif($role=="Farmer"){
		$utype="farmer";
	}
	else{
		echo "<script>alert('Invalid User Type.');window.location.href='register.html';</script>";
		die;
	}
	$stmt = $conn->prepare("select uid from users where username=?");
	$stmt->bind_param("s", $user);
	$stmt->execute();
	if ($stmt->fetch()) {
		echo "<script>alert('Username Exists!');window.location.href='register.html';</script>";
		die;
	}
	$stmt->close();
	$stmt = $conn->prepare("insert into users(username,password,usertype,phone) values(?,?,?,?)");
	$stmt->bind_param("ssss", $user,$pass,$utype,$num);
	$stmt->execute();
	$stmt->close();
	$stmt = $conn->prepare("select last_insert_id() as last_id from users");
	$stmt->execute();
	$stmt->bind_result($last_id);
	$stmt->fetch();
	$stmt->close();
	$stmt = $conn->prepare("insert into address values(?,?,?,?,?)");
	$stmt->bind_param("sssii", $street,$city,$state,$zip,$last_id);
	$stmt->execute();
	$stmt->close();
	$stmt = $conn->prepare("insert into ".$utype."(uid) values(?)");
	$stmt->bind_param("i",$last_id);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Account Registered.');window.location.href='login.html';</script>";
	mysqli_close($conn);
?>
