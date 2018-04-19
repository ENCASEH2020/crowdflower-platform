<?php

### check if there are available questions for the connected user ###

### control == 1: control case
### control == 0: general batch

require_once ('helpers/default.php');
require_once ('helpers/messages.php');

if(isset($_SESSION['userId'])) {
	$sql = "SELECT COUNT(*) from respondents WHERE user = '". $_SESSION['userId'] ."'";
	if($conn->query($sql)->fetchColumn() > 0){
		$sql = "SELECT counter FROM respondents WHERE user = '". $_SESSION['userId'] ."'";
		$cnt = 0;
		foreach ($conn->query($sql) as $row) {
			$cnt = $row['counter'];
		}
		if($cnt > 0){
			$_SESSION['warning_msg'] = $warning_msg;
			header('location:exit.php');
			exit();
		}else{
			$responded = array();
			$sql = "SELECT id_user, id_batch from session WHERE id_user = '". $_SESSION['userId'] ."'";

			foreach ($conn->query($sql) as $row) {
				array_push($responded, $row['id_batch']);
			}
			
			$sql = "SELECT count(*) FROM batches WHERE id NOT IN ( '" . implode($responded, "', '") . "' ) AND counter < ". $max_annotations ." AND control = 0";
			$stmt = $conn->prepare($sql); 
			$stmt->execute(); 
			if($stmt->fetchColumn() < $num_pages){
				$_SESSION['warning_msg'] = $warningQuest_msg;
				header('location:exit.php');
				exit();
			}
		}
	}
}

?>