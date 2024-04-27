<?php

include "database.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];

        
        switch ($action) {
            case 'update':
                updateSkill();
                break;
            case 'delete':
                deleteSkill();
                break;
            default:
                echo "Invalid action.";
        }
    } else {
        echo "No action specified.";
    }
} else {
    echo "No data submitted.";
}



function updateSkill() {
    global $conn; 

    
    if (isset($_POST['updateSkill']) && !empty($_POST['updateSkill']) &&
        isset($_POST['newName']) && isset($_POST['newLevel'])) {
        
        $skillId = $_POST['updateSkill'];
        $newName = $_POST['newName'];
        $newLevel = $_POST['newLevel'];

        
        $sql = "UPDATE skills SET ";
        if (!empty($newName)) {
            $sql .= "skill_name='$newName'";
            if (!empty($newLevel)) {
                $sql .= ", ";
            }
        }
        if (!empty($newLevel)) {
            $sql .= "proficiency_level=$newLevel";
        }
        $sql .= " WHERE id=$skillId";

        if ($conn->query($sql) === TRUE) {
            header("Location: CMS.php");
            exit(); 
        } else {
            echo "Error updating skill: " . $conn->error;
        }
    } else {
        echo "Skill ID, new name, or new level not found or empty.";
    }
}


function deleteSkill() {
    global $conn; 

    
    if (isset($_POST['deleteSkill']) && !empty($_POST['deleteSkill'])) {
        
        $skillId = $_POST['deleteSkill'];

        
        $sql = "DELETE FROM skills WHERE id=$skillId";

        if ($conn->query($sql) === TRUE) {
            header("Location: CMS.php");
            exit(); 
        } else {
            echo "Error deleting skill: " . $conn->error;
        }
    } else {
        echo "Skill ID not found or empty.";
    }
}


$conn->close();
?>
