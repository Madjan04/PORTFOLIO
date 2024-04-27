<?php

include "database.php";


$sql = "SELECT top, bot, title, content FROM interests";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        if ($row["top"] == 1) {
            
            echo "<div class='section-2-bot-cont'>";
        } else {
            
            echo "<div class='section-2-top-cont'>";
        }
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>" . $row["content"] . "</p>";
        echo "</div>";
    }
} else {
    echo "No interests found.";
}


$conn->close();
?>
