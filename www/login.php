<?php
	include('connection.php');
	$user = $_POST["name"];
	$pass = $_POST["pass"];
	$stmt = $conn->prepare("select password,usertype,uid from users where username=?");
	$stmt->bind_param("s", $user);
	$stmt->execute();
	$stmt->bind_result($password,$usertype,$uid);
	$stmt->fetch();
	$stmt->close();
	if($password==md5($pass)){
		session_start();
		$query="select ".$usertype."_id from ".$usertype." where uid=?";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("i", $uid);
		$stmt->execute();
		$stmt->bind_result($typeid);
		$stmt->fetch();
		$_SESSION["typeid"] = $typeid;
		$_SESSION['loggedin'] = true;
		$_SESSION['usertype'] = $usertype;
		if($usertype=="farmer"){
			header("Location: farmers.php");
		}
		elseif ($usertype=="customer") {
			header("Location: customers.php");
		}
	}
	else{
		echo "<script>alert('Invalid username/password.');window.location.href='login.html';</script>";
	}
	mysqli_close($conn);
?>
