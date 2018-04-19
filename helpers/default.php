<?php

### initial parameters for running the app ###

session_start();

$max_batches = 1; //num of batches per page
$num_pages = 20; //num of pages
$max_annotations = 5; //num of maximum annotations per batch
	
$sql = "SELECT COUNT(*) FROM batches WHERE counter < ". $max_annotations ."";
?>