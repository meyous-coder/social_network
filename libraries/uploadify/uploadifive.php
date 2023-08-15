<?php
require ("../../config/database.php");
/*
UploadiFive
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
*/

// Set the uplaod directory
$uploadDir = '/uploads/';

// Set the allowed file extensions
$fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // Allowed file extensions

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile   = $_FILES['avatar']['tmp_name'];
	$uploadDir  = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
	$fileParts = pathinfo($_FILES['avatar']['name']);

    $randomFileName = md5(uniqid(rand())).'.'.strtolower($fileParts['extension']);
    $_FILES['avatar']['name'] = $randomFileName;
	$targetFile = $uploadDir . $_FILES['avatar']['name'];

	// Validate the filetype
	if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
		// Save the file
        if(move_uploaded_file($tempFile, $targetFile)){
            $q = $db->prepare("UPDATE users SET avatar= ? WHERE id = ?");
            $q->execute(['uploads/'.$_FILES['avatar']['name'],$_POST['user_id']]);
        }

	} else {

		// The file type wasn't allowed
		echo 'Type de fichier invalide !.';

	}
}
?>