<?php
session_start();

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));


    if ($uploadOk == 0) {
        $message = "Sorry, your file could not be uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            $message = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " uploaded.";
        } else {
            $message = "Sorry, we ran into an error uploading your file.";
        }
    }
}

header("Location: resources.html?message=$message");
?>