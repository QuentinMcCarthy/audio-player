<?php
	session_start();

	if(isset($_SESSION['playlist'])){
		$playlist = $_SESSION['playlist'];

		print_r($playlist);

		foreach($playlist as $playlistItem){
			list($time, $songname) = explode("-", $playlistItem);

			$expiry = strtotime("+30 day", $time);

			if(time()>$expiry){
				echo "Expired";
			} else{
				echo "Good";
			}
		}

		die();
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Audio Player</title>

		<!-- FontAwesome -->
		<link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css">

		<!-- jQuery UI, required for draggable -->
		<link rel="stylesheet" href="assets/css/jquery-ui.min.css">
		<link rel="stylesheet" href="assets/css/jquery-ui.structure.min.css">

		<link rel="stylesheet" href="assets/css/master.css">
	</head>
	<body>
