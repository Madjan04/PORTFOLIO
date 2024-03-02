<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "portfolionimadjan";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT project_name, project_desc, project_img, project_link FROM madjan";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
    while ($row = $result->fetch_assoc()) {
        echo '<a class="section-4-card" href="' . $row["project_link"] . '">';
        echo '<div class="section-4-card-image">';
        echo '<img src="' . $row["project_img"] . '" alt="Project Image">';
        echo '</div>';
        echo '<div class="section-4-card-details">';
        echo '<h4 class="section-4-card-name">' . $row["project_name"] . '</h4>';
        echo '<p class="section-4-card-description">' . $row["project_desc"] . '</p>';
        echo '</div>';
        echo '</a>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>
