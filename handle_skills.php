<?php

include "database.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['skill_name']) && !empty($_POST['skill_name']) &&
        isset($_POST['proficiency_level']) && !empty($_POST['proficiency_level'])) {
        
        
        $skillName = $_POST['skill_name'];
        $proficiencyLevel = $_POST['proficiency_level'];

        
        $sql = "INSERT INTO skills (skill_name, proficiency_level) VALUES ('$skillName', '$proficiencyLevel')";

        if ($conn->query($sql) === TRUE) {
            
            header("Location: CMS.php");
            exit(); 
        } else {
            
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        
        echo "Skill name or proficiency level is missing.";
    }
} else {
    
    echo "No data submitted.";
}


$conn->close();
?>
