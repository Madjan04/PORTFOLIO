<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "portfolionimadjan";


    $conn = new mysqli($servername, $username, $password, $database);

 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $stmt_details = $conn->prepare("UPDATE madjan SET project_name=?, project_desc=?, project_link=? WHERE project_id=?");
    $stmt_details->bind_param("sssi", $project_name, $project_desc, $project_link, $project_id);

    $project_id = $_POST["project_id"];
    $project_name = $_POST["project_name"];
    $project_desc = $_POST["project_desc"];
    $project_link = $_POST["project_link"];

    if ($stmt_details->execute()) {

        echo "<script>alert('Project details updated successfully.');</script>";
    } else {
        echo "Error updating project details: " . $stmt_details->error;
    }

    $stmt_details->close();

    if ($_FILES["project_img"]["size"] > 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["project_img"]["name"]);
        move_uploaded_file($_FILES["project_img"]["tmp_name"], $target_file);

        $stmt_image = $conn->prepare("UPDATE madjan SET project_img=? WHERE project_id=?");
        $stmt_image->bind_param("si", $target_file, $project_id);

        if ($stmt_image->execute()) {
            header("Location: cms.php");
            exit;
        } else {
            echo "Error updating project image: " . $stmt_image->error;
        }

        $stmt_image->close();
    }

    $conn->close();
}
?>
