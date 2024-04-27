<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madjan's Portfolio</title>
    <link rel="stylesheet" href="portfolio.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<style>
    .nav-bottom {
        margin-right:100px;
        margin-bottom:70px;
    }
    .section-4-card {
        min-width:300px;
        max-width:300px;
    }
    .section-4-lower-cont {
        flex-wrap:wrap;
    }
    .progress-bar {
    height: 20px;
    background-color: #4CAF50; 
}


#section-6 {
   
    gap:100px;
}
* {
   
}
.section-6-left {

display: flex;
justify-content: flex-end;

}


.section-6-right {
min-width:700px;
}

.section-6-right table {
min-width:100%;
}
table {
background:var(--color8);
width:100%;
border-radius:20px;
min-height:500px;
padding:30px;


}
table th {background:none !important;}
table tr > :nth-child(1) {margin-right:30px; background:var(--color3);}
table td {padding:0px; color:white;}
table tr {display: flex;padding-bottom:40px;color: var(--color4); font-size:20px;}
table td {
    font-size:18px;
    background:var(--color4);
    padding:10px; 
    display: flex;
    align-items: center;
    border-radius:20px;

}
table tr >:nth-child(1) {flex: 1 1 40%;text-align: left;}
table tr >:nth-child(2) {flex: 1 1 60%; text-align: left;}
.table-cont {
    
    border:1px var(--color4) solid;
    border-radius:40px;
    padding:40px;
    min-height:500px;
    max-width:100%;
}
.progress-bar {background:var(--color7);  border-radius:59px;}
/*echo "<table>";
    echo "<tr><th>Skill Name</th><th>Proficiency Level</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['skill_name']) . "</td>";
        echo "<td>" . generateProgressBar($row['proficiency_level']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";*/
</style>
</head>
<body>
    <header style = "display:flex; flex-direction:column;">
        <h1>Hi, you can call me Madjan!</h1>
       <p style = "color:var(--color5);">Scroll down to explore.</p>
        <div class = "nav-around">
            <div class ="nav-top">
                <img class = "nav-left" src = "img/logo.png">
            <nav class = "nav-right">
                
                <a href = "#section-1">Home</a>
                <a href = "#section-2">About Me</a>
                <a href = "#section-3">Experiences</a>
                <a href = "#section-4">My Projects</a>
                <a href = "#section-5">Socials</a>
                <a href = "login.php" class = "login-ref"><img src = "img/login.png"></a>
            </nav>
           
        </div>
  
        </div>

        <div class = "nav-bottom">
            <img class = "nav-bottom-right" src = "img/logo.png">
        </div>
    </header>
   
    <section id = "section-1">
        <div class = "section-1-cont">
        <div class = "section-1-left-cont">
            <div class = "name">
            <h4>I AM</h4>
            <h2>Ahmad John Abubakar</h2>
        </div>
            <p><?php include_once "display_overview.php"; ?>
                <!--A Frontend Developer that finds joy in layouting modern designs to improve user experience.--></p>
        </div>
        <div class = "section-1-right-cont">
            <img src="img/302444071_3362393673992160_8792517316941512390_n (1).jpg">
        </div>
    </div>
        
    </section>
    <section id = "section-2">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            $(window).scroll(function(){
                var scroll = $(window).scrollTop();
                var offset1 = $('.section-2-bot-cont').offset().top;
                var offset2 = $('#section-3').offset().top;
                var offset3 = $('.offset-3').offset().top;
                var offset4 = $('.section-4-card').offset().top;
                var offset5 = $('.section-1-cont').offset().top;
                var offset6 = $('footer').offset().top;
                

                var windowHeight = $(window).height();
                if (scroll + windowHeight > offset1) {
                    $('.section-2-top-cont').css('opacity', '1');
                } else {
                    $('.section-2-top-cont').css('opacity', '0');
                    
                }

                if (scroll + windowHeight > offset2) {
                    $('.section-2-bot-cont').css('opacity', '1');
                } else {
                    $('.section-2-bot-cont').css('opacity', '0');
                   
                }

                if (scroll + windowHeight > offset3) {
                    $('.section-3-cont').css('opacity', '1');
                } else {
                    $('.section-3-cont').css('opacity', '0');
                }

                if (scroll + windowHeight > offset4) {
                    $('.section-4-top-cont').css('opacity', '1');
                } else {
                    $('.section-4-top-cont').css('opacity', '0');
                    
                }

                if (scroll + windowHeight > offset5) {
                    $('.nav-bottom').css('opacity', '1');
                    
                    $('.nav-bottom').css('background', 'rgba(245, 244, 244,1)');
                } else {
                    $('.nav-bottom').css('opacity', '0');
                    $('.nav-bottom').css('background', 'none');
                }
                
                if (scroll + windowHeight > offset6) {
                    $('.nav-bottom').css('opacity', '1');
                   
                } else {
                    $('.nav-bottom').css('opacity', '0');
                    
                }
            });
        });
        </script>
        <div class = "section-2-cont">
            <?php include 'display_interests.php'; ?>
         <!--   <div class="section-2-top-cont">
            <h2>Love for Art</h2>
            <p>I've always admired artists/creatives who give attention to detail in every project they work on—each produced efficiently and effectively. I see art as a handy tool to catch the attention of people and inform them regarding a subject through visuals.</p>
        </div>
        <div class="section-2-bot-cont">
            <h2>Desire to Grow</h2>
            <p>Though I may have adequate knowledge on art, I believe that there is still a vast amount of uncharted waters to explore. An opportunity to learn and improve is my vessel to be prepared in every challenge that may arrive.</p>
        </div>-->
        </div>
        </section>
        <section id = "section-3">
            <div class = "section-3-cont">

            <?php

