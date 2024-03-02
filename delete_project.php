<!-- responsible for deleting projects-->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "portfolionimadjan";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["project_id"]) && is_numeric($_POST["project_id"])) {
    $projectId = $_POST["project_id"];

    $stmt = $conn->prepare("DELETE FROM madjan WHERE project_id = ?");
    $stmt->bind_param("i", $projectId);

    if ($stmt->execute()) {
       
        echo "success";
    } else {
     
        echo "failure";
    }
} else {

    echo "failure";
}


$conn->close();
?>
