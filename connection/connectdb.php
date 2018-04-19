<?php

### connection to db ###

session_start();

require_once ('helpers/config.php');
require_once ('helpers/messages.php');

$host = "";
$username = "";
$password = "";
$db_name = "";

try{
	$conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
}catch(PDOException $e){
	error_log("Connection failed: " . $e->getMessage() . "\n", 3, $log_path);
	$_SESSION['error_msg'] = $errordb_msg;
	header('location:exit.php');
	exit();
}
?>
