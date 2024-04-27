<?php

include "database.php";


if (isset($_GET['id'])) {
    
    $id = $_GET['id'];

    
    $sql = "DELETE FROM skills WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        
        header("Location: cms.php");
            exit(); 
    } else {
        echo "Error deleting skill: " . $conn->error;
    }
} else {
    echo "Skill ID not provided.";
}


$conn->close();
?>
