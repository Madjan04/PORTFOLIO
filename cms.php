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




?>

<?php
// Your PHP code to handle form submission and update overview content
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve updated overview content from the form submission
    $updated_overview_content = $_POST['overview_content'];

    // Update the overview content in the database
    $sql = "UPDATE portfolio3 SET overview = '$updated_overview_content'";
    if ($conn->query($sql) === TRUE) {
        // Update successful
        echo "";
    } else {
        echo "Error updating overview content: " . $conn->error;
    }
}

// Retrieve the overview content from the database
$sql = "SELECT overview FROM portfolio3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the first row
    $row = $result->fetch_assoc();
    $overview_content = $row["overview"];
} else {
    $overview_content = "Default overview content goes here.";
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
            <a href = "#overview">Home</a>
            <a href = "#updateForm">About Me</a>
            <a href = "#updateExperiencesForm">Experiences</a>
            <a href = "#addProjectForm">My Projects</a>
            <a href = "#socmedForm">Socials</a>
            <a href = "#skillsForm">Skills
            </a>
            <a href="logout-control.php" onclick="return confirm('Are you sure you want to logout?');">Logout</a>

        </nav>
        <div class  = "project-setup">
<div class = "project-setup-left">
    ..
</div>
<div class = "project-setup-right">
<div class = "add-project-cont" id = "overview">
<form id="editForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="return confirm('Are you sure you want to update this content?');">
    <div class="row">
        <label for="overview_content"><h2>Overview Content</h2></label><br>
        <label style="margin-bottom:40px;">Background info:</label><br>
        <textarea id="overview_content" name="overview_content" rows="4" style="margin-top:15px;"><?php echo htmlspecialchars($overview_content); ?></textarea><br>
    </div>
    <div class="form-buttons">
        <button type="submit">Update</button>
    </div>
</form>

</div>

<div class = "add-project-cont">
<form action="update_interests.php" method="post" id="updateForm" onsubmit="return confirm('Are you sure you want to update this interest?');">
    <label for="interest"><h2>Edit Interest</h2></label><br>
    <label for="interest">Select an interest:</label>
    <select id="interest" name="interest">
        <?php
        // Check if $interests is not empty before iterating over it
        if (!empty($interests)) {
            foreach ($interests as $interest) {
                echo '<option value="' . $interest . '">' . $interest . '</option>';
            }
        } else {
            echo '<option value="">No interests available</option>';
        }
        ?>
    </select><br>
    <label for="new_title">New interest name:</label>
    <input type="text" id="new_title" name="new_title"><br>
    <label for="new_content">Description:</label>
    <textarea id="new_content" name="new_content" rows="4"></textarea><br>
    <br>
    <button type="submit">Update Interest</button>
</form>

    </div>

    <div class="add-project-cont">
    <form action="update_experiences.php" method="post" id="updateExperiencesForm" onsubmit="return confirm('Are you sure you want to update this experience?');">
        <label for="new_title"><h2>Edit Experience</h2></label><br>
        <label>Title:</label>
        <input type="text" id="new_title" name="new_title"><br>
        <label for="new_content">Experiences:</label>
        <textarea id="new_content" name="new_content" rows="4"></textarea><br>
        <button type="submit">Update Experience</button>
        <input type="hidden" name="experience_id" value="<?php echo $experience_id; ?>">

    </form>
</div>


<div class="add-project-cont">
    <h1>Add Project</h1>
    <form action="add_project.php" method="POST" enctype="multipart/form-data" id="addProjectForm" onsubmit="return confirm('Are you sure you want to submit this project?');">
        <div class="row">
            <label for="project_name">Project Name:</label><br>
            <input type="text" id="project_name" name="project_name" required><br>
        </div>
        <div class="row">
            <label for="project_desc">Project Description:</label><br>
            <textarea id="project_desc" name="project_desc" rows="4" required></textarea><br>
        </div>
        <div class="row">
            <label for="project_img">Project Image:</label><br>
            <input type="file" id="project_img" name="project_img" accept="image/*" required><br>
        </div>
        <div class="row">
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
    
        <?php

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
    <button type="submit" onclick="confirmUpdate()">Update</button>
    <button type="button" onclick="deleteProject()">Delete</button>
    </div>
</form>


<script>
  
    document.querySelectorAll('.project-box').forEach(function(box) {
        box.addEventListener('click', function() {
            var projectId = this.dataset.projectId;
          
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
    function confirmUpdate() {
        if (confirm("Are you sure you want to update this project?")) {
            document.getElementById("editForm").submit();
        }
    }
</script>
  <script>
    function deleteProject() {
   
    if (confirm("Are you sure you want to delete this project?")) {
 
        var projectId = document.getElementById('edit_project_id').value;

     
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
    
<!-- HTML form with select options -->

   
<div class = "add-project-cont">
<!-- Add Link and Image Form -->
<form action="handle_socmed.php" method="post" enctype="multipart/form-data" id="socmedForm">
    <label for="link"><h2>Edit SocMed</h2></label><br>

    <label for="socmedList">Select a Social Media Platform:</label>
    <select id="socmedList" name="socmedId">
        <?php
        // Include the database connection script
        include "database.php";

        // Retrieve socmed entries from the database
        $sql = "SELECT id, link FROM socmed_entries";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['link'] . "</option>";
            }
        } else {
            echo "<option value=''>No socmed entries found</option>";
        }
        ?>
    </select><br>
    <label >Social Media Link:</label>
    <input type="text" id="link" name="link"><br>
    <label for="image">Image:</label>
    <input type="file" id="image" name="image"><br>
    
    <!-- Display list of social media entries -->
   
    <button type="submit" name="action" value="add">Add Socmed</button>
    <button type="submit" name="action" value="update">Update Socmed</button>
    <button type="submit" name="action" value="delete">Delete Socmed</button>

</form>
    </div>


<!-- JavaScript to fetch interests using AJAX -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    var interestSelect = document.getElementById("interest");

    // Function to fetch interests using AJAX
    function fetchInterests() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_interests.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var interests = JSON.parse(xhr.responseText);
                    // Clear existing options
                    interestSelect.innerHTML = "";
                    // Populate select options
                    interests.forEach(function(interest) {
                        var option = document.createElement("option");
                        option.value = interest;
                        option.textContent = interest;
                        interestSelect.appendChild(option);
                    });
                } else {
                    console.error("Failed to fetch interests");
                }
            }
        };
        xhr.send();
    }

    // Call fetchInterests function to populate select options on page load
    fetchInterests();
});
</script>

