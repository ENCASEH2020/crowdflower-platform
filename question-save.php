<?php

### insert connected user's response to db ###

require_once ('connection/connectdb.php');
require_once ('helpers/config.php');
require_once ('helpers/default.php');
require_once ('helpers/messages.php');

session_start();

date_default_timezone_set("UTC"); 

if (isset($_SESSION['questCount'])) {
	$_SESSION['questCount']++;
}

if (isset($_POST['user-selection'])) {
	$response = $_POST['user-selection'];
}

if (isset($_POST['other-selection'])) {
	$response_other = $_POST['other-selection'];
}
if(!empty($response_other)){
	$response = $response_other;
}

if (isset($_POST['batch-id'])) {
	$id_batch = $_POST['batch-id'];
}

if (isset($_POST['control-val'])) {
	$control_val = $_POST['control-val'];
}

$timestamp = date('Y-m-d H:i:s');

try {
	$stmt = $conn->prepare("INSERT INTO responses (id_user, id_batch, response) VALUES (:id_user, :id_batch, :response)");
	$stmt->bindParam(':id_user', $_SESSION['userId']);
	$stmt->bindParam(':id_batch', $id_batch);
	$stmt->bindParam(':response', $response);
	$stmt->execute();
	
	$stmt = $conn->prepare("UPDATE batches SET counter = counter + 1 WHERE id = ". $id_batch."");
	$stmt->execute();
	
	$stmt = $conn->prepare("INSERT INTO session (id_user, id_batch, timestamp) VALUES (:id_user, :id_batch, :timestamp)");
	$stmt->bindParam(':id_user', $_SESSION['userId']);
	$stmt->bindParam(':id_batch', $id_batch);
	$stmt->bindParam(':timestamp', $timestamp);
	$stmt->execute();
	
	if($control_val == 1){
		$stmt = $conn->prepare("INSERT INTO control (id_user) VALUES (:id_user)");
		$stmt->bindParam(':id_user', $_SESSION['userId']);
		$stmt->execute();
		$conn = null;
	}
}catch(PDOException $e){
    error_log("Connection failed: " . $e->getMessage() . "\n", 3, $log_path);
	$_SESSION['error_msg'] = $error_msg;
	$conn = null;
	header('location:exit.php');
	exit();
}

$conn = null;

if ($_SESSION['questCount'] < $num_pages) {
	header('location:questions.php');
	exit();
}else{
	header('location:end.php');
	exit();
}

?>
