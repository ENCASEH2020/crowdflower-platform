<?php

### create regex code ###

require_once ('helpers/messages.php');

date_default_timezone_set("UTC"); 
$timestamp = date('Y-m-d H:i:s');

use ReverseRegex\Lexer;
use ReverseRegex\Random\SimpleRandom;
use ReverseRegex\Parser;
use ReverseRegex\Generator\Scope;

require "vendor/autoload.php";

$lexer = new  Lexer('[a-wS-X]{3}-\d{4}-[a-zA-Z]{3}-[1-3][7-9][6-7][a-zA-Z]');
$rand = rand() + rand();
$gen   = new SimpleRandom($rand);
$result = '';

$parser = new Parser($lexer,new Scope(),new Scope());
$parser->parse()->getResult()->generate($result,$gen);

try {
	$stmt = $conn->prepare("INSERT INTO regex (id_user, code, timestamp) VALUES (:id_user, :code, :timestamp)");
	$stmt->bindParam(':id_user', $_SESSION['userId']);
	$stmt->bindParam(':code', $result);
	$stmt->bindParam(':timestamp', $timestamp);
	$stmt->execute();
	$conn = null;
}catch(PDOException $e){
    error_log("Connection failed: " . $e->getMessage() . "\n", 3, $log_path);
	$_SESSION['error_msg'] = $error_msg;
	$conn = null;
	header('location:exit.php');
	exit();
}
?>