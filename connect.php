<?php
	$First_name = $_POST['First_name'];
	$Last_name = $_POST['Last_name'];
	$Age = $_POST['Age'];
	$Course = $_POST['Course'];
	$Campus = $_POST['Campus'];
	$Belt_rank = $_POST['Belt_rank'];
	$Email= $_POST['Email'];

	// Database connection
	$conn = new mysqli('localhost:3306','root','','register');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into register(First_name, Last_name, Age, Course, Campus, Belt_rank, Email) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssissss", $First_name, $Last_name, $Age, $Course, $Campus, $Belt_rank, $Email);
		$stmt->execute();
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>