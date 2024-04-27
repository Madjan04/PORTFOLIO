<?php

include "database.php";


function executeQuery($sql) {
    global $conn;
    try {
        
        $result = $conn->query($sql);
        if ($result === false) {
            throw new Exception("Query execution failed: " . $conn->error);
        }
        return $result;
    } catch (Exception $e) {
        
        
       
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $result = $conn->query($sql);
        if ($result === false) {
            die("Query execution failed after reconnection: " . $conn->error);
        }
        return $result;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];

        
        switch ($action) {
            case 'update':
                updateSocmed();
                break;
            case 'delete':
                deleteSocmed();
                break;
            case 'add':
                addSocmed();
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



function updateSocmed() {
    
    $socmedId = $_POST['socmedId'];
    $link = $_POST['link'];
    $image = $_FILES['image'];

    
    $sql = "SELECT image FROM socmed_entries WHERE id = $socmedId";
    $result = executeQuery($sql);
    $row = $result->fetch_assoc();
    $existingImage = $row['image'];

    
    if ($image['error'] === UPLOAD_ERR_OK) {
        
        $uploadDir = 'uploads/';

        
        $fileName = uniqid() . '_' . $image['name'];

        
        $newFilePath = $uploadDir . $fileName;
        if (move_uploaded_file($image['tmp_name'], $newFilePath)) {
            
            $existingImage = $newFilePath;
        } else {
            echo "Error uploading image";
            return;
        }
    }

    
    $sql = "UPDATE socmed_entries SET link = '$link', image = '$existingImage' WHERE id = $socmedId";
    $result = executeQuery($sql);

    if ($result) {
        header("Location: cms.php");
            exit;
    } else {
        echo "Error updating socmed: " . $conn->error;
    }
}



function deleteSocmed() {
    
    $socmedId = $_POST['socmedId'];

    
    $sql = "DELETE FROM socmed_entries WHERE id = $socmedId";
    $result = executeQuery($sql);

    if ($result) {
        header("Location: cms.php");
        exit;
    } else {
        echo "Error deleting socmed: " . $conn->error;
    }
}


function addSocmed() {
    
    $link = $_POST['link'];
    $image = $_FILES['image'];

    
    if ($image['error'] === UPLOAD_ERR_OK) {
        
        $uploadDir = 'uploads/';

        
        $fileName = uniqid() . '_' . $image['name'];

        
        $filePath = $uploadDir . $fileName;
        if (move_uploaded_file($image['tmp_name'], $filePath)) {
            
            $sql = "INSERT INTO socmed_entries (link, image) VALUES ('$link', '$filePath')";
            $result = executeQuery($sql); 

            if ($result) {
                header("Location: cms.php");
                exit;
            } else {
                echo "Error adding socmed: " . $conn->error;
            }
        } else {
            echo "Error uploading image";
        }
    } else {
        echo "File upload error: " . $image['error'];
    }
}


$conn->close();
?>
