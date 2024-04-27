<?php

include "database.php";


$sql = "SELECT title FROM interests";


$result = $conn->query($sql);


$interests = array();


if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        $interests[] = $row["title"];
    }
}


$conn->close();


header('Content-Type: application/json');
echo json_encode($interests);
?>
