<?php
include 'connection.php';
include 'session.php';
include 'error.php';
$filename	=	'qrcodes.zip';
	$fileQry	=	$conn->query('SELECT * FROM `qrcode`');

	$zip = new ZipArchive;
	if ($zip->open($filename,  ZipArchive::CREATE)){
		while($row	=	$fileQry->fetch_assoc()){
      echo getcwd();
			$zip->addFile(getcwd().'./'.'resource/'.$row['folder_name'], $row['infilename']);
		}

		$zip->close();

		header("Content-type: application/zip");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-length: " . filesize($filename));
		header("Pragma: no-cache");
		header("Expires: 0");
		readfile("$filename");
		unlink($filename);
	}else{
	   echo 'Failed!';
	}
?>
