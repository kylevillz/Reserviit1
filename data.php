<?php
	require 'connectdb.php';

	if(isset($_POST['bid'])) {
		$db = new connectdb;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT * FROM tbl_availability WHERE bid = " . $_POST['bid']);
		$stmt->execute();
		$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($books);
	}


 ?>
