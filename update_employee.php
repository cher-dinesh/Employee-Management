<?php
require_once 'session.php';
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];

    if (!empty($_FILES["profile_picture"]["name"])) {
        $target_dir = "uploads/";
        $profile_picture = basename($_FILES["profile_picture"]["name"]);
        $target_file = $target_dir . $profile_picture;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if ($_FILES["profile_picture"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["profile_picture"]["name"])). " has been uploaded.";
                $sql = "UPDATE employees SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', position='$position', profile_picture='$profile_picture' WHERE id=$id";

                if ($conn->query($sql) === TRUE) {
                    header("Location: edit_employee.php?id=$id&success=true");
                    exit();            
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $sql = "UPDATE employees SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', position='$position' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            header("Location: edit_employee.php?id=$id&success=true");
            exit();    
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $conn->close();
}
?>
