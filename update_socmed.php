<?php

include "database.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $platform = $_POST['platform'];
    $link_url = $_POST['link_url'];
    $image_url = $_POST['image_url'];

    
    $sql = "UPDATE socmeds SET platform='$platform', link_url='$link_url', image_url='$image_url' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Social media link and image updated successfully";
    } else {
        echo "Error updating social media link and image: " . $conn->error;
    }
} else {
    echo "No data submitted.";
}


$conn->close();
?>
