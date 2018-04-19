<?php

### check if the user has already participated in the crowdsourcing process and update accordingly the information in db ###

require_once ('connection/connectdb.php');
require_once ('helpers/config.php');
require_once ('helpers/messages.php');

session_start();

$_SESSION['questCount'] = 0;

if(isset($_SESSION['userId'])) {
	$sql = "SELECT COUNT(*) from respondents WHERE user = '". $_SESSION['userId'] ."'";
	if($conn->query($sql)->fetchColumn() == 0){
		header('location:respondent.php');
	}else{
		$sql = "SELECT counter FROM respondents WHERE user = '". $_SESSION['userId'] ."'";
		$cnt = 0;
		foreach ($conn->query($sql) as $row) {
			$cnt = $row['counter'];
		}
		if($cnt < 1){
			try {
				$cnt = $cnt + 1;
				$sql = "UPDATE respondents SET counter=". $cnt . " WHERE user = '". $_SESSION['userId'] ."'";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
			}catch(PDOException $e){
				error_log("Connection failed: " . $e->getMessage() . "\n", 3, $log_path);
				$_SESSION['error_msg'] = $error_msg;
				$conn = null;
				header('location:exit.php');
				exit();
			}
			header('location:questions.php');
		}else{
			$_SESSION['warning_msg'] = $warning_msg;
			header('location:exit.php');
			exit();
		}
	}
}
?>