<?php

include "database.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];

    
    $sql = "DELETE FROM socmeds WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Social media link and image deleted successfully";
    } else {
        echo "Error deleting social media link and image: " . $conn->error;
    }
} else {
    echo "No data submitted.";
}


$conn->close();
?>
