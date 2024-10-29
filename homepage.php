<!-- Low Zhi Lok -->
<?php 
include('config/callOOPdbcon.php');
include("codes/authentication_code.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../IP_Assignment/style/style.css">
    <!-- Our team social media icons -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0%;
            padding: 0%;
        }

        header {
            overflow: hidden;
            height: 100vh;
        }
    </style>
</head>

<body>
    <header>
        <video autoplay muted loop class="vid-bg">
            <source src="../IP_Assignment/websiteDancingVideo/Dance.mp4" type="video/mp4">
        </video>

        <!-- nav bar-->
        <div id="return_top">
            <?php include "../IP_Assignment/partials/header.php" ?>
        </div>

        <div class="banner-text">
            <h2 style="font-family: serif; font-weight: bold;">Do you love music?</h2>
            <p style="font-family: serif;">Let's enjoy the music and dance!</p>
            <a href="#" class="btn rounded-pill border-light border-3" style="font-family: serif; color: #fff; font-size: 20px; padding: 10px 25px;" id="ListenmusicButton">Listen Music</a>
        </div>

        <audio loop id="musicSong">
            <source src="../IP_Assignment//Music _23/Dance _ Planetshakers.mp3" type="audio/mp3">
        </audio>
    </header>

    <!-- About Us -->
    <section class="about_us" id="about">
        <div class="content">
            <img src="./MUSIC_COVER_FEB2019.jpg" alt="music cover">
            <div class="text">
                <h1 style="font-family: serif; font-weight:bolder;">About Us</h1>
                <h5 style="font-family: serif;">LOA History & Our Story</h5>
                <p style="font-family: serif;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores impedit ut quaerat laborum sapiente maiores porro ad laudantium dolor necessitatibus molestiae, nulla quisquam. Adipisci itaque non recusandae, nihil molestiae aspernatur consequuntur ipsum dicta explicabo molestias facere ratione nam nisi quae, error eaque at asperiores animi tempora? Rem odit alias molestias.</p>
                <button type="button" class="rounded-pill homepagebtn" onclick="document.getElementById('our_team_container').scrollIntoView();">Read More</button>
            </div>
        </div>
    </section>

    <!-- Our team -->
    <div class="Our_Container" id="ourTeamTitle">
        <h1 class="ourTeamTitle">Our Team</h1>

        <div class="container" id="our_team_container">
            <div class="our_team_card">
                <img src="./Awesome-Profile-Pictures-for-Guys-look-away2.jpg" alt="">
                <h3>Low Zhi Lok</h3>
                <p>Front End Developer</p>
                <div class="social-media">
                    <a href="https://www.facebook.com/musicshopdhangadhi"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/bsmusicshop"><i class="fa fa-twitter"></i></a>
                    <a href="mailto:lowzhilok@gmail.com"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
            <div class="our_team_card">
                <img src="./linkedin-profile-picture.jpg" alt="">
                <h3>Loi Hong Theen</h3>
                <p>Back End Developer</p>
                <div class="social-media">
                    <a href="https://www.facebook.com/musicshopdhangadhi"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/bsmusicshop"><i class="fa fa-twitter"></i></a>
                    <a href="mailto:loiht-am19@student.tarc.edu.my"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
            <div class="our_team_card">
                <img src="./pexels-photo-220453.jpeg" alt="">
                <h3>Lee Kai Mun</h3>
                <p>Security & Tester</p>
                <div class="social-media">
                    <a href="https://www.facebook.com/musicshopdhangadhi"><i class="fa fa-facebook"></i></a>
                    <a href="https://twitter.com/bsmusicshop"><i class="fa fa-twitter"></i></a>
                    <a href="mailto:leekm-am19@student.tarc.edu.my"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('../IP_Assignment/partials/footer.php'); ?>

    <script>
        var musicSong = document.getElementById("musicSong");
        var ListenmusicButton = document.getElementById("ListenmusicButton");

        ListenmusicButton.onclick = function() {
            // musicSong.play();
            if (musicSong.paused) {
                musicSong.play();
                ListenmusicButton.innerText = "Playing Music...";
            } else {
                musicSong.pause();
                ListenmusicButton.innerText = "Pausing Music...";
            }
        }
    </script>
</body>

</html>