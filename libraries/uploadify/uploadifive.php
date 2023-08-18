<?php
session_start();
require("../../config/database.php");
/*
UploadiFive
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
*/

// Set the uplaod directory
$targetFolder = '/uploads/' . $_SESSION['user_id'];

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
    $tempFile = $_FILES['avatar']['tmp_name'];
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;

    if (!file_exists($targetPath)) {
        mkdir($targetPath, 0755, true);
    }

    // Set the allowed file extensions
    $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // Allowed file extensions

    $fileParts = pathinfo($_FILES['avatar']['name']);
    $randomFileName = md5(uniqid(rand())) . '.' . strtolower($fileParts['extension']);

//    $_FILES['avatar']['name'] = $randomFileName;
//    $targetFile = $uploadDir . '/' . $_FILES['avatar']['name'];
    $targetFile = rtrim($targetPath,'/').'/'.$randomFileName;

    // Validate the filetype
    if (in_array(strtolower($fileParts['extension']), $fileTypes)) {
        // Save the file
        if (move_uploaded_file($tempFile, $targetFile)) {
            $q = $db->prepare("UPDATE users SET avatar= ? WHERE id = ?");
            $q->execute([$targetFolder.'/'.$randomFileName, $_POST['user_id']]);
            $_SESSION['avatar'] = $targetFolder.'/'.$randomFileName;
        }

    } else {

        // The file type wasn't allowed
        echo 'Type de fichier invalide !.';

    }
}
?>