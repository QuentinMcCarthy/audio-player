<?php
	$path = "../uploads/audio";

	$valid_formats = array("mp3");

	if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST"){
		$name = $_FILES['fileUpload']['name'];
		$size = $_FILES['fileUpload']['size'];
		$tmp  = $_FILES['fileUpload']['tmp_name'];

		if(strlen($name)){
			$name = str_replace("-","_",$name);

			list($txt, $ext) = explode(".", $name);

			if(in_array($ext, $valid_formats)){
				if($size<((1024*1024)*10)){ // 10 MB
					$new_name = $txt."-".time().".".$ext;

					if(!is_dir($path)){
						mkdir($path."/", 0777, true);
					}

					if(move_uploaded_file($tmp, $path."/".$new_name)){
						if(isset($_SESSION['playlist'])){
							array_push($_SESSION['playlist'], $new_name);
						} else{
							$_SESSION['playlist'] = array($new_name);
						}
					}
				}
			}
		}
	}
?>
