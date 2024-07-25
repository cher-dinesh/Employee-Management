<?php
require_once 'session.php';
require_once 'db.php';

function createUploadsDirectory() {
    $upload_dir = 'uploads';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    createUploadsDirectory();

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];

    $target_dir = "uploads/";
    $profile_picture = basename($_FILES["profile_picture"]["name"]);
    $target_file = $target_dir . $profile_picture;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["profile_picture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO employees (firstname, lastname, email, phone, position, profile_picture)
                    VALUES ('$firstname', '$lastname', '$email', '$phone', '$position', '$profile_picture')";

            if ($conn->query($sql) === TRUE) {
                header("Location: add_employee.php?success=true");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $conn->close();
}
?>
