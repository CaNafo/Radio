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

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
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
                            <li><a href="./about-us.html">About Us</a></li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./gallery.html">Gallery</a>
                            </li>
                            <li><a href="./contact.html">Contact</a></li>
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
                    <audio
                            controls
                            src="http://82.139.170.124:55970/stream/swyh.mp3">
                        Your browser does not support the
                        <code>audio</code> element.
                    </audio>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="about-us-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="as-pic">
                        <img src="<?php echo $photo;?>" alt="">
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

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>