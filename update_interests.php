<?php

include "database.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $interest = $_POST['interest'];
    $new_title = $_POST['new_title'];
    $new_content = $_POST['new_content'];
    
    
    $sql = "UPDATE interests SET title='$new_title', content='$new_content' WHERE title='$interest'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: cms.php");
        exit;
    } else {
        echo "Error updating interest: " . $conn->error;
    }
} else {
    echo "No data submitted.";
}


$conn->close();
?>
