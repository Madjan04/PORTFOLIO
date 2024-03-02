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
            <p>A Frontend Developer that finds joy in layouting modern designs to improve user experience.</p>
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
            <div class="section-2-top-cont">
            <h2>Love for Art</h2>
            <p>I've always admired artists/creatives who give attention to detail in every project they work on—each produced efficiently and effectively. I see art as a handy tool to catch the attention of people and inform them regarding a subject through visuals.</p>
        </div>
        <div class="section-2-bot-cont">
            <h2>Desire to Grow</h2>
            <p>Though I may have adequate knowledge on art, I believe that there is still a vast amount of uncharted waters to explore. An opportunity to learn and improve is my vessel to be prepared in every challenge that may arrive.</p>
        </div>
        </div>
        </section>
        <section id = "section-3">
            <div class = "section-3-cont">
                <h2>Year after year,</h2>
                <p>My mind consistently became more exposed to the programming languages included in our college, namely: C++, Java, Python, PHP. For styling: CSS, Javascript, and HTML. Additionally, C# which I studied during the development of a game that I built called "Codyssey."
                </p>
                <p>I've also joined workshops about becoming a better Frontend Developer. I'm confident I can design layouts that are both visually appealing and easily comprehensible.</p>
                <p class = "offset-3">Now, I want to showcase my potential and introduce modern designs that can cater a wide range of age. At the same time, build connections and exchange knowledge regarding web development.</p>
            </div>
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
                            <a href = "https://mail.google.com/mail/u/0/#inbox?compose=DmwnWsCZDqJdBfVqNFwgsHCLmCHpJTSrfbnRFnxgBvJvNhZPnNtwdVVXVBcKsHjjZgKRcHWsJRfB"><img src="img/gmail.png"></a>
                                <a href = "https://www.facebook.com/AJTriesEverything"><img src="img/facebook.png"></a>
                                    <a href = "https://www.instagram.com/madj.angel/?hl=en"><img src="img/instagram.png"></a>
                        </div>
                    </div>
                    </section>


                  

</body>
<footer>
    <div class = "footer-cont">
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
</footer>


</html>
            