include "database.php";

$sql = "SELECT title, content FROM experiences";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"] . "</h2>";
     
        echo "<p>" . $row["content"] . "</p>";
    }
} else {
    echo "No content available.";
}

$conn->close();
?>

          
                <p class = "offset-3"></p>
            </div>
            </section>

            <section id = "section-6">
                    <div class = "section-6-left">
                        <h2>Skills</h2>
                </div>
                
                <div class = "section-6-right">
                    <?php

include "database.php";


function generateProgressBar($level) {
 
    $maxWidth = 200; 

    $width = $level * ($maxWidth / 100);

    $html = "<div class='progress-bar' style='width: " . $width . "px;'></div>";
    return $html;
}

$sql = "SELECT skill_name, proficiency_level FROM skills";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<div class = 'table-cont'>";
    echo "<table>";
    echo "<tr><th>My Skills</th><th>Proficiency Level</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['skill_name']) . "</td>";
        echo "<td>" . generateProgressBar($row['proficiency_level']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
} else {
    echo "No skills found.";
}

$conn->close();
?></div>
</section>


            <section id = "section-4">
                <div class = "section-4-cont">
                   
                    <div class = "section-4-top-cont">
                        <h2>My Projects</h2>
                       <p class = "section-4-top-sublabel">Here are the projects that I've worked on, I am responsible for the UI/UX. check them out!</p> 
                    </div>
                    <div class = "section-4-lower-cont">
                    <?php include_once "project_display.php"; ?>
                      
                    </div>
                </div>
                </section>
                <section id = "section-5">
                    <div class = "section-5-cont">
                        <div class = "section-5-label">
                        <h2>Connect with me!</h2>
                        <p>Let's talk about designing and perhaps, collaborate in a project.</p>
                    </div>
                        <div class = "socmed-icons-cont">
                        <?php

    include "database.php";

    $sql = "SELECT id, link, image FROM socmed_entries";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<a href='" . $row["link"] . "'><img src='" . $row["image"] . "'></a>";
            echo "</div>";
        }
    } else {
        echo "No links and images found.";
    }
    ?>

                          
                        </div>
                    </div>
                    </section>


               


</body>
<footer style = "overflow-y:hidden;">
    <div class = "footer-cont" >
        <div class = "footer-left-cont" style = "z-index:99999;">
            <a href = "#section-1">Home</a>
            <a href = "#section-2">About Me</a>
            <a href = "#section-3">Experiences</a>
            <a href = "#section-4">My Projects</a>
            <a href = "#section-5">Socials</a>
        </div>
        <div class = "footer-right-cont">
            My Portfolio
        </div>
    </div>
    <div style = "margin-top:50px; margin-bottom:-30px;text-align:center;color:var(--color7); font-size:12px;">Copyright © 2024 Ahmad John J. Abubakar. All Rights Reserved.</div>
</footer>


</html>
            