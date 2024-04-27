<?php

include "database.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $platform = $_POST['platform'];
    $link_url = $_POST['link_url'];
    $image_url = $_POST['image_url'];

    
    $sql = "INSERT INTO socmeds (platform, link_url, image_url) VALUES ('$platform', '$link_url', '$image_url')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Social media link and image added successfully";
    } else {
        echo "Error adding social media link and image: " . $conn->error;
    }
} else {
    echo "No data submitted.";
}


$conn->close();
?>
