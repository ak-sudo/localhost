<?php
session_start();

if(!isset($_SESSION['username'])){
echo "Logged out successfully";
    header('location:login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@800&display=swap" rel="stylesheet" class="active">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="icon.html" target="_blank">Employee</a>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="#" class="active">home</a></li>
                    <li><a href="#">gallery</a></li>
                    <li><a href="#">services</a></li>
                    <li><a href="#">portfolio</a></li>
                    <li><a href="#">about</a></li>
                </ul>
            </div>    

            <div class="contact_btn">
                <a href="logout.php">Log Out</a> 
            </div>
        </nav>
        <div class="center_content">
            <h1>Welcome <?php echo $_SESSION['username']; ?></h1>
            <h2>Full Stack Developer</h2>
        </div>

        <div class="social_network">
            <div class="fa_icons">
                <a href="https://www.facebook.com/abhi.k.06/" target="_blank">
                    <i class="fa fa-facebook"></i>
                </a>
            </div>
        </div>

        <div class="social_network">
            <div class="fa_icons">
                <a href="https://www.twiter.com/akshat_kala706/" target="_blank">
                    <i class="fa fa-twitter"></i>
                </a>
            </div>
        </div>

        <div class="social_network">
            <div class="fa_icons">
                <a href="https://www.instagram.com/akshat_kala706/" target="_blank">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
        </div>

        <div class="social_network">
            <div class="fa_icons">
                <a href="#">
                    <i class="fa fa-youtube"></i>
                </a>
            </div>
        </div>

        

    </header>
</body>
</html>