<?php
### check if the connected user has already participated in the crowdsourcing process ###

require_once ('connection/connectdb.php');
require_once ('helpers/messages.php');

if (isset($_POST['id-user'])) {
	$user = $_POST['id-user'];
}

$_SESSION['userId'] = $user;

$sql = "SELECT COUNT(*) from respondents WHERE user = '". $_SESSION['userId'] ."'";
if($conn->query($sql)->fetchColumn() < 1){
	$conn = null;
	header('location:about-step.php');
}else{
	$conn = null;
	$_SESSION['warning_msg'] = $warning_msg;
	header('location:exit.php');
	exit();
}
?>