<?php

### save connected user to db ###

require_once ('connection/connectdb.php');
require_once ('helpers/config.php');
require_once ('helpers/default.php');
require_once ('helpers/messages.php');
echo $log_path;

date_default_timezone_set("UTC"); 
$timestamp = date('Y-m-d H:i:s');

if (isset($_POST['selected-gender'])) {
	$gender = $_POST['selected-gender'];
}

if(isset($_POST['selected-age'])){
	$age = $_POST['selected-age'];
}

if (isset($_POST['selected-country'])) {
	$country = $_POST['selected-country'];
}

if (isset($_POST['selected-education'])) {
	$education = $_POST['selected-education'];
}

if (isset($_POST['selected-salary'])) {
	$salary = $_POST['selected-salary'];
}

$counter = 1;

$_SESSION['position'] = rand(1, $num_pages);

try {
	if(isset($_SESSION['userId'])) {
		$sql = "SELECT COUNT(*) from respondents WHERE user = '". $_SESSION['userId'] ."'";
		if($conn->query($sql)->fetchColumn() == 0){
			$stmt = $conn->prepare("INSERT INTO respondents (user, gender, age, country, education, salary, timestamp, counter) VALUES (:user, :gender, :age, :country, :education, :salary, :timestamp, :counter)");
			$stmt->bindParam(':user', $_SESSION['userId']);
			$stmt->bindParam(':gender', $gender);
			$stmt->bindParam(':age', $age);
			$stmt->bindParam(':country', $country);
			$stmt->bindParam(':education', $education);
			$stmt->bindParam(':salary', $salary);
			$stmt->bindParam(':timestamp', $timestamp);
			$stmt->bindParam(':counter', $counter);
			$stmt->execute();
			$conn = null;
			header('location:questions.php');
		}else{
			header('location:questions.php');
		}
	}	
}catch(PDOException $e){
    error_log("Connection failed: " . $e->getMessage() . "\n", 3, $log_path);
	$_SESSION['error_msg'] = $error_msg;
	$conn = null;
	header('location:exit.php');
	exit();
}
?>

