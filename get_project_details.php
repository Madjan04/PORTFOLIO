<?php

$servername = "localhost"; 
$username = "root"; 
$password = "";
$database = "portfolionimadjan"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


<?php


if (isset($_GET['project_id'])) {
  
    $project_id = mysqli_real_escape_string($conn, $_GET['project_id']);

   
    $sql = "SELECT * FROM madjan WHERE project_id = '$project_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
      
        $project = mysqli_fetch_assoc($result);

       
        if ($project) {
        
            echo json_encode($project);
        } else {
           
            echo json_encode(array("error" => "Project not found"));
        }
    } else {
     
        echo json_encode(array("error" => "Error executing query: " . mysqli_error($conn)));
    }
} else {
 
    echo json_encode(array("error" => "Project ID not provided"));
}
?>
