<!--CMS PAGE-->
<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
 
    header("location: login.php");
    exit;
}
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "portfolionimadjan";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM madjan";
$result = $conn->query($sql);

$projects = array();

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
} else {
    echo "No projects found";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Management System</title>
    <link rel="stylesheet" href="portfolio.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
    .project-box {
        padding:5px;
        background:white;
        border:var(--color4) 1px solid;
        border-radius:10px;
        width:fit-content;
        cursor:pointer;
      
    }
    .project-select {
            display:flex;
            border:1px var(--color4) solid;
            flex-wrap:wrap;
            gap:5px;
            padding:20px;
            margin-top:20px;
            border-radius: 5px;
        }

    .add-project-cont {
        padding:40px;
        border:var(--color4) 3px solid;
        width:640px;
        background:white;
        border-radius:20px;
        
    }
    form {
        height:fit-content;
        display:flex;
        flex-direction:column;
        gap:15px;
    }
    label {
        color:var(--color4);
    }
    .project-setup {
      
        width:100vw;
        display:flex;
    }
    .project-setup > :nth-child(1) {
        flex: 1 1 30%;
    }
    .project-setup > :nth-child(2) {
        flex: 1 1 70%;
    }
    textarea {
        border-radius:5px;
        width:100%;
        border:1px var(--color4) solid;
        color:var(--color4);
    }
    textarea:focus {
        outline:var(--color4) 3px solid;
    }
    .form-buttons {
        display:flex;
        gap:5px;
    }
    .project-setup-right {
        display: flex;
        flex-direction: column;
        gap:40px;
    }
 
   .nav-admin {
    border:none;
    border-right:3px var(--color4) solid;
  
   }
</style>
</head>
<body>
   
    <section id = "section-A">
        <nav class = "nav-admin">
            <img src = "img/logo.png">
            <a href = "#section-1">Home</a>
            <a href = "#section-2">About Me</a>
            <a href = "#section-3">Experiences</a>
            <a href = "#section-4">My Projects</a>
            <a href = "#section-5">Socials</a>
            <a href="logout-control.php" onclick="return confirm('Are you sure you want to logout?');">Logout</a>

        </nav>
        <div class  = "project-setup">
<div class = "project-setup-left">
    ..
</div>
<div class = "project-setup-right">
        <div class = "add-project-cont">
            <h1>Add Project</h1>
        <form  action="add_project.php" method="POST" enctype="multipart/form-data">
            <div class = "row">
        <label for="project_name">Project Name:</label><br>
        <input type="text" id="project_name" name="project_name" required><br>
        </div>
        <div class = "row">
        <label for="project_desc">Project Description:</label><br>
        <textarea id="project_desc" name="project_desc" rows="4" required></textarea><br>
        </div>
        <div class = "row">
        <label for="project_img">Project Image:</label><br>
        <input type="file" id="project_img" name="project_img" accept="image/*" required><br>
        </div>
        <div class = "row">
        <label for="project_link">Project Link:</label><br>
        <input type="url" id="project_link" name="project_link" required><br>
        </div>
        <button type="submit">Submit</button>
    </form>
    </div>

    <div class = "add-project-cont">
    <h2>Edit Project</h2>
    <form id="editForm" action="update_project.php" method="POST" enctype="multipart/form-data">
    <div class = "row projselect">
    <div class="project-select">
        <!-- PHP code to fetch project names from the database and populate boxes -->
        <?php
        // Your PHP code here to fetch project names and IDs from the database
        // Example:
        foreach ($projects as $project) {
            echo '<div class="project-box" data-project-id="' . $project["project_id"] . '">' . $project["project_name"] . '</div>';
        }
        ?>
    </div>
    </div>
    <br>
    <div class = "row">
    <label for="project_name">Project Name:</label><br>
    <input type="hidden" id = "edit_project_id" name="project_id" value="<?php echo $project_id; ?>" readonly>


    <input type="text" id="edit_project_name" name="project_name" ><br>
    </div>
    <div class = "row">
    <label for="project_desc">Project Description:</label><br>
    <textarea id="edit_project_desc" name="project_desc" rows="4" ></textarea><br>
    </div>
    <div class = "row">
    <label for="project_img">Project Image:</label><br>
    <input type="file" id="edit_project_img" name="project_img" accept="image/*" ><br>
    </div>
    <div class = "row">
    <label for="project_link">Project Link:</label><br>
    <input type="url" id="edit_project_link" name="project_link"><br>
    </div>
    <div class = "form-buttons">
    <button type="submit">Update</button>
    <button type="button" onclick="deleteProject()">Delete</button>
    </div>
</form>

<script>
    // Add event listeners to project boxes
    document.querySelectorAll('.project-box').forEach(function(box) {
        box.addEventListener('click', function() {
            var projectId = this.dataset.projectId;
            // Fetch project details using AJAX and update the form fields
            getProjectDetails(projectId);
        });
    });

    function getProjectDetails(projectId) {
       
        fetch('get_project_details.php?project_id=' + projectId)
            .then(response => response.json())
            .then(data => {
             
                document.getElementById('edit_project_id').value = data.project_id;
                    document.getElementById('edit_project_name').value = data.project_name;
                    document.getElementById('edit_project_desc').value = data.project_desc;
                    document.getElementById('edit_project_link').value = data.project_link;
              
            })
            .catch(error => console.error('Error fetching project details:', error));
    }
</script>

  <script>
    function deleteProject() {
    // Confirm deletion
    if (confirm("Are you sure you want to delete this project?")) {
        // Get the project ID
        var projectId = document.getElementById('edit_project_id').value;

        // Send an AJAX request to delete the project
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_project.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
              
                if (xhr.responseText.trim() === "success") {
                  
                    alert("Project deleted successfully.");
                    window.location.href = "cms.php";
                } else {
               x
                    alert("Failed to delete project. Please try again.");
                }
            }
        };
        xhr.send("project_id=" + projectId);
    }
}

  </script>
    </div>
        </div>
        </div>
    </section>
    </body>
    </html>