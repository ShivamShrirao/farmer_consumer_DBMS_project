<?php include('connection.php');
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password = $_POST["pass"];
	$date = $_POST["date"];
	$rol = $_POST["role"];

	if ($role=="student") {
		$stmt = $conn->prepare("INSERT INTO student (firstname, lastname, email) VALUES (?, ?, ?)");
	}
	else{
		$stmt = $conn->prepare("INSERT INTO teacher (firstname, lastname, email) VALUES (?, ?, ?)");		
	}

	$stmt->bind_param("sss", $firstname, $lastname, $email);


	$stmt->execute();
?>