<div class="add-project-cont">
    <form action="handle_skills.php" method="post" enctype="multipart/form-data" id="skillsForm" onsubmit="return confirm('Are you sure you want to submit this skill?');">
        <label for="skill_name"><h2>Add Skill</h2></label><br>
        <label>Skill Name:</label>
        <input type="text" id="skill_name" name="skill_name"><br>

        <label for="proficiency_level">Proficiency Level:</label>
        <input type="number" id="proficiency_level" name="proficiency_level" min="0" max="100"><br>

        <button type="submit">Submit</button>
    </form>
</div>

<div class="add-project-cont">
    <form action="update_skill.php" method="post" id="updateDeleteForm">
        <label for="updateSkill"><h2>Edit Skill</h2></label><br>

        <label>Select a Skill:</label>
        <select id="updateSkill" name="updateSkill" onchange="setDeleteSkill()">
            <?php
            $sql = "SELECT id, skill_name FROM skills";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["id"] . '">' . $row["skill_name"] . '</option>';
                }
            } else {
                echo '<option value="">No skills available</option>';
            }
            ?>
        </select><br>

        <label for="newName">New Skill Name:</label>
        <input type="text" id="newName" name="newName"><br>

        <label for="newLevel">New Proficiency Level:</label>
        <input type="number" id="newLevel" name="newLevel" min="0" max="100"><br>

        <!-- Hidden input field to hold the ID of the skill to be deleted -->
        <input type="hidden" id="deleteSkill" name="deleteSkill">

        <!-- JavaScript to set the value of deleteSkill when Delete Skill button is clicked -->
       
        <button type="submit" name="action" value="update">Update Skill</button>

        <button type="submit" name="action" value="delete">Delete Skill</button>
    </form>
</div>

<script>
    function submitAction(action) {
        if (action === 'update') {
            document.getElementById('updateDeleteForm').action = 'update_skill.php';
            document.getElementById('updateDeleteForm').submit();
        }
    }
</script>


<script>
    function setDeleteSkill() {
        var selectedSkill = document.getElementById("updateSkill");
        var skillId = selectedSkill.value;
        // Set the value of the hidden input field to the selected skill ID
        document.getElementById("deleteSkill").value = skillId;
    }
</script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const addSkillsBtn = document.getElementById('addSkillsBtn');
        const skillInputs = document.getElementById('skillInputs');

        addSkillsBtn.addEventListener('click', function () {
            const numSkills = parseInt(document.getElementById('numSkills').value);

            if (numSkills > 0) {
                skillInputs.innerHTML = ''; // Clear existing skill inputs

                for (let i = 0; i < numSkills; i++) {
                    const newSkillInput = document.createElement('div');
                    newSkillInput.classList.add('skill-input');
                    newSkillInput.innerHTML = `
                        <label for="skill_name_${i}">Skill Name:</label>
                        <input type="text" name="skill_name[]" id="skill_name_${i}" class="skill-name">
                        <label for="proficiency_level_${i}">Proficiency Level (0-100):</label>
                        <input type="number" name="proficiency_level[]" id="proficiency_level_${i}" class="proficiency-level" min="0" max="100">
                    `;
                    skillInputs.appendChild(newSkillInput);
                }
            }
        });
    });
</script>




        </div>
        </div>
    </section>
    </body>
    </html>