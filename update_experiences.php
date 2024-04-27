<?php

include "database.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $new_title = $_POST['new_title'];
    $new_content = $_POST['new_content'];

    
    if (!empty($new_title) && !empty($new_content)) {
        
        $sql = "UPDATE experiences SET title='$new_title', content='$new_content'";

        if ($conn->query($sql) === TRUE) {
            
            header("Location: cms.php");
            exit(); 
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Both title and content are required.";
    }
} else {
    echo "No data submitted.";
}


$conn->close();
?>
