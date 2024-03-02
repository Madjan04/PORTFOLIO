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

  
    $stmt = $conn->prepare("INSERT INTO madjan (project_name, project_desc, project_img, project_link) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $project_name, $project_desc, $project_img, $project_link);


    $project_name = $_POST["project_name"];
    $project_desc = $_POST["project_desc"];
    $project_link = $_POST["project_link"];


    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["project_img"]["name"]);
    move_uploaded_file($_FILES["project_img"]["tmp_name"], $target_file);
    $project_img = $target_file;

  
    if ($stmt->execute()) {
        echo "New project added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
