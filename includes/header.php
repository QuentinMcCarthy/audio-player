<?php
	session_start();

	$path = "./uploads/audio";

	$dir = array_splice(scandir($path), 2, 1);

	print_r($dir);

	if(isset($_SESSION['playlist'])){
		$playlist = $_SESSION['playlist'];

		for($i=0; $i < count($playlist); $i++){
			$playlistItem = $playlist[$i];

			list($time, $name) = explode("-", $playlistItem);

			rename($path.$playlistItem, $path.time().$name);
		}
	}

	for($i=0; $i < ; $i++){
		$file = $dir[$i];

		list($time, $name) = explode("-", $file);

		$expiry = strtotime("+30 day", $time);

		if(time()>$expiry){
			unlink("./uploads/audio/".$file)
		}
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
