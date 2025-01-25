<?php

include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $image = $_FILES['image'];
    
    if (isset($image) && $image['temp_name'] !== '') {
        $uploadDir = 'uploads/';
        $filePath = $uploadDir . basename($image['name']);

        if (move_uploaded_file($image['tmp_name'], $filePath)) {
            $conn->query("INSERT INTO photos (title, image_path) VALUES ('$title', '$filePath')");
            header('Location: index.php');
            exit();
        } else {
            echo "Image upload failed.";
        }
    }
    else{
        echo "Please select an image.";
    }
}