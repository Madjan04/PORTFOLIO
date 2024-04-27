<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="portfolio.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
       
    </style>
</head>
<body>
    <section id="login-section">
        <div class="login-cont">
            <div class="login-header"><h2>Login</h2><img src="img/logo.png"></div>
            <form class="login-form" action="login-control.php" method="post" style = "overflow:hidden;">
                <input type="text" name="username" class="login-input" placeholder="Username" required/>
                <input type="password" name="password" class="login-input" placeholder="Password" required/>
                <button type="submit" class="login-submit">Login</button>
            </form>
            <?php
           
            if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials') {
                echo '<script>alert("Invalid username or password. Please try again.");</script>';
            }
            ?>
            <a href="portfolio.php" class="go-back">My Portfolio</a>
            <p class="login-greeting">Have a great day ahead!</p>
        </div>
    </section>
</body>
</html>
