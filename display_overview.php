<?php

include 'database.php';

$sql = "SELECT overview FROM portfolio3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    $overview_content = $row["overview"];
} else {
    $overview_content = "Default overview content goes here.";
}


$conn->close();


echo $overview_content;
?>
