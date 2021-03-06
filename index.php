<?php

/* Database credentials. Assuming you are running MySQL

server with default setting (user 'root' with no password) */

define('DB_SERVER', 'localhost');

define('DB_USERNAME', 'root');

define('DB_PASSWORD', '');

define('DB_NAME', 'radio');



/* Attempt to connect to MySQL database */

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}
$photo="";
$title="";
$description="";

$query = "SELECT * FROM news ORDER BY ID DESC";
$result = $link->query($query);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_array($result);
    $title = $row['tittle'];
    $description = $row['description'];
    $photo = $row['photo'];
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Beta9th">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beta9th</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin:400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/chat.css" type="text/css">
</head>

<body id="body" onload="setInterval('chat.update(name)', 1000);setInterval(updateScroll,1000);">
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header-section" id="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="logo">
                    <a href="#">
                        <h2 style="color: white;">Beta9th</h2>
                    </a>
                </div>
            </div>
            <div class="col-lg-10 col-md-10">
                <div class="main-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="#" onclick="smoothScroll(document.getElementById('news'),'news')">News</a></li>
                        <li><a href="#" onclick="smoothScroll(document.getElementById('chat'),'chat')">Chat</a></li>
                        </li>
                        <li><a href="#" onclick="smoothScroll(document.getElementById('news'),'contact')">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Header End -->
<!-- Hero Section Begin -->
<section class="hero-section set-bg" data-setbg="img/bg1.jpg">
    <div style=" margin: 0 auto;" >
        <div class="row" style="margin-top: 90px">
            <div class="hs-text" style="text-align: center">
                <h2 style="color: lightgray; text-shadow: 4px 4px black;">Beta9t Live Radio</h2>
                <audio controls src="http://82.139.170.124:55970/stream/swyh.mp3" style="colo: rebeccapurple">
                    Your browser does not support the <code>audio</code> element.
                </audio>
            </div>
        </div>
    </div>
</section>

<div id="news" >
    <section class="about-us-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="as-pic">
                        <img src="<?php echo $photo;?>" style="border-radius: 10px; height: 600px" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="as-text">
                        <div class="section-title">
                            <span>Did you know?</span>
                            <h2>Daily fun fact</h2>
                        </div>
                        <?php
                        if ($result->num_rows > 0) {
                            $row = mysqli_fetch_array($result);
                            echo "<p class=\"f-para\">".$title."</p>";
                            echo "<p class=\"f-para\">".$description."</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class=".col-sm-4">
    
</div>
<div id="chat">
    <div class="as-text">
        <h2 id="chat-ad">Try our chat!</h2>
    </div>
    <div id="messages">
        <div id="chat-wrap"><div id="chat-area"><p id="welcome_message" style="text-align: center; font-family:courier,Monaco,helvetica; color: white;"></p> </div></div>
    </div>
    <input placeholder="Enter your message and press enter" type="text" id="sendie" maxlength = '45'/>

    <div style="text-align: center;">
        <div style="display: inline-block;"><input type="checkbox" id="scroll" checked></div><div style="display: inline-block;"><p style="color: white;">Auto scroll chat</p></div>
        <button class="btn btn-outline-warning" onclick="setUsername();">Change username</button></div>
    </div>
<!-- Footer Section Begin -->
<section class="footer-section" id="contact">
    <div class="container" style="text-align: center;">
        <div class="row"  style="border: 1px solid rebeccapurple; border-radius: 5px; padding-top: 10px;">
            <div class="col-lg-3 col-md-6" >
                <div class="footer-option">
                    <ul>
                        <li>Address: Yes, we have</li>
                        <li>Phone: 1 per person</li>
                        <li>Email: erasmus_beta@hotmail.com</li>
                    </ul>
                    <div class="fo-social">
                        <a onclick="smoothScroll(document.getElementById('header'),'nothing')"><i class="fa fa-facebook"></i></a>
                        <a onclick="smoothScroll(document.getElementById('header'),'nothing')"><i class="fa fa-instagram"></i></a>
                        <a onclick="smoothScroll(document.getElementById('header'),'nothing')"><i class="fa fa-twitter"></i></a>
                        <a onclick="smoothScroll(document.getElementById('header'),'nothing')"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <p style="color: white; text-align: center;"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This awesome web page is made by Indian guy we payed 2$
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
    </div>
</section>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script type="text/javascript" src="chat.js"></script>
<script type="text/javascript" src="js/scrollJS.